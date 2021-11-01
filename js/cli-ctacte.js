$(document).ready(function () {
    
    $('#ctacte').DataTable({
        "aaSorting": [],
        columnDefs:[{
            targets: "_all",
            sortable: false
        }],
        language:{
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                    },
        responsive: true       
        
        

    });

    $('#carga_pago').click(function (e) { 
        // e.preventDefault();
        
        var fecha = $('#fecha').val();
        var importe = parseFloat($('#importe').val()) ;
        var cliente = parseInt($('#cliente').val()) ;
    
        
        console.log(fecha);
        console.log(importe);
        console.log(cliente);
    
        $.ajax({
            type: "POST",
            url: "./ajax/registraPago.php",
            datatype:"json",
            data: {fecha:fecha, importe:importe, cliente:cliente},
            success: function (response) {
                console.log(response);
                var todobien=JSON.parse(response);
                console.log(todobien);
                Swal.fire({
                    icon: 'success',
                    title: 'Ok...',
                    text: 'Se registro Correctamente el pago. Nro de Recibo :'+todobien
                    
                  });
                  setTimeout('location.reload()',1000);	
            }
        });
        // setTimeout('location.reload()',1000);	
        //location.reload();
    //    if(!isNaN(importe)){
           
    
    //    }else{
    //         alert('ERROR NO ES NUMERO');
    //    }
        
    });

    // $('#carga_pago').click(function (e) { 
    //     // e.preventDefault();
        
    //     var fecha = $('#fecha').val();
    //     var importe = parseFloat($('#importe').val()) ;
    //     var cliente = parseInt($('#cliente').val()) ;

        
    //     console.log(fecha);
    //     console.log(importe);
    //     console.log(cliente);
    
    //     $.ajax({
    //         type: "GET",
    //         url: "./ajax/registraPago.php",
    //         datatype:"json",
    //         data: {fecha:fecha, importe:importe, cliente:cliente},
    //         success: function (response) {
    //             var todobien=parseInt(response);
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Ok...',
    //                 text: 'Se registro Correctamente el pago. Nro de Recibo :'+todobien
                    
    //               });
    //         }
    //     });
    //     setTimeout('location.reload()',1000);	
    //     //location.reload();
    // //    if(!isNaN(importe)){
           

    // //    }else{
    // //         alert('ERROR NO ES NUMERO');
    // //    }
        
    // });
   
    //var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    // $("#formRubros").submit(function (e) {
    //     e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    //     var nombre = $.trim($("#nombre").val());
    //     var mensaje = "";
    //         if (id == 1) {
    //             mensaje = "Se dió de alta un Nuevo Rubro";
    //         } else {
    //             mensaje = "Se actualizó Correctamente el Rubro";
    //         }
    //         if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
    //             //alert('El dni esta vacio desde aca');
    //             $("#nombre").focus();
    //             Swal.fire({
    //             icon: "warning",
    //             title: "Atención...",
    //             text: "El Nombre del rubro esta vacia",
    //               //footer: '<a href>Why do I have this issue?</a>'
    //             });
    //             return false;
    //         }
    //     $.ajax({
    //     url: "./ajax/abmSubrubros.php",
    //     type: "POST",
    //     datatype: "json",
    //     data: { nombre: nombre, opcion: opcion, id: id },
    //     success: function (data) {
    //         tablactacte.ajax.reload(null, false);
    //         Swal.fire({
    //         icon: "success",
    //         title: "Correcto...",
    //         text: mensaje,
    //         });
    //     },
    //     });

    //     $("#modalCRUD").modal("hide");
    // });

    //para limpiar los campos antes de dar de Alta una Persona
    // $("#btnNuevo").click(function () {
    //     opcion = 1; //alta
    //     id = null;
    //     $("#formRubros").trigger("reset");
    //     $(".modal-header").css("background-color", "#17a2b8");
    //     $(".modal-header").css("color", "white");
    //     $(".modal-title").text("Alta de Rubro");
    //     $("#modalCRUD").modal("show");
    // });

    //Editar
    // $(document).on("click", ".btnEditar", function () {
    //     opcion = 2; //editar
    //     fila = $(this).closest("tr");
    //     id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
    //     // nombre = fila.find("td:eq(1)").text();



    //     window.location = "cli-ctacte.php?cliente=" + id;


    //     // $(".modal-header").css("background-color", "#007bff");
    //     // $(".modal-header").css("color", "white");
    //     // $(".modal-title").text("Editar Rubro");
    //     // $("#modalCRUD").modal("show");
    // });

    //Borrar
    // $(document).on("click", ".btnBorrar", function () {
    //     fila = $(this);
    //     id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    //     opcion = 3; //eliminar

    //     Swal.fire({
    //     icon: "question",
    //     title: "Está seguro que desea Eliminar el registro " + id + " ?",
    //     showCancelButton: true,
    //     confirmButtonText: `Eliminar`,
    //     }).then((result) => {
    //     /* Read more about isConfirmed, isDenied below */

    //     if (result.isConfirmed) {
    //         $.ajax({
    //         url: "./ajax/AbmOficinas.php",
    //         type: "POST",
    //         datatype: "json",

    //         data: { opcion: opcion, id: id },
    //         success: function () {
    //             tablaOficinas.row(fila.parents("tr")).remove().draw();
    //         },
    //         });
    //         Swal.fire("Registro Borrado!", "", "success");
    //     }
    //     });
    // });
});

// $('#carga_pago').click(function (e) { 
//     // e.preventDefault();
    
//     var fecha = $('#fecha').val();
//     var importe = parseFloat($('#importe').val()) ;
//     var cliente = parseInt($('#cliente').val()) ;

    
//     console.log(fecha);
//     console.log(importe);
//     console.log(cliente);

//     $.ajax({
//         type: "POST",
//         url: "./ajax/registraPago.php",
//         datatype:"json",
//         data: {fecha:fecha, importe:importe, cliente:cliente},
//         success: function (response) {
//             console.log(response);
//             var todobien=JSON.parse(response);
//             console.log(todobien);
//             Swal.fire({
//                 icon: 'success',
//                 title: 'Ok...',
//                 text: 'Se registro Correctamente el pago. Nro de Recibo :'+todobien
                
//               });
//         }
//     });
//     // setTimeout('location.reload()',1000);	
//     //location.reload();
// //    if(!isNaN(importe)){
       

// //    }else{
// //         alert('ERROR NO ES NUMERO');
// //    }
    
// });