<?php 
require_once('db/conexion_afiliados.php');
$consulta="SELECT * FROM afiliados";
$res = mysqli_query($link, $consulta);
/////////////////////registro 1////////////////////////////////

$tipoDeRegistro = "1";
$sucursal ="0085";
$monedaCta="10";
$ctacte = "0005555206";
$moneda="P";
$identificador="E";
$secuenciaDeArchivo="0801"; //mes y nro de archi enviado
$fechaTope="20220815";///AAAAMMDD
$indicador="EMP";
$filler=94;
$espacios="";

for ($i = 1; $i <= $filler; $i++) {
    $espacios.=" " ;
}
$saltolinea="\n";

$linea1 = $tipoDeRegistro . $sucursal .$monedaCta. $ctacte .$moneda. $identificador.$secuenciaDeArchivo.$fechaTope.$indicador.$espacios.$saltolinea;
echo $linea1;

$archivoBNA= fopen("archivo.txt","w");
fwrite($archivoBNA,$linea1);
//fwrite($archivoBNA,$linea1);


/////////////////////registro 2////////////////////////////////

$tipoDeRegistro="2";
$sucCuentaCte="";
$tipoCuentaCte="CA";
$nroCuentaCte="";
$importe="000000000120000";
$fechaVencimiento="20220815";// AAAAMMDD esta fecha es variable
$estado="0";

$filler2=86;
$espacios2="";
for ($i = 1; $i <= $filler2; $i++) {
    $espacios2.=" " ;
}


while ($row=mysqli_fetch_array($res)) {
    //$sucCuentaCte=substr($row['afi_ctacte'],0,4);
    if(strlen($row['afi_ctacte'])==14){
        $sucCuentaCte=substr($row['afi_ctacte'],0,4);
        $nroCuentaCte="0".substr($row['afi_ctacte'],5,15);
        $registro2 = $tipoDeRegistro.$sucCuentaCte.$tipoCuentaCte.$nroCuentaCte.$importe.$fechaVencimiento.$estado.$espacios2;
        fwrite($archivoBNA,$registro2. $saltolinea);
    }
    
    
};

////////////////////registro 3 ///////////////////////////
$tipoDeRegistro="3";

?>