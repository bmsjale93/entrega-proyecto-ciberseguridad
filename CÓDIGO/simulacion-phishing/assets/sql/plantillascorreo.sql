-- Creación de la tabla PlantillasCorreo
CREATE TABLE PlantillasCorreo (
    IDPlantilla INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Asunto VARCHAR(255) NOT NULL,
    Cuerpo TEXT NOT NULL,
    LogoURL VARCHAR(255)
);