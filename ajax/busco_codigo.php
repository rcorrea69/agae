<?php

$codigo = $_POST["codigo"];


require_once "../db/conexion.php";

$sql1="SELECT id_articulo,art_nombre, art_precio
            FROM articulos 
            WHERE id_articulo=$codigo";

$res = mysqli_query($link, $sql1);

if(!$res){
    $row_cnt = mysqli_num_rows($result);

    echo ('no se que hacer '+$row_cnt);
}
else {

    $json=array();

    while ($row=mysqli_fetch_array($res)) {

                $json[]=array(
                    'importe'=> $row['art_precio'],
                    'descripcion'=> $row['art_nombre']
                    
                    
                );    
        # code...
    };

     $jsoncadena=json_encode($json);
            echo $jsoncadena;    

}



//mysqli_close($link);

?>