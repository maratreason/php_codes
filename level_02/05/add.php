<?php 
  session_start();

  use model\ArticleModel;
  use model\Func;
  use model\DB;

  include_once('model/ArticleModel.php');
  include_once('model/DB.php');
  include_once('model/Func.php');

  $db = new DB();

  $articleModel = new ArticleModel($id);
  $func = new Func();

  if (!$func->is_auth()) {
    header('Location: login.php');
    exit();
  }

  if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);

    $errors = $func->messages_validate($name, $text);

    if (empty($errors)) {
      $articleModel->add($name, $text);
      header("Location: index.php");
      exit();
    }
  } else {
    $name = '';
    $text = '';
    $errors = [];
  }

  include('views/add.php');
?>