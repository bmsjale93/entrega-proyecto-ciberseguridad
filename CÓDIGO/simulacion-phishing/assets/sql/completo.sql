-- Creación de la tabla Usuarios
CREATE TABLE Usuarios (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Direccion VARCHAR(100),
    Ciudad VARCHAR(50),
    Pais VARCHAR(50),
    CodigoPostal VARCHAR(20),
    Telefono VARCHAR(20),
    TipoUsuario ENUM('cliente', 'empleado') NOT NULL,
    FechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla PlantillasCorreo
CREATE TABLE PlantillasCorreo (
    IDPlantilla INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Asunto VARCHAR(255) NOT NULL,
    Cuerpo TEXT NOT NULL,
    LogoURL VARCHAR(255)
);

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

-- Creación de la tabla Envíos
CREATE TABLE Envíos (
    IDEnvío INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDCampaña INT(6) UNSIGNED,
    FechaEnvío TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TipoEnvío ENUM('único', 'masivo') NOT NULL,
    FOREIGN KEY (IDCampaña) REFERENCES Campañas(IDCampaña) ON DELETE CASCADE
);

-- Creación de la tabla DestinatariosCampaña
CREATE TABLE DestinatariosCampaña (
    IDDestinatario INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDCampaña INT(6) UNSIGNED,
    EmailDestinatario VARCHAR(255) NOT NULL,
    FOREIGN KEY (IDCampaña) REFERENCES Campañas(IDCampaña) ON DELETE CASCADE
);

-- Creación de la tabla DetallesEnvíos
CREATE TABLE DetallesEnvíos (
    IDDetalle INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDEnvío INT(6) UNSIGNED,
    EmailDestinatario VARCHAR(50) NOT NULL,
    Estado ENUM('entregado', 'fallido') NOT NULL,
    FOREIGN KEY (IDEnvío) REFERENCES Envíos(IDEnvío) ON DELETE CASCADE
);

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