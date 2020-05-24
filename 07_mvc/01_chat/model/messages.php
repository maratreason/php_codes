<?php 

  function messages_all($db) {
    $sql = "SELECT * FROM comments ORDER BY dt DESC";
    $query = $db->prepare($sql);
    $query->execute();

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }

    return $query->fetchAll();
  }

  function add_message($db, $name, $text) {
    $sql = "INSERT INTO comments (name, text) VALUES (:n,:t)";
    $params = ['n' => $name, 't' => $text];

    $query = $db->prepare($sql);
    $query->execute($params);

    if ($query->errorCode() != PDO::ERR_NONE) {
      $info = $query->errorInfo();
      echo implode('<br>', $info);
      exit();
    }

    return $db->lastInsertId();
  }

?>