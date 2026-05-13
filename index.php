<?php
session_start();
require "api/db.php";

$properties = $pdo->query("SELECT * FROM properties")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Real Estate</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">
    <div class="logo">RealEstate</div>

    <nav>
        <?php if (!isset($_SESSION["user"])): ?>
            <a href="login.php">Войти</a>
            <a href="register.php">Регистрация</a>
        <?php else: ?>
            <a href="<?= $_SESSION["user"]["role"] === "admin" ? 'admin.php' : 'user.php' ?>">
                Кабинет
            </a>
            <a href="auth/logout.php">Выйти</a>
        <?php endif; ?>
    </nav>
</header>

<section class="hero">
    <h1>Найдите недвижимость мечты</h1>
    <p>Квартиры, дома и коммерческая недвижимость</p>
</section>

<section class="catalog">

<?php foreach ($properties as $p): ?>
    <div class="card">

        <img src="images/<?= $p['image'] ?>">

        <div class="card-body">

            <h3><?= $p['title'] ?></h3>

            <p class="price">$<?= $p['price'] ?></p>

            <p class="location"><?= $p['location'] ?></p>

            <a class="btn" href="property.php?id=<?= $p['id'] ?>">
                Подробнее
            </a>

        </div>

    </div>
<?php endforeach; ?>

</section>

</body>
</html>