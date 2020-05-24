<?php

namespace Controller;

use Model\ArticleModel;
use Core\Tmp;

class ArticleController extends BaseController
{

  public function indexAction()
  {
    $mArticle = new ArticleModel();
    $comments = $mArticle->getAll();

    if ($comments === false) {
      echo 'Возникла ошибка';
    } elseif ($comments == []) {
      echo 'Нет новостей для отображения';
    }

    $this->content = Tmp::generate('views/index.php', ['comments' => $comments]);
  }

  public function oneAction()
  {
    if (!isset($this->request->get['id'])) {
      $this->get404();
    }

    $mArticle = new ArticleModel();
    $comments = $mArticle->getById($this->request->get['id']);

    if (!$comments) {
      $this->get404();
    }

    $this->content = Tmp::generate('views/article.php', [
      'id_comment'=> $this->request->get['id'],
      'title' => $comments['title'],
      'content' => $comments['content'],
      'auth' => $this->auth
    ]);
  }


  public function addAction()
  {
    $name = '';
    $text = '';
    $error = [];
    $db_error = '';

    if ($this->request->isPost()) {

    }

    $this->text = $this->tmpGenerate('views/add.php', 
      [
        'name' => $name,
        'text' => $text,
        'error' => $error,
        'db_error' => $db_error
      ]
    );
    
  }
}