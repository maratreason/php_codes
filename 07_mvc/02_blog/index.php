<?php 
  session_start();
  include_once('model/functions.php');

  $db = connect_db();

  $comments = get_all_messages($db);

  include('views/index.php');
?>