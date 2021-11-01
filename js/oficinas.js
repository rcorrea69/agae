$(document).ready(function () {
    var id, opcion;
    opcion = 4;

    tablaOficinas = $("#tablaOficinas").DataTable({
        ajax: {
        url: "./ajax/AbmOficinas.php",
        method: "POST", //usamos el metodo POST
        data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
        dataSrc: "",
        },
        columns: [
        { data: "id_oficina" },
        { data: "ofi_nombre" },
        {
            defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='far fa-edit '></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='far fa-trash-alt '></i></button></div></div>",
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

    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $("#formArticulos").submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        var oficina = $.trim($("#oficinaNombre").val());
        // first_name = $.trim($('#first_name').val());
        // last_name = $.trim($('#last_name').val());
        // gender = $.trim($('#gender').val());
        // password = $.trim($('#password').val());
        // status = $.trim($('#status').val());
        console.log(oficina);
        console.log(opcion);
        console.log(id);
        $.ajax({
        url: "./ajax/AbmOficinas.php",
        type: "POST",
        datatype: "json",
        data: { oficina: oficina, opcion: opcion },
        success: function (data) {
            tablaOficinas.ajax.reload(null, false);
            Swal.fire({
            icon: "success",
            title: "Correcto...",
            text: "Se dió de alta una Nueva dependencia",
            });
        },
        });
        $("#modalCRUD").modal("hide");
    });

  //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function () {
        opcion = 1; //alta
        id = null;
        $("#formOficinas").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Alta de Dependencia");
        $("#modalCRUD").modal("show");
    });

  //Editar
    $(document).on("click", ".btnEditar", function () {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
        oficina = fila.find("td:eq(1)").text();

        $("#oficinaNombre").val(oficina);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Dependencia");
        $("#modalCRUD").modal("show");

    });

  //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find("td:eq(0)").text());
        opcion = 3; //eliminar

        Swal.fire({
        icon: "question",
        title: "Está seguro que desea Eliminar el registro " + id + " ?",
        showCancelButton: true,
        confirmButtonText: `Eliminar`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */

        if (result.isConfirmed) {
            $.ajax({
            url: "./ajax/AbmOficinas.php",
            type: "POST",
            datatype: "json",
            data: { opcion: opcion, id: id },
            success: function () {
                tablaOficinas.row(fila.parents("tr")).remove().draw();
            },
            });
            Swal.fire("Registro Borrado!", "", "success");
        }
        });
    });
});
