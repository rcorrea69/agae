<?php
include_once '../db/conexion.php';


$consulta="SELECT  `id_proveedor`, `pe_apellido`, `pe_nombre`, `pe_telefono`, `debe`, `haber`
FROM `vista_proveedorctacte`";


// $consulta="SELECT id_cliente,pe_apellido,pe_nombre,pe_telefono,Debe,Haber
// FROM vista_clientectacte";    
$res_art = mysqli_query($link, $consulta);


$data=array();
    while ($row=mysqli_fetch_array($res_art)) {
                $data[]=array(
                    'id_proveedor'=> $row['id_proveedor'],
                    'nombre'=> $row['pe_apellido']." ".$row['pe_nombre'],
                    'pe_telefono'=> $row['pe_telefono'],
                    'saldo'=> "$ " . number_format(($row['debe']-$row['haber']), 2, ',', '.') 

                );    
    };

    print json_encode($data, JSON_UNESCAPED_UNICODE);    




