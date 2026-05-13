
<?php

require "api/db.php";

$id = $_GET["id"];

$stmt = $pdo->prepare("
    SELECT * FROM properties WHERE id = ?
");

$stmt->execute([$id]);

$property = $stmt->fetch();

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header class="header">

    <div class="logo">
        Real Estate
    </div>

    <nav>
        <a href="index.php">Главная</a>
    </nav>

</header>

<div class="dashboard">

    <div class="card">

        <img src="images/<?= $property['image'] ?>">

        <div class="card-body">

            <h1>
                <?= $property['title'] ?>
            </h1>

            <p class="price">
                $<?= $property['price'] ?>
            </p>

            <p>
                <?= $property['location'] ?>
            </p>

            <p>
                <?= $property['description'] ?>
            </p>

            <a class="btn"
               href="add.php?property_id=<?= $property['id'] ?>">
               Оставить заявку
            </a>

        </div>

    </div>

</div>

</body>
</html>