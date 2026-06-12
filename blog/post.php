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


<?php foreach($posts as $post): ?>
    <h2><?= $post['title'] ?></h2>
    <p><?= $post['content'] ?></p>
<?php endforeach ?>