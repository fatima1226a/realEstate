<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">

    <title>Регистрация</title>

    <link rel="stylesheet" href="style.css">

</head>
<body class="auth-body">

<div class="auth-container">

    <h1>Регистрация</h1>

    <form id="registerForm" class="auth-form">

        <input
            type="text"
            name="name"
            placeholder="Имя"
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
        >

        <input
            type="password"
            name="password"
            placeholder="Пароль"
        >

        <button type="submit">
            Зарегистрироваться
        </button>

    </form>

    <p class="auth-link">

        Уже есть аккаунт?

        <a href="login_page.php">
            Войти
        </a>

    </p>

</div>

<script src="register.js"></script>

</body>
</html>