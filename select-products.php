<?php
include_once './includes/dbh.inc.php';
$query = "SELECT * FROM producto WHERE idPRODUCTO = $id";
$query_supermercado = "SELECT * FROM supermercado INNER JOIN producto ON producto.SUPERMERCADO_idSUPERMERCADO = supermercado.idSUPERMERCADO WHERE producto.idPRODUCTO=$id";
$resultado = mysqli_query($conn, $query);
$resultado2 = mysqli_query($conn,$query_supermercado);
if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    $titulo = $row['tituloProducto'];
    $marca = $row['marcaProducto'];
    $imagen = $row['imagenProducto'];
    $enlaceProducto = $row['enlaceProducto'];
    if($row['precioProducto']==0){
    $precioProducto = 'Producto agotado';
    }else{
        $precioProducto = $row['precioProducto'];
    }
}
if(mysqli_num_rows($resultado2)==1){
    $row = mysqli_fetch_array($resultado2);
    $supermercado = $row['nombreSupermercado'];
    $enlaceSupermercado = $row['enlaceSupermercado'];
}

?>