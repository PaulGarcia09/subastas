<?php
    include('config/config.php');


	$userid = $_SESSION['auction_brodcaster']['userid'];
    $datenow= date("Y-m-d");
	$sql ="Select t.*, IFNULL(f.amout, 0) as amout from t_lots t
				left join t_lots_fee f ON f.f_lots_id = t.f_lots_id
				  
	
	where f_status in (3,4) and f_bid_user ='{$userid}'";
	$itemsWon= $dbMaster->getResultAsAssoc($connect,$sql);
	
	
	// $sql ="select * from t_lots where f_status = '4' and f_bid_user ='{$userid}'";
	// $itemsPaid= $dbMaster->getResultAsAssoc($connect,$sql);

	$sql ="select * from t_customer where f_customer_id = '{$userid}'";
	$customer = $dbMaster->getRowAsAssoc($connect,$sql);

	$sql ="Select t.*, IFNULL(f.amout, 0) as amout from t_lots t
				left join t_lots_fee f ON f.f_lots_id = t.f_lots_id
				  
	
	where f_status=1 and f_bid_user ='{$userid}'";
	$itemsWonTemporaly= $dbMaster->getResultAsAssoc($connect,$sql);
	

	// echo "<pre>";
	// print_r($customer);
	// echo "</pre>";
	
	$sql = "select * from t_payment_setup WHERE  idx =1";
	$setting = $dbMaster->getRowAsAssoc($connect,$sql);
	if(  $setting['active_type']==0){
		 $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
		 $business_email = $setting['sandbox'];
	}if(  $setting['active_type']==1){
		 $paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
		 $business_email = $setting['live'];
	}
	if(empty($customer)){
		header("location:logout.php");
	}
    include('common/header.php');
    include('pages/myAccount.php');
    include('common/footer.php');
?>
