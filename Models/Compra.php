<?php namespace Models;

class Compra {
  private $id_compra;
  private $id_proveedor;
  private $id_empleado;
  private $importe;
  private $iva;

  public function __construct() {
    $this->con = new Connection();
  }

  public function toList() {
    $sql = "SELECT c.*, p.nombre as p_nombre, e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
            FROM compras c
            INNER JOIN empleados e ON c.id_empleado = e.id_empleado
            INNER JOIN proveedores p ON c.id_proveedor = p.id_proveedor
            ORDER BY c.id_compra DESC";
    return $this->con->returnQuery($sql);
  }

  public function add() {
    $sql = "INSERT INTO compras (id_compra,id_proveedor,id_empleado,fecha,importe,iva)
            VALUES (NULL, '{$this->id_proveedor}', '{$this->id_empleado}', NOW(), '{$this->importe}', '{$this->iva}')";
    $this->con->simpleQuery($sql);
    $this->id_compra = $this->con->getID();
  }

  public function addItem($id_articulo, $precio_compra) {
    $sql = "INSERT INTO comprasarticulos (id_compraArticulo,id_articulo,id_compra, precio_compra)
            VALUES (NULL, '{$id_articulo}', '{$this->id_compra}', '{$precio_compra}')";
    $this->con->simpleQuery($sql);
    $this->con->simpleQuery("UPDATE articulos SET disponibles = (disponibles+1) WHERE id_articulo = {$id_articulo}");
  }

  public function viewProviders() {
    return $this->con->returnQuery("SELECT id_proveedor,nombre FROM proveedores");
  }

  public function set($attribute, $content) {
      $this->$attribute = $content;
  }

  public function get($attribute) {
    return $this->$attribute;
  }

  public function view() {
    $sql1 = "SELECT c.*, p.nombre as p_nombre, e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
            FROM compras c
            INNER JOIN empleados e ON c.id_empleado = e.id_empleado
            INNER JOIN proveedores p ON c.id_proveedor = p.id_proveedor
            WHERE c.id_compra = {$this->id_compra}";
    $sql2 = "SELECT * FROM comprasArticulos ca
            INNER JOIN articulos a ON ca.id_articulo = a.id_articulo
            WHERE ca.id_compra = {$this->id_compra}";
    return array("compra" => mysqli_fetch_array($this->con->returnQuery($sql1)),
                 "comprasArticulos" => $this->con->returnQuery($sql2));
  }
}
?>
