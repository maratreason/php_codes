<?php

namespace Core;

class Users
{
  private $login = 'admin';
  private $password = 'qwerty';

  // Проверка авторизации
  public static function isAuth() 
  {
    if(!isset($_SESSION['auth'])) {
      if($_COOKIE['login'] == md5($login) && $_COOKIE['password'] == md5($password)){
        $_SESSION['auth'] = true;
      }
      else{
        return false;
      }
    }

    return true;
  }
}