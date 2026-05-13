<?php

$host = "localhost";
$dbname = "real_estate_db";
$user = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die(json_encode([
        "status" => "error",
        "message" => "DB connection failed: " . $e->getMessage()
    ]));
}

?>