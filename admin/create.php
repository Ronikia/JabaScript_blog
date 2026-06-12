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

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitPostAdd'])){
    $AddNamePost = $_POST['AddNamePost'];
    $AddDescriptionPost = $_POST['AddDescriptionPost'];

    $db->insert('posts', [
        'title' => $AddNamePost,
        'content' => $AddDescriptionPost,
        'user_id' => $_SESSION['user_idid'],
        'created_date' => date('Y-m-d')
    ]);
    header('Location: index.php');
    exit;
}

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Добавления поста</title>
</head>
<body>
    <div class="div_main">
        <p class="create_p"><a href="../blog/exit.php">Выйти из аккаунта</a></p>
        <h1 class="create_h1">Добавить пост</h1>
        <div class="create_div_form">
        <form action="./create.php" method="POST" class="create_form">
            <label class="create_label"> 
                Название
                <input type="text" name="AddNamePost" class="create_unput">
            </label>
            <label class="create_label">
                Описание
                <input type="text" name="AddDescriptionPost" class="create_unput">
            </label>
            <button type="submit" name="submitPostAdd" class="btn">Создать пост</button>
        </form>
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
