<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }
    if(isset($_POST['password'])){
		 if($_POST['password'] == $_POST['cpassword']){	
			$password = $_POST['password'];	
			$id = $_SESSION['auctiobroad']['user_id_'];
			  if(!empty($password)){
				  $pass = sha1($password);
			   $sql ="update t_customer set f_password = '{$pass}'where f_customer_id='{$id}'";
				 $sql ="update t_customer set f_password = '".$pass."'  where f_customer_id=".$id;
				  $dbMaster->execute($connect,$sql);
				// $alert=['status' => 'success', 'message'=>'Successful'];
			  }
		}
		 else {
			// $alert=['status' => 'danger', 'message'=>'Confirm password not match'];
    }
	}

	$title = "Change Password";
   	include('common/header.php');
   	include('common/sidebar.php');
    include('pages/password.php');
    include('common/footer.php');
?>
