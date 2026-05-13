<?php

require "api/db.php";

$id = $_GET["id"];

$stmt = $pdo->prepare("
    DELETE FROM properties
    WHERE id = ?
");

$stmt->execute([$id]);

header("Location: admin.php");
exit;