<div class="box-principal">
<h3 class="titulo">Editar Articulo<hr></h3>
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
				      <input class="form-control" name="nombre" type="text" value="<?php echo $data['nombre']; ?>">
              Precio de venta:
              <input class="form-control" name="precio" type="text" value="<?php echo $data['precio_venta'] ?>">
            </div>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Guardar</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-xs-1"></div>
	  	</div>
	  </div>
	</div>
</div>
