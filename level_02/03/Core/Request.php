<?php 

namespace Core;

class Request
{
  /**
  * константы.
  */
  const METHOD_GET = 'GET';
  const METHOD_POST = 'POST';

  public $get;
  public $post;
  public $server;

  public function __construct(array $get, array $post, array $server)
  {
    $this->get = $get;
    $this->post = $post;
    $this->server = $server;
  }

  public function isGet()
  {
    return $this->server['REQUEST_METHOD'] == self::METHOD_GET;
  }

  public function isPost()
  {
    return $this->server['REQUEST_METHOD'] == self::METHOD_POST;
  }

  public function getMethod()
  {
    return $this->server['REQUEST_METHOD'];
  }

}