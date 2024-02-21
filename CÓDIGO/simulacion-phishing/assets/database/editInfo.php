<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idUsuario = filter_input(INPUT_POST, 'idUsuario', FILTER_SANITIZE_NUMBER_INT);

    $nombre = $conn->real_escape_string($_POST['nombre']);
    $direccion = $conn->real_escape_string($_POST['direccion']);
    $ciudad = $conn->real_escape_string($_POST['ciudad']);
    $pais = $conn->real_escape_string($_POST['pais']);
    $codigoPostal = $conn->real_escape_string($_POST['codigoPostal']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    if (!preg_match('/^[0-9]{9}$/', $telefono)) {
        echo json_encode(['success' => false, 'message' => 'Formato de teléfono no válido.']);
        $conn->close();
        exit;
    }

    $sql = "UPDATE Usuarios SET Nombre=?, Direccion=?, Ciudad=?, Pais=?, CodigoPostal=?, Telefono=? WHERE ID=?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssi", $nombre, $direccion, $ciudad, $pais, $codigoPostal, $telefono, $idUsuario);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo json_encode(['success' => true, 'message' => 'Información actualizada con éxito.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se realizó ninguna actualización. Es posible que los datos sean iguales a los existentes.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar la información.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta.']);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no válido.']);
}
