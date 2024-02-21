<?php
// Obtener detalles de envíos para todas las campañas del usuario
$detallesEnviosSql = "SELECT DetallesEnvíos.EmailDestinatario, DetallesEnvíos.Estado, MAX(UsuariosRiesgoPhishing.FechaHoraClick) AS UltimoClick
                      FROM DetallesEnvíos
                      LEFT JOIN UsuariosRiesgoPhishing ON DetallesEnvíos.EmailDestinatario = UsuariosRiesgoPhishing.EmailDestinatario AND DetallesEnvíos.IDEnvío = UsuariosRiesgoPhishing.IDEnvío
                      JOIN Envíos ON DetallesEnvíos.IDEnvío = Envíos.IDEnvío
                      JOIN Campañas ON Envíos.IDCampaña = Campañas.IDCampaña
                      WHERE Campañas.IDUsuario = ?
                      GROUP BY DetallesEnvíos.EmailDestinatario, DetallesEnvíos.Estado";

$stmt = $conn->prepare($detallesEnviosSql);
if ($stmt === false) {
    die("Error preparando la consulta: " . $conn->error);
}
$stmt->bind_param("i", $userID);
$stmt->execute();
$resultadoDetallesEnvios = $stmt->get_result();

$detallesEnvios = [];
while ($detalle = $resultadoDetallesEnvios->fetch_assoc()) {
    // Determinar si hubo un clic
    $detalle['ClickEnlace'] = $detalle['UltimoClick'] ? 'Sí' : 'No';
    $detallesEnvios[] = $detalle;
}
$stmt->close();