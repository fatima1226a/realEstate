<?php
require "db.php";

header("Content-Type: application/json");

try {
    $stmt = $pdo->prepare("SELECT * FROM properties");
    $stmt->execute();

    $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "data" => $properties
    ]);

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}