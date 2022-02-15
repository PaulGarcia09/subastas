<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if($_POST)
  	{
		$id = $_POST['id'];
        $sql ="update t_lots set f_status='3' where f_event=".$id;
        $result= $dbMaster->execute($connect,$sql);
		
		if($result){
			$array['status'] =200;
			$array['message'] =$sql;
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Failed";
            echo json_encode($array);
            exit;
		}
		
	}
?>
