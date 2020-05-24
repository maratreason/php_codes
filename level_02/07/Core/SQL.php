<?php 

namespace Core;

class SQL {
  private static $instance;
  private $db;

  const MYSQL_SERVER = 'localhost';
  const MYSQL_DB = 'php1';
  const MYSQL_USER = 'root';
  const MYSQL_PASSWORD = '';

  public static function getInstance() {
    if (self::$instance == null) {
      self::$instance = new SQL();
    }

    return self::$instance;
  }

  private function __construct() {
    setlocale(LC_ALL, 'ru_RU.UTF8');
    $this->db = new \PDO('mysql:host=' . SQL::MYSQL_SERVER . ';dbname=' . SQL::MYSQL_DB, SQL::MYSQL_USER, SQL::MYSQL_PASSWORD);
    $this->db->exec('SET NAMES UTF8');
    $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
  }

  public function query($query) {
    $q = $this->db->prepare($query);
    $q->execute();

    if ($q->errorCode() != \PDO::ERR_NONE) {
      $info = $q->errorInfo();
      die($info[2]);
    }

    return $q->fetchAll();
  }

  /**
   * Add article.
   */
  public function insert($table, $object) {
    $columns = array();
    $masks = array();

    foreach ($object as $key => $value) {
      $columns[] = $key;
      $masks[] = ":$key";

      if ($value === null) {
        $object[$key] = 'NULL';
      }
    }

    $columns_s = implode(',', $columns);
    $masks_s = implode(',', $masks);

    $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";

    $q = $this->db->prepare($query);
    $q->execute($object);

    if ($q->errorCode() != PDO::ERR_NONE) {
      $info = $q->errorInfo();
      die($info[2]);
    }

    return $this->db->lastInsertId();
  }

  /**
   * Update article.
   */
  public function update($table, $object, $where) {
    $sets = array();

    foreach ($object as $key => $value) {

      // name=:name
      // text=:text
      $sets[] = "$key=:$key";

      if ($value === null) {
        $object[$key] = 'NULL';
      }
    }

    //name=:name, text=:text
    $sets_s = implode(',', $sets);
    //UPDATE article SET name=:name, text=:text WHERE name='aaa'
    $query = "UPDATE $table SET $sets_s WHERE $where";

    $q = $this->db->prepare($query);
    $q->execute($object);

    if ($q->errorCode() != \PDO::ERR_NONE) {
      $info = $q->errorInfo();
      die($info[2]);
    }

    return $q->rowCount(); // возвращает сколько строк обновлено.
  }

  /**
   * Delete article.
   */
  public function delete($table, $where) {
    $query = "DELETE FROM $table WHERE $where";
    $q = $this->db->prepare($query);
    $q->execute();

    if ($q->errorCode() != PDO::ERR_NONE) {
      $info = $q->errorInfo();
      die($info[2]);
    }

    return $q->rowCount();
  }
}