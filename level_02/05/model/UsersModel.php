<?php 

namespace model;

use model\BaseModel;

class UsersModel extends BaseModel
{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'users';
    $this->pk = 'id_user';
  }


  public function add($login, $pass) 
  {
    $sql = "INSERT INTO users SET login=:login, password=:pass";
    $params = ['login' => $pass, 't' => $pass];

    $query = $this->db->prepare($sql);
    $query->execute($params);

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
  }


  public function edit($id, $login, $pass) 
  {
    $sql = "UPDATE users SET login=:login, password=:pass WHERE id_user=:id";
    $params = ['login' => $login, 'pass' => $pass, 'id' => $id];

    $query = $this->db->prepare($sql);
    $query->execute($params);

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
  }

}