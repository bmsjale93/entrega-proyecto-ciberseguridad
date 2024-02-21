-- Creación de la tabla PlantillasPersonalizadas
CREATE TABLE PlantillasPersonalizadas (
    IDPlantillaPersonalizada INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDUsuario INT(6) UNSIGNED,
    Nombre VARCHAR(100) NOT NULL,
    Asunto VARCHAR(255) NOT NULL,
    Cuerpo TEXT NOT NULL,
    LogoURL VARCHAR(255),
    FOREIGN KEY (IDUsuario) REFERENCES Usuarios(ID) ON DELETE CASCADE
);