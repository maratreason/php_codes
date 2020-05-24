<?php

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
    $article = $mArticle->getById($id);
    $htmlGen = new HTMLGenerator($article);

    $htmlGen
      ->wrapEachInP()
      ->addTo(HTMLGenerator::getImg('./img/1.jpg'), 'p', 1)
      ->wrapAllInBox('wrapper');

      $article = $htmlGen->beautyText;

    echo $this->render('Views/article.html.php', [
      'article' => $article
    ]);
  }

}