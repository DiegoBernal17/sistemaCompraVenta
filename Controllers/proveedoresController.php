<?php namespace Controllers;

use Models\Proveedor as Proveedor;

class proveedoresController {
  private $proveedor;

  public function __construct() {
    $this->proveedor = new Proveedor();
  }

  public function index() {
    return $this->proveedor->toList();
  }

  public function compras($id) {
    if(empty($id)) {
      if($_POST) { ?>
       <script type="text/javascript">
       this.location.href = '<?php echo URL."proveedores/compras/".$_POST['proveedor']; ?>';
       </script>
       <?php
      }
      return array("id" => "", "proveedores" => $this->proveedor->toList());
    } else {
      $this->proveedor->set("id_proveedor", $id);
      return array("id" => $id, "compras" => $this->proveedor->viewBuys());
    }
  }

  public function add() {
    if($_POST) {
      $this->proveedor->addDir($_POST['pais'], $_POST['estado'], $_POST['ciudad'], $_POST['colonia'], $_POST['calle'], $_POST['numero'], $_POST['interior']);
      $this->proveedor->set("nombre", $_POST['nombre']);
      $this->proveedor->set("telefono", $_POST['telefono']);
      $this->proveedor->add();
      echo '<div class="alert alert-dismissible alert-success psmall">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Hecho!</strong> Haz agregado un nuevo proveedor.
      </div>';
    }
    return $this->proveedor->showCountries();
  }

  public function view($id) {
    $this->proveedor->set("id_proveedor", $id);
    return $this->proveedor->view();
  }

  public function search() {
    if($_POST) { ?>
       <script type="text/javascript">
       this.location.href = '<?php echo URL."proveedores/".$_POST['tipo']; ?>';
       </script>
       <?php
    }
  }

  public function pais($procedencia, $id_pais) {
    if(empty($procedencia) || empty($id_pais)) {
      if($_POST) { ?>
         <script type="text/javascript">
         this.location.href = '<?php echo URL."proveedores/pais/".$_POST['procedencia']."/".$_POST['pais']; ?>';
         </script>
         <?php
      }
      return array("id" => "", "paises" => $this->proveedor->showCountries());
    } else {
      $this->proveedor->set("id_pais", $id_pais);
      return array("id" => $id_pais, "proveedores" => $this->proveedor->search($procedencia, "pais"));
    }
  }

  public function estado($procedencia, $id_pais, $id_estado) {
    if(empty($procedencia) || empty($id_pais) || empty($id_estado)) {
      if($_POST) { ?>
         <script type="text/javascript">
         this.location.href = '<?php echo URL."proveedores/estado/".$_POST['procedencia']."/".$_POST['estado']."/".$_POST['estado']; ?>';
         </script>
         <?php
      }
      return array("id" => "", "paises" => $this->proveedor->showCountries());
    } else {
      $this->proveedor->set("id_pais", $id_pais);
      $this->proveedor->set("id_estado", $id_estado);
      return array("id" => $id_estado, "proveedores" => $this->proveedor->search($procedencia, "estado"));
    }
  }

  public function ciudad($procedencia, $id_pais, $id_estado, $id_ciudad) {
    if(empty($procedencia) || empty($id_pais) || empty($id_estado) || empty($id_ciudad)) {
      if($_POST) { ?>
         <script type="text/javascript">
         this.location.href = '<?php echo URL."proveedores/ciudad/".$_POST['procedencia']."/".$_POST['estado']."/".$_POST['estado']."/".$_POST['ciudad']; ?>';
         </script>
         <?php
      }
      return array("id" => "", "paises" => $this->proveedor->showCountries());
    } else {
      $this->proveedor->set("id_pais", $id_pais);
      $this->proveedor->set("id_estado", $id_estado);
      $this->proveedor->set("id_ciudad", $id_ciudad);
      return array("id" => $id_ciudad, "proveedores" => $this->proveedor->search($procedencia, "ciudad"));
    }
  }

  public function colonia($procedencia, $id_pais, $id_estado, $id_ciudad, $id_colonia) {
    if(empty($procedencia) || empty($id_pais) || empty($id_estado) || empty($id_ciudad) || empty($id_colonia)) {
      if($_POST) { ?>
         <script type="text/javascript">
         this.location.href = '<?php echo URL."proveedores/colonia/".$_POST['procedencia']."/".$_POST['estado']."/".$_POST['estado']."/".$_POST['ciudad']."/".$_POST['colonia']; ?>';
         </script>
         <?php
      }
      return array("id" => "", "paises" => $this->proveedor->showCountries());
    } else {
      $this->proveedor->set("id_pais", $id_pais);
      $this->proveedor->set("id_estado", $id_estado);
      $this->proveedor->set("id_ciudad", $id_ciudad);
      $this->proveedor->set("id_colonia", $id_colonia);
      return array("id" => $id_colonia, "proveedores" => $this->proveedor->search($procedencia, "colonia"));
    }
  }
}
