<?php
$sql = "SELECT * FROM Usuarios WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$userInfo = $result->fetch_assoc();

if (!$userInfo) {
    echo "No se pudo cargar la información del usuario.";
    exit;
}

// Consulta para obtener las campañas del usuario
$campañasSql = "SELECT * FROM Campañas WHERE IDUsuario = ?";
$stmt = $conn->prepare($campañasSql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$campañasResult = $stmt->get_result();

$campañas = [];
while ($campaña = $campañasResult->fetch_assoc()) {
    $campañas[] = $campaña;
}
$stmt->close();
