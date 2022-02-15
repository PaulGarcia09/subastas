<?php
	
	include('../../config/config.php');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header("Access-Control-Allow-Headers: Content-Type, Authorization");
	$sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);
	echo json_encode($result);
?>
