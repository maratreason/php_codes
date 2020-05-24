<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="http://ntschool.local/level_02/05/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
  <form class="form-group" method="post">
    имя<br>
    <input class="form-control" type="text" name="name" value="<?=$name; ?>"><br>
    комментарий<br>
    <textarea class="form-control type="text" name="text"><?=$text; ?></textarea><br>
    <input class="btn btn-success" type="submit" value="Сохранить">

    <form action="index.php">
      <button class="btn btn-default">Отмена</button>
    </form>
    
  </form>
  
  
  </div>
</body>
</html>
