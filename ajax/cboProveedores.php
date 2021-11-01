<?php

require_once "../db/conexion.php";


$sql="SELECT id_persona,pe_apellido,pe_nombre FROM proveedores";
$res = mysqli_query($link, $sql);

        $template="<option selected value=0>Seleccione Proveedor</option>";
        while ($row = mysqli_fetch_array($res)) {
            $template.="<option value=$row[id_persona]>$row[pe_apellido]".' '."$row[pe_nombre]</option>";
        };
echo $template;

?>
