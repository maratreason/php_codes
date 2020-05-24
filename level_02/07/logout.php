<?php 
  
  session_start();

  unset($_SESSION['auth']);
  setcookie('login', 'admin', time() - 1);
  setcookie('password', 'qwerty', time() - 1);

  header('Location: index.php');
  exit();
?>