<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");
    if($_POST){
		
		$custid = $_POST['f_customer_id'];

		$sql ="select * from t_customer where f_customer_id = '{$custid}'";
		$customer = $dbMaster->getRowAsAssoc($connect,$sql);
		
		$username 	= mysqli_real_escape_string($connect,$_POST['f_username']);	
	  
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
		$fax	    = mysqli_real_escape_string($connect,$_POST['f_fax']);
		$password	= mysqli_real_escape_string($connect,$_POST['f_password']);
		$tailtag	= "";//mysqli_real_escape_string($connect,$_POST['f_tailtag']);
		$agentname	= "";//mysqli_real_escape_string($connect,$_POST['f_agentname']);
		$contactname = mysqli_real_escape_string($connect,$_POST['f_contact_name']);
		$contactnumber	= mysqli_real_escape_string($connect,$_POST['f_contact_number']);
		
		
		
		if(!$emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL)){			
			
			$arr['message']= 'Invalid Email Address.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;
			
		}else{
			
			$sql ="Select * from t_customer where f_email = '{$email}'";
			$email_result = $dbMaster->getRowAsAssoc($connect,$sql);
			
			if($email_result){
				
				if($customer['f_email']!=$email_result['f_email']){
					
					$arr['message']= 'Email Address already exists.';
		    		$arr['result'] = 'error';
		    		echo json_encode($arr);	
		    		exit;					
				}
			}
		}
		
		
		
		if(		  	
		    strlen($firstname)==0		
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
		$sqlconcat="";
		if(!empty($password)){
			$sha1 = sha1($password); 
			$sqlconcat = "f_password = '{$sha1}', f_real='{$password}',";
		}
		
		if($_POST['paddleNumber'] != ''){
			$paddleNumber = mysqli_real_escape_string($connect,$_POST['paddleNumber']);

			$sql ="Select * from t_customer where paddle_number = '{$paddleNumber}' and f_customer_id != '{$custid}'";
			$puddle_number = $dbMaster->getRowAsAssoc($connect,$sql);
    		if($puddle_number){
				$arr['message']= 'Paddle Number is already Owned by another user';
    			$arr['result'] = 'error';
    			echo json_encode($arr);	
    			exit;	
			}else{
				$paddleNumber = mysqli_real_escape_string($connect,$_POST['paddleNumber']);
			}    		
    	}else{
    		$sql2 ="Select * from t_customer";
			$puddle_number2 = $dbMaster->getResultAsAssoc($connect,$sql2);

    		$paddleNumber =  mt_rand(1,5000);
    		foreach ($puddle_number2 as $key => $value){
    			if($value['paddle_number'] == $paddleNumber){
    				$paddleNumber = mt_rand(1,5000);    				
                }
    		}
    	}

		$update_sql ="update t_customer set
		         
					f_email ='{$email}',
					f_firstname='{$firstname}',
					f_lastname='{$lastname}',
					f_telephone='{$telephone}',
					f_fax='{$fax}',
					f_address_1='{$address1}',
					f_address_2='{$address2}',
					f_city='{$city}',
					f_postcode='{$postcode}',
					f_country='{$country}',
					$sqlconcat
					f_state='{$state}',
					f_agent_name='{$agentname}',
					f_contact_name='{$contactname}',
					f_contact_number='{$contactnumber}',
					paddle_number='{$paddleNumber}'					
					where f_customer_id ='{$custid}'
				";
		
		$update = $dbMaster->execute($connect,$update_sql);

		if( $_FILES['images']){
			$tempname="novacio";
		}else{
			$tempname="HOLA";
		}
		

		if($update){	
			
			$arr['message']= 'Success';
			$arr['status'] = 200;
			$arr['img']=$tempname;
			echo json_encode($arr);	
			exit;
		}else{
			$arr['message']= 'Unable to update data, please try again later';
	    	$arr['result'] = 'error';
			echo json_encode($arr);	
			exit;
			
		}
		
		
	}
?>
