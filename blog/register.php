
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../includes/db.php';

$host = 'localhost';
$dbname = 'JabaScript_bloge';
$username = 'root';
$pass = '';

$db = new DataBase($host, $dbname, $username, $pass);

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $AddUser = $_POST['username'];
    $AddPass = $_POST['password'];

    $db->insert('users', [
        'name' => $AddUser,
        'pass' => password_hash($AddPass, PASSWORD_DEFAULT)
    ]);

    $_SESSION['user_id'] = $AddUser;
    $_SESSION['logged'] = true;
    header('Location: index.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регестрация</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="div_main">
    <h1>Регестрация</h1>
    <div>
        <form action="register.php" method="POST">
            <label>
                Username
                <input type="text" name="username">
            </label>
            <label>
                Password
                <input type="text" name="password">
            </label>
            <button type="submit" name="submit" class="btn">Зарегестрироваться</button>
        </form>
    </div>
    </div>
</body>
</html>