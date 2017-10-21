<?php namespace Models;

  class Venta {
    private $id_venta;
    private $id_empleado;
    private $id_cliente;
    private $importe;
    private $iva;
    //private $precio_venta;
    private $date1;
    private $date2;

    public function __construct() {
      $this->con = new Connection();
    }

    public function toList() {
      $sql = "SELECT v.*, c.nombre as c_nombre, c.paterno as c_paterno, c.materno as c_materno,
                     e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
              FROM ventas v
              INNER JOIN empleados e ON v.id_empleado = e.id_empleado
              INNER JOIN clientes c ON v.id_cliente = c.id_cliente ";
      return $this->con->returnQuery($sql);
    }

    public function add() {
      $sql = "INSERT INTO ventas (id_venta,id_empleado,id_cliente,importe,iva,fecha)
              VALUES (null, {$this->id_empleado}, {$this->id_cliente}, {$this->importe}, {$this->iva}, NOW())";
      $this->con->simpleQuery($sql);
      $this->id_venta = $this->con->getID();
    }

    public function addItem($id_articulo) {
      $sql = "INSERT INTO ventasarticulos (id_ventaArticulo,id_articulo,id_venta)
              VALUES (NULL, '{$id_articulo}', '{$this->id_venta}')";
      $this->con->simpleQuery($sql);
    }

/*
    public function viewClients() {
      $sql = "SELECT id_cliente,nombre,paterno,materno FROM clientes";
      return $this->con->returnQuery($sql);
    }

    public function viewItems() {
      $sql = "SELECT * FROM articulos WHERE disponibles > 0";
      return $this->con->returnQuery($sql);
    }
*/

    public function set($attribute, $content) {
        $this->$attribute = $content;
    }

    public function get($attribute) {
      return $this->$attribute;
    }

    public function view() {
      $sql1 = "SELECT v.*, c.nombre as c_nombre, c.paterno as c_paterno, c.materno as c_materno,
                     e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
              FROM ventas v
              INNER JOIN empleados e ON v.id_empleado = e.id_empleado
              INNER JOIN clientes c ON v.id_cliente = c.id_cliente
              WHERE v.id_venta = {$this->id_venta}";
      $sql2 = "SELECT * FROM ventasArticulos va
              INNER JOIN articulos a ON va.id_articulo = a.id_articulo
              WHERE va.id_venta = {$this->id_venta}";
      return array("venta" => mysqli_fetch_array($this->con->returnQuery($sql1)),
                   "ventasArticulos" => $this->con->returnQuery($sql2));
    }

    public function rangeDate() {
      $sql = "SELECT v.*, c.nombre as c_nombre, c.paterno as c_paterno, c.materno as c_materno,
                     e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
              FROM ventas v
              INNER JOIN empleados e ON v.id_empleado = e.id_empleado
              INNER JOIN clientes c ON v.id_cliente = c.id_cliente
              WHERE date(fecha) BETWEEN date('{$this->date1}') AND date('{$this->date2}')";
      return $this->con->returnQuery($sql);
    }

    public function viewSales() {
      $sql = "SELECT v.*, c.nombre as c_nombre, c.paterno as c_paterno, c.materno as c_materno,
                     e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
              FROM ventas v
              INNER JOIN empleados e ON v.id_empleado = e.id_empleado
              INNER JOIN clientes c ON v.id_cliente = c.id_cliente
              WHERE v.id_cliente = '{$this->id_cliente}'";
      return $this->con->returnQuery($sql);
    }
  }
?>
