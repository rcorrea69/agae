<?php

$desde = $_POST["desde"];
$hasta = $_POST["hasta"];


require_once "../db/conexion.php";
require_once "../include/funciones.php";


$sql = "SELECT ru.id_rubro,ru.ru_nombre,(SELECT SUM(`subtotal`)
FROM vista_ventasxrubros WHERE `vta_fecha` >='" . $desde . "' AND `vta_fecha`<='" . $hasta . "' AND `art_rubro`=ru.id_rubro) as total 
FROM rubros ru";


$res = mysqli_query($link, $sql);
$row_cnt = mysqli_num_rows($res);

?>
<br>
<h4 style="text-align: center;">Ventas por Rubro desde <?php echo formato_fecha_dd_mm_Y($desde) ; ?> a  <?php echo formato_fecha_dd_mm_Y($hasta); ?></h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id Rubro</th>
            <th scope="col">Rubro</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $total=0;
        while ($row = mysqli_fetch_array($res)) {
            $total=$total + $row['total'];
        ?>
            <tr>
                <th scope="row"><?php echo  $row['id_rubro']; ?></th>
                <td><?php echo $row['ru_nombre']; ?></td>
                <td style="text-align: right;"><?php echo '$ ' . number_format($row['total'], 2, ',', '.'); ?></td>
                
            </tr>

        <?php
        };


        ?>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td style="text-align: right;"><?php echo ' TOTAL ...'. '$ ' . number_format($total, 2, ',', '.'); ?></td>
                
            </tr>

    </tbody>
</table>


<?php


//mysqli_close($link);

?>