<?php
require 'serverside.php';
//$table_data->get('vista_usuarios','user_id',array('user_id', 'username','first_name','last_name','gender','password','status'));
$table_data->get('vista_articulos','ar_codigo',array('ar_codigo','ar_descripcion','ar_stock'));
?>

