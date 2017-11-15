<?php
  error_reporting(0);
  session_start([
    'cookie_lifetime' => 86400,
  ]);
  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', realpath(dirname(__FILE__)) . DS);
  define('URL', "http://localhost/proyectoABD/");
  define('LOGGED', isset($_SESSION['LOGGED']));
  define('USERNAME', $_SESSION['LOGGED']);
  define('ID_EMPLEADO', $_SESSION['USER_ID']);
  define('ADMIN', $_SESSION['ADMIN']);

  require_once "Config/Autoload.php";
  Config\Autoload::run();
  require_once "Views/template.php";
  Config\Router::run(new Config\Request());
 ?>
