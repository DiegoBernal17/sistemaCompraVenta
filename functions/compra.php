<?php
require_once("../Models/Connection.php");
require_once("../Models/Compra.php");

use Models\Compra as Compra;

$compra = new Compra();

$compra->set("id_proveedor", $_POST['id_proveedor']);
$compra->set("id_empleado", $_POST['id_empleado']);
$compra->set("importe", $_POST['importe']);
$compra->set("iva", $_POST['iva']);
$compra->add();

$items = $_POST['items'];
$itemsPrice = $_POST['precio_compra'];
for($i=0; $i<count($items); $i++) {
  $compra->addItem($items[$i], $itemsPrice[$i]);
}
 ?>

 <div class="alert alert-dismissible alert-success">
  <strong>¡Compra realizada!</strong> Se ha realizado la compra correctamente.</a>.
 </div>
