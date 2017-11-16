<div class="box-principal">
<h3 class="titulo">Agregar nuevo Articulo<hr></h3>
	<div class="panel panel-success psmall">
	  <div class="panel-heading">
	    <h3 class="panel-title"></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-xs-1"></div>
	  		<div class="col-sm-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              Nombre articulo:
				      <input class="form-control" name="nombre" type="text">
              Precio de venta:
              <input class="form-control" name="precio" type="text">
							Proveedor del articulo:
							<select name="proveedor" class="form-control">
								<?php while($row = mysqli_fetch_array($data)) { ?>
								<option value="<?php echo $row['id_proveedor']; ?>"><?php echo $row['nombre']; ?></option>
								<?php } ?>
							</select>
            </div>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Agregar</button>
				       <button type="reset" class="btn btn-warning">Limpiar</button>
				    </div><br>
						<p><b>Nota:</b> Al agregar un articulo nuevo no se mostrará en las ventas hasta comprar a proveedores ese articulo</p>
				</form>
	  		</div>
	  		<div class="col-xs-1"></div>
	  	</div>
	  </div>
	</div>
</div>
