<?php
    require_once 'config.php';

    $userID = $_SESSION['userID'] ?? null; 

    if ($userID) {
        $usuariosEnRiesgoSql = "SELECT UsuariosRiesgoPhishing.EmailDestinatario AS Email, UsuariosRiesgoPhishing.FechaHoraClick
    FROM UsuariosRiesgoPhishing
    JOIN Campañas ON UsuariosRiesgoPhishing.IDCampaña = Campañas.IDCampaña
    WHERE Campañas.IDUsuario = ?";

        if ($stmt = $conn->prepare($usuariosEnRiesgoSql)) {
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $result = $stmt->get_result();
            $usuariosEnRiesgo = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

        } else {
            die("Error preparando la consulta: " . $conn->error);
        }
    } else {
        die("Usuario no identificado.");
    }