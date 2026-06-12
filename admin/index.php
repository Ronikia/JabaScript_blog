<?php
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Панель админа</h1>
    <p><a href="../blog/exit.php">Выйти из аккаунта</a></p>
    <p><a href="./create.php">Добавить пост</a></p>
    <p><a href="./delete.php">Удалить пост</a></p>
    
</body>
</html>
<?php
} else {



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>У вас нету доступа</title>
</head>
<body>
    <h1>Вы не вошли в свой аккаунт</h1>
</body>
</html>

<?php
}
?>
