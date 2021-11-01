$(document).ready(function () {
  $("#codigo").mask("999-999999");
 
});

$("#codigo").keypress(function (e) {
  if (e.which == 13) {
    $("#cantidad").focus();
  }
});

$("#tablaArticulos").DataTable({
  processing: true,
  serverSide: true,
  sAjaxSource: "ServerSide/serversideSelecionArticulos.php",
  columnDefs: [
    {
      data: null,
      targets: -1,
      defaultContent:
        "<div class='text-center'>" +
        "<button class='btn btn-outline-dark btn-sm ml-2 btnSeleccionar' title='Seleccionar Artículo'><i class='far fa-plus-square'></i></button>" +
        "</div>",
      //"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
    },
  ],

  //Para cambiar el lenguaje a español
  language: {
    lengthMenu: "Mostrar _MENU_ registros",
    zeroRecords: "No se encontraron resultados",
    info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    infoFiltered: "(filtrado de un total de _MAX_ registros)",
    sSearch: "Buscar:",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    sProcessing: "Procesando...",
  },
});

$(document).on("click", ".btnSeleccionar", function () {
  fila = $(this).closest("tr");
  id = fila.find("td:eq(0)").text();
  $("#codigo").val(id);
  $("#Modal-consulta-articulos").modal("hide");
  $("#codigo").blur();
});

$("#formulario_oc")[0].reset();

$("#frm-generar-pedido").hide();

function fococantidad() {
  $("#cantidad").focus();
  $("#cantidad").select();
  // $("#frm-generar-pedido")[0].reset();
}

$("#codigo").blur(function () {
  var codigo = $("#codigo").val();
  // console.log(codigo);
  if (codigo == "") {
    $("#generar-pedido").trigger("reset");
  } else {
    $.ajax({
      type: "POST",
      url: "ajax/busco_codigo.php",
      data: { codigo: codigo },
      success: function (respuesta) {
        var cod = JSON.parse(respuesta);
        var template = "";
        if (cod != "") {
          $("#descripcion").val(cod[0].descripcion);
          $("#stock").val(cod[0].stock);
          $("#unidad").val(cod[0].unidad);
          $("#cantidad").val(1);
          fococantidad();
        } else {
          $("#frm-generar-pedido")[0].reset();
          $("#codigo").val("");
          $("#codigo").focus();

          Swal.fire({
            icon: "error",
            title: "Atención...",
            text: "El Código de Artículo no existe!",
          });
        }

        // $('#codNombre').html(template);
      }, ////fin del success
    }); /////fin de ajax
  } ////fin del else
});

$("#frm-generar-pedido").submit(function (e) {
  e.preventDefault();
  var oficina = $("#oficinas").val();
  var codigo = $("#codigo").val();
  var cantidad = parseFloat($("#cantidad").val()) ;
  var descripcion = $("#descripcion").val();
  var unidad = $("#unidad").val();
  var stock = parseFloat($("#stock").val()) ;
  
  console.log("el stock es : " + stock);
  console.log("la cantidad es :" + cantidad);
  if (cantidad > stock) {
    $("#cantidad").focus;
    $("#cantidad").select();
    Swal.fire({
      icon: "warning",
      title: "Atención...",
      text: "No hay suficiente stock ..!",
    });

    return false;
  }
  if (descripcion == "") {
    $("#codigo").focus;
    return false;
  }
  $.ajax({
    type: "POST",
    url: "./ajax/agregar_pedido.php",
    data: { oficina, codigo, cantidad, descripcion, unidad },
    beforeSend: function (objeto) {
      $("#resultados").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      fococantidad();
      $("#frm-generar-pedido")[0].reset();
      $("#resultados").html(datos);
      $("#codigo").focus();
    },
  });
});

function agregar(id) {
  var oficina = document.getElementById("oficinas").value;
  var cantidad = document.getElementById("cantidad_" + id).value;

  //Inicia validacion

  if (isNaN(cantidad)) {
    Swal.fire({
      icon: "warning",
      title: "Atención...",
      text: "Esto no es una cantidad valida..!",
    });
    document.getElementById("cantidad_" + id).focus();
    return false;
  }
  if (oficina == "0") {
    $("#oficinas").select(function () {
      this.focus();
    });

    Swal.fire({
      icon: "warning",
      title: "Atención...",
      text: "Debe eligir una oficina para preparar Pedido...!",
    });
    $("#myModalarticulo").modal("toggle");

    return false;
  }

  //Fin validacion

  $.ajax({
    type: "POST",
    url: "./ajax/agregar_pedido.php",
    data: "id=" + id + "&cantidad=" + cantidad + "&oficina=" + oficina,
    beforeSend: function (objeto) {
      $("#resultados").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      $("#frm-generar-pedido")[0].reset();
      fococantidad();
      $("#resultados").html(datos);
    },
  });
}

function eliminar(id) {
  var oficina = document.getElementById("oficinas").value;

  $.ajax({
    type: "GET",
    url: "./ajax/agregar_pedido.php",

    data: "id=" + id + "&oficina=" + oficina,
    beforeSend: function (objeto) {
      $("#resultados").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      $("#resultados").html(datos);

      fococantidad();
    },
  });
}

// $("#datos_factura").submit(function () {
//   var id_cliente = $("#id_cliente").val();
//   var id_vendedor = $("#id_vendedor").val();
//   var condiciones = $("#condiciones").val();

//   if (id_cliente == "") {
//     alert("Debes seleccionar un cliente");
//     $("#nombre_cliente").focus();
//     return false;
//   }
//   VentanaCentrada(
//     "./pdf/documentos/factura_pdf.php?id_cliente=" +
//       id_cliente +
//       "&id_vendedor=" +
//       id_vendedor +
//       "&condiciones=" +
//       condiciones,
//     "Factura",
//     "",
//     "1024",
//     "768",
//     "true"
//   );
// });

// $("#guardar_cliente").submit(function (event) {
//   $("#guardar_datos").attr("disabled", true);

//   var parametros = $(this).serialize();
//   $.ajax({
//     type: "POST",
//     url: "ajax/nuevo_cliente.php",
//     data: parametros,
//     beforeSend: function (objeto) {
//       $("#resultados_ajax").html("Mensaje: Cargando...");
//     },
//     success: function (datos) {
//       $("#resultados_ajax").html(datos);
//       $("#guardar_datos").attr("disabled", false);
//       load(1);
//     },
//   });
//   event.preventDefault();
// });

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

// $("#formulario_oc").submit(function(e){
// 	e.preventDefault();
// 	alert('y si entra ya se como seguir');

// });

$("#cargar").click(function (e) {
  e.preventDefault();
  var oficina = parseInt($("#oficinas").val(), 10);
  alert("entre a generarPedido") + oficina;
  window.location.href = "procesa-alta-pedidos.php?oficinas=" + oficina;
});

$("#oficinas").change(function (e) {
  e.preventDefault();
  $("#cargarArticulos").show();
  $("#frm-generar-pedido").show();
});
