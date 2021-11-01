$(document).ready(function () {
    var id, opcion;
    opcion = 4;

    tablactacte = $("#tablactacte").DataTable({
        ajax: {
        url: "./ajax/abmClientesCtaCte.php",
        method: "POST", //usamos el metodo POST
        data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
        dataSrc: "",
        },
        columns: [
        { data: "id_cliente" },
        { data: "nombre" },
        { data: "pe_telefono" },
        { data: "saldo" },
        {
            defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-success btn-sm btnEditar'><i class='far fa-eye' title='Ver Detalle de Cta. Cte.'></i></button></div></div>",
        },
        ],
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

    

    //Editar
    $(document).on("click", ".btnEditar", function () {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
        nombre = fila.find("td:eq(1)").text();
        window.location = "cli-ctacte.php?cliente=" + id;
    });


});
