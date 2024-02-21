-- Creación de la tabla DetallesEnvíos
CREATE TABLE DetallesEnvíos (
    IDDetalle INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IDEnvío INT(6) UNSIGNED,
    EmailDestinatario VARCHAR(50) NOT NULL,
    Estado ENUM('entregado', 'fallido') NOT NULL,
    FOREIGN KEY (IDEnvío) REFERENCES Envíos(IDEnvío) ON DELETE CASCADE
);