<?php
header('Access-Control-Allow-Origin: *');
include_once './includes/dbh.inc.php';
$queryData = sprintf("SELECT PRODUCTO_idPRODUCTO,precio, Fecha_inicio FROM precio_historico");
$resultadoData = $conn->query($queryData);

$data = array();
foreach($resultadoData as $fila){
    $data[] = $fila;
}
$resultadoData->close();

?>