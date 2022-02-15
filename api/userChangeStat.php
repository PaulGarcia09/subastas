<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if($_POST)
  	{
		$id = $_POST['id'];
		if($_POST['status'] == 1) $stat = 3;
		else $stat = 1;
		$sql="UPDATE `t_customer` SET `f_status` = '{$stat}' WHERE `t_customer`.`f_customer_id` = '{$id}'";
   	   	$result = $dbMaster->execute($connect,$sql);
		
		if($result){
			$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Failed";
            echo json_encode($array);
            exit;
		}
		
	}
?>
