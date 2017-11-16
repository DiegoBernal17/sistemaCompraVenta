<?php namespace Models;

class Articulo {
  private $id_articulo;
  private $nombre;
  private $precio_venta;
  private $id_proveedor;

  public function __construct() {
    $this->con = new Connection();
  }

  public function toList($id_proveedor = "") {
    if($id_proveedor == "") {
      $sql = "SELECT a.*, p.nombre AS p_nombre
              FROM articulos a
              INNER JOIN proveedores p ON a.id_proveedor = p.id_proveedor
              ORDER BY a.id_articulo DESC";
    } else {
      $sql = "SELECT * FROM articulos WHERE id_proveedor = {$id_proveedor} ORDER BY id_articulo DESC";
    }
    return $this->con->returnQuery($sql);
  }

  public function toList2() {
    $sql = "SELECT * FROM articulos WHERE disponibles > 0";
    return $this->con->returnQuery($sql);
  }

  public function add() {
    $sql = "INSERT INTO articulos (id_articulo,nombre,precio_venta,disponibles,id_proveedor)
            VALUES (NULL, '{$this->nombre}', '{$this->precio_venta}', '0', '{$this->id_proveedor}');";
    $this->con->simpleQuery($sql);
  }

  public function view() {
    $sql = "SELECT a.*, p.nombre AS p_nombre
            FROM articulos a
            INNER JOIN proveedores p ON a.id_proveedor = p.id_proveedor
            WHERE a.id_articulo = '{$this->id_articulo}'";
    return mysqli_fetch_array($this->con->returnQuery($sql));
  }

  public function countItem() {
    $sql = $con->returnQuery("SELECT disponibles FROM articulos WHERE id_articulo = '{$this->id_articulo}'");
    $itemCount = mysqli_fetch_array($sql);
    return $itemCount[0];
  }

  public function update() {
    $sql = "UPDATE articulos SET nombre = '{$this->nombre}', precio_venta = '{$this->precio_venta}'
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
