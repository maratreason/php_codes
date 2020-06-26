<?php
// Читать json-файл
$json = file_get_contents("../goods.json");
$json = json_decode($json, true);

// Создаю письмо
$message = "";
$message .= "<h1>Заказ в магазине</h1>";
$message .= "<p>Телефон: {$_POST['phone']} </p>";
$message .= "<p>Почта: {$_POST['email']} </p>";
$message .= "<p>Клиент: {$_POST['name']} </p>";

$cart = $_POST['cart'];
$sum = 0;

foreach($cart as $id => $count) {
  $message .= $json[$id]["name"];
  $message .= $count . " --- ";
  $message .= "Количество: {$count} шт. --- ";
  $message .= $count * $json[$id]["cost"];
  $message .= '<br>';
  $sum = $sum + $count * $json[$id]["cost"];
}
$message .= "Всего: {$sum}";

// print_r($message);

$to = "youremail@mail.ru" . ","; // не забудь поменять
$to .= $_POST["email"];
$spectext = "<!DOCTYPE HTML><html>";
$spectext .= "<head><title>Заказ</title></head>";
$spectext .= "<body>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";

$m = mail($to, "Заказ в магазине", $spectext . $message . "</body></html>", $headers);

if ($m) {
  echo 1;
} else {
  echo 0;
}