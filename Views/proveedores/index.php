<div class="box-principal">
<h3 class="titulo">Proveedores<hr></h3>
 	<div class="panel panel-primary">
 	  <div class="panel-heading">
 	    <h3 class="panel-title"></h3>
 	  </div>
 	  <div class="panel-body">
 	    <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th></th>
          </tr>
        </thead>
          <tbody>
            <?php
              while ($row = mysqli_fetch_array($data)) { ?>
              <tr>
                <td><?php echo $row['id_proveedor']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td>
                  Calle <?php echo $row['calle']." #".$row['numero']." Col. ".$row['colonia_nombre']; ?><br>
                  <?php echo $row['ciudad_nombre'].", ".$row['estado_nombre'].", ".$row['pais_nombre'] ?>
                </td>
                <th><a class="btn btn-success btn-sm" href="<?php echo URL; ?>proveedores/view/<?php echo $row['id_proveedor']; ?>">Ver</a></th>
              </tr>
            <?php } ?>
          </tbody>
       </table>
     </div>
   </div>
 </div>
