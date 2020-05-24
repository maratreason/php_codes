<?php 
  session_start();
  include_once('model/functions.php');

  if(count($_POST) > 0){

    if($_POST['login'] == 'admin' && $_POST['password'] == 'qwerty'){
      $_SESSION['auth'] = true;

      if(isset($_POST['remember'])){
        setcookie('login', 'admin', time() + 3600 * 24 * 7);
        setcookie('password', md5('qwerty'), time() + 3600 * 24 * 7);
      }

      header('Location: index.php');
      exit();
    }
  }
  else{
    unset($_SESSION['auth']);
    setcookie('login', 'admin', time() - 1);
    setcookie('password', 'qwerty', time() - 1);
  }

  include('views/login.php');

?>