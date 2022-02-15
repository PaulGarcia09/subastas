<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }

      if(isset($_POST['sandboxpaypal'])){
		  $sandboxpaypal = $_POST['sandboxpaypal'];
	   	    $update = "update t_payment_setup set sandbox = '".$sandboxpaypal."' WHERE idx =1";
	   	    $dbMaster->execute($connect,$update);
		// $msg = "<span style='color:green;'>Page Updated</span>";
	  }

	if(isset($_POST['livepaypal'])){
		$livepaypal = $_POST['livepaypal'];
	   	  $update = "update t_payment_setup set live = '".$livepaypal."' WHERE idx =1";
	   	  $dbMaster->execute($connect,$update);
	//$msg = "<span style='color:green;'>Page Updated</span>";

	}
	if(isset($_POST['active_type'])){
		$active_type = $_POST['active_type'];
	   	  $update = "update t_payment_setup set active_type =  ".$active_type."  WHERE idx =1";
	   	  $dbMaster->execute($connect,$update);
	//$msg = "<span style='color:green;'>Page Updated</span>";

	}
	
	
	

	 


	$sql = "select * from t_payment_setup WHERE  idx =1";
	$setting = $dbMaster->getRowAsAssoc($connect,$sql);
	$title = "Payment Setup";
   	include('common/header.php');
   	include('common/sidebar.php');
    include('pages/payment.php');
    include('common/footer.php');
?>
