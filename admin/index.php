<?php
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель админа</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="div_main">

    
    <h1 class="create_h1">Панель админа</h1>
    <div>
    <p><a href="../blog/exit.php">Выйти из аккаунта</a></p>
    <p><a href="./create.php">Добавить пост</a></p>
    <p><a href="./delete.php">Удалить пост</a></p>
    </div>
    </div>
    
    
    
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
