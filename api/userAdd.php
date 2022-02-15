<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if($_POST){
	
		$username 	= mysqli_real_escape_string($connect,$_POST['f_username']);	
		$password_   = mysqli_real_escape_string($connect,$_POST['f_password']);	
		$password 	= sha1($_POST['f_password']);  
		$email 		= mysqli_real_escape_string($connect,$_POST['f_email']);	
		$firstname 	= mysqli_real_escape_string($connect,$_POST['f_firstname']);
		$lastname 	= mysqli_real_escape_string($connect,$_POST['f_lastname']);
		$address1 	= mysqli_real_escape_string($connect,$_POST['f_address_1']);
		$address2 	= mysqli_real_escape_string($connect,$_POST['f_address_2']);
		$city 		= mysqli_real_escape_string($connect,$_POST['f_city']);
		$postcode	= mysqli_real_escape_string($connect,$_POST['f_postcode']);
		$country 	= mysqli_real_escape_string($connect,$_POST['country']);
		$state 		= mysqli_real_escape_string($connect,$_POST['f_state']);
		$telephone 	= mysqli_real_escape_string($connect,$_POST['f_telephone']);
		$fax	= mysqli_real_escape_string($connect,$_POST['f_fax']);
		$tailtag	= "";//mysqli_real_escape_string($connect,$_POST['tailtag']);
		$agentname	= "";//mysqli_real_escape_string($connect,$_POST['agentname']);
		$contactname = mysqli_real_escape_string($connect,$_POST['f_contact_name']);
		$contactnumber	= mysqli_real_escape_string($connect,$_POST['f_contact_number']);
		
				
		$sql ="Select * from t_customer where f_username = '{$username}'";
		$username_ = $dbMaster->getRowAsAssoc($connect,$sql);
				
		if($username_){
		
			$arr['message']= 'Username is already exist.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;					
		}
		
		
		
		if(!$emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL)){			
			
			$arr['message']= 'Invalid Email Address.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;
			
		}else{
			
			$sql ="Select * from t_customer where f_email = '{$email}'";
			$email_result = $dbMaster->getRowAsAssoc($connect,$sql);
			
			if($email_result){		
				$arr['message']= 'Email Address already exist.';
	    		$arr['result'] = 'error';
	    		echo json_encode($arr);	
	    		exit;					
			}
		}
				
		if(strlen($username)==0 		  	
		   || strlen($firstname)==0		
		   || strlen($lastname)==0
		   || strlen ($address1)==0		     
		   || strlen($city)==0
		   || strlen($postcode)==0
		   || strlen($country)==0
		   || strlen($state)==0
		   ) 
		  {
				 	
		 	$arr['message']= 'Please fill in all the required fields as denoted by an asterisk (*).';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;		 	
		}
		
		
		$serial = sha1($username.$password.date('Y-m-d H:i:s').'jeff');
		
		$sql="INSERT  INTO t_customer
					(
						 f_username,
						 f_password,
						 f_email,
						 f_firstname,
						 f_lastname,
						 f_telephone,
						 f_fax,
						 f_address_1,
						 f_address_2,
						 f_city,
						 f_postcode,
						 f_country,
						 f_state,
						 f_tail_tag,
						 f_agent_name,
						 f_contact_name,
						 f_contact_number,
						 f_status,
						 f_serial,
						 f_type
						
					 )
				
				VALUES('{$username}',
				       '{$password}',
				       '{$email}',
				       '{$firstname}',
				       '{$lastname}',
				       '{$telephone}',
				       '{$fax}',
				       '{$address1}',
				       '{$address2}',
				       '{$city}',
				       '{$postcode}',
				       '{$country}',
				       '{$state}',
				       '{$tailtag}',
				       '{$agentname}',
				       '{$contactname}',
				       '{$contactnumber}',
				       '3',
				       '{$serial}',
				       'user'
					  )";	 
				
		$registration = $dbMaster->execute($connect,$sql);
			
			
		$arr['message']= 'Success';
		$arr['status'] = 200;
		
		$sql ="Select * from t_customer where f_username = '{$username}'";
		$idUser = $dbMaster->getRowAsAssoc($connect,$sql);


		$codigousuario=$idUser['f_customer_id'];
		$update = "insert into t_direccionesdeenvio (usuarioid,direccion,colonia,codigopostal,estado,municipio,idubicacion,pais) VALUES ('$codigousuario','$address1','$address2','$postcode','$state','$city','1','$country')";
		$dbMaster->execute($connect,$update);

		$update = "insert into t_identifications (f_customer_id,idfront,idrear) VALUES ('$codigousuario','','')";
		$dbMaster->execute($connect,$update);

		echo json_encode($arr);	
		exit;
		
		
	}
?>
