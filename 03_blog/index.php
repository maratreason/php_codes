<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>Список новостей</h1>

  <?php 
    $news = scandir('data');

    foreach ($news as $one) {
      if(is_file("data/$one")) {
        echo "<a href=\"article.php?title=$one\">$one</a><br>";
      }
    }

    // echo '<pre>';
    // print_r($news);
    // echo '</pre>';
  ?>
  <br>
  <a href="add.php">Добавить новость</a>
</body>
</html>