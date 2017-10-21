<div class="box-principal">
<h3 class="titulo">Selecciona el proveedor<hr></h3>
	<div class="panel panel-success psmall">
	  <div class="panel-heading">
	    <h3 class="panel-title"><b>Empleado actual:</b> <?php echo USERNAME; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-xs-1"></div>
	  		<div class="col-sm-10">
	  		   <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
             <div class="form-group">
               Proveedor:
               <select name="proveedor" class="form-control">
                   <?php while($row = mysqli_fetch_array($data)) { ?>
                   <option value="<?php echo $row['id_proveedor']; ?>"><?php echo $row['nombre']; ?></option>
                   <?php } ?>
               </select>
             </div>

 				    <div class="form-group">
 				    	 <button type="submit" class="btn btn-success">Comenzar compra</button>
               <a href="<?php echo URL; ?>proveedores/add" class="btn btn-warning btn-sm">Registrar proveedor</a>
 				    </div>
				   </form>
	  		</div>
	  		<div class="col-xs-1"></div>
	  	</div>
	  </div>
	</div>
</div>
