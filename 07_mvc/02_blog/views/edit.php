<form method="post">
  имя<br>
  <input type="text" name="name" value="<?=$name; ?>"><br>
  комментарий<br>
  <textarea type="text" name="text"><?=$text; ?></textarea><br>
  <input type="submit" value="Сохранить">
</form>

<a href="index.php">Отмена</a>