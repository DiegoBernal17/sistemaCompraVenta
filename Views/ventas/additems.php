<?php
$id = explode("/",  $_SERVER["REQUEST_URI"]);
define('ARTICLES_RM',true); ?>

<div class="box-principal">
<h3 class="titulo">Agrega articulos<hr></h3>
	<div class="panel panel-success psmall">
	  <div class="panel-heading" style="text-align: right">
	    <h4 class="panel-title"><b>Fecha:</b> <?php echo date("d-m-Y G:i"); ?></h4>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-xs-1"></div>
	  		<div class="col-sm-10">
	  		   <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						 <div class="form-group">
							 <div style="text-align: right; margin-right: 38px">Disponibles</div>
							 <select name="allItems" class="form-control" id="allItems" style="width: 70%; display: inline-block;">
									 <?php
									  while($row = mysqli_fetch_array($data)) { ?>
										 <option id="it<?php echo $row['id_articulo']; ?>" value="<?php echo $row['id_articulo']; ?>" onclick="updateItem()"><?php echo $row['nombre']." $".$row['precio_venta']; ?></option>
										 <?php } ?>
								</select>
								<a id="countItem" class="btn btn-default disabled">?</a>
								<a class="btn btn-success" id="addItem" onclick="addItem()">+</a>
							</div>
						 <hr>
             Articulos en espera de compra:
             <select id="myItems" name="myItems" size="1" style="width: 100%; outline: 0; box-shadow: none; max-height: 380px;">
              </select>
							<input type="hidden" name="itemsTotal" value="0" id="itemsTotal">
              <hr>
   				     <div class="form-group">
   				    	 <a class="btn btn-success" id="startSale" onclick="">Realizar venta</a>
                 <a class="btn btn-warning btn-sm" onclick="location.reload();">Limpiar</a>
   				     </div>
				   </form>
	  		</div>
	  		<div class="col-xs-1"></div>
	  	</div>
	  </div>
	</div>
</div>

<div class="modal" id="confirmSale" style="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="hiddeConfirmSaleDialog();">&times;</button>
        <h4 class="modal-title">Confirmar venta</h4>
      </div>
      <div class="modal-body">
				<form action="" method="POST" style="font-size: 22px">
					<b>Articulos totales:</b> <u id="itemsTotalSale">10</u><br>
					<b>Importe:</b> $<u id="amount">0</u><br>
					<b>Iva:</b> $<u id="iva">10</u><br>
					<b>Total:</b> $<u id="total">10</u><br>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="addSale();">Confirmar venta</button>
      </div>
    </div>
  </div>
</div>
