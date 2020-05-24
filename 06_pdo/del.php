<?php 
  $id = $_GET['id'];
  
  $db = new PDO('mysql:host=localhost;dbname=php1', 'root', '');
  $db->exec('SET NAMES UTF8');

  $sql = "DELETE FROM comments WHERE id_comment=$id";
  $query = $db->prepare($sql);
  $query->execute();

  if ($query->errorCode() != PDO::ERR_NONE) {
    $info = $query->errorInfo();
    echo implode('<br>', $info);
    exit();
  }

  header("Location: index.php");
  exit();
?>