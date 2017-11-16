<?php namespace Models;

class Empleado {
  private $id_empleado;
  private $nombre;
  private $paterno;
  private $materno;
  private $genero;
  private $telefono;
  private $id_direccion;
  private $usuario;
  private $password;

  public function __construct() {
    $this->con = new Connection();
  }

  public function toList() {
    $sql = "SELECT em.*, d.*, p.nombre AS pais_nombre, e.nombre AS estado_nombre, c.nombre AS ciudad_nombre, col.nombre AS colonia_nombre
            FROM empleados em
            INNER JOIN direcciones d ON d.id_direccion = em.id_direccion
            INNER JOIN colonias col ON col.id_pais = d.id_pais AND col.id_estado = d.id_estado AND col.id_ciudad = d.id_ciudad AND col.id_colonia = d.id_colonia
            INNER JOIN ciudades c ON c.id_pais = col.id_pais AND c.id_estado = col.id_estado AND c.id_ciudad = col.id_ciudad
            INNER JOIN estados e ON e.id_pais = c.id_pais AND e.id_estado = c.id_estado
            INNER JOIN paises p ON p.id_pais = e.id_pais
            ORDER BY em.id_empleado DESC";
    return $this->con->returnQuery($sql);
  }

  public function add() {
    $password = password_hash($this->password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO empleados (id_empleado,nombre,paterno,materno,genero,telefono,id_direccion,usuario,contrasena,admin)
            VALUES (NULL, '{$this->nombre}', '{$this->paterno}', '{$this->materno}', '{$this->genero}', '{$this->telefono}', '{$this->id_direccion}', '{$this->usuario}', '{$password}', 0)";
    $this->con->simpleQuery($sql);
  }

  public function viewSales() {
    $sql = "SELECT v.*, c.nombre as c_nombre, c.paterno as c_paterno, c.materno as c_materno,
                   e.nombre as e_nombre, e.paterno as e_paterno, e.materno as e_materno
            FROM ventas v
            INNER JOIN empleados e ON v.id_empleado = e.id_empleado
            INNER JOIN clientes c ON v.id_cliente = c.id_cliente
            WHERE v.id_empleado = '{$this->id_empleado}'";
    return $this->con->returnQuery($sql);
  }

  public function view() {
    $sql = "SELECT emp.*, d.*, p.nombre AS pais_nombre, e.nombre AS estado_nombre, c.nombre AS ciudad_nombre, col.nombre AS colonia_nombre
            FROM empleados emp
            INNER JOIN direcciones d ON d.id_direccion = emp.id_direccion
            INNER JOIN colonias col ON col.id_pais = d.id_pais AND col.id_estado = d.id_estado AND col.id_ciudad = d.id_ciudad AND col.id_colonia = d.id_colonia
            INNER JOIN ciudades c ON c.id_pais = col.id_pais AND c.id_estado = col.id_estado AND c.id_ciudad = col.id_ciudad
            INNER JOIN estados e ON e.id_pais = c.id_pais AND e.id_estado = c.id_estado
            INNER JOIN paises p ON p.id_pais = e.id_pais
            WHERE emp.id_empleado = '{$this->id_empleado}'";
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

  public function login() {
    $sql = $this->con->returnQuery("SELECT id_empleado,contrasena,admin FROM empleados WHERE usuario = '{$this->username}'");
    $data = mysqli_fetch_array($sql);
    if(is_null($data)) {
      print "No existe usuario<br>";
      return false;
    }
    if(password_verify($this->password, $data['contrasena'])) {
      $_SESSION['USER_ID'] = $data['id_empleado'];
      $_SESSION['ADMIN'] = $data['admin'];
      return true;
    }
    return false;
  }

  public function availableUsername() {
    $sql = "SELECT username FROM empleados WHERE username = '{$this->username}'";
    $result = $this->con->returnQuery($sql);
    $value = mysqli_num_rows($result);
    if($value > 0)
      return false;
    return true;
  }
}
?>
