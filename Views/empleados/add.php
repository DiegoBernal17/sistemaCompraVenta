<?php if(ADMIN){ ?>
<div class="box-principal">
<h3 class="titulo">Registrar empleado<hr></h3>
	<div class="panel panel-default psmall">
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
				        <input class="form-control" name="paterno" type="text" placeholder="Apellido Paterno" required>
				        <input class="form-control" name="materno" placeholder="Apellido materno" type="text">
				    </div>
            <div class="form-group">
				        <input class="form-control" name="telefono" placeholder="Teléfono" type="number">
              <select name="genero" class="form-control">
                  <option value="">Sexo: </option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
              </select>
            </div>
            <!--
            <div class="form-group">
				      <label class="control-label">Fecha nacimiento</label>
				        <input class="form-control" name="birth_day" type="date" required>
				    </div> -->
            <div class="form-group" style="background-color: #FFEFFF; border: #FFEFF1 solid 2px">
				    		<label class="control-label">Dirección:</label>
								<select id="pais" name="pais" class="form-control" required onclick="showStates();">
	                  <option value="">País</option>
										<?php while($row = mysqli_fetch_array($data)) {
											 echo '<option value="'.$row['id_pais'].'">'.$row['nombre'].'</option>';
										} ?>
	              </select>
								<select id="estado" name="estado" class="form-control" required onclick="showCities();">
	                  <option value="">Estado</option>
	              </select>
								<select id="ciudad" name="ciudad" class="form-control" required onclick="showColonies();">
	                  <option value="">Ciudad</option>
	              </select>
								<select id="colonia" name="colonia" class="form-control" required onclick="showNumber();">
	                  <option value="">Colonia</option>
	              </select>
								<input id="calle" class="form-control" name="calle" type="text" placeholder="Calle" required>
                <input id="number" class="form-control" name="numero" type="text" placeholder="Numero" required>
								<input id="number2" class="form-control" name="interior" type="text" placeholder="Interior (Opcional)">
				    </div>
            <div class="form-group">
              <input class="form-control" name="username" type="text" placeholder="Nombre de usuario" required>
              <input class="form-control" name="password" type="password" placeholder="Contraseña" required>
              <input class="form-control" name="r_password" type="password" placeholder="Repite Contraseña" required>
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
<?php } else { echo "No tienes los permisos necesarios."; } ?>
