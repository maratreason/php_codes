<?php

namespace model;

include_once('model\DB.php');

class BaseModel
{
  protected $db;
  protected $table;
  protected $pk;

  public function __construct()
  {
    $this->db = DB::getInstance();
  }


  public function get_all()
  {

    $sql = "SELECT * FROM {$this->table} ORDER BY dt DESC";
    $query = $this->db->prepare($sql);
    $query->execute();

    if ($query->errorCode() != \PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }

    return $query->fetchAll();
  }


  public function get_by_id($id) 
  {
    $sql = "SELECT * FROM {$this->table} WHERE {$this->pk}=$id";
    $query = $this->db->prepare($sql);
    $query->execute();

    if ($query->errorCode() != \PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }

    return $query->fetch();
  }


  public function delete($id) 
  {
    $sql = "DELETE FROM {$this->table} WHERE {$this->pk}=$id";
    $query = $this->db->prepare($sql);
    $query->execute();

    if ($query->errorCode() != \PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
  }
}