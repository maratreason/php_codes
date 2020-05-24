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
}