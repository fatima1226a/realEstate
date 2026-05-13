<?php
require "api/db.php";

$property_id = $_GET['property_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Заявка</title>
</head>
<body>

<h1>Оставить заявку</h1>

<form id="requestForm">

    <input name="name" placeholder="Имя">
    <input name="phone" placeholder="Телефон">
    <textarea name="message" placeholder="Комментарий"></textarea>

    <input type="hidden" name="property_id" value="<?= $property_id ?>">

    <button type="submit">Отправить</button>

</form>

<script src="create_request.js"></script>

</body>
</html>