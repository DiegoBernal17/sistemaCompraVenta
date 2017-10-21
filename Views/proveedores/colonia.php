<div class="box-principal">
<?php
if(!empty($data['id'])) { ?>
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
              <th>Dirección</th>
              <th>Telefono</th>
            </tr>
          </thead>
            <tbody>
              <?php
                while ($row = mysqli_fetch_array($data['proveedores'])) { ?>
                <tr>
                  <td><?php echo $row['id_proveedor']; ?></td>
                  <td><?php echo $row['nombre']; ?></td>
                  <td><?php echo $row['id_direccion']; ?></td>
                  <td><?php echo $row['telefono']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
         </table>
       </div>
     </div>
<?php } else { ?>
  <h3 class="titulo">Realizar búsqueda por estado<hr></h3>
  	<div class="panel panel-success psmall">
  	  <div class="panel-body">
  	  	<div class="row">
  	  		<div class="col-xs-1"></div>
  	  		<div class="col-sm-10">
  	  		   <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
               <select id="pais" name="pais" class="form-control" required onclick="showStates();">
                 <?php while($row = mysqli_fetch_array($data['paises'])) {
                    echo '<option value="'.$row['id_pais'].'">'.$row['nombre'].'</option>';
                  }
                 ?>
               </select>
               <select id="estado" name="estado" class="form-control" style="display:none" required onclick="showCities();">
                   <option value="">Estado</option>
               </select>
               <select id="ciudad" name="ciudad" class="form-control" style="display: none" required onclick="showColonies();">
                   <option value="">Ciudad</option>
               </select>
               <select name="procedencia" class="form-control" style="width: 42%; display: inline-block">
                 <option value="procedencia">Procedencia</option>
                 <option value="noprocedencia">No Procedencia</option>
               </select>
               <select id="colonia" name="colonia" class="form-control" style="display: none" required onclick="showNumber();">
                   <option value="">Colonia</option>
               </select>
               <hr>
               <button type="submit" class="btn btn-success">Buscar</button>
  				   </form>
  	  		</div>
  	  		<div class="col-xs-1"></div>
  	  	</div>
  	 </div>
  </div>
<?php } ?>
</div>
