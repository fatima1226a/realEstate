<?php

session_start();

require "../api/db.php";

header("Content-Type: application/json");

// получаем JSON
$data = json_decode(file_get_contents("php://input"), true);

$email = $data["email"] ?? "";
$password = $data["password"] ?? "";

// проверка
if (!$email || !$password) {

    echo json_encode([
        "status" => "error",
        "message" => "Введите email и пароль"
    ]);

    exit;
}

try {

    // ищем пользователя
    $stmt = $pdo->prepare("
        SELECT * FROM users WHERE email = ?
    ");

    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // если не найден
    if (!$user) {

        echo json_encode([
            "status" => "error",
            "message" => "Пользователь не найден"
        ]);

        exit;
    }

    // проверка пароля
    if (!password_verify($password, $user["password"])) {

        echo json_encode([
            "status" => "error",
            "message" => "Неверный пароль"
        ]);

        exit;
    }

    // создаём session
    $_SESSION["user"] = [
        "id" => $user["id"],
        "name" => $user["name"],
        "role" => $user["role"]
    ];

    echo json_encode([
        "status" => "success",
        "message" => "Успешный вход"
    ]);

} catch (Exception $e) {

    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}

