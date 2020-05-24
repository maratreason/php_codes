<?php 
  session_start();
  include('model/functions.php');
  $id = $_GET['id'];

  $db = connect_db();

  $comments = get_message_by_id($db, $id);
  include('views/article.php');
?>