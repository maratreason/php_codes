<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Новость</title>
</head>
<body>
  <?php 
    $title = $_GET['title'];
    $content = $_GET['content'];

    /*
    Здесь должна быть проверка:
     - $title не пустая строка
     - файл существует
     - файл не папка
    */

    $text = file_get_contents("data/$title");
    echo "<h1>$title</h1>";
    echo "<p>$text</p>";

    echo "<a href=\"edit.php?title=$title\">Редактировать</a><br>";

  ?>

  <a href="index.php">Назад</a>
</body>
</html>