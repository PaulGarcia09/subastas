<?php
	
	include('../../config/config.php');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    
    $idLote=$_GET['idlote'];
	$sql = "SELECT * FROM ( SELECT h.f_history_id,h.f_lot_id,h.f_user_id,h.f_date,h.f_amount,h.f_type,c.paddle_number FROM t_lots_history h 
    inner join t_customer c on c.f_customer_id=h.f_user_id WHERE f_lot_id ='{$idLote}' ORDER BY f_amount DESC LIMIT 5) tmp ORDER BY f_history_id ASC";
	$result = $dbMaster->getResultAsAssoc($connect,$sql);
	echo json_encode($result);
?>
