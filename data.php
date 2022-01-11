<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include('./select-products2.php');

print json_encode($data);
?>