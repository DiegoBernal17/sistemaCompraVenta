<?php namespace Controllers;

use Models\Empleado as Empleado;
use Models\Direccion as Direccion;

class empleadosController {
  private $empleado;

  public function __construct() {
    $this->empleado = new Empleado();
  }

  public function index() {
    return $this->empleado->toList();
  }

  public function view($id) {
    $this->empleado->set("id_empleado", $id);
    return $this->empleado->view();
  }

  public function ventas($id) {
    if(empty($id)) {
      if($_POST) { ?>
       <script type="text/javascript">
       this.location.href = '<?php echo URL."empleados/ventas/".$_POST['empleado']; ?>';
       </script>
       <?php
      }
      return array("id" => "", "empleados" => $this->empleado->toList());
    } else {
      $this->empleado->set("id_empleado", $id);
      return array("id" => $id, "ventas" => $this->empleado->viewSales());
    }
  }

  public function add() {
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
