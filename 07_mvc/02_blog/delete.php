<?php 
  session_start();
  
  include_once('model/functions.php');
  $id = $_GET['id'];

  $db = connect_db();

  delete_message($db, $id);
  header("Location: index.php");
  exit();
  
?>