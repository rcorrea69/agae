$(document).ready(function () {
  // load(1);
});

function agrega(id) {
  var oc = document.getElementById("oc").value;

  var cantidad = document.getElementById("cantidad_" + id).value;
  var renglon = document.getElementById("renglon_" + id).value;
  var precio = document.getElementById("precio_" + id).value;
  var remito = document.getElementById("nro-doc").value;
  var cantmax = document.getElementById("cantmax_" + id).value;

  console.log("cantidad ingresada " + cantidad);
  console.log("cantidad maxima para ingresar " + cantmax);
  console.log(
    "la suma de cant ingresada + cantidad maxima es :" + (cantidad + cantmax)
  );
  var cantidadok = 0;
  var cantidadmax = 0;
  var cantidadok = parseInt(cantidad, 10);
  var cantidadmax = parseInt(cantmax, 10);

  console.log("la suma arreglado es :" + (cantidadok + cantidadmax));

	//if (parseInt(cantidad) > parceInt(cantmax))
	if (cantidadok > cantidadmax) {
		alert("No Se puede ingresar mas cantidad que lo solicitado en la OC ");

		return false;
	}

	if (remito == "") {
		alert("Debe Ingresar Nro de Remito o Factura");
		document.getElementById.nro-doc.focus();
		return false;
	}

	//Inicia validacion
	if (isNaN(cantidad)) {
		alert("Esto no es un numero");
		document.getElementById("cantidad_" + id).focus();
		return false;
	}

  //Fin validacion

	$.ajax({
		type: "POST",
		url: "./ajax/agregar_remito.php",
		data:"id=" +id +"&cantidad=" +cantidad +"&renglon=" +renglon +"&oc=" +oc +"&precio=" +precio,
		beforeSend: function (objeto) {
		$("#resultados").html("Mensaje: Cargando...");
		},
		success: function (datos) {
		$("#resultados").html(datos);
		},
	});
}

function eliminar(id) {
  var oc = document.getElementById("oc").value;

  $.ajax({
    type: "GET",
    url: "./ajax/agregar_remito.php",

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

function ocultar(renglon) {
  document.getElementById(renglon).style.display = "none";
}
