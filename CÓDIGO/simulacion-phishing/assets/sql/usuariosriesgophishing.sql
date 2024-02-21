-- Creación de la tabla UsuariosRiesgoPhishing
CREATE TABLE UsuariosRiesgoPhishing (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Token VARCHAR(255) NOT NULL UNIQUE,
    IDCampaña INT(6) UNSIGNED,
    IDEnvío INT(6) UNSIGNED,
    EmailDestinatario VARCHAR(255) NOT NULL,
    FechaHoraClick TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (IDCampaña) REFERENCES Campañas(IDCampaña),
    FOREIGN KEY (IDEnvío) REFERENCES Envíos(IDEnvío)
);