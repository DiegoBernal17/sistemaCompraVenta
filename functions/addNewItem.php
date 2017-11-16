<?php
require_once("../Models/Connection.php");

use Models\Connection as Connection;
$con = new Connection();
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$id_proveedor = $_POST['id_proveedor'];

if(empty($item_name) || empty($item_price))
  echo 0;
else {
  $sql = $con->simpleQuery("INSERT INTO articulos (id_articulo,nombre,precio_venta,disponibles,id_proveedor)
                            VALUES (NULL, '{$item_name}', '{$item_price}', '0', '{$id_proveedor}')");
  echo $con->getID();
}
?>
