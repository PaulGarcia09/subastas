<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if($_POST)
  	{
	 
		$id = implode( ',', $_POST['id'] );
		$sql="Delete from t_lots where f_lots_id in ({$id})";
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
