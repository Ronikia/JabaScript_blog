<?php
session_start();

require_once __DIR__ . '/../includes/db.php';

$host = 'localhost';
$dbname = 'JabaScript_bloge';
$username = 'root';
$pass = '';

$db = new DataBase($host, $dbname, $username, $pass);
$posts = $db->getAll("SELECT * FROM posts WHERE id > :id", ['id' => 0]);
if ($_SESSION['logged'] === true) {

?>
<div class="div_main">
    <p>Вы вошли в свой акаунт</p>
    <a href="../admin/index.php">В панель админа</a>
</div>

<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная сраница</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="div_main">

    
    <h1>Главная страница</h1>
    <div>
        <p><a href="./register.php">Зарегестироваться</a></p>
        <p><a href="./login.php">Войти</a></p>
        <p><a href="./exit.php">Выйти из аккаунта</a></p>
    </div>
    <h2>Список постов</h2>
    <div>
        <hr>
        <?php foreach($posts as $post): ?>
            <h3><?= $post['title'] ?></h3>
            <p><?= $post['content'] ?></p>
            <p><?= $post['created_date'] ?></p>
            <form action="./post.php" method="POST">
                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                <button type="submit" name="toPost" class="btn">Перейти к посту</button>
            </form>
        <?php endforeach ?>
        <hr>
    </div>
    </div>
</body>
</html>