$(document).ready(function () {});

function reportear() {

  var inventario = document.getElementById("inventario").value;
  var existencia = document.getElementById("existencia").value;

  $.ajax({
    type: "POST",
    url: "./ajax/ver_reporte.php",
    data: "inventario=" + inventario + "&existencia=" + existencia,
    beforeSend: function (objeto) {
    //   $("#resultados").html("Mensaje: Cargando...");
	  $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
    },
    success: function (datos) {
      $("#resultados").html(datos);
	  $('#loader').html('');
    },
  });
}

function eliminar(id) {
  var oc = document.getElementById("oc").value;

  $.ajax({
    type: "GET",
    url: "./ajax/agregar_facturacion.php",

    data: "id=" + id + "&oc=" + oc,
    beforeSend: function (objeto) {
      $("#resultados").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      $("#resultados").html(datos);
    },
  });
}

$("#datos_factura").submit(function () {
  var id_cliente = $("#id_cliente").val();
  var id_vendedor = $("#id_vendedor").val();
  var condiciones = $("#condiciones").val();

  if (id_cliente == "") {
    alert("Debes seleccionar un cliente");
    $("#nombre_cliente").focus();
    return false;
  }
  VentanaCentrada(
    "./pdf/documentos/factura_pdf.php?id_cliente=" +
      id_cliente +
      "&id_vendedor=" +
      id_vendedor +
      "&condiciones=" +
      condiciones,
    "Factura",
    "",
    "1024",
    "768",
    "true"
  );
});

$("#guardar_cliente").submit(function (event) {
  $("#guardar_datos").attr("disabled", true);

  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/nuevo_cliente.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados_ajax").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      $("#resultados_ajax").html(datos);
      $("#guardar_datos").attr("disabled", false);
      load(1);
    },
  });
  event.preventDefault();
});

$("#guardar_producto").submit(function (event) {
  $("#guardar_datos").attr("disabled", true);

  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/nuevo_producto.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados_ajax_productos").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      $("#resultados_ajax_productos").html(datos);
      $("#guardar_datos").attr("disabled", false);
      load(1);
    },
  });
  event.preventDefault();
});
