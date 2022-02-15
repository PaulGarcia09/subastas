<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if($_POST)
  	{
        $sql="SELECT FLOOR(RAND() * 9999) AS random_num FROM t_customer WHERE 'random_num' NOT IN (SELECT paddle_number FROM t_customer) LIMIT 1";
        $paddle = $dbMaster->getRowAsAssoc($connect,$sql);

		$id = $_POST['id'];
		if($_POST['status'] == 1) $stat = 3;
        else $stat = 1;
        
        if($stat==3){
            $sql="UPDATE `t_customer` SET `f_status` = '{$stat}', `paddle_number`='' WHERE `t_customer`.`f_customer_id` = '{$id}'";
        }else{
            $sql="UPDATE `t_customer` SET `f_status` = '{$stat}', `paddle_number`='{$paddle['random_num']}' WHERE `t_customer`.`f_customer_id` = '{$id}'";
        }
		
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