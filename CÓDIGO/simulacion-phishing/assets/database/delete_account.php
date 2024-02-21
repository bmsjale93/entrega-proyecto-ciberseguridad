<?php
session_start();
include 'config.php';

if (!isset($_SESSION['userID'])) {
    header('Location: index.php');
    exit;
}

$userID = $_SESSION['userID'];

$sql = "DELETE FROM Usuarios WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    session_destroy();
    session_write_close();
    echo json_encode(['success' => true, 'message' => 'Cuenta eliminada correctamente.']);
    exit;
} else {
    $stmt->close();
    $conn->close();
    echo json_encode(['success' => false, 'message' => 'Error al eliminar la cuenta.']);
    exit;
}
