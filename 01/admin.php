<?php 

$str = file_get_contents('log.txt');


/*
Это нужно только для больших файлов.
$f = fopen('log.txt', 'r');
$str = fread($f, 1444);
fclose($f);*/

// $arr = explode("\n", $str);
$arr = file('log.txt');

echo '<table>';

foreach($arr as $string) {
  echo '<tr>';
  $info = explode('@-@', $string);

  foreach ($info as $elem) {
    echo '<td>' . $elem .  '</td>';
  }

  echo '</tr>';
}

echo '</table>';



// echo '<pre>';
// print_r($arr);
// echo '</pre>';

?>