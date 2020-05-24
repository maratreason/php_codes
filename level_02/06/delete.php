<?php 

  session_start();
  
  use model\ArticleModel;
  use model\DB;

  include_once('model\DB.php');
  include_once('model\ArticleModel.php');
  
  $id = $_GET['id'];

  $db = new DB();
  
  $articleModel = new ArticleModel($db);

  $articleModel->delete($id);
  header("Location: index.php");
  exit();
  
?>