<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if($_POST)
  	{
		$id = $_POST['id'];

		$sql ="select * from t_lots_history where f_lot_id='{$id}' order by f_history_id desc" ;
		$result = $dbMaster->getResultAsAssoc($connect,$sql);

		if($result){
			$array['status'] =200;
			$array['data'] =$result;
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Failed";
            echo json_encode($array);
            exit;
		}
		
	}
?>
