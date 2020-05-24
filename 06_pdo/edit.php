<?php 
  session_start();

  $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
  $db->exec('SET NAMES UTF8');

  $id = $_GET['id'];

  $sql = "SELECT * FROM comments WHERE id_comment=:id";
  $params = ['id' => $id];

  $query = $db->prepare($sql);
  $query->execute($params);
  $comment = $query->fetch();

  $name = $comment['name'];
  $text = $comment['text'];

  if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);

    if ($name != '' && $text != '') {
      $sql = "UPDATE comments SET name=:n, text=:t WHERE id_comment=:id";
      $params = ['n' => $name, 't' => $text, 'id' => $id];

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
  <input type="submit" value="Сохранить">
</form>

<a href="index.php">Отмена</a>