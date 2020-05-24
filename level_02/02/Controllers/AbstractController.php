<?php 

abstract class AbstractController
{
  protected $get;
  protected $post;

  public function __construct(array $get, array $post)
  {
    $this->get = $get;
    $this->post = $post;
  }

  abstract function indexAction();
  abstract function articleAction();
  
  protected function render($fileName, $values = array())
  {
    extract($values);
    ob_start();
    include("$fileName");
    return ob_get_clean();
  }
} 