<div class="box-principal">
<hr>

<div class="panel panel-primary">
  <div class="panel-body">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>No.</th>
          <th>Empleado</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Importe</th>
          <th>Iva</th>
        </tr>
      </thead>
        <tbody>
          <td><?php echo $data['compra']['id_compra']; ?></td>
          <td><a href="<?php echo URL; ?>empleados/view/<?php echo $data['compra']['id_empleado']; ?>"><?php echo $data['compra']['e_nombre']." ".$data['compra']['e_paterno']." ".$data['compra']['e_materno'] ?></a></td>
          <td><a href="<?php echo URL; ?>proveedores/view/<?php echo $data['compra']['id_proveedor']; ?>"><?php echo $data['compra']['p_nombre']; ?></td>
          <td><?php echo $data['compra']['fecha']; ?></td>
          <td>$ <?php echo $data['compra']['importe']; ?></td>
          <td>$ <?php echo $data['compra']['iva']; ?></td>
        </tbody>
     </table>
   </div>
 </div>

 	<div class="panel panel-primary">
 	  <div class="panel-heading">
 	    <center><h3 class="panel-title">Articulos comprados a un Proveedor</h3></center>
 	  </div>
 	  <div class="panel-body">
 	    <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>No.</th>
            <th>Articulo</th>
            <th>Precio</th>
          </tr>
        </thead>
          <tbody>
            <?php
              while ($row = mysqli_fetch_array($data['comprasArticulos'])) { ?>
              <tr>
                <td><?php echo $row['id_compraArticulo']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td>$ <?php echo $row['precio_compra']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
       </table>
     </div>
   </div>
 </div>
