<?php

require_once "../db/conexion.php";

$rubro = $_POST["ru"];


$sql="SELECT id_subrubro,sub_nombre FROM subrubros WHERE id_rubro=$rubro";
$res = mysqli_query($link, $sql);

        $template="<option selected value=0>Seleccione Subrubro</option>";
        while ($row = mysqli_fetch_array($res)) {
            $template.="<option value=$row[id_subrubro]>$row[sub_nombre]</option>";
        };
echo $template;

?>