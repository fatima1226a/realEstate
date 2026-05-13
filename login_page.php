<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">

    <title>Вход</title>

    <link rel="stylesheet" href="style.css">

</head>
<body class="auth-body">

<div class="auth-container">

    <h1>Вход</h1>

    <form id="loginForm" class="auth-form">

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
            Войти
        </button>

    </form>

    <p class="auth-link">

        Впервые здесь?

        <a href="register_page.php">
            Зарегистрируйтесь
        </a>

    </p>

</div>

<script src="login.js"></script>

</body>
</html>