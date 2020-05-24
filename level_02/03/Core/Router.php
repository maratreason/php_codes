<?php

namespace Core;

class Router
{
  protected $request;
  protected $ctrlName;
  protected $defaultAct;

  public function __construct(Request $request)
  {
    $this->request = $request;
    $this->setParams();
  }

  public function getCtrl()
  {
    return $this->ctrlName;
  }

  public function getAct()
  {
    return !empty($this->request->get['act']) 
                  ? $this->request->get['act'] .'Action' 
                  : $this->defaultAction;
  }

  public function setParams()
  {
    $c = !empty($this->request->get['c']) ? $this->request->get['c'] : 'article';

    switch ($c) {
      case 'article':
        $this->ctrlName = 'Controllers\ArticleController';
        $this->defaultAction = 'indexAction';
        break;
      case 'page':
        $this->ctrlName = 'Controllers\PageController';
        $this->defaultAction = 'aboutAction';
        break;
      default:
        $this->ctrlName = 'Controllers\PageController';
        $this->defaultAction = 'PageNotFoundAction';
        break;
    }
  }
}