<?php
// Preparación de la consulta para obtener estadísticas de la campaña
$estadisticasSql = "SELECT 
    COUNT(*) AS TotalEnvios, 
    SUM(CASE WHEN Estado = 'entregado' THEN 1 ELSE 0 END) AS Entregados,
    (SELECT COUNT(DISTINCT UsuariosRiesgoPhishing.ID) 
     FROM UsuariosRiesgoPhishing 
     JOIN Campañas ON UsuariosRiesgoPhishing.IDCampaña = Campañas.IDCampaña
     WHERE Campañas.IDUsuario = ?) AS Clicks 
FROM DetallesEnvíos 
JOIN Envíos ON DetallesEnvíos.IDEnvío = Envíos.IDEnvío
JOIN Campañas ON Envíos.IDCampaña = Campañas.IDCampaña
WHERE Campañas.IDUsuario = ?";

$stmt = $conn->prepare($estadisticasSql);
if ($stmt === false) {
    die("Error preparando la consulta: " . $conn->error);
}
$stmt->bind_param("ii", $userID, $userID);
$stmt->execute();
$estadisticas = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Calcula el porcentaje de clics respecto al total de envíos
$porcentajeClicks = isset($estadisticas['TotalEnvios']) && $estadisticas['TotalEnvios'] > 0 ? ($estadisticas['Clicks'] / $estadisticas['TotalEnvios']) * 100 : 0;