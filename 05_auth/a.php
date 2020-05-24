<?php
	session_start();

	if(!isset($_SESSION['auth'])) {
    // должна быть проверка и на куки.
    header('Location: login.php');
    exit();
  }
    
?>
Секреты
<a href="login.php">Выйти</a>