<?php namespace Models;

class Articulo {
  private $id_articulo;
  private $nombre;
  private $precio_venta;
  //private $disponibles;

  public function __construct() {
    $this->con = new Connection();
  }

  public function toList() {
    $sql = "SELECT * FROM articulos";
    return $this->con->returnQuery($sql);
  }

  public function toList2() {
    $sql = "SELECT * FROM articulos WHERE disponibles > 0";
    return $this->con->returnQuery($sql);
  }

  public function add() {
    $sql = "INSERT INTO articulos (id_articulo,nombre,precio_venta,disponibles)
            VALUES (NULL, '{$this->nombre}', '{$this->precio_venta}', '0');";
    $this->con->simpleQuery($sql);
  }

  public function view() {
    $sql = "SELECT * FROM articulos WHERE id_articulo = '{$this->id_articulo}'";
    return mysqli_fetch_array($this->con->returnQuery($sql));
  }

  public function update() {
<<<<<<< HEAD
    $sql = "UPDATE articulos SET nombre = '{$this->nombre}', precio_venta = '{$this->precio_venta}'
=======
    $sql = "UPDATE FROM articulos SET nombre = '{$this->nombre}', precio_venta = {$this->precio_venta}
>>>>>>> d33634a8b9718bd8879fde75dabe8bb8df0b64ba
            WHERE id_articulo = '{$this->id_articulo}'";
    $this->con->simpleQuery($sql);
  }

  public function set($attribute, $content) {
      $this->$attribute = $content;
  }

  public function get($attribute) {
    return $this->$attribute;
  }
}
?>
