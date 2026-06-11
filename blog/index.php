<?php
session_start();

if ($_SESSION['logged'] === true) {
    echo '<p>Вы вошли в свой акаунт</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная сраница</title>
</head>
<body>
    <h1>Главная страница</h1>
    <div>
        <p><a href="./register.php">Зарегестироваться</a></p>
        <p><a href="./login.php">Войти</a></p>
        <p><a href="./exit.php">Выйти из аккаунта</a></p>
    </div>
    <h2>Список постов</h2>
</body>
</html>