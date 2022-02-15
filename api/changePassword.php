<?php
    include('../config/config.php');

    $datenow= date("Y-m-d");

   if($_POST){
		$userid = $_SESSION['auction_brodcaster']['userid'];
		
		$oldpassword = sha1(mysqli_real_escape_string($connect,$_POST['currentPassword']));
		$password= mysqli_real_escape_string($connect,$_POST['password']);
		$verypassword =mysqli_real_escape_string($connect,$_POST['confirmPassword']);
		
		$sql ="select * from t_customer where f_customer_id = '{$userid}' and f_password ='{$oldpassword}'";
		$oldpassword_Result = $dbMaster->getRowAsAssoc($connect,$sql);
	
		if(empty($oldpassword_Result)){
			$error = 'Contraseña actual inválida <br> (Invalid current password)';
		}else{
			
			if($password!=$verypassword){
				$error ='Confirmar que la contraseña no coincide <br> (Confirm password not match)';
			}else{
				
				$error ='';
				$pass = sha1($password);
				$sql ="update t_customer set f_password = '{$pass}'where f_customer_id='$userid'";
				$result = $dbMaster->execute($connect,$sql);
			}
		}	

		if($error==""){
			$array['status'] =200;
            echo json_encode($array);
            exit;
		}else{
			$array['message'] =$error;
            echo json_encode($array);
            exit;
		}
		
	}
?>
