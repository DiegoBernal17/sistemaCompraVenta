<?php namespace Config;

  class Router {
      public static function run(Request $request) {

        $controller = $request->getController() . "Controller";
        $path = ROOT . "Controllers" . DS . $controller . ".php";
        $method = $request->getMethod();

        $argument = $request->getArgument();
        if(is_readable($path)) {
          require $path;
          $show = "Controllers\\" . $controller;
          $controller = new $show;
          if(!isset($argument)) {
            $data = call_user_func(array($controller, $method));
          } else {
            $data = call_user_func_array(array($controller, $method), $argument);
          }
        }

        $path = ROOT . "Views" . DS . $request->getController() . DS . $request->getMethod() . ".php";
        if(is_readable($path)) {
          require_once $path;
        } else {
          print $path;
        }
      }
  }
 ?>
