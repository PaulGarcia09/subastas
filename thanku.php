<?php
    include('config/config.php');
    $id = $_GET['id'];
    $amount = $_GET['amount'];
    $username = $_GET['username'];
    $userid = $_GET['userid'];
	$date = date('Y-m-d H:i:s');
	$update = "update t_lots set   f_status = 4 where   f_lots_id = $id";
	$dbMaster->execute($connect,$update);
	
	
	 $sql ="INSERT  INTO t_lots_history (	               
                   f_lot_id,
                   f_user_id,
                   f_username,
                   f_date,
                   f_amount,
                   f_type)
		       VALUES
		            ('{$id}',
		            '{$userid}',
		             '{$username}',
		             now(),
		             '{$amount}',
		             '3')";	
		$result = $dbMaster->execute($connect,$sql);
	
	
  header( 'location: myAccount.php' );
  exit;
?>
