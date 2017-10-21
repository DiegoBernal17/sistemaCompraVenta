<?php namespace Config;

  class Request {
    private $controller;
    private $method;
    private $argument;

    public function __construct() {
      if(isset($_GET['url'])) {
        $path = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        $path = explode("/", $path);
        $path = array_filter($path);

        if($path[0] == "index.php") {
          $this->controller = "index";
        } else {
          $this->controller = strtolower(array_shift($path));
        }

        $this->method = strtolower(array_shift($path));
        if(!$this->method){
          $this->method = "index";
        }
        $this->argument = $path;
      } else {
        $this->controller = "index";
        $this->method = "index";
      }
    }

    public function getController() {
      return $this->controller;
    }

    public function getMethod() {
      return $this->method;
    }

    public function getArgument() {
      return $this->argument;
    }
  }
?>
