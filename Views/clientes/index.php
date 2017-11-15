<div class="box-principal">
<h3 class="titulo">Clientes<hr></h3>
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
            <th>telefono</th>
            <th>direccion</th>
            <th></th>
          </tr>
        </thead>
          <tbody>
            <?php
              while ($row = mysqli_fetch_array($data)) { ?>
              <tr<?php if($row['genero'] == 'F') { echo ' class="info"'; } ?>>
                <td><?php echo $row['id_cliente']; ?></td>
                <td><?php echo $row['nombre']." ".$row['paterno']." ".$row['materno']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td>
                  Calle <?php echo $row['calle']." #".$row['numero']." Col. ".$row['colonia_nombre']; ?><br>
                  <?php echo $row['ciudad_nombre'].", ".$row['estado_nombre'].", ".$row['pais_nombre'] ?>
                </td>
                <td>
                  <a class="btn btn-success btn-sm" href="<?php echo URL; ?>clientes/view/<?php echo $row['id_cliente']; ?>">Ver</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
       </table>
     </div>
   </div>
 </div>
