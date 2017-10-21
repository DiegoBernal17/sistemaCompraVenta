<?php namespace Controllers;

use Models\Cliente as Cliente;

class clientesController {
  private $cliente;

  public function __construct() {
    $this->cliente = new Cliente();
  }

  public function index() {
    return $this->cliente->toList();
  }

  public function view($id) {
    $this->cliente->set("id_cliente", $id);
    return $this->cliente->view();
  }

  public function add() {
    if($_POST) {
      $this->cliente->addDir($_POST['pais'], $_POST['estado'], $_POST['ciudad'], $_POST['colonia'], $_POST['calle'], $_POST['numero'], $_POST['interior']);
      $this->cliente->set("nombre", $_POST['nombre']);
      $this->cliente->set("paterno", $_POST['paterno']);
      $this->cliente->set("materno", $_POST['materno']);
      $this->cliente->set("telefono", $_POST['telefono']);
      $this->cliente->set("genero", $_POST['genero']);
      $this->cliente->add();
      echo '<div class="alert alert-dismissible alert-success psmall">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Hecho!</strong> Haz agregado un nuevo cliente.
      </div>';
    } else {
      return $this->cliente->showCountries();
    }
  }
}
