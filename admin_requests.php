<?php

session_start();

require "api/db.php";

$stmt = $pdo->query("
    SELECT r.*, p.title
    FROM requests r
    LEFT JOIN properties p
    ON r.property_id = p.id
    ORDER BY r.created_at DESC
");

$requests = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header class="header">

    <div class="logo">
        Заявки
    </div>

    <nav>
        <a href="admin.php">Админка</a>
    </nav>

</header>

<section class="catalog">

<?php foreach ($requests as $r): ?>

<div class="card">

    <div class="card-body">

        <h3><?= $r["name"] ?></h3>

        <p>
            <?= $r["phone"] ?>
        </p>

        <p>
            <?= $r["title"] ?>
        </p>

        <p>
            <?= $r["message"] ?>
        </p>

    </div>

</div>

<?php endforeach; ?>

</section>

</body>
</html>
