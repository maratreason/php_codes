<?php 

  include_once('model\system.php');
  include_once('model\auth.php');
  include_once('model\ArticleModel.php');
  include_once('core\tmp.php');

  session_start();

  $_SESSION['back'] = $_SERVER['REQUEST_URI'];

  $id = $_GET['id'];

  if ($id > 0) {
    $comments = Model\ArticleModel::getInstance()->getById($id);

    if (!$comments) {
      header('Location: views/404_page.php');
      exit();
    }

    $name = $comments['name'];
    $text = $comments['text'];
  } else {
    header('Location: index.php');
    exit();
  }

  $text = Core\Tmp::generate('views/article.php',
  [
    'id_comment' => $id,
    'name' => $name,
    'text' => $text,
    'auth' => $auth
  ]);

  include('views\article.php');
?>