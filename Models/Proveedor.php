<?php namespace Models;

class Proveedor {
  private $id_proveedor;
  private $id_direccion;
  private $nombre;
  private $telefono;
  private $id_pais;
  private $id_estado;
  private $id_ciudad;
  private $id_colonia;

  public function __construct() {
    $this->con = new Connection();
  }

  public function toList() {
    $sql = "SELECT pr.*, d.*, p.nombre AS pais_nombre, e.nombre AS estado_nombre, c.nombre AS ciudad_nombre, col.nombre AS colonia_nombre
            FROM proveedores pr
            INNER JOIN direcciones d ON d.id_direccion = pr.id_direccion
            INNER JOIN colonias col ON col.id_pais = d.id_pais AND col.id_estado = d.id_estado AND col.id_ciudad = d.id_ciudad AND col.id_colonia = d.id_colonia
            INNER JOIN ciudades c ON c.id_pais = col.id_pais AND c.id_estado = col.id_estado AND c.id_ciudad = col.id_ciudad
            INNER JOIN estados e ON e.id_pais = c.id_pais AND e.id_estado = c.id_estado
            INNER JOIN paises p ON p.id_pais = e.id_pais";
    return $this->con->returnQuery($sql);
  }

  public function add() {
    $sql = "INSERT INTO proveedores (id_proveedor,id_direccion,nombre,telefono)
            VALUES (null, '{$this->id_direccion}', '{$this->nombre}', '{$this->telefono}')";
    $this->con->simpleQuery($sql);
  }

  public function addDir($pais, $estado, $ciudad, $colonia, $calle, $numero, $interior) {
    $sql = "INSERT INTO direcciones (id_direccion,id_pais,id_estado,id_ciudad,id_colonia,calle,numero,interior)
            VALUES (NULL, '{$pais}', '{$estado}', '{$ciudad}', '{$colonia}', '{$calle}', '{$numero}', '{$interior}')";
    $this->con->simpleQuery($sql);
    $this->id_direccion = $this->con->getID();
  }

  public function view() {
    $sql = "SELECT pr.*, d.*, p.nombre AS pais_nombre, e.nombre AS estado_nombre, c.nombre AS ciudad_nombre, col.nombre AS colonia_nombre
            FROM proveedores pr
            INNER JOIN direcciones d ON d.id_direccion = pr.id_direccion
            INNER JOIN colonias col ON col.id_pais = d.id_pais AND col.id_estado = d.id_estado AND col.id_ciudad = d.id_ciudad AND col.id_colonia = d.id_colonia
            INNER JOIN ciudades c ON c.id_pais = col.id_pais AND c.id_estado = col.id_estado AND c.id_ciudad = col.id_ciudad
            INNER JOIN estados e ON e.id_pais = c.id_pais AND e.id_estado = c.id_estado
            INNER JOIN paises p ON p.id_pais = e.id_pais
            WHERE pr.id_proveedor = {$this->id_proveedor}";
    return mysqli_fetch_array($this->con->returnQuery($sql));
  }

  public function showCountries() {
    $sql = "SELECT * FROM paises ORDER BY nombre";
    return $this->con->returnQuery($sql);
  }

  public function search($procedencia, $busqueda) {
    if($procedencia == "procedencia") {
      $procedencia = "=";
    } else if($procedencia == "noprocedencia") {
      $procedencia = "!=";
    }

    if($busqueda == "pais") {
      $sql = "SELECT * FROM proveedores p
              INNER JOIN direcciones d ON p.id_direccion = d.id_direccion
              WHERE d.id_pais ".$procedencia." '{$this->id_pais}'";
    } else if($busqueda == "estado") {
      $sql = "SELECT * FROM proveedores p
              INNER JOIN direcciones d ON p.id_direccion = d.id_direccion
              WHERE d.id_pais = '{$this->id_pais}'
              AND d.id_estado ".$procedencia." '{$this->id_estado}'";
    } else if($busqueda == "ciudad") {
      $sql = "SELECT * FROM proveedores p
              INNER JOIN direcciones d ON p.id_direccion = d.id_direccion
              WHERE d.id_pais = '{$this->id_pais}'
              AND d.id_estado = '{$this->id_estado}'
              AND d.id_ciudad ".$procedencia." '{$this->id_ciudad}'";
    } else if($busqueda == "colonia") {
      $sql = "SELECT * FROM proveedores p
              INNER JOIN direcciones d ON p.id_direccion = d.id_direccion
              WHERE d.id_pais = '{$this->id_pais}'
              AND d.id_estado = '{$this->id_estado}'
              AND d.id_ciudad = '{$this->id_ciudad}'
              AND d.id_colonia ".$procedencia." '{$this->id_colonia}'";
    } else if($busqueda == "nombre") {
      $sql = "SELECT * FROM proveedores
              WHERE nombre  ".$procedencia." '{$this->nombre}'";
    } else {
      $sql = "SELECT * FROM proveedores";
    }

    return $this->con->returnQuery($sql);
  }

  public function set($attribute, $content) {
      $this->$attribute = $content;
  }

  public function get($attribute) {
    return $this->$attribute;
  }

  public function viewBuys() {
    $sql = "SELECT c.*, p.nombre as p_nombre, e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
            FROM compras c
            INNER JOIN empleados e ON c.id_empleado = e.id_empleado
            INNER JOIN proveedores p ON c.id_proveedor = p.id_proveedor
            WHERE c.id_proveedor = '{$this->id_proveedor}'";
    return $this->con->returnQuery($sql);
  }
}
?>
