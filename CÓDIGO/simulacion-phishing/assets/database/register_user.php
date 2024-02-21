<?php
include 'config.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['Nombre']);
    $email = trim($_POST['Email']);
    $password = $_POST['Password'];
    $confirmPassword = $_POST['confirmPassword'];
    $direccion = trim($_POST['Direccion']);
    $ciudad = trim($_POST['Ciudad']);
    $pais = trim($_POST['Pais']);
    $codigoPostal = trim($_POST['CodigoPostal']);
    $telefono = trim($_POST['Telefono']);
    $tipoUsuario = trim($_POST['TipoUsuario']);

    if (
        empty($nombre) || empty($email) || empty($password) || empty($confirmPassword) || empty($direccion) ||
        empty($ciudad) || empty($pais) || empty($codigoPostal) || empty($telefono) || empty($tipoUsuario)
    ) {
        echo json_encode(["message" => "Por favor complete todos los campos."]);
        exit;
    }

    if ($password !== $confirmPassword) {
        echo json_encode(["message" => "Las contraseñas no coinciden."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["message" => "Formato de correo electrónico inválido."]);
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM Usuarios WHERE Email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo json_encode(["message" => "Ya existe un usuario registrado con ese correo electrónico."]);
            exit;
        }
    }

    $sql = "INSERT INTO Usuarios (Nombre, Email, Password, Direccion, Ciudad, Pais, CodigoPostal, Telefono, TipoUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssss", $nombre, $email, $passwordHash, $direccion, $ciudad, $pais, $codigoPostal, $telefono, $tipoUsuario);

        if ($stmt->execute()) {
            $_SESSION['nombreUsuario'] = $nombre;
            $_SESSION['userID'] = $conn->insert_id;
            echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente.', 'userName' => $nombre]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => "Error al preparar la consulta: " . $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => "Método de solicitud no permitido."]);
}
