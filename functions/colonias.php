<?php
require_once("../Models/Connection.php");

use Models\Connection as Connection;
$con = new Connection();

$sql = "SELECT * FROM colonias
        WHERE id_pais = '{$_POST['id_pais']}'
        AND id_estado = '{$_POST['id_estado']}'
        AND id_ciudad = '{$_POST['id_ciudad']}'";
$data = $con->returnQuery($sql);
while($row = mysqli_fetch_array($data)) {
  echo '<option value="'.$row['id_colonia'].'">'.$row['nombre'].'</option>';
}
?>
