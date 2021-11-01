<?php
include_once '../db/conexion.php';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$t = (isset($_POST['t'])) ? $_POST['t'] : '';
$f = (isset($_POST['f'])) ? $_POST['f'] : '';
$celular = (isset($_POST['celular'])) ? $_POST['celular'] : '';
$referente = (isset($_POST['referente'])) ? $_POST['referente'] : '';


switch($opcion){
    case 1:
        $consulta ="INSERT INTO `padron`(`apellidos`, `nombres`, `dni`, `T`, `F`, `celular`, `referente`) 
        VALUES ('".$apellido."','".$nombre."','".$dni."',$t,$f,'".$celular."','".$referente"')";
        
        $resultado= mysqli_query($link,$consulta);
        
        $consulta="SELECT * FROM oficinas";
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($resultado)) {
                    $data[]=array(
                        'id_oficina'=> $row['id_oficina'],
                        'ofi_nombre'=> $row['ofi_nombre']
                    );    
        };

        break;    
    case 2:        
        
        $consulta = "UPDATE oficinas SET ofi_nombre='$oficina' WHERE id_oficina=$id ";		
        $resultado= mysqli_query($link,$consulta);

        $consulta = "SELECT * FROM oficinas WHERE id_oficina=$id ";    
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($res_cli)) {
                    $data[]=array(
                        'id_oficina'=> $row['id_oficina'],
                        'ofi_nombre'=> $row['ofi_nombre']
                    );    
        };
        break;
    case 3:        
        $consulta = "DELETE FROM oficinas WHERE id_oficina=$id";	
        $resultado= mysqli_query($link,$consulta);	
        break;
    case 4:

        $consulta="SELECT `id_abogado`, `apellidos`, `nombres`, `dni`, `T`, `F`, `celular`, `referente` FROM `padron`";
         
        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_abogado'=> $row['id_abogado'],
                            'apellidos'=> $row['apellidos'],
                            'nombres'=> $row['nombres'],
                            'dni'=> $row['dni'],
                            'T'=> $row['T'],
                            'F'=> $row['F'],
                            'celular'=> $row['celular'],
                            'referente'=> $row['referente']
                            
                        
                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


