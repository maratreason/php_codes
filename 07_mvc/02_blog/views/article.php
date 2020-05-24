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