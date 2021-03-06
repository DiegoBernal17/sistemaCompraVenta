<?php namespace Controllers;

use Models\Articulo as Articulo;
use Models\Proveedor as Proveedor;

class articulosController {
  private $articulo;

  public function __construct() {
    $this->articulo = new Articulo();
  }

  public function index() {
    return $this->articulo->toList();
  }

  public function add() {
    $proveedor = new Proveedor();
    if($_POST) {
      $this->articulo->set("nombre", $_POST['nombre']);
      $this->articulo->set("precio_venta", $_POST['precio']);
      $this->articulo->set("id_proveedor", $_POST['proveedor']);
      $this->articulo->add();
      echo '<div class="alert alert-dismissible alert-success psmall">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Hecho!</strong> Haz agregado un nuevo articulo.
      </div>';
    }
    return $proveedor->toList();
  }

  public function edit($id) {
    $this->articulo->set("id_articulo", $id);
    if($_POST) {
      $this->articulo->set("nombre", $_POST['nombre']);
      $this->articulo->set("precio_venta", $_POST['precio']);
      $this->articulo->update();
      echo '<div class="alert alert-dismissible alert-success psmall">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Hecho!</strong> Se ha editado un articulo.<br>
      Haz <a href="'.URL.'articulos/">Clic Aquí</a> para regresar a los articulos.
      </div>';
    }
    return $this->articulo->view();
  }
}
