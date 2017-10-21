<?php namespace Controllers;

use Models\Articulo as Articulo;

class articulosController {
  private $articulo;

  public function __construct() {
    $this->articulo = new Articulo();
  }

  public function index() {
    return $this->articulo->toList();
  }

  public function add() {
    if($_POST) {
      $this->articulo->set("nombre", $_POST['nombre']);
      $this->articulo->set("precio_venta", $_POST['precio']);
      $this->articulo->add();
      echo '<div class="alert alert-dismissible alert-success psmall">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Hecho!</strong> Haz agregado un nuevo articulo.
      </div>';
    }
  }
}
