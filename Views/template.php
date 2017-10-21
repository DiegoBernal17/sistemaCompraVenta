<?php namespace Views;

  $template = new Template();
  class Template {
    public function __construct() {
?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Punto de venta</title>
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/general.css">
    <link rel="icon" type="image/png" href="<?php echo URL;?>Views/template/favicons/favicon-16x16.png">
	</head>
	<body>
    <?php if(LOGGED) { ?>
		<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
		        <span class="sr-only"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Punto de venta</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		      <ul class="nav navbar-nav">
		        <li><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ventas <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo URL; ?>ventas/selectClient">Nueva venta</a></li>
                <li><a href="<?php echo URL; ?>ventas/">Ver todas</a></li>
                <li><a href="<?php echo URL; ?>ventas/periodo">Ver por periodo</a></li>
                <li><a href="<?php echo URL; ?>ventas/cliente/">Compras de un cliente</a></li>
		          </ul>
		        </li>
            <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Compras <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>compras/selectProvider">Nueva Compra</a></li>
		            <li><a href="<?php echo URL; ?>compras/">Ver Todas</a></li>
                <li><a href="<?php echo URL; ?>proveedores/compras">De un proveedor</a></li>
		          </ul>
		        </li>
            <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Articulos <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>articulos/add">Agregar articulo</a></li>
		            <li><a href="<?php echo URL; ?>articulos/">Ver articulos</a></li>
		          </ul>
		        </li>
            <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Proveedores <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>proveedores/add">Agregar proveedor</a></li>
		            <li><a href="<?php echo URL; ?>proveedores/">Ver proveedores</a></li>
                <li><a href="<?php echo URL; ?>proveedores/compras">Ver compras</a></li>
                <li><a href="<?php echo URL; ?>proveedores/search">Buscar</a></li>
		          </ul>
		        </li>
            <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clientes <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>clientes/add">Registrar cliente</a></li>
		            <li><a href="<?php echo URL; ?>clientes/">Ver clientes</a></li>
                <li><a href="<?php echo URL; ?>ventas/cliente/">Ventas cliente</a></li>
		          </ul>
		        </li>
            <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Empleados <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>empleados/">Ver empleados</a></li>
                <li><a href="<?php echo URL; ?>empleados/ventas">Ventas realizadas</a></li>
		          </ul>
		        </li>
            <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo USERNAME; ?></a>
              <ul class="dropdown-menu" role="menu" style="background-color: #d5e0ff">
  		            <li><a href="<?php echo URL; ?>index/out">Salir</a></li>
              </ul>
            </li>
		    </div>
		  </div>
		</nav>
<?php
      }
    }

		public function __destruct(){
?>
	<footer class="navbar-fixed-bottom">
		Todos los derechos reservados &copy 2017 <br>
		Diego Bernal | <b>Interboard</b>
	</footer>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="<?php echo URL; ?>Views/template/js/bootstrap.js"></script>
  <script src="<?php echo URL; ?>Views/template/js/jquery-3.2.1.js"></script>
  <script src="<?php echo URL; ?>Views/template/js/general.js"></script>
	</body>
	</html>

<?php
    }
  }
?>
