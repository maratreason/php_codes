<?php 
  session_start();
  include_once('model/functions.php');

  $db = connect_db();

  if (!is_auth()) {
    header('Location: login.php');
    exit();
  }

  if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);

    $errors = messages_validate($name, $text);

    if (empty($errors)) {
      add_message($db, $name, $text);
      header("Location: index.php");
      exit();
    }
  } else {
    $name = '';
    $text = '';
    $errors = [];
  }

  include('views/add.php');
?>