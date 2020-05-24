<?php
  namespace model;
  
  use model\DB;

  include_once('model\DB.php');

  class Func
  {
    function users()
    {
      $db = DB::getInstance();
      $sql = "SELECT * FROM users ORDER BY dt_reg DESC";
      $query = $db->prepare($sql);
      $query->execute();

      if ($query->errorCode() != $db::ERR_NONE) {
        $info = $query->errorInfo();
        echo implode('<br>', $info);
        exit();
      }

      $result = $query->fetchAll();
      return $result;
    }


  // Проверка авторизации
  function isAuth() {
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


  function messages_validate($name, $text) {
    $errors = [];

    if ($name == '') {
      $errors[] = 'Имя не может быть пустым';
    } elseif (mb_strlen($name) < 5) {
      $errors[] = 'Имя не должно быть меньше 5 символов';
    } 

    if ($text == '') {
      $errors[] = 'Текст не может быть пустым';
    }

    return $errors;
  }

}