<?php

  /*
    $t = time()
    даем в куки время
    
    $t = получаем из кук время.

    если $t + 3600 < (текущего времени) time() то скидки нет. 
  */

  if(isset($_COOKIE['entry'])) {
    $t = $_COOKIE['entry'];
  } else {
    $t = time();
    setcookie('entry', $t, time() + 3600 * 24 * 365);
  }
  
  echo time() - $t . ' секунд назад';
  echo '<br>';

  if ((time() - $t) < 3600) {
    echo 'Бери со скидкой';
  } else {
    echo 'Ну ты тормоз';
  }



?>