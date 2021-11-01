<?php
include_once '../db/conexion.php';

$idCliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : '';


$consulta="SELECT `id_ctacte`, `id_cliente`, `ctacteDH`, `factura_recibo`, `ctacte_importe`, `ctacte_fecha` 
FROM `clientes_ctacte` 
WHERE id_cliente=$ idCliente
ORDER BY ctacte_fecha";  
echo die($consulta);  
$res_art = mysqli_query($link, $consulta);

$saldo=0;
$data=array();
    while ($row=mysqli_fetch_array($res_art)) {
            $documento=$row['ctacteDH'];
            $docNombre='';
            $debe=0;
            $haber=0;
            if($documento=='D'){
                $docNombre='Fectura Nro.. '.$row['factura_recibo'];
                $debe= $row['ctacte_importe'];
                $saldo=$saldo+$row['ctacte_importe'];
            }else{
                $docNombre='Recibo Nro.. '.$row['factura_recibo'];
                $haber= $row['ctacte_importe'];
                $saldo=$saldo+$row['ctacte_importe'];
            };
                $data[]=array(
                    'fecha'=> $row['ctacte_fecha']
                    // 'documento'=> $docNombre,
                    // 'debe'=>$debe,
                    // 'haber'=>$haber,
                    // 'saldo'=> "$ " . number_format(($saldo), 2, ',', '.') 

                );    
    };


print json_encode($data, JSON_UNESCAPED_UNICODE);


