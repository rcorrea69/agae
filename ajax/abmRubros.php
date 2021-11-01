<?php
include_once '../db/conexion.php';


$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta="INSERT INTO rubros (ru_nombre) VALUES('".$nombre."')";
        $resultado= mysqli_query($link,$consulta);
        
        $consulta="SELECT * FROM rubros";
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($resultado)) {
                    $data[]=array(
                        'id_rubro'=> $row['id_rubro'],
                        'ru_nombre'=> $row['ru_nombre']
                    );    
        };

        break;    
    case 2:        
        
        $consulta = "UPDATE rubros SET ru_nombre='".$nombre."' WHERE id_rubro=$id ";		
        $resultado= mysqli_query($link,$consulta);
        $consulta = "SELECT * FROM rubros WHERE id_rubro=$id ";    
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($res_cli)) {
                    $data[]=array(
                        'id_rubro'=> $row['id_rubro'],
                        'ru_nombre'=> $row['ru_nombre']
                    );    
        };
        break;
    case 3:  /// borro logicamente el articulos      
        $consulta = "DELETE FROM oficinas WHERE id_oficina=$id";	
        $resultado= mysqli_query($link,$consulta);	
        break;
    case 4: ///selecciono todos los Rubros
        $consulta="SELECT `id_abogado`, `apellidos`, `nombres`, `dni`, `T`, `F`, `celular`, `referente` FROM `padron` ";    
        
        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_abogado'=> $row['id_abogado'],
                            'apellidos'=> $row['apellidos']
                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


