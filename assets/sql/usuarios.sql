/*
Esta tabla almacena información sobre los usuarios que pueden ser administradores (clientes) 
que crean y envían campañas de phishing,
o empleados que son los destinatarios de los correos de phishing.
 */

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