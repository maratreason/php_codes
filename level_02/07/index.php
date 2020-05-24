<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  function __autoload($className)
  {
    include_once str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
  }

  session_start();
  $_SESSION['back'] = $_SERVER['REQUEST_URI'];

  $app = new Core\App(new Core\Request($_GET, $_POST, $_SERVER));
  $app->go();