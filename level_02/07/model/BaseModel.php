<?php

namespace model;

include_once ('core/SQL.php'); 

use Core\SQL;

class BaseModel
{
  protected $db;
  protected $table;
  protected $pk;

  public function __construct()
  {
    $this->db = SQL::getInstance();
  }


  /*
   * Get all articles.
   */
  public function getAll()
  {
    return $this->db->query("SELECT * FROM {$this->table} ORDER BY dt DESC");
  }


  public function getById($id) 
  {
    $res = $this->db->query("SELECT * FROM {$this->table} WHERE {$this->pk}=$id");

    if (!$res) {
      db_error_log($query);
      return false;
    } else {
      return $res[0];
    }

  }


  public function delete($id) 
  {
    return $this->db->delete($this->table, $this->pk=$id);
  }
}