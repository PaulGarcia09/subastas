<?php
    include('../config/config.php');

    $userid = $_SESSION['auction_brodcaster']['userid'];
  
    
    if($_POST){
		$custid = $userid;		
		$sql ="select * from t_customer where f_customer_id = '{$userid}'";
		$customer = $dbMaster->getRowAsAssoc($connect,$sql);
		
		$email 			= mysqli_real_escape_string($connect,$_POST['email']);	
		$firstname 		= mysqli_real_escape_string($connect,$_POST['firstName']);
		$lastname 		= mysqli_real_escape_string($connect,$_POST['lastName']);
		$telephone 		= mysqli_real_escape_string($connect,$_POST['phoneNumber']);
		$paddleNumber = mysqli_real_escape_string($connect,$_POST['paddleNumber']);

				
		
		if(!$emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL)){			
			
			$arr['message']= 'Dirección de correo electrónico no válida';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;
			
		}else{
			
			$sql ="Select * from t_customer where f_email = '{$email}'";
			$email_result = $dbMaster->getRowAsAssoc($connect,$sql);
			
			if($email_result){
				
				if($customer['f_email']!=$email_result['f_email']){
					
					$arr['message']= 'La dirección de correo electrónico ya existe.';
		    		$arr['result'] = 'error';
		    		echo json_encode($arr);	
		    		exit;					
				}
			}
		}
		
		
		
		if(		  	
		    strlen($firstname)==0		
		   || strlen($lastname)==0
		   || strlen($paddleNumber)==0
		   || strlen($telephone)==0
		   || strlen($email)== 0
		   ) 
		  {
				 	
		 	$arr['message']= 'Favor de ingresar todos los datos.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;		 	
		}
		
		if($_POST['paddleNumber'] != ''){
			$paddleNumber = mysqli_real_escape_string($connect,$_POST['paddleNumber']);

			$sql ="Select * from t_customer where paddle_number = '{$paddleNumber}' and f_customer_id != '{$custid}'";
			$puddle_number = $dbMaster->getRowAsAssoc($connect,$sql);
    		if($puddle_number){
				$arr['message']= 'El número de paleta ya es propiedad de otro usuario <br> (Paddle Number is already Owned by another user)';
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
					paddle_number = '{$paddleNumber}'
					where f_customer_id ='{$custid}'
				";
		
		$update = $dbMaster->execute($connect,$update_sql);
		
		if($update){	
			
	    	$arr['status'] = 200;
			echo json_encode($arr);	
			exit;
		}else{
			$arr['message']= 'No se pueden actualizar los datos. Vuelve a intentarlo más tarde. <br>(Unable to update data, please try again later)';
	    	$arr['result'] = 'error';
			echo json_encode($arr);	
			exit;
			
		}		
		
	}
?>
