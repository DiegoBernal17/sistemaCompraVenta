<?php namespace Models;

class Direccion {
  private $id_direccion;
  private $id_pais;
  private $id_estado;
  private $id_ciudad;
  private $id_colonia;
  private $calle;
  private $numero;
  private $interior;
  private $con;

  public function __construct() {
    $this->con = new Connection();
  }

  public function add() {
    $sql = "INSERT INTO direcciones (id_direccion,id_pais,id_estado,id_ciudad,id_colonia,calle,numero,interior)
            VALUES (NULL, '{$this->id_pais}', '{$this->id_estado}', '{$this->id_ciudad}', '{$this->id_colonia}', '{$this->calle}', '{$this->numero}', '{$this->interior}')";
    $this->con->simpleQuery($sql);
    $this->id_direccion = $this->con->getID();
  }

  public function showCountries() {
    $sql = "SELECT * FROM paises ORDER BY nombre";
    return $this->con->returnQuery($sql);
  }

  public function set($attribute, $content) {
      $this->$attribute = $content;
  }

  public function get($attribute) {
    return $this->$attribute;
  }
}
?>
