<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Блог</title>
</head>
<body>
  <?foreach ($articles as $article) {?>
    <a href="index.php?c=article&act=article&id=<?=$article['id']?>"><?=$article['name']?></a>
    <hr>
  <?}?>
  <a href="index.php?c=page">Перейти на страницу About</a>
</body>
</html>