<?php 
  session_start();
  include_once('function.php');

  $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
  $db->exec('SET NAMES UTF8');

  $sql = "SELECT * FROM comments ORDER BY dt DESC";
  $query = $db->prepare($sql);
  $query->execute();

  if ($query->errorCode() != PDO::ERR_NONE) {
    $info = $query->errorInfo();
    echo implode('<br>', $info);
    exit();
  }

  $comments = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Index</title>
</head>
<body>
  <?php 
    if ($_SESSION['auth']) {
      echo "<h5>Привет, " . htmlspecialchars($_COOKIE['login']). "</h5>";
    } else {
      echo "<h5>Вы не авторизованы</h5>";
    }
  ?>
  
  <a href="login.php">Войти</a> | 
  <a href="logout.php">Выйти</a><br><br>

  <table class="comments" border="1" cellspacing="0">
    <? foreach ($comments as $comment) {
        $id = $comment['id_comment'];
      ?>
        <tr class="item" align="center">
          <td>
            <?php 
              echo "<a href=\"article.php?id=$id\">Смотреть новость</a>"
            ?>
          </td>
          <td><?=$comment['name']; ?></td>
          <td><?=$comment['text']; ?></td>
          <td><?=$comment['dt']; ?></td>
          <?php if ($_SESSION['auth']) { ?>
            <td>
              <a href="edit.php?id=<?=$id;?>">Редактировать</a><br>
            </td>
            <td>
              <a href="del.php?id=<?=$id;?>">Удалить файл</a><br>
            </td>
          <?php } ?>
        </tr>
    <?}?>
  </table>

  <a href="add.php">Добавить новость</a><br>
  
</body>
</html>