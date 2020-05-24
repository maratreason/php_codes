<?php 
  session_start();

  if (count($_POST) > 0) {
    // POST
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $error = '';
    /*
      Сделать валидацию(есть в видео на youtube)
        - полей
        - (*) что такого файла еще нет
    */

    if ($title == '' || $content == '') {
      $error = '<p>Пожалуйста заполните все поля.</p>';
    } else if (!is_numeric($title)) {
      $error = '<p>Поле title должно состоять только из цифр.</p>';
    } else {
        if (file_exists("data/$title")) {
        $error = '<p>Такой файл уже существует. Впишите новое название файла.</p>';
      } else {
        file_put_contents("data/$title", $content);
        header("Location: index.php");
        exit();
      }
    }

  } else {
    // GET
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <p><?=$error; ?></p>
  <form method="post">
      Название файла <br>
      <input type="text" name="title" value="<?=$title; ?>"><br>
      Содержимое файла<br>
      <textarea name="content" value="<?=$content; ?>"></textarea><br>
      <input type="submit" value="Сохранить">
    </form>
  
</body>
</html>