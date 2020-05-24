<?php 

  include_once('model/messages.php');

  $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
  $db->exec('SET NAMES UTF8');

  if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);

    if ($name != '' && $text != '') {
      add_message($db, $name, $text);
      header("Location: index.php");
      exit();
    }
  } else {
    $name = '';
    $text = '';
  }
  
  include('views/v_add.php');
?>