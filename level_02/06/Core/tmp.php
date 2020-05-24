<?php

namespace Core;

class Tmp
{

  public static function generate($path, $vars = [])
  {
    ob_start();
    extract($vars);
    include($path);
    $res = ob_get_clean();
    return $res;
  }
}