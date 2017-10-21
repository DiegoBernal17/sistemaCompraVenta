<?php namespace Controllers;

  use Models\Venta as Venta;
  use Models\Cliente as Cliente;
  use Models\Articulo as Articulo;

  class ventasController {
    private $venta;
    private $cliente;

    public function __construct() {
      $this->venta = new Venta();
      $this->cliente = new Cliente();
    }

    public function index() {
      return $this->venta->toList();
    }

    public function selectClient() {
      if(empty($_POST)) {
        return $this->cliente->toList();
      } else { ?>
        <script type="text/javascript">
        this.location.href = '<?php echo URL."ventas/addItems/".$_POST['cliente']; ?>';
        </script>
      <?php
      }
    }

    public function addItems($id) {
      echo '<input type="hidden" id="cid" value="'.$id.'">';
      echo '<input type="hidden" id="eid" value="'.ID_EMPLEADO.'">';
      $articulo = new Articulo();
      return $articulo->toList2();
    }

    public function view($id) {
      $this->venta->set("id_venta", $id);
      return $this->venta->view();
    }

    public function cliente($id) {
      if(empty($id)) {
        if($_POST) { ?>
         <script type="text/javascript">
         this.location.href = '<?php echo URL."ventas/cliente/".$_POST['cliente']; ?>';
         </script>
         <?php
        }
        return array("id" => "", "clientes" => $this->cliente->toList());
      } else {
        $this->venta->set("id_cliente", $id);
        return array("id" => $id, "ventas" => $this->venta->viewSales());
      }
    }

    public function periodo($date1, $date2) {
      if(empty($date1)) {
        if($_POST) { ?>
          <script type="text/javascript">
          this.location.href = '<?php echo URL."ventas/periodo/".$_POST['fecha1']."/".$_POST['fecha2']; ?>';
          </script>
        <?php
        }
        return array("date" => "");
      } else {
        $this->venta->set("date1", $date1);
        $this->venta->set("date2", $date2);
        return array("date" => $date1, "ventas" => $this->venta->rangeDate());
      }
    }
  }
