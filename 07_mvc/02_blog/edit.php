<?php 
  session_start();
  include_once('model/functions.php');
  $id = $_GET['id'];

  $db = connect_db();

  $comment = get_message_by_id($db, $id);

  $name = $comment['name'];
  $text = $comment['text'];

  if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);

    if ($name != '' && $text != '') {
      edit_message($db, $id, $name, $text);

      header("Location: index.php");
      exit();
    }
  }
  
  include('views/edit.php');
?>