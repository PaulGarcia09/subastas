<?php
	
	include('../../config/config.php');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    
    $idLote=$_POST['idlote'];
	$sql ="select * from t_image_additional where f_lot_id ='{$idLote}' ORDER BY f_image_additional_id ";
	$result = $dbMaster->getResultAsAssoc($connect,$sql);
	echo json_encode($result);
?>
