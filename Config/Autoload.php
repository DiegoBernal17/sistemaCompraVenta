<?php namespace Config;

  class Autoload {
    public static function run() {
      spl_autoload_register(function($class) {
        $path = str_replace("\\", "/", $class) . ".php";
        require_once $path;
      });
    }
  }
 ?>
