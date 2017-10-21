<?php
require_once("../Models/Connection.php");
require_once("../Models/Venta.php");

use Models\Venta as Venta;

$venta = new Venta();

$venta->set("id_cliente", $_POST['id_cliente']);
$venta->set("id_empleado", $_POST['id_empleado']);
$venta->set("importe", $_POST['importe']);
$venta->set("iva", $_POST['iva']);
$venta->add();

$items = $_POST['items'];
for($i=0; $i<count($items);$i++) {
  $venta->addItem($items[$i]);
}
 ?>

 <div class="alert alert-dismissible alert-success">
  <strong>¡Venta realizada!</strong> Se ha realizado la venta correctamente.</a>.
 </div>
