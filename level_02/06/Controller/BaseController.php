<?php

namespace Controller;

use Core\Users;
use Core\Tmp;

class BaseController
{
  protected $title;
  protected $content;
  protected $auth;
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
    $this->title = 'Marat\'s Blog';
    $this->auth = Users::isAuth();
  }

  public function render()
  {
    echo Tmp::generate('views/main.php', [
      'title' => $this->title,
      'auth' => $this->auth,
      'content' => $this->content
    ]);
  }
}