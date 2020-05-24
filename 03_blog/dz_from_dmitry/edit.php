<?php
session_start();
include_once('function.php');

if (!is_auth()) {
  header('Location: login.php');
  exit();
}

if(count($_POST) > 0) {

  $fname = $_GET['f'];
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);

  if ($title == '' ||  $content == '' ){
    $msg = 'Все поля должны быть заполнены!';
  }
  elseif(!is_numeric($title)){
    $msg = 'Название должно содержать только цифры!';
  }
  elseif($title != $fname){
    if (file_exists("data/$title") ){
      $msg = 'Такое название уже есть!';
    }
    // Удаляем старый файл...
    else{
      unlink("data/$fname");
      file_put_contents("data/$title", $content);
      header ("Location: index.php");
      exit();
    }
  }
    // если название не поменялось, сразу сохраняем контент
  else{
    file_put_contents("data/$title", $content);
    header ("Location: index.php");
    exit();
  }

    //Выводим ошибку
  echo "<p>$msg</p>";

}

else {
  $fname = $_GET['f'];
  $title = $fname;
  $content = file_get_contents("data/$fname");
}
?>
<!doctype html>
<html>
<head>
  <title><?php echo $fname ?></title>
</head>
<body>
  <form method="post">
    Название файла<br>
    <input type="text" name="title" value = "<? echo $title ?>"><br>
    Содержимое файла<br>
    <textarea name="content"> <? echo $content ?></textarea><br>
    <input type="submit" value="Сохранить"><br>
  </form><hr>

  <a href="login.php">Выйти</a>
</body>
</html> 