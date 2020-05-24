<?php 

  $login = 'admin';
  $password = 'qwerty';

// Проверка авторизации
  function is_auth() {
    if(!isset($_SESSION['auth'])){
      if($_COOKIE['login'] == md5($login) && $_COOKIE['password'] == md5($password)){
        $_SESSION['auth'] = true;
      }
      else{
        return false;
      }
    }

    return true;
  }