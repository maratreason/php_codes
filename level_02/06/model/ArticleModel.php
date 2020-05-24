<?php 

namespace model;

include_once('model\BaseModel.php');
include_once('model\DB.php');

class ArticleModel extends BaseModel
{

  public static $instance;

  public function __construct()
  {
    parent::__construct();
    $this->table = 'comments';
    $this->pk = 'id_comment';
  }


  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new ArticleModel($db);
    }

    return self::$instance;
  }


  public function add($name, $text) 
  {
    $sql = "INSERT INTO comments SET name=:n, text=:t";
    $params = ['n' => $name, 't' => $text];

    $query = $this->db->prepare($sql);
    $query->execute($params);

    if ($query->errorCode() != \PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
  }


  public function edit($id, $name, $text) 
  {
    $sql = "UPDATE comments SET name=:n, text=:t WHERE id_comment=:id";
    $params = ['n' => $name, 't' => $text, 'id' => $id];

    $query = $this->db->prepare($sql);
    $query->execute($params);

    if ($query->errorCode() != \PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }
  }


  private function messages_validate($name, $text) 
  {
    $errors = [];

    if ($name == '') {
      $errors[] = 'Имя не может быть пустым';
    } elseif (mb_strlen($name) < 5) {
      $errors[] = 'Имя не должно быть меньше 5 символов';
    } 

    if ($text == '') {
      $errors[] = 'Текст не может быть пустым';
    }

    return $errors;
  }

}