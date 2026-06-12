<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

$host = 'localhost';
$dbname = 'JabaScript_bloge';
$username = 'root';
$pass = '';

$db = new DataBase($host, $dbname, $username, $pass);

$posts = $db->getAll("SELECT * FROM posts WHERE id = :id", ['id' => $_POST['post_id']]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр поста</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="div_main">
        <?php foreach($posts as $post): ?>
        <h2><?= $post['title'] ?></h2>
        <p><?= $post['content'] ?></p>
    <?php endforeach ?>
</div>
</body>
</html>
