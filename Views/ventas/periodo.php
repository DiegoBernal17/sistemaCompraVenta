<div class="box-principal">
<?php
if(!empty($data['date'])) { ?>
  <h3 class="titulo">Ventas por periodo<hr></h3>
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
              <th>Cliente</th>
              <th>Fecha</th>
              <th>Importe</th>
              <th>Iva</th>
              <th></th>
            </tr>
          </thead>
            <tbody>
              <?php
                while ($row = mysqli_fetch_array($data['ventas'])) { ?>
                <tr>
                  <td><?php echo $row['id_venta']; ?></td>
                  <td><a href="<?php echo URL; ?>empleados/view/<?php echo $row['id_empleado']; ?>"><?php echo $row['e_nombre']." ".$row['e_paterno']." ".$row['e_materno'] ?></a></td>
                  <td><a href="<?php echo URL; ?>clientes/view/<?php echo $row['id_cliente']; ?>"><?php echo $row['c_nombre']." ".$row['c_paterno']." ".$row['c_materno'] ?></td>
                  <td><?php echo $row['fecha']; ?></td>
                  <td>$ <?php echo $row['importe']; ?></td>
                  <td>$ <?php echo $row['iva']; ?></td>
                  <td><a class="btn btn-success btn-sm" href="<?php echo URL; ?>ventas/view/<?php echo $row['id_venta']; ?>">Ver</a></td>
                </tr>
              <?php } ?>
            </tbody>
         </table>
       </div>
     </div>
<?php } else { ?>
  <h3 class="titulo">Selecciona las fechas<hr></h3>
  	<div class="panel panel-success psmall">
  	  <div class="panel-body">
  	  	<div class="row">
  	  		<div class="col-xs-1"></div>
  	  		<div class="col-sm-10">
  	  		   <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
               Buscar entre las fechas:<br>
               <input type="date" name="fecha1" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" required>
               <input type="date" name="fecha2" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" required>
               <hr>
               <button type="submit" class="btn btn-success">Buscar ventas</button>
  				   </form>
  	  		</div>
  	  		<div class="col-xs-1"></div>
  	  	</div>
  	  </div>
  	</div>
<?php } ?>
</div>
