<?php namespace Controllers;

use Models\Empleado as Empleado;

class empleadosController {
  private $empleado;

  public function __construct() {
    $this->empleado = new Empleado();
  }

  public function index() {
    return $this->empleado->toList();
  }

  public function add() {

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
}
