<?php 

  session_start();

  include_once('model\DB.php');
  include_once('model\ArticleModel.php');

  use model\ArticleModel;
  use model\DB;

  $id = $_GET['id'];

  $db = new DB();

  $articleModel = new ArticleModel($id);
  $comments = $articleModel->get_by_id($id);

  include('views\article.php');
?>