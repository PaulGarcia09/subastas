<?php
    include('config/config.php');
	
		$username 	= mysqli_real_escape_string($connect,$_POST['userName']);	
		$password_   = mysqli_real_escape_string($connect,$_POST['password']);	
		$password 	= sha1($_POST['password']);  
		$email 		= mysqli_real_escape_string($connect,$_POST['email']);	
		$firstname 	= mysqli_real_escape_string($connect,$_POST['firstName']);
		$lastname 	= mysqli_real_escape_string($connect,$_POST['lastName']);
		$address1 	= mysqli_real_escape_string($connect,$_POST['address1']);
		$address2 	= mysqli_real_escape_string($connect,$_POST['address2']);
		$city 		= mysqli_real_escape_string($connect,$_POST['city']);
		$postcode	= mysqli_real_escape_string($connect,$_POST['postalCode']);
		$country 	= mysqli_real_escape_string($connect,$_POST['country']);
		$state 		= mysqli_real_escape_string($connect,$_POST['state']);
		// $telephone 	= mysqli_real_escape_string($connect,$_POST['phoneNumber']);
		// $fax	= mysqli_real_escape_string($connect,$_POST['fax']);
		$tailtag	= mysqli_real_escape_string($connect,$_POST['instituciones']);
		// $agentname	= mysqli_real_escape_string($connect,$_POST['agentname']);
		// $contactname = mysqli_real_escape_string($connect,$_POST['contactname']);
		$contactnumber	= mysqli_real_escape_string($connect,$_POST['phoneNumber']);
		
				
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
		
		
		if($_POST['confirmPassword']!=$_POST['password']){			
			$arr['message']= 'Password and Confirm Password not matched.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;	
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
				 	
		 	$arr['message']= 'Please fill up the required fields.';
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
						 f_institucion,
						 f_agent_name,
						 f_contact_name,
						 f_contact_number,
						 f_status,
						 f_serial,
						 f_type,
						 f_real
						
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
				       'user',
				       '{$password_}'
					  )";	 
				
		$registration = $dbMaster->execute($connect,$sql);
					 
	

    $sqle ="select * from t_instituciones";

    $instituciones = $dbMaster->getResultAsAssoc($connect,$sqle);


    $sqlt ="select * from t_referencias";

    $invita = $dbMaster->getResultAsAssoc($connect,$sqlt);

    include('common/header.php');
    include('pages/register.php');
    include('common/footer.php');
?>
