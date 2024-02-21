<?php
include 'config.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Verifica que se hayan proporcionado email y password.
    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Datos insuficientes']);
        exit;
    }

    $sql = "SELECT * FROM Usuarios WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['Password'])) {
            $_SESSION['userID'] = $user['ID'];
            $_SESSION['nombreUsuario'] = $user['Nombre'];
            echo json_encode(['success' => true, 'redirect' => 'usuario.php', 'username' => $user['Nombre']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
