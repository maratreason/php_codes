<?php 

function __autoload($name)
{
  include_once str_replace("\\", DIRECTORY_SEPARATOR, $name . '.php');
}

$request = new Core\Request($_GET, $_POST, $_SERVER);
$router = new Core\Router($request);

$ctrlName = $router->getCtrl();

$act = $router->getAct();

$ctrl = new $ctrlName(new Core\Request($_GET, $_POST, $_SERVER));

$ctrl->$act();