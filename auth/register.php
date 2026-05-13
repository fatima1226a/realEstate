<?php

require "../api/db.php";

header("Content-Type: application/json");

// получаем JSON
$data = json_decode(file_get_contents("php://input"), true);

$name = $data["name"] ?? "";
$email = $data["email"] ?? "";
$password = $data["password"] ?? "";

// проверка
if (!$name || !$email || !$password) {

    echo json_encode([
        "status" => "error",
        "message" => "Заполните все поля"
    ]);

    exit;
}

// шифруем пароль
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {

    $stmt = $pdo->prepare("
        INSERT INTO users (name, email, password)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([
        $name,
        $email,
        $hashedPassword
    ]);

    echo json_encode([
        "status" => "success",
        "message" => "Регистрация успешна"
    ]);

} catch (Exception $e) {

    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}

