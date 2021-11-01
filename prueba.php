<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->

<div class="container">
    <?php 
    
    $arreglo='[{
        "codigo": 2,
        "descripcion": "DULCE DE ZAPALLO 800 G",
        "importe": 300,
        "cantidad": 7
    }, {
        "codigo": 5,
        "descripcion": "MERMELADA NARANJA 1/2 KG",
        "importe": 200,
        "cantidad": 1
    }]';
    $arreglo='[{"codigo":1,"descripcion":"DULCE DE LECHE 1/2 KG Peña","importe":250,"cantidad":1},{"codigo":2,"descripcion":"DULCE DE ZAPALLO 800 G","importe":300,"cantidad":1},{"codigo":41,"descripcion":"PLANTAS","importe":200,"cantidad":3}]';
    // var_dump($arreglo);

    $MiArreglo = json_decode($arreglo,true);
    
    print_r($MiArreglo);
    echo "<br>";
    // echo $MiArreglo[0]['descripcion'];

    // echo $MiArreglo['0'].['descripcion'];
    echo "<br>";
    foreach($MiArreglo as $key => $val) {
        // print "$key = $val <br>";
        $codigo = $MiArreglo[$key]['codigo'];
        $descripcion = $MiArreglo[$key]['descripcion'];
        $importe = $MiArreglo[$key]['importe'];
        $cantidad = $MiArreglo[$key]['cantidad'];
        echo $codigo." ".$descripcion . " ". $importe." ".$cantidad." ". ($importe*$cantidad)  ;
        echo "<br>";
    }

    ?>

</div>
<!-- Fin del contenido Principal -->

<?php require_once("include/parte_inferior.php"); ?>