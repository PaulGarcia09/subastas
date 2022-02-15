<?php 

//Inicio de exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=lotesdeinteres.xls"); //Indica el nombre del archivo resultante
header("Pragma: no-cache");
header("Expires: 0");

echo $tabla;

?>