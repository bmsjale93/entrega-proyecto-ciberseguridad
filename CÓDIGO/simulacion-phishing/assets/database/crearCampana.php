<?php
session_start();
require_once 'config.php';
require_once '/Applications/MAMP/htdocs/simulacion-phishing/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

if (!isset($_SESSION['userID'])) {
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

// Redirige según el método de solicitud HTTP.
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        handleGetRequest($conn);
        break;
    case 'POST':
        handlePostRequest($conn);
        break;
    default:
        echo json_encode(['error' => 'Método de solicitud no soportado.']);
        exit;
}

function handleGetRequest($conn)
{
    if (isset($_GET['action']) && $_GET['action'] === 'getPlantillaDetails' && isset($_GET['IDPlantilla'])) {
        $idPlantilla = $_GET['IDPlantilla'];
        $detallesPlantilla = obtenerDetallesPlantilla($conn, $idPlantilla);
        echo $detallesPlantilla ? json_encode($detallesPlantilla) : json_encode(['error' => 'No se encontraron detalles para la plantilla con ID ' . $idPlantilla]);
    } else {
        echo json_encode(['error' => 'Acción GET no válida o parámetros faltantes.']);
    }
    exit;
}

function handlePostRequest($conn)
{
    $camposRequeridos = ['nombreCampana', 'descripcionCampana', 'tipoPlantilla'];
    foreach ($camposRequeridos as $campo) {
        if (empty($_POST[$campo])) {
            echo json_encode(['error' => "El campo $campo es obligatorio"]);
            exit;
        }
    }

    $metodoIngresoCorreos = $_POST['metodoIngresoCorreos'] ?? '';
    $correosUnicosValidos = !empty($_POST['correosUnicos']);
    $archivoCSVValido = $metodoIngresoCorreos === 'csv' && isset($_FILES['archivoCSV']) && $_FILES['archivoCSV']['error'] === UPLOAD_ERR_OK;

    if (!$correosUnicosValidos && !$archivoCSVValido) {
        echo json_encode(['error' => "Es obligatorio proporcionar correos electrónicos ya sea a través del campo 'correosUnicos' o mediante la carga de un archivo CSV."]);
        exit;
    }

    // Manejo de la subida de la imagen de logo
    $imagenLogoUrl = '';
    if (isset($_FILES['logoImagen']) && $_FILES['logoImagen']['error'] == UPLOAD_ERR_OK) {
        $directorioSubidas = '/Applications/MAMP/htdocs/simulacion-phishing/assets/img/empresas/';
        $nombreArchivo = basename($_FILES['logoImagen']['name']);
        $rutaArchivoSubido = $directorioSubidas . $nombreArchivo;

        if (move_uploaded_file($_FILES['logoImagen']['tmp_name'], $rutaArchivoSubido)) {
            $baseURL = 'http://localhost/simulacion-phishing';
            $directorioWeb = '/assets/img/empresas/';
            $imagenLogoUrl = $baseURL . $directorioWeb . $nombreArchivo;
        }
    }

    $idUsuario = $_SESSION['userID'];
    $nombreCampana = htmlspecialchars($_POST['nombreCampana']);
    $descripcionCampana = htmlspecialchars($_POST['descripcionCampana']);
    $tipoPlantilla = htmlspecialchars($_POST['tipoPlantilla']);
    $correosUnicos = htmlspecialchars($_POST['correosUnicos']);

    if ($_POST['tipoPlantilla'] === 'predeterminada') {
        $idPlantilla = isset($_POST['IDPlantilla']) ? $_POST['IDPlantilla'] : null;
        $idPlantillaPersonalizada = null;
    } elseif ($_POST['tipoPlantilla'] === 'personalizada') {
        $idPlantillaPersonalizada = isset($_POST['IDPlantillaPersonalizada']) ? $_POST['IDPlantillaPersonalizada'] : null;
        $idPlantilla = null;
    } else {
        echo json_encode(['error' => "El tipo de plantilla seleccionado no es válido"]);
        exit;
    }

    $conn->begin_transaction();
    try {
        $idCampana = insertarCampana($conn, $idUsuario, $nombreCampana, $descripcionCampana, $idPlantilla, $idPlantillaPersonalizada);
        $idEnvio = insertarEnvio($conn, $idCampana, 'único');
        $datosPersonalizados = null;
        $correosUnicosArray = array();

        if (!empty($_POST['correosUnicos'])) {
            $correosUnicosArray = explode(',', htmlspecialchars($_POST['correosUnicos']));
        }

        // O si recibes un archivo CSV
        if (isset($_FILES['archivoCSV']) && $_FILES['archivoCSV']['error'] == UPLOAD_ERR_OK) {
            $rutaArchivoCSV = $_FILES['archivoCSV']['tmp_name'];
            if (($handle = fopen($rutaArchivoCSV, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $correosUnicosArray[] = $data[0];
                }
                fclose($handle);
            }
        }

        procesarCorreosUnicos($conn, $idCampana, $correosUnicosArray, $nombreCampana, $idEnvio, $tipoPlantilla, $idPlantilla, $datosPersonalizados);

        $conn->commit();
        echo json_encode(['success' => 'Campaña creada con éxito', 'idCampana' => $idCampana]);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}

function insertarCampana($conn, $idUsuario, $nombreCampana, $descripcionCampana, $idPlantilla, $idPlantillaPersonalizada)
{
    $sql = "INSERT INTO Campañas (IDUsuario, Nombre, Descripción, IDPlantilla, IDPlantillaPersonalizada, FechaInicio) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Error al preparar la inserción de la campaña: ' . $conn->error);
    }

    $stmt->bind_param("issii", $idUsuario, $nombreCampana, $descripcionCampana, $idPlantilla, $idPlantillaPersonalizada);
    if (!$stmt->execute()) {
        throw new Exception('Error al insertar la campaña: ' . $conn->error);
    }
    $idCampana = $conn->insert_id;
    $stmt->close();
    return $idCampana;
}

function procesarCorreosUnicos($conn, $idCampana, $correosArray, $nombreCampana, $idEnvio, $tipoPlantilla, $idPlantilla = null, $datosPersonalizados = null)
{
    foreach ($correosArray as $correo) {
        $correo = trim($correo);
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            continue;
        }

        if ($tipoPlantilla === 'personalizada') {
            $datosPersonalizados = obtenerDatosPersonalizados();

            // Verificación de los datos personalizados
            if (empty($datosPersonalizados['asunto']) || empty($datosPersonalizados['cuerpo'])) {
                echo json_encode(['error' => "Los datos personalizados de asunto y cuerpo son obligatorios para campañas personalizadas."]);
                exit;
            }
        }

        $envioExitoso = enviarCorreo($conn, $correo, $nombreCampana, $tipoPlantilla, $idPlantilla, $datosPersonalizados, $idCampana, $idEnvio);
        $estadoEnvio = $envioExitoso ? 'entregado' : 'fallido';

        insertarDetalleEnvio($conn, $idCampana, $correo, $estadoEnvio, $idEnvio);
    }
}
function obtenerDetallesPlantilla($conn, $idPlantilla)
{
    $sql = "SELECT Nombre, Asunto, Cuerpo, LogoURL FROM PlantillasCorreo WHERE IDPlantilla = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        return null;
    }

    $stmt->bind_param("i", $idPlantilla);
    if (!$stmt->execute()) {
        $stmt->close();
        return null;
    }
    $resultado = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $resultado ? $resultado : null;
}


