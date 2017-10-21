<?php namespace Models;

class Cliente {
  private $id_cliente;
  private $nombre;
  private $paterno;
  private $materno;
  private $genero;
  private $telefono;
  private $id_direccion;

  public function __construct() {
    $this->con = new Connection();
  }

  public function toList() {
    $sql = "SELECT * FROM clientes";
    return $this->con->returnQuery($sql);
  }

  public function add() {
    $sql = "INSERT INTO clientes (id_cliente,nombre,paterno,materno,genero,telefono,id_direccion)
            VALUES (NULL,'{$this->nombre}','{$this->paterno}','{$this->materno}','{$this->genero}','{$this->telefono}','{$this->id_direccion}')";
    $this->con->simpleQuery($sql);
  }

  public function addDir($pais, $estado, $ciudad, $colonia, $calle, $numero, $interior) {
    $sql = "INSERT INTO direcciones (id_direccion,id_pais,id_estado,id_ciudad,id_colonia,calle,numero,interior)
            VALUES (NULL, '{$pais}', '{$estado}', '{$ciudad}', '{$colonia}', '{$calle}', '{$numero}', '{$interior}')";
    $this->con->simpleQuery($sql);
    $this->id_direccion = $this->con->getID();
  }

  public function showCountries() {
    $sql = "SELECT * FROM paises ORDER BY nombre";
    return $this->con->returnQuery($sql);
  }

  public function view() {
    $sql = "SELECT cl.*, d.*, p.nombre AS pais_nombre, e.nombre AS estado_nombre, c.nombre AS ciudad_nombre, col.nombre AS colonia_nombre
            FROM clientes cl
            INNER JOIN direcciones d ON d.id_direccion = cl.id_direccion
            INNER JOIN colonias col ON col.id_pais = d.id_pais AND col.id_estado = d.id_estado AND col.id_ciudad = d.id_ciudad AND col.id_colonia = d.id_colonia
            INNER JOIN ciudades c ON c.id_pais = col.id_pais AND c.id_estado = col.id_estado AND c.id_ciudad = col.id_ciudad
            INNER JOIN estados e ON e.id_pais = c.id_pais AND e.id_estado = c.id_estado
            INNER JOIN paises p ON p.id_pais = e.id_pais
            WHERE cl.id_cliente = '{$this->id_cliente}'";
    return mysqli_fetch_array($this->con->returnQuery($sql));
  }

  public function set($attribute, $content) {
    if($attribute == "gender") {
      if($content == 'M' || $content == 'F')
        $this->gender = $content;
      else
        print "Error al asignar al atributo 'gender'.";
    } else {
      $this->$attribute = $content;
    }
  }

  public function get($attribute) {
    return $this->$attribute;
  }
}
?>
