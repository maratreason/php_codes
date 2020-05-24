<?php 

namespace Controllers;

use Core\Request;

abstract class AbstractController
{
  protected $request;
  protected $post;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function __call($name, $params)
  {
    header('HTTP/1.1 404 Page Not Found');
    echo $this->render('Views/404_page.html.php');
  }
  
  protected function render($fileName, $vars = array())
  {
    foreach ($vars as $k => $v) {
      $$k = $v;
    }

    // или так
    // extract($vars);

    ob_start();
    include("$fileName");
    return ob_get_clean();
  }
} 