function enviarCorreo($conn, $emailDestinatario, $nombreCampana, $tipoPlantilla, $idPlantilla = null, $datosPersonalizados = null, $idCampana, $idEnvio)
{
    global $smtpHost, $smtpAuth, $smtpUsername, $smtpPassword, $smtpSecure, $smtpPort, $smtpCharset, $smtpFromEmail;
    $token = md5($emailDestinatario . time() . rand());
    $urlSeguimiento = "http://localhost/simulacion-phishing/assets/database/registro_clics.php?token=$token&campana=$idCampana&envio=$idEnvio&destinatario=" . urlencode($emailDestinatario);

    $mail = new PHPMailer(true);
    try {
        // Configuración inicial de PHPMailer
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = $smtpAuth;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = $smtpSecure;
        $mail->Port = $smtpPort;
        $mail->CharSet = $smtpCharset;
        $mail->setFrom($smtpFromEmail, $nombreCampana);
        $mail->addAddress($emailDestinatario);
        $mail->isHTML(true);

        $asunto = '';
        $cuerpo = '';

        if ($tipoPlantilla === 'predeterminada' && $idPlantilla !== null) {
            $detallesPlantilla = obtenerDetallesPlantilla($conn, $idPlantilla);
            if ($detallesPlantilla !== null) {
                $asunto = $detallesPlantilla['Asunto'];
                $cuerpoOriginal = $detallesPlantilla['Cuerpo'];
                $cuerpo = $cuerpoOriginal . "<br><a href='$urlSeguimiento'>Haz clic aquí para más información.</a>";
            } else {
                error_log("Detalles de la plantilla no encontrados para el ID: $idPlantilla");
                return false;
            }
        } elseif ($tipoPlantilla === 'personalizada' && $datosPersonalizados !== null) {
            $asunto = $datosPersonalizados['asunto'];
            $cuerpoPersonalizado = $datosPersonalizados['cuerpo'];
            $cuerpo = $cuerpoPersonalizado . "<br><a href='$urlSeguimiento'>Haz clic aquí para más información.</a>";
        }

        if (empty($cuerpo) || empty($asunto)) {
            error_log("El cuerpo o asunto del correo está vacío para el destinatario $emailDestinatario");
            return false;
        }

        $mail->Subject = $asunto;
        $mail->Body = $cuerpo;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Error al enviar correo a $emailDestinatario: " . $mail->ErrorInfo);
        return false;
    }
}


