<form method="post">
  имя<br>
  <input type="text" name="name" value="<?=$name; ?>"><br>
  комментарий<br>
  <textarea type="text" name="text"><?=$text; ?></textarea><br>
  <input type="submit" value="Отправить">
</form>

<?php 
  foreach ($errors as $error) {?>
    <div class="error">
      <p><?=$error?></p>
    </div>
<?}?>

<a href="index.php">Посмотреть все новости</a>