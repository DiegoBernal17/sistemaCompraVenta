<?php namespace models;

class Ventas {
	private $id;

	public function __construct() {
		$this->con = new Connection();
	}

	public function toList() {
		$sql = "SELECT * FROM ventas v, empleados e, clientes c
						WHERE v.id_empleado = e.id_empleado
						AND v.id_cliente = c.id_cliente";
		return $this->con->simpleQuery($sql);
	}
}
?>
