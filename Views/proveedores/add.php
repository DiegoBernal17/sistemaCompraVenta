<div class="box-principal">
<h3 class="titulo">Registrar nuevo proveedor<hr></h3>
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
				       <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
				       <input class="form-control" name="telefono" placeholder="Teléfono" type="number">
            </div>
            <div class="form-group">
				    		<label class="control-label">Dirección:</label>
								<select id="pais" name="pais" class="form-control" required onclick="showStates();">
	                  <option value="">País</option>
										<?php while($row = mysqli_fetch_array($data)) {
											 echo '<option value="'.$row['id_pais'].'">'.$row['nombre'].'</option>';
										} ?>
	              </select>
								<select id="estado" name="estado" class="form-control" style="display: none" required onclick="showCities();">
	                  <option value="">Estado</option>
	              </select>
								<select id="ciudad" name="ciudad" class="form-control" style="display: none" required onclick="showColonies();">
	                  <option value="">Ciudad</option>
	              </select>
								<select id="colonia" name="colonia" class="form-control" style="display: none" required onclick="showNumber();">
	                  <option value="">Colonia</option>
	              </select>
								<input id="calle" class="form-control" name="calle" type="text" placeholder="Calle" style="display: none" required>
                <input id="number" class="form-control" name="numero" type="text" placeholder="Numero" style="display: none" required>
								<input id="number2" class="form-control" name="interior" type="text" placeholder="Interior" style="display: none">
				    </div>

				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Registrar</button>
				       <button type="reset" class="btn btn-warning" onclick="clearDir();">Limpiar</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-xs-1"></div>
	  	</div>
	  </div>
	</div>
</div>
