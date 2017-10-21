jQuery(document).ready(function(){
    jQuery(".preloader").delay(1000).fadeOut("slow").delay(1000, function(){
      jQuery(this).remove();
    });
});

var addItem = function () {
    if ($("#countItem").text() == '0') {
      var cl = $("#addItem").attr("class");
      $("#addItem").attr("class", cl+" disabled");
    } else {
      var size = parseInt($("#myItems").attr("size"))+1;
      $("#myItems").attr("size", size);
      var itemVal = $("#allItems").val();
      var itemText = $("#it"+itemVal).text();
      $("#myItems").append('<option class="myItem'+(size-2)+'" value="'+itemVal+'">'+itemText+'</option>');
      var itemsTotal = parseInt($("#itemsTotal").val())+1;
      $("#itemsTotal").attr("value", itemsTotal);

      if(size == 2) {
        $("#startSale").attr("onclick","confirmSale();");
      }
    }
};

var amount = 0;
var iva;

var confirmSale = function () {
    var items = $("select#myItems option").length;
    $("#confirmSale").attr("style", "display:block");
    $("#itemsTotalSale").text(items);

    var str,str2;
    amount=0;
    iva=0;
    for(var i=0; i<items; i++) {
        str = $(".myItem"+i).text();
        str2 = str.split("$");
        amount += parseInt(str2[1])
    }
    iva = (amount*.12);
    $("#amount").text(amount);
    $("#iva").text(iva);
    total = amount+parseInt(iva);
    $("#total").text(total);
};

var hiddeConfirmSaleDialog = function() {
    $("#confirmSale").attr("style", "");
};

var addSale = function () {
  $.cliente_id = $("#cid").val();
  $.empleado_id = $("#eid").val();
  var items = [];
  for(var i=0; i<$("select#myItems option").length; i++)
  {
    items.push($(".myItem"+i).val());
  }
  $.articulos = $("myItems").html();
  $.post(url+"functions/venta.php", { id_cliente: $.cliente_id, items: items, id_empleado: $.empleado_id, importe: amount, iva: iva })
    .done(function( data ) {
      $(".modal-title").html('Venta terminada.');
      $(".modal-body").html(data);
      $(".modal-footer").html('<a href="'+url+'" class="btn btn-info">Inicio</a>');
      setTimeout("location.href='"+url+"ventas/selectClient'", 3000);
    });
  }

  var amount=0;
  var iva=0;

  var confirmBuy = function () {
      var items = $("select#myItems option").length;
      $("#confirmBuy").attr("style", "display:block");
      $("#itemsTotalBuy").text(items);

      var str,str2;
      amount=0;
      for(var i=0; i<items; i++) {
          str = $(".myItem"+i).text();
          str2 = str.split("$");
          amount += parseInt(str2[1])
      }
      $("#amount").text(amount);
      total = amount+parseInt(iva);
      $("#total").text(total);
  };

  var purchase = function () {
    $.proveedor_id = $("#pid").val();
    $.empleado_id = $("#eid").val();
    var items = [];
    for(var i=0; i<$("select#myItems option").length; i++)
    {
      items.push($(".myItem"+i).val());
    }
    var prices = [];
    for(var i=0; i<$("select#myItemsPrice option").length; i++)
    {
      prices.push($(".myItemPrice"+i).val());
    }

    $.articulos = $("myItems").html();
    $.post(url+"functions/compra.php", { id_proveedor: $.proveedor_id, items: items, id_empleado: $.empleado_id, importe: amount, iva: iva, precio_compra: prices })
      .done(function( data ) {
        $(".modal-title").html('Compra terminada.');
        $(".modal-body").html(data);
        $(".modal-footer").html('<a href="'+url+'" class="btn btn-info">Inicio</a>');
        setTimeout("location.href='"+url+"compras/selectProvider'", 3000);
      });
    }

var showStates = function() {
  $.pais = $("#pais").val();
  if($.pais != "") {
    $.post(url+"functions/estados.php", { id_pais: $.pais })
      .done(function( data ) {
        $("#estado").html(data);
      });
    $("#estado").attr("style", "");
  } else {
    $("#estado").attr("style", "display: none");
  }
  $("#pais").change(function() {
    $("#ciudad").attr("style", "display: none");
    $("#colonia").attr("style", "display: none");
    $("#calle").attr("style", "display: none");
    $("#number").attr("style", "display: none");
    $("#number2").attr("style", "display: none");
  });
}

var showCities = function() {
  $.pais = $("#pais").val();
  $.estado = $("#estado").val();
  if($("#estado").val() != "") {
    $.post(url+"functions/ciudades.php", { id_pais: $.pais, id_estado: $.estado })
      .done(function( data ) {
        $("#ciudad").html(data);
      });
    $("#ciudad").attr("style", "");
  }
  $("#estado").change(function() {
    $("#colonia").attr("style", "display: none");
    $("#calle").attr("style", "display: none");
    $("#number").attr("style", "display: none");
    $("#number2").attr("style", "display: none");
  });
}

var showColonies = function() {
  $.pais = $("#pais").val();
  $.estado = $("#estado").val();
  $.ciudad = $("#ciudad").val();
  $.calle = $("#calle").val();
  if($("#ciudad").val() != "") {
    $.post(url+"functions/colonias.php", { id_pais: $.pais, id_estado: $.estado, id_ciudad: $.ciudad })
      .done(function( data ) {
        $("#colonia").html(data);
      });
    $("#colonia").attr("style", "");
  }
  $("#colonia").change(function() {
    $("#calle").attr("style", "display: none");
    $("#number").attr("style", "display: none");
    $("#number2").attr("style", "display: none");
  });
}

var showNumber = function() {
    $("#calle").attr("style", "");
    $("#number").attr("style", "");
    $("#number2").attr("style", "");
}

var clearDir = function() {
  $("#estado").attr("style", "display: none");
  $("#ciudad").attr("style", "display: none");
  $("#colonia").attr("style", "display: none");
  $("#calle").attr("style", "display: none");
  $("#number").attr("style", "display: none");
  $("#number2").attr("style", "display: none");
}
