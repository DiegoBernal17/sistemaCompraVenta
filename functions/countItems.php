<?php
require_once("../Models/Connection.php");

use Models\Connection as Connection;
$con = new Connection();
$id_articulo = $_POST['id_articulo'];

$sql = $con->returnQuery("SELECT disponibles FROM articulos WHERE id_articulo = '{$id_articulo}'");
$itemCount = mysqli_fetch_array($sql);
echo $itemCount[0];
?>
