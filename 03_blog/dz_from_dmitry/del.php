<?php
// проверка авторизации
session_start();

include_once('function.php');

if (!is_auth()) {
  header('Location: login.php');
  exit();
}

$fname = $_GET['f']; //null || string
$path = "data/$fname";

if (!unlink($path)){
  echo "Ошибка удаления файла";
} else {
  header('Location: index.php');
  exit();
}