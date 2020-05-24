<?php 
  session_start();
  include_once('function.php');

  $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
  $db->exec('SET NAMES UTF8');

  if (!is_auth()) {
    header('Location: login.php');
    exit();
  }

  if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);

    if ($name != '' && $text != '') {
      $sql = "INSERT INTO comments SET name=:n, text=:t";
      $params = ['n' => $name, 't' => $text];

      $query = $db->prepare($sql);
      $query->execute($params);

      if ($query->errorCode() != PDO::ERR_NONE) {
        $info = $query->errorInfo();
        echo implode('<br>', $info);
        exit();
      }

      header("Location: index.php");
      exit();
    }
  }
?>

<form method="post">
  имя<br>
  <input type="text" name="name" value="<?=$name; ?>"><br>
  комментарий<br>
  <textarea type="text" name="text"><?=$text; ?></textarea><br>
  <input type="submit" value="Отправить">
</form>

<a href="index.php">Посмотреть все новости</a>