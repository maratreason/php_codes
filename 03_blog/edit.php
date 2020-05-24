<?php 
  $title = $_GET['title'];
  $content = $_POST['content'];
  $text = file_get_contents("data/$title");
  $error = '';

  if ($title == '' || $content == '') {
    $error = '<p>Пожалуйста заполните все поля.</p>';
  } else if (!is_numeric($title)) {
    $error = '<p>Поле title должно состоять только из цифр.</p>';
  } else {
    unlink("data/$title");
    $title = $_POST['title'];
    file_put_contents("data/$title", $content);
    header("Location: index.php");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <p><?=$error; ?></p>
  <form method="post">
    Название файла <br>
    <input type="text" name="title" value="<?=$title; ?>"><br>
    Содержимое файла<br>
    <textarea name="content"><?=$text; ?></textarea><br>
    <input type="submit" value="Сохранить">
  </form>
  <br>
  <a href="article.php?title=<?=$title ?>">Отмена</a>
</body>
</html>