-- Creación de la tabla Campañas
CREATE TABLE Campañas (
    IDCampaña INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDUsuario INT(6) UNSIGNED,
    IDPlantilla INT(6) UNSIGNED NULL,
    IDPlantillaPersonalizada INT(6) UNSIGNED NULL,
    Nombre VARCHAR(100) NOT NULL,
    Descripción TEXT,
    FechaInicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FechaFin TIMESTAMP NULL,
    FOREIGN KEY (IDUsuario) REFERENCES Usuarios(ID) ON DELETE CASCADE,
    FOREIGN KEY (IDPlantilla) REFERENCES PlantillasCorreo(IDPlantilla) ON DELETE
    SET
        NULL,
        FOREIGN KEY (IDPlantillaPersonalizada) REFERENCES PlantillasPersonalizadas(IDPlantillaPersonalizada) ON DELETE
    SET
        NULL
);