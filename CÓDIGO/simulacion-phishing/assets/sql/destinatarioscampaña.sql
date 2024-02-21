-- Creación de la tabla DestinatariosCampaña
CREATE TABLE DestinatariosCampaña (
    IDDestinatario INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDCampaña INT(6) UNSIGNED,
    EmailDestinatario VARCHAR(255) NOT NULL,
    FOREIGN KEY (IDCampaña) REFERENCES Campañas(IDCampaña) ON DELETE CASCADE
);