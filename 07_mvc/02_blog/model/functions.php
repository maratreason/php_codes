<?php

  function connect_db() {
    $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
    $db->exec('SET NAMES UTF8');

    return $db;
  }

  // Проверка авторизации
  function is_auth() {
    if(!isset($_SESSION['auth'])){
      if($_COOKIE['login'] == md5('admin') && $_COOKIE['password'] == md5('qwerty')){
        $_SESSION['auth'] = true;
      }
      else{
        return false;
      }
    }

    return true;
  }

  function get_all_messages($db) {
    $sql = "SELECT * FROM comments ORDER BY dt DESC";
    $query = $db->prepare($sql);
    $query->execute();

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }

    return $query->fetchAll();
  }


  function add_message($db, $name, $text) {
    $sql = "INSERT INTO comments SET name=:n, text=:t";
    $params = ['n' => $name, 't' => $text];

    $query = $db->prepare($sql);
    $query->execute($params);

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
  }


  function get_message_by_id($db, $id) {
    $sql = "SELECT * FROM comments WHERE id_comment=$id";
    $query = $db->prepare($sql);
    $query->execute();

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }

    return $query->fetch();
  }


  function delete_message($db, $id) {
    $sql = "DELETE FROM comments WHERE id_comment=$id";
    $query = $db->prepare($sql);
    $query->execute();

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
  }


  function edit_message($db, $id, $name, $text) {
    $sql = "UPDATE comments SET name=:n, text=:t WHERE id_comment=:id";
    $params = ['n' => $name, 't' => $text, 'id' => $id];

    $query = $db->prepare($sql);
    $query->execute($params);

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
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

?>