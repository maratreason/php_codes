<?php

namespace model;
// PDO должен быть в папке Core
class DB
{

  private static $db;

  public static function getInstance()
  {
    if (self::$db == null) {
      self::$db = self::get();
    }

    return self::$db;
  }

  private static function get()
  {
    $db = new \PDO('mysql:host=localhost;dbname=php1', 'root', '');
    $db->exec('SET NAMES UTF8');
    return $db;
  }
}