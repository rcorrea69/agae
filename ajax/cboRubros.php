<?php

require_once "../db/conexion.php";


$sql="SELECT id_rubro,ru_nombre FROM rubros";
$res = mysqli_query($link, $sql);

        $template="<option selected value=0>Seleccione Rubro</option>";
        while ($row = mysqli_fetch_array($res)) {
            $template.="<option value=$row[id_rubro]>$row[ru_nombre]</option>";
        };
echo $template;

?>