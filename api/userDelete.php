<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if($_POST)
  	{
		$id = $_POST['id'];
		$sql="Delete from t_customer where f_username !='admin' AND f_customer_id = '{$id}'";
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
