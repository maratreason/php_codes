<?php

namespace Controller;

use Core\Users;
use Core\Tmp;
use Core\Request;

class BaseController
{
  protected $title;
  protected $content;
  protected $auth;
  protected $request;

  public function __construct(Request $request)
  {
    $this->title = 'Marat\'s Blog';
    $this->auth = Users::isAuth();
    $this->request = $request;
  }

  public function render()
  {
    echo Tmp::generate('views/main.php', [
      'title' => $this->title,
      'auth' => $this->auth,
      'content' => $this->content
    ]);
  }

  public function get404()
  {
    $this->title = "{$this->title}::404 error";
    $this->content = '<h3>Page Not Found</h3>';
    $this->render();
    die;
  }
}