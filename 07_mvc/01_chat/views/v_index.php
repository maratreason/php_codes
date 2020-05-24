<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Список новостей</title>
</head>
<body>

  <?php 
    if (empty($comments)) {
      echo "Новостей нет!<br>";
    } else {
      foreach ($comments as $article) { ?>
        <h5><?=$article['name']; ?></h5>
        <p><?=$article['text']; ?></p>
        <a href="article.php?id=<?=$article['id_comment']; ?>">Посмотреть новость</a>
        <hr>
      <? }
    }
  ?>

  <a href="add.php">Добавить новость</a>
</body>
</html>