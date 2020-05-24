<?php
namespace Core;

use Core\Request;
use Controller\ArticleController;
use Controller\BaseController;

class App
{
  private $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function go()
  {
    $params = $this->getRouteByRequest();

    if (!$params) {
      $params = $this->getRouteByParams('/');
    }

    $ctrl = new $params['controller']($this->request);
    $action = $params['action'];
    $ctrl->$action();

    $ctrl->render();
  }

  private function getRouteByRequest()
  {
    return isset($this->routes()[$this->request->rout]) ? $this->routes()[$this->request->rout] : false;
  }


  private function getRouteByParams($rout)
  {
    return isset($this->routes()[$rout]) ? $this->routes()[$rout] : false;
  }


  private function routes()
  {
    return [
      '/' => [
        'controller' => 'Controller\ArticleController',
        'action' => 'indexAction',
      ],
      '/article' => [
        'controller' => 'Controller\ArticleController',
        'action' => 'oneAction',
      ],
      'default' => [
        'controller' => 'Controller\BaseController',
        'action' => 'get404',
      ]
    ];
  }
}