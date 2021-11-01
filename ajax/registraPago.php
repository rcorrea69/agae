<?php 
	require_once ("../include/validar_session.php");
	require_once("../db/conexion.php");
	

// $fecha=$_GET['fecha']; 
// $cliente=$_GET['cliente'];
// $importe=$_GET['importe'];

$fecha=$_POST['fecha']; 
$cliente=$_POST['cliente'];
$importe=$_POST['importe'];

$usuario=$_SESSION['id_usuario'];


//////////////////////////////registro recibo cta cte//////////////////////////////////////
$sqlrecibo="INSERT INTO `recibos`( `id_cliente`, `rec_importe`, `rec_fecha`) 
VALUES ($cliente,$importe,'".$fecha."')";
// die($sqlrecibo);
$res = mysqli_query($link, $sqlrecibo);
$idrecibo=mysqli_insert_id($link);

///////////////////////////registro cta cte/////////////////////////////

$sqlctacte="INSERT INTO `clientes_ctacte`(`id_cliente`, `ctacteDH`, `factura_recibo`, `ctacte_importe`,`ctacte_fecha`) 
VALUES ($cliente,'H',$idrecibo,$importe,'".$fecha."')";
$ejectutoctacte=mysqli_query($link, $sqlctacte);       

echo $idrecibo;

?>