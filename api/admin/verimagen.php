<?php
    include('../../config/config.php');
function fObtenerMime($wfParamCadena){//creamos una funciÃ³n que recibira un parametro en este caso la extensiÃ³n del archivo
    $fsExtension = $wfParamCadena;	
    if  ($fsExtension =='bmp'){ $mime = 'image/bmp'; }
    if  ($fsExtension =='gif' ){ $mime ='image/gif' ; }
    if  ($fsExtension =='jpe' ){ $mime ='image/jpeg' ; }
    if  ($fsExtension =='jpeg'){ $mime = 'image/jpeg' ; }
    if  ($fsExtension =='jpg' ){ $mime ='image/jpeg'; }
    if  ($fsExtension =='png' ){ $mime = 'image/png'; }    
    return $mime;//en base a su extenxiÃ³n la function retornara un tipo de mime 
}
    $idImagen = $_GET['id']; 

    $sql ="select * from t_identifications where f_customer_id ='$idImagen'";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);
    
	$mime = fObtenerMime($result['extencion']);//Obtenemos el mime del archivo.
    $contenido = $result['idfront'];//Obtenemos el contenido almacenado en el campo Binario.
	header("Content-type:$mime");//le indicamos al navegador que tipo de informaciÃ³n mostraremos.
	print $contenido; //Imprimimos el contenido.
?>