<?php
require_once("include/parte_superior.php");
// require_once("include/funciones.php");
?>
<!-- Inicio del contenido Principal -->
<?php
require_once("db/conexion.php");
require_once("include/funciones.php");

$idProveedor = $_GET['proveedor'];
$hoy=formato_fecha_Y_mm_dd(hoy()); 

$consulta = "SELECT `id_ctacte`, `id_proveedor`, `ctacteDH`, `factura_recibo`, `ctacte_importe`, `ctacte_fecha` 
FROM `proveedores_ctacte` 
WHERE id_proveedor=$idProveedor
ORDER BY ctacte_fecha";

$res_art = mysqli_query($link, $consulta);
     

$sqlcli = "SELECT `id_proveedor`, `pe_apellido`, `pe_nombre`, `pe_telefono`, `debe`, `haber`
FROM `vista_proveedorctacte` 
WHERE  `id_proveedor`=$idProveedor";
$res_cli = mysqli_query($link, $sqlcli);
$cli = mysqli_fetch_array($res_cli);
$nombrecli = $cli['pe_apellido'] . ' ' . $cli['pe_nombre'];
$saldo = $cli['debe'] - $cli['haber'];



?>
<div class="container">
    <h4 class="mt-2 mb-4"> <?php echo 'Proveedor : '. $nombrecli . "    "; ?>
        <span class="float-right"><?php echo  $hoy; ?></span>
    </h4>
    <div class="row">
        <!--mostrar historial-->

        <div class="col-9">
            <!-- Consulta de actividades y pagos anteriores -->
            <div class="card">
                <div class="card-body">
                    <p class="mb-0" class="justify-content-center align-items-center">
                        <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapsePagos" aria-expanded="false" aria-controls="collapsePagos">
                            Registrar Nuevo Pago
                        </button>
                    </p>
                    <div class="collapse" id="collapsePagos">
                        <div class="card border-primary card-body">
                            <form id="frm-pago" name="frm-pago">
                                <div class="form-row">
                                    <input type="hidden" id="cliente" value="<?php echo $idProveedor; ?>"/>
                                    <div class="form-group col-4">
                                        <label for="fecha" class="text-info">Fecha </label>
                                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="importe" class="text-info">Importe</label>
                                        <input type="text" class="form-control" id="importe" name="importe" tabindex="0">
                                    </div>

                                    <div class="form-group col-4 mt-2">
                                        <br>
                                        <button type="button" class="btn btn-primary" id="carga_pago" name="carga_pago">Registrar Pago</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--  fin de card body-->
            </div> <!--  fin de card -->
            <!--  <div  class="row" id="resultados_ajax"></div> -->
        </div>
        <div class="col-3">
            <h2>
                <span class="badge badge-success float-center p-4">Saldo: <?php echo  "$ " . number_format(($saldo), 2, ',', '.'); ?></span>
            </h2>

        </div>
    </div>
    <!--fin mostrar historial-->
    <?php


    ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i> Ficha de Cuenta Corriente
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ctacte" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center text-light bg-gradient-info ">
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Documento</th>
                                    <th>Debe</th>
                                    <th>Haber</th>
                                    <th>Saldo</th>
                                    <!-- <th>Acción</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $saldo = 0;

                                while ($row = mysqli_fetch_array($res_art)) {
                                    $documento = $row['ctacteDH'];
                                    $docNombre = '';
                                    $debe = 0;
                                    $haber = 0;
                                    if ($documento == 'D') {
                                        $docNombre = 'Fectura Nro.. ' . $row['factura_recibo'];
                                        $debe = $row['ctacte_importe'];
                                        $saldo = $saldo + $row['ctacte_importe'];
                                    } else {
                                        $docNombre = 'Recibo Nro.. ' . $row['factura_recibo'];
                                        $haber = $row['ctacte_importe'];
                                        $saldo = $saldo - $row['ctacte_importe'];
                                    };

                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id_ctacte']; ?></th>
                                        <td><?php echo formato_fecha_dd_mm_Y($row['ctacte_fecha']); ?></td>
                                        <td><?php echo $docNombre; ?></td>
                                        <td style="text-align: right;"><?php echo "$ " . number_format(($debe), 2, ',', '.'); ?></td>
                                        <td style="text-align: right;"><?php echo "$ " . number_format(($haber), 2, ',', '.'); ?></td>
                                        <td style="text-align: right;"><?php echo "$ " . number_format(($saldo), 2, ',', '.'); ?></td>
                                    </tr>
                                <?php
                                };
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin del contenido Principal -->

<?php require_once("include/parte_inferior.php"); ?>
<script src="js/cli-ctacte.js"></script>
