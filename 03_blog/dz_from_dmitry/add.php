<?php
session_start();
include_once('function.php');

if (!is_auth()) {
  header('Location: login.php');
  exit();
}
	
if(count($_POST) > 0){
      // POST
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);

  if($title == '' || $content == ''){
   $msg = 'Заполните все поля';
 }
 elseif(strlen($title) < 2 || strlen($content) < 20){
   $msg = 'Слишком короткое содержимое полей';
 }
	/* Вот так можно проверять?
	elseif((preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$title)) {
		$msg = "В имени запрещенные символы";
	}
	*/
	elseif(!is_numeric($title)){
		$msg = 'В названии пишем только цифры';
	}
	elseif(file_exists("data/$title")){
		$msg = 'Такой файл уже есть!';
	}
	else{
		file_put_contents("data/$title", $content);
		header("Location: index.php");
		exit();
	}
      /* валидация
          - полей
          - (*) что такого файла ещё нет
		- запретить в полях спец символы
      */
  }
  else{
      // GET
    $title = '';
    $content = '';
  }

?>
<!doctype html>
<html>
<head>
    <title>Добавление новости</title>
</head>
<body>
	<form method="post">
		Название файла<br>
		<input type="text" name="title" value="<?php echo $title;?>"><br>
		Содержимое файла<br>
		<textarea name="content" cols="100" rows="6"><?php echo $content;?></textarea><br>
		<input type="submit" value="Сохранить"><br>
	</form>
	<p style="color: red"><?php echo $msg; ?></p>
</body>
</html>	