<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

$host = 'localhost';
$dbname = 'JabaScript_bloge';
$username = 'root';
$pass = '';

$db = new DataBase($host, $dbname, $username, $pass);

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){

    $users = $db->getAll("SELECT * FROM users WHERE id > :id", ['id' => 0]);
    $VhodUsername = $_POST['VhodUsername'];
    $VhodPassword = $_POST['VhodPassword'];

    foreach($users as $user){
        if(password_verify($VhodPassword, $user['pass']) && $user['name'] === $VhodUsername){
            $_SESSION['user_id'] = $VhodUsername;
            $_SESSION['logged'] = true;
            $_SESSION['user_idid'] = $user['id'];
            header('Location: index.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Вход в аккаунт</h1>
    <div>
        <form action="login.php" method="POST">
            <label>
                Username
                <input type="text" name="VhodUsername">
            </label>
            <label>
                Password
                <input type="text" name="VhodPassword">
            </label>
            <button type="submit" name="submit">Войти</button>
        </form>
    </div>
</body>
</html>