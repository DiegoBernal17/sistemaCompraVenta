<?php namespace Controllers;

use Models\Empleado as Empleado;
use Models\Direccion as Direccion;

  class indexController {
    private $empleado;

    public function __construct() {
      $this->empleado = new Empleado();
    }

    public function index() {
      if(!empty($_POST)) {
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
          $this->empleado->set("username", $_POST['username']);
          $this->empleado->set("password", $_POST['password']);
          if($this->empleado->login())
            $_SESSION['LOGGED'] = $_POST['username'];
          else
            $_SESSION['error'] = "Acceso incorrecto";
          ?>
          <script type="text/javascript">
          this.location.href = '<?php echo URL; ?>';
          </script>
          <?php
        }
      } else {

      }
    }

    public function out() {
      $_SESSION = array();
      session_destroy();
    }
  }
 ?>
