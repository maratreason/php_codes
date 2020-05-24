<?php 

session_start();

use model\Func;

include_once('model\Func.php');

$func = new Func();

$users = $func->users();

foreach ($users as $user) {
  $id = $user['id_user'];
  $login = $user['login'];
  $password = $user['password'];
  $date_reg = $user['dt_reg'];

  if(count($_POST) > 0){

    if($_POST['login'] == $login && $_POST['password'] == $password) {
      $_SESSION['auth'] = true;

      if(isset($_POST['remember'])){
        setcookie('login', $login, time() + 3600 * 24 * 7);
        setcookie('password', md5($password), time() + 3600 * 24 * 7);
      }

      header('Location: index.php');
      exit();
    }
  }
  else{
    unset($_SESSION['auth']);
    setcookie('login', $login, time() - 1);
    setcookie('password', md5($password), time() - 1);
  }
}

include('views/login.php');

?>