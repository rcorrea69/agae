<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once('db/conexion.php'); ?>
<?php require_once('include/funciones.php'); ?>
<div class="container">

    <div class="card card-info">
        <!-- <div class="card-header">
            <h4>Reportes</h4>
        </div> -->
        <div class="card-body">
            <h5 class="card-title">Consulta de Compras y Gastos<div class="float-right">
                    <h4><strong><?php echo hoy(); ?></strong></h4>
                </div>
                <br>
                <br>


                <!-- <div class="form-group "> -->
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="desde" class="text-info">Desde:</label>
                        <input type="date" id="desde" name="desde" class="form-control" value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="hasta" class="text-info">Hasta:</label>
                        <input type="date" id="hasta" name="hasta" class="form-control" value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <br>
                        <button class="btn btn-primary col-12 mt-2" id="consultar" name="consultar" >Consultar</button>
                    </div>

                </div>
                <div id="loader" class='col-md-12' style="margin-top:5px"></div>

                <!-- Carga los datos ajax -->
        </div>
        <!--div card body-->

    </div>

</div>
<!-- Fin del contenido Principal -->
<div class="container">
    <div id="resultados">
    </div>
</div>

<?php require_once("include/parte_inferior.php"); ?>
<!-- <script type="text/javascript" src="js/nuevo_reporte.js"></script> -->
<script>
    $(document).ready(function() {
     
        $('#consultar').click(function (e) { 
            e.preventDefault();
            var desde =$('#desde').val();
            var hasta =$('#hasta').val();
            // $('#loader').html('<img src="img/ajax-loader.gif"> Cargando...')


            $.ajax({
                type: "POST",
                url: "ajax/gastosxrubro.php",
                data: {desde:desde,hasta:hasta},
                beforeSend: function(objeto) {
                    //   $("#resultados").html("Mensaje: Cargando...");
                    $('#loader').html('<img src="img/ajax-loader.gif"> Cargando...');
                },
                success: function(datos) {
                    $("#resultados").html(datos);
                    $('#loader').html('');
                },
            });
            
        });

    });
</script>