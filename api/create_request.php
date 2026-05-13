<?php
require "db.php";

header("Content-Type: application/json");

// получаем данные от JS
$data = json_decode(file_get_contents("php://input"), true);

$name = $data["name"] ?? null;
$phone = $data["phone"] ?? null;
$property_id = $data["property_id"] ?? null;
$message = $data["message"] ?? null;

if (!$name || !$phone) {
    echo json_encode([
        "status" => "error",
        "message" => "Name and phone are required"
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO requests (name, phone, property_id, message)
        VALUES (:name, :phone, :property_id, :message)
    ");

    $stmt->execute([
        ":name" => $name,
        ":phone" => $phone,
        ":property_id" => $property_id,
        ":message" => $message
    ]);

    echo json_encode([
        "status" => "success",
        "message" => "Request created"
    ]);

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}