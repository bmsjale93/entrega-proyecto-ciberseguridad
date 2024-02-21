<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['userID'])) {
    echo json_encode(['error' => 'Acceso no autorizado']);
    exit;
}

$idUsuario = $_SESSION['userID'];

$sql = "SELECT * FROM Campañas WHERE IDUsuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();

$campañas = [];
while ($fila = $result->fetch_assoc()) {
    $campañas[] = $fila;
}

$stmt->close();
$conn->close();

echo json_encode($campañas);
