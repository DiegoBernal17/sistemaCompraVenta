<div class="box-principal">
<h3 class="titulo">Articulos<hr></h3>
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
            <th>$$ Venta</th>
            <th>Proveedor</th>
            <th>Disponibles</th>
            <th></th>
          </tr>
        </thead>
          <tbody>
            <?php
              while ($row = mysqli_fetch_array($data)) { ?>
              <tr>
                <td><?php echo $row['id_articulo']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td>$ <?php echo $row['precio_venta']; ?></td>
                <td><a href="<?php echo URL; ?>proveedores/view/<?php echo $row['id_proveedor']; ?>"><?php echo $row['p_nombre']; ?></a></td>
                <td><?php echo $row['disponibles']; ?></td>
                <td><a class="btn btn-warning btn-sm" href="<?php echo URL; ?>articulos/edit/<?php echo $row['id_articulo']; ?>">Editar</a></td>
              </tr>
            <?php } ?>
          </tbody>
       </table>
     </div>
   </div>
 </div>
