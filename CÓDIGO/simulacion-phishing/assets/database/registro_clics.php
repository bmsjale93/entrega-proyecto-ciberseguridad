<?php
require_once 'config.php';

// Validar los parámetros de entrada
if (!isset($_GET['token'], $_GET['campana'], $_GET['envio'], $_GET['destinatario'])) {
    error_log("Faltan parámetros en la solicitud");
    header("Location: index.php");
    exit;
}

$token = $_GET['token'];
$idCampana = filter_var($_GET['campana'], FILTER_VALIDATE_INT);
$idEnvio = filter_var($_GET['envio'], FILTER_VALIDATE_INT);
$emailDestinatario = filter_var(urldecode($_GET['destinatario']), FILTER_VALIDATE_EMAIL);

if (!$idCampana || !$idEnvio || !$emailDestinatario) {
    error_log("Parámetros inválidos: Campaña, Envío o Destinatario.");
    header("Location: index.php");
    exit;
}

try {
    $sql = "INSERT INTO UsuariosRiesgoPhishing (Token, IDCampaña, IDEnvío, EmailDestinatario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("siis", $token, $idCampana, $idEnvio, $emailDestinatario);
    if (!$stmt->execute()) {
        throw new Exception("Error al ejecutar la inserción: " . $stmt->error);
    }

    header("Location: http://localhost/simulacion-phishing/phishing.html");
} catch (Exception $e) {
    error_log($e->getMessage());
    header("Location: index.php");
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
}
exit;
