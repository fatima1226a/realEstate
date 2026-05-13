<?php
require "db.php";

header("Content-Type: application/json");

try {
    $stmt = $pdo->prepare("
        SELECT r.*, p.title AS property_title
        FROM requests r
        LEFT JOIN properties p ON r.property_id = p.id
        ORDER BY r.created_at DESC
    ");

    $stmt->execute();

    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "data" => $requests
    ]);

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}

