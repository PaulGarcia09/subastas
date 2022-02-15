<?php
    include('config/config.php');
	$sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);

	$sql ="select * from t_customer where f_customer_id ='{$result['f_bid_user']}'";
	$result_paddle = $dbMaster->getRowAsAssoc($connect,$sql);

	$sql ="select * from t_image_additional where f_lot_id ='{$result['f_lots_id']}' ";
	$additional_image = $dbMaster->getResultAsAssoc($connect,$sql);

	$sql = "select * from t_stream";
	$stream = $dbMaster->getRowAsAssoc($connect,$sql);

	$sql ="select * from t_lots_history where f_lot_id ='{$result['f_lots_id']}' GROUP BY f_username ORDER BY f_amount DESC  LIMIT 5";
    $result_highest = $dbMaster->getResultAsAssoc($connect,$sql); 
             
    include('common/header.php');
    include('pages/subastaenvivo.php');
    include('common/footer.php');
?>
