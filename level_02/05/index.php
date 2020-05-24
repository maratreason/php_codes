<?php 
  session_start();

  use model\ArticleModel;
  use model\DB;

  include_once('model\DB.php');
  include_once('model\ArticleModel.php');

  // function __autoload($name)
  // {
  //   include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
  // }
  
  $db = DB::getInstance();

  $mComments = ArticleModel::getInstance();
  $comments = $mComments->get_all();

  include('views/index.php');
?>