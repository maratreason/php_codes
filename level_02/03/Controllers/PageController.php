<?php 

namespace Controllers;

class PageController extends AbstractController {

  public function aboutAction()
  {
    echo $this->render('Views/about_page.html.php');
  }

  public function PageNotFoundAction()
  {
    header('HTTP/1.1 404 Page Not Found');
    echo $this->render('Views/404_page.html.php');
  }

}