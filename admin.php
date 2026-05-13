<?php
session_start();

require "api/db.php";

$properties = $pdo->query("
    SELECT * FROM properties
")->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">

    <div class="logo">
        Admin Panel
    </div>

    <nav>
        <a href="index.php">Главная</a>
        <a href="add_property_page.php">Добавить</a>
        <a href="admin_requests.php">Заявки</a>
        <a href="auth/logout.php">Выйти</a>
    </nav>

</header>

<section class="catalog">

<?php foreach ($properties as $p): ?>

    <div class="card">

        <img src="images/<?= $p['image'] ?>">

        <div class="card-body">

            <h3><?= $p['title'] ?></h3>

            <p class="price">
                $<?= $p['price'] ?>
            </p>

            <p>
                <?= $p['location'] ?>
            </p>

            <a class="btn"
               href="property.php?id=<?= $p['id'] ?>">
               Подробнее
            </a>

            <a class="btn"
                href="delete_property.php?id=<?= $p['id'] ?>">
                Удалить
            </a>

        </div>

    </div>

<?php endforeach; ?>

</section>

</body>
</html>
