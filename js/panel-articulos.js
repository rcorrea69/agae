$(document).ready(function () {
    var id, opcion;
    opcion = 4;

    tablaArticulos = $("#tablaArticulos").DataTable({
        ajax: {
        url: "./ajax/abmArticulos.php",
        method: "POST", //usamos el metodo POST
        data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
        dataSrc: "",
        },
        columns: [

        { data: "id_abogado" },
        { data: "apellidos" },
        { data: "nombres" },
        { data: "dni" },
        { data: "T" },
        { data: "F" },
        { data: "celular" },
        { data: "referente" },
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
        // var articulo = $.trim($("#articulo").val());
        // var nombre = $.trim($("#nombre").val());
        // var rubro= $.trim($("rubro").val());
        // var subrubro = $.trim($("#subrubro").val());
        // var precio = $.trim($("#precio").val());

        var dni=$.trim($("#dni").val());
        var apellido=$.trim($("#apellidos").val());
        var nombre=$.trim($("#nombres").val());
        var t=$.trim($("#t").val());
        var f=$.trim($("#f").val());
        var celular=$.trim($("#celular").val());
        var referente=$.trim($("#referente").val());

        console.log(articulo);
        console.log(opcion);
        console.log(id);
        $.ajax({
        url: "./ajax/AbmArticulos.php",
        type: "POST",
        datatype: "json",
        data: { articulo: articulo, opcion: opcion },
        success: function (data) {
            tablaArticulos.ajax.reload(null, false);
            Swal.fire({
            icon: "success",
            title: "Correcto...",
            text: "Se dió de alta un Nuevo Registro",
            });
        },
        });
        $("#modalCRUD").modal("hide");
    });

  //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function () {
        opcion = 1; //alta
        id = null;
        $("#formArticulos").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Alta de Registro de Abogados");
        $("#modalCRUD").modal("show");
    });

  //Editar
    $(document).on("click", ".btnEditar", function () {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
        apellido = fila.find("td:eq(1)").text();
        nombre = fila.find("td:eq(2)").text();
        dni = fila.find("td:eq(3)").text();
        t = fila.find("td:eq(4)").text();
        f = fila.find("td:eq(5)").text();
        celular = fila.find("td:eq(6)").text();
        referente = fila.find("td:eq(7)").text();

        $("#dni").val(dni);
        $("#nombres").val(nombre);
        $("#apellidos").val(apellido);
        $("#dni").val(dni);
        $("#t").val(t);
        $("#f").val(f);
        $("#celular").val(celular);
        $("#referente").val(referente);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Registro de Abogado");
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
    function cboRubros(){
        $.ajax({
            type: "POST",
            url: "./ajax/cboRubros.php",
            success: function (response) {
                $('#rubro').html(response);
                
            }
        });
    };

    cboRubros();

    function cboSubrubros(rubro){
        var ru = rubro;
        console.log(ru);
        $.ajax({
            type: "POST",
            url: "./ajax/cboSubrubros.php",
            data: {ru:ru},
            success: function (response) {
                $('#subrubro').html(response);
            }
        });

    };

    $('#rubro').change(function (e) { 
        e.preventDefault();
        var rubro = $('#rubro').val();
        console.log(rubro);
        cboSubrubros(rubro);
        
    });

});