function insertarDestinatario($conn, $idCampana, $correo)
{
    $sql = "INSERT INTO DestinatariosCampaña (IDCampaña, EmailDestinatario) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Error al preparar la inserción del destinatario: ' . $conn->error);
    }

    $stmt->bind_param("is", $idCampana, $correo);
    if (!$stmt->execute()) {
        throw new Exception('Error al insertar destinatario: ' . $conn->error);
    }
    $idDestinatario = $conn->insert_id;
    $stmt->close();
    return $idDestinatario;
}

function insertarDetalleEnvio($conn, $idCampana, $correo, $estadoEnvio, $idEnvio)
{
    $sql = "INSERT INTO DetallesEnvíos (IDEnvío, EmailDestinatario, Estado) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Error al preparar la inserción del detalle de envío: ' . $conn->error);
    }

    $stmt->bind_param("iss", $idEnvio, $correo, $estadoEnvio);
    if (!$stmt->execute()) {
        throw new Exception('Error al insertar detalle de envío: ' . $conn->error);
    }
    $stmt->close();
}

function obtenerUltimoIDEnvio($conn, $idCampana)
{
    $sql = "SELECT IDEnvío FROM Envíos WHERE IDCampaña = ? ORDER BY FechaEnvío DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Error al preparar la consulta para obtener el último IDEnvío: ' . $conn->error);
    }

    $stmt->bind_param("i", $idCampana);
    if (!$stmt->execute()) {
        throw new Exception('Error al obtener el último IDEnvío: ' . $conn->error);
    }

    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $stmt->close();
        return $row['IDEnvío'];
    } else {
        $stmt->close();
        throw new Exception('No se encontró un IDEnvío para la campaña con ID ' . $idCampana);
    }
}

function insertarEnvio($conn, $idCampana, $tipoEnvio = 'único')
{
    $sql = "INSERT INTO Envíos (IDCampaña, FechaEnvío, TipoEnvío) VALUES (?, NOW(), ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Error al preparar la inserción de envío: ' . $conn->error);
    }

    $stmt->bind_param("is", $idCampana, $tipoEnvio);
    if (!$stmt->execute()) {
        throw new Exception('Error al insertar envío: ' . $conn->error);
    }
    $idEnvio = $conn->insert_id;
    $stmt->close();
    return $idEnvio;
}

function crearCuerpoCorreo($titulo, $contenido, $urlEngano, $imagenLogoUrl)
{
    $cuerpoCorreo = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>$titulo</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .btn-engano { display: inline-block; background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 20px; }
        .logo { text-align: center; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>$titulo</h2>
        <p>$contenido</p>
        <a href="$urlEngano" class="btn-engano">Haz clic aquí para verificar</a>
        <div class="logo">
            <img src="{$imagenLogoUrl}" alt="Logo" style="max-width: 100px;">
        </div>
    </div>
</body>
</html>
HTML;

    return $cuerpoCorreo;
}

function obtenerDatosPersonalizados()
{
    $datos = [];
    $asuntoCorreo = filter_input(INPUT_POST, 'asuntoCorreo', FILTER_SANITIZE_SPECIAL_CHARS);
    $cuerpoCorreo = filter_input(INPUT_POST, 'cuerpoCorreo', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($asuntoCorreo) || empty($cuerpoCorreo)) {
        error_log("Datos personalizados de asunto o cuerpo faltantes o inválidos.");
        return false;
    } else {
        $datos['asunto'] = $asuntoCorreo;
        $datos['cuerpo'] = $cuerpoCorreo;
    }
    return $datos;
}
