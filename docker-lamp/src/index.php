<?php
class Request {
}

class Response {
  public function send($body) {
    echo $body;
  }
}

class Espresso {
  private $routesGet = array();
  private $routesPUT = array();
  private $routesPOST = array();
  private $routesDELETE = array();

  public function get($path, $callback) {
    $this->$routesGet[$path] = $callback;
  }

  public function run() {
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'GET') {
      $callback = $this->$routesGet[$_SERVER['REQUEST_URI']];
      if (isset($callback)) {
        $callback(new Request(), new Response());
      } else {
        echo $_SERVER['REQUEST_URI'];
      }
    }
  }
}

$server = new Espresso();

$server->get('/api/main', function ($req, $res) {
  $res->send('Hello, world!');
});
$server->get('/api/sec', function ($req, $res) {
  $res->send('Hello, sec!');
});

$server->run();

