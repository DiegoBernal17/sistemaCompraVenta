<div class="box-principal">
<h3 class="titulo">Compras<hr></h3>
 	<div class="panel panel-primary">
 	  <div class="panel-heading">
 	    <h3 class="panel-title"></h3>
 	  </div>
 	  <div class="panel-body">
 	    <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>No.</th>
            <th>Empleado</th>
            <th>Proveedor</th>
            <th>Fecha</th>
            <th>Importe</th>
            <th>Iva</th>
            <th></th>
          </tr>
        </thead>
          <tbody>
            <?php
              while ($row = mysqli_fetch_array($data)) { ?>
              <tr>
                <td><?php echo $row['id_compra']; ?></td>
                <td><a href="<?php echo URL; ?>empleados/view/<?php echo $row['id_empleado']; ?>"><?php echo $row['e_nombre']." ".$row['e_paterno']." ".$row['e_materno'] ?></a></td>
                <td><a href="<?php echo URL; ?>proveedores/view/<?php echo $row['id_proveedor']; ?>"><?php echo $row['p_nombre'] ?></td>
                <td><?php echo $row['fecha']; ?></td>
                <td>$ <?php echo $row['importe']; ?></td>
                <td>$ <?php echo $row['iva']; ?></td>
                <td><a class="btn btn-success btn-sm" href="<?php echo URL; ?>compras/view/<?php echo $row['id_compra']; ?>">Ver</a></td>
              </tr>
            <?php } ?>
          </tbody>
       </table>
     </div>
   </div>
 </div>
