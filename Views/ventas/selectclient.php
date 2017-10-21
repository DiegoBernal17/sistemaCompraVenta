<div class="box-principal">
<h3 class="titulo">Selecciona el cliente<hr></h3>
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
               Cliente:
               <select name="cliente" class="form-control">
                   <?php while($row = mysqli_fetch_array($data)) { ?>
                   <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['nombre']." ".$row['paterno']." ".$row['materno']; ?></option>
                   <?php } ?>
               </select>
             </div>

 				    <div class="form-group">
 				    	 <button type="submit" class="btn btn-success">Comenzar venta</button>
               <a href="<?php echo URL; ?>clientes/add" class="btn btn-warning btn-sm">Registrar cliente</a>
 				    </div>
				   </form>
	  		</div>
	  		<div class="col-xs-1"></div>
	  	</div>
	  </div>
	</div>
</div>
