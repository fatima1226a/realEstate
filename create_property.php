<?php

require "api/db.php";

header("Content-Type: application/json");

$data = json_decode(
    file_get_contents("php://input"),
    true
);

try {

    $stmt = $pdo->prepare("
        INSERT INTO properties
        (title, price, location, image, description)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([

        $data["title"],
        $data["price"],
        $data["location"],
        $data["image"],
        $data["description"]

    ]);

    echo json_encode([
        "status" => "success"
    ]);

} catch(Exception $e) {

    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}