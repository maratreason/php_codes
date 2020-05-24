<?php
  session_start();
  include_once('function.php');

  $auth = is_auth();

  $fname = $_GET['f']; //null || string
  $path = "data/$fname";
  // ../ запретить такие входы
  if($fname != '' && file_exists($path) && is_file($path)) {
    $text = file_get_contents($path);
    echo "<h1>$fname</h1>";
    echo "<div>$text</div>";
  } else {
    echo "<div>404 – страница не найдена!</div>";
  }
?>
<!doctype html>
<html>
<head>
  <title><?php echo $fname ?></title>
</head>
<body>
  <?php if ($auth) { ?>
    <a href = "edit.php?f=<?= $fname?>">Редактировать</a><br>
    <a href = "del.php?f=<?= $fname?>">Удалить файл</a><br>
  <? } ?>
  <a href="index.php">К списку новостей</a>
</body>
</html> 