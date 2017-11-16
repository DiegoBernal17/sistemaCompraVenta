<?php namespace Controllers;

use Models\Compra as Compra;
use Models\Articulo as Articulo;

class comprasController {
  private $compra;

  public function __construct() {
    $this->compra = new Compra();
  }

  public function index() {
    return $this->compra->toList();
  }

  public function selectProvider() {
    if(empty($_POST)) {
      return $this->compra->viewProviders();
    } else { ?>
      <script type="text/javascript">
      this.location.href = '<?php echo URL."compras/addItems/".$_POST['proveedor']; ?>';
      </script>
    <?php
    }
  }

  public function addItems($id) {
    echo '<input type="hidden" id="pid" value="'.$id.'">';
    echo '<input type="hidden" id="eid" value="'.ID_EMPLEADO.'">';
    $articulo = new Articulo();
    return $articulo->toList($id);
  }

  public function view($id) {
    $this->compra->set("id_compra", $id);
    return $this->compra->view();
  }
}
