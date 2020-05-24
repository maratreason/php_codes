<?php 
  session_start();
  $id = $_GET['id'];
  
  $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
  $db->exec('SET NAMES UTF8');

  $sql = "SELECT * FROM comments WHERE id_comment=$id";
  $query = $db->prepare($sql);
  $query->execute();

  if ($query->errorCode() != PDO::ERR_NONE) {
    $info = $query->errorInfo();
    echo implode('<br>', $info);
    exit();
  }

  $comments = $query->fetch();

?>

<!doctype html>
<html>
<head>
  <title><?php echo $comments['name']; ?></title>
</head>
<body>
    <h3><?php echo $comments['name']; ?></h3>
    <p><?php echo $comments['text']; ?></p>
    <?php if ($_SESSION['auth']) { ?>
      <a href="edit.php?id=<?=$id;?>">Редактировать</a><br>
      <a href="del.php?id=<?=$id;?>">Удалить файл</a><br>
    <?php } ?>
  <a href="index.php">К списку новостей</a>
</body>
</html> 