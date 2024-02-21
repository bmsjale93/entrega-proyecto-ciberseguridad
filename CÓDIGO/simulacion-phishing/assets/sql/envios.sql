-- Creación de la tabla Envíos
CREATE TABLE Envíos (
    IDEnvío INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDCampaña INT(6) UNSIGNED,
    FechaEnvío TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TipoEnvío ENUM('único', 'masivo') NOT NULL,
    FOREIGN KEY (IDCampaña) REFERENCES Campañas(IDCampaña) ON DELETE CASCADE
);