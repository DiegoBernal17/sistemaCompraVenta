<?php namespace Controllers;

use Models\Empleado as Empleado;
  class indexController {
    private $empleado;

    public function index() {
      if(!empty($_POST)) {
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
          $this->empleado = new Empleado();
          $this->empleado->set("username", $_POST['username']);
          $this->empleado->set("pass", $_POST['password']);
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
