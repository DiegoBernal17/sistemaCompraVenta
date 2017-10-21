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
          <td><?php echo $data['venta']['id_venta']; ?></td>
          <td><a href="<?php echo URL; ?>empleados/view/<?php echo $data['venta']['id_empleado']; ?>"><?php echo $data['venta']['e_nombre']." ".$data['venta']['e_paterno']." ".$data['venta']['e_materno'] ?></a></td>
          <td><a href="<?php echo URL; ?>clientes/view/<?php echo $data['venta']['id_cliente']; ?>"><?php echo $data['venta']['c_nombre']." ".$data['venta']['c_paterno']." ".$data['venta']['c_materno'] ?></td>
          <td><?php echo $data['venta']['fecha']; ?></td>
          <td>$ <?php echo $data['venta']['importe']; ?></td>
          <td>$ <?php echo $data['venta']['iva']; ?></td>
        </tbody>
     </table>
   </div>
 </div>

 	<div class="panel panel-primary">
 	  <div class="panel-heading">
 	    <center><h3 class="panel-title">Articulos comprados en la venta</h3></center>
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
              while ($row = mysqli_fetch_array($data['ventasArticulos'])) { ?>
              <tr>
                <td><?php echo $row['id_ventaArticulo']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td>$ <?php echo $row['precio_venta']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
       </table>
     </div>
   </div>
 </div>
