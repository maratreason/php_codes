<html>
<head>
  <meta charset="UTF-8">
  <title>Редактирование</title>
  <link rel="stylesheet" href="http://ntschool.local/level_02/05/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h3>Редактирование статьи.</h3>
  <form class="form-group" method="post">
    имя<br>
    <input class="form-control" type="text" name="name" value="<?=$name; ?>"><br>
    комментарий<br>
    <textarea class="form-control" type="text" name="text"><?=$text; ?></textarea><br>
    <input class="btn btn-success" type="submit" value="Отправить">
    <a class="btn btn-success" href="index.php">Отмена</a>
  </form>

  

  <?php 
    foreach ($errors as $error) {?>
      <div class="error">
        <p><?=$error?></p>
      </div>
  <?}?>

  </div>
</body>