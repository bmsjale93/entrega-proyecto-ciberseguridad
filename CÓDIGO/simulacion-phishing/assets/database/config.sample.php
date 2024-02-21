<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phishing_simulator";

// Configuración de SMTP
$smtpHost = 'smtp.example.com';
$smtpAuth = true;
$smtpUsername = 'your_email@example.com';
$smtpPassword = 'your_password';
$smtpSecure = 'tls';
$smtpPort = 587;
$smtpCharset = 'UTF-8';
$smtpFromEmail = 'your_email@example.com';
$smtpFromName = ''; // Nombre opcional para el remitente

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
