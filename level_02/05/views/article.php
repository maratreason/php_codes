<!doctype html>
<html>
<head>
  <title><?php echo $comments['name']; ?></title>
  <link rel="stylesheet" href="http://ntschool.local/level_02/05/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <table class="table table-bordered">
      <tr>
        <td><?php echo $comments['name']; ?></td>
        <td><?php echo $comments['text']; ?></td>
        <?php if ($_SESSION['auth']) { ?>
          <td><a href="edit.php?id=<?=$id;?>">Редактировать</a></td>
          <td><a href="del.php?id=<?=$id;?>">Удалить файл</a></td>
        <?php } ?>
      </tr>
    </table>
    
  <a href="index.php">К списку новостей</a>
  </div>
</body>
</html> 