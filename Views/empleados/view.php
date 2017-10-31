<div class="box-principal">
<h3 class="titulo"><hr></h3>
	<div class="panel panel-<?php if($data['genero'] == 'M') echo 'primary'; else echo 'info'; ?> psmall">
	  <div class="panel-heading">
      <div class="panel-title">
      </div>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-xs-1"></div>
	  		<div class="col-sm-10">
          <div class="well well-sm">
				        <b>Nombre:</b>  <?php echo $data['nombre']; ?>
          </div>
          <div class="well well-sm">
            <b>Apellido paterno:</b>  <?php echo $data['paterno']; ?>
          </div>
          <div class="well well-sm">
            <b>Apellido materno:</b> <?php echo $data['materno']; ?>
          </div>
          <div class="well well-sm">
            <b>Dirección:</b><br>
              Calle <?php echo $data['calle']." #".$data['numero']." Col. ".$data['colonia_nombre']; ?><br>
              <?php echo $data['ciudad_nombre'].", ".$data['estado_nombre'].", ".$data['pais_nombre'] ?>
          </div>
          <div class="well well-sm">
            <b>Teléfono:</b> <?php echo $data['telefono']; ?>
          </div>
        </div>
	  		<div class="col-xs-1"></div>
	  	</div>
	  </div>
	</div>
</div>
