<?php 

  session_start();
  
  use model\ArticleModel;
  use model\DB;

  include_once('model\ArticleModel.php');
  include_once('model\DB.php');

  $id = $_GET['id'];

  $db = new DB();

  $articleModel = new ArticleModel($id);
  $comments = $articleModel->getById($id);

  $name = $comments['name'];
  $text = $comments['text'];

  if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);

    if ($name != '' && $text != '') {
      $articleModel->edit($id, $name, $text);

      header("Location: index.php");
      exit();
    }
  }
  
  include('views/edit.php');
?>