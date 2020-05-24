<?php
namespace Core;

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
    $ctrl = new $params['controller']($this->request);
    $action = $params['action'];
    $ctrl->$action();

    $ctrl->render();
  }

  private function getRouteByRequest()
  {
    return $this->routes([$this->request->rout]);
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
        'action' => 'indexAction',
      ]
    ];
  }
}