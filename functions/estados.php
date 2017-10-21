<?php
require_once("../Models/Connection.php");

use Models\Connection as Connection;
$con = new Connection();

$sql = "SELECT * FROM estados WHERE id_pais = '{$_POST['id_pais']}'";
$data = $con->returnQuery($sql);
while($row = mysqli_fetch_array($data)) {
  echo '<option value="'.$row['id_estado'].'">'.$row['nombre'].'</option>';
}
?>
