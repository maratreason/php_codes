<?php

namespace Controllers;

use Models\ArticleModel;
use Services\HTMLGenerator;

class ArticleController extends AbstractController
{

  public function indexAction()
  {
    $mArticle = new ArticleModel();
    $articles = $mArticle->getAll();

    echo $this->render('Views/index.html.php', [
      'articles' => $articles
    ]);
  }

  public function articleAction()
  {
    $mArticle = new ArticleModel();

    $id = $this->get['id'];
    $article = $mArticle->getById($this->request->get['id']);

    echo $this->render('Views/article.html.php', [
      'article' => $article
    ]);
  }

}