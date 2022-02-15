<?php
    include('../config/config.php');

    $datenow= date("Y-m-d");
    if(isset($_POST['username']))
  	{
		$username = mysqli_real_escape_string($connect,$_POST['username']);
		$password = sha1($_POST['password']);			
		$sql="select * from t_customer where (f_username = '$username' OR f_email='$username') and f_password='{$password}' and f_type='user' and f_status='1'";
		$result = $dbMaster->getRowAsAssoc($connect,$sql);
		
		if($result){
			$_SESSION['auction_brodcaster']['userid'] = $result['f_customer_id'];
			$_SESSION['auction_brodcaster']['username'] = $result['f_username'];
			$_SESSION['auction_brodcaster']['paleta'] = $result['paddle_number'];

			$sql ="INSERT  INTO t_conexiones (customer_id,fecha)
			VALUES ('{$result['f_customer_id']}',now())";	
	 $result = $dbMaster->execute($connect,$sql);

			$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Nombre de usuario y contraseña inválidos";
            echo json_encode($array);
            exit;
		}
		
	}else{
		$array['message'] ="Nombre de usuario y contraseña inválidos";
        echo json_encode($array);
        exit;
	}
?>
