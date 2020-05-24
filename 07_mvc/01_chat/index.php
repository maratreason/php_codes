<?php 

  include_once('model/messages.php');

  $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
  $db->exec('SET NAMES UTF8');

  $comments = messages_all($db);

  include('views/v_index.php');

?>


