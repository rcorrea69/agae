$(document).ready(function () {


    $("#grabar").click(function (e) {
        e.preventDefault();
        var fecha = $("#fecha").val();
        var rubro = parseInt($("#rubro").val());
        var descripcion = $("#descripcion").val();
        var importe = parseFloat($("#importe").val());
        var tipogasto = parseInt($("#tipogasto").val());
        var proveedor = parseInt($("#proveedor").val());
        var subrubro = parseInt($("#subrubro").val());

        console.log(fecha);
        console.log('Rubro : '+rubro);
        console.log('Descripcion : '+descripcion);
        console.log('Importe : '+importe);
        console.log('Tipo de gasto : '+tipogasto);
        console.log('Proveedor : '+proveedor);

        if (proveedor == 0 && tipogasto == 1) {
            Swal.fire({
            icon: "error",
            title: "Atención...",
            text: "La Compras o Gasto cta-cte. Debe seleccionar un Proveedor Valido!",
            });
        } else {
            alert('entree');
            $.ajax({
                type: "POST",
                url: "./ajax/registraGastos.php",
                data: {rubro: rubro,fecha: fecha,descripcion: descripcion,importe: importe,tipogasto:tipogasto,proveedor:proveedor,subrubro:subrubro},
               
                success: function (response) {
                    alert("Genial ok ................."+response);
                },
            });
        }
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
        cboSubrubros(rubro);
        
    });

    function cboProveedores(){
        $.ajax({
            type: "POST",
            url: "./ajax/cboProveedores.php",
            success: function (response) {
                $('#proveedor').html(response);
                
            }
        });
    };

    cboProveedores();
});
