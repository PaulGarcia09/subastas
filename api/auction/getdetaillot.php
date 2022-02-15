
<?php
	
	include('../../config/config.php');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    $idLote=$_GET['idlote'];
	$sql ="select * from t_lots l inner join t_customer c on l.f_bid_user=c.f_customer_id where l.f_status ='1' and l.f_selected ='1' and f_lots_id='{$idLote}'";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);
	echo json_encode($result);
?>
