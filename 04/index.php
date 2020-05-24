<?php 

// echo time();

/*
  назначение
  значение
  срок истечения
  путь
  домен
*/

// setcookie('login', 'admin', time() + (3600 * 24 * 365));
// setcookie('pass', '48gsgsdgsgsdgsdg4098dvsdfsdf', time() + (3600 * 24 * 365));

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';

setcookie('pass', '48gsgsdgsgsdgsdg4098dvsdfsdf', time() - 1);
?>