<?php

session_start();

if (!isset($_SESSION["user"])) {

    header("Location: ../login_page.php");
    exit;
}

if ($_SESSION["user"]["role"] !== "admin") {

    die("Доступ запрещён");
}
