<?php
session_start();
if (!isset($_SESSION["user"])) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">
    <div class="logo">Личный кабинет</div>
    <nav>
        <a href="index.php">Главная</a>
        <a href="auth/logout.php">Выйти</a>
    </nav>
</header>

<section class="panel">

    <div class="box">
        <h2>Добро пожаловать, <?= $_SESSION["user"]["name"] ?></h2>
        <p>Ваши заявки появятся здесь</p>
    </div>

</section>

</body>
</html>