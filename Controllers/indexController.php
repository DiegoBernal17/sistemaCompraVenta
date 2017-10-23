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

    public function register() {
      $direccion = new Direccion();
      if($_POST) {
        $this->empleado->set("usuario", $_POST['username']);
        if($_POST['password'] === $_POST['r_password'] && $this->empleado->availableUsername()) {
          $direccion->set("id_pais", $_POST['pais']);
          $direccion->set("id_estado", $_POST['estado']);
          $direccion->set("id_ciudad", $_POST['ciudad']);
          $direccion->set("id_colonia", $_POST['colonia']);
          $direccion->set("calle", $_POST['calle']);
          $direccion->set("numero", $_POST['numero']);
          $direccion->set("interior", $_POST['interior']);
          $direccion->add();

          $this->empleado->set("nombre", $_POST['nombre']);
          $this->empleado->set("paterno", $_POST['paterno']);
          $this->empleado->set("materno", $_POST['materno']);
          $this->empleado->set("genero", $_POST['genero']);
          $this->empleado->set("telefono", $_POST['telefono']);
          $this->empleado->set("id_direccion", $direccion->get("id_direccion"));
          $this->empleado->set("password", $_POST['password']);
          $this->empleado->add();
          echo '<div class="alert alert-dismissible alert-success psmall">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡Hecho!</strong> Ya puedes <a href="'.URL.'">Iniciar sesión</a>.
          </div>';
        } else {
          echo '<div class="alert alert-dismissible alert-danger psmall">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>El nombre de usuario ya existe</strong>
                </div>';
        }
      }
      return $direccion->showCountries();
    }
  }
 ?>
