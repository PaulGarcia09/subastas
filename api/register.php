<?php
	error_reporting(E_ALL);
    include('../config/config.php');
	require '../libraries/phpmailer/src/PHPMailer.php';
	require '../libraries/phpmailer/src/SMTP.php';
	require '../libraries/phpmailer/src/Exception.php';

    if($_POST){ 
		$username 		= mysqli_real_escape_string($connect,$_POST['userName']);	
		$password_   	= mysqli_real_escape_string($connect,$_POST['password']);	
		$password 		= sha1($_POST['password']);  
		$email 			= mysqli_real_escape_string($connect,$_POST['email']);	
		$firstname 		= mysqli_real_escape_string($connect,$_POST['firstName']);
		$lastname 		= mysqli_real_escape_string($connect,$_POST['lastName']);
		$address1 		= mysqli_real_escape_string($connect,$_POST['address1']);
		$address2 		= mysqli_real_escape_string($connect,$_POST['address2']);
		$city 			= mysqli_real_escape_string($connect,$_POST['city']);
		$postcode		= mysqli_real_escape_string($connect,$_POST['postalCode']);
		$country 		= mysqli_real_escape_string($connect,$_POST['country']);
		$state 			= mysqli_real_escape_string($connect,$_POST['state']);
		$telephone 		= mysqli_real_escape_string($connect,$_POST['phoneNumber']);

		$fax			= isset($_POST['fax']) ? mysqli_real_escape_string($connect,$_POST['fax']) : '';
		$tailtag		= isset($_POST['instituciones']) ? mysqli_real_escape_string($connect,$_POST['instituciones']) : '';
		$contactname 	= isset($_POST['contactname']) ? mysqli_real_escape_string($connect,$_POST['contactname']) : '';
		$contactnumber 	= isset($_POST['contactnumber']) ? mysqli_real_escape_string($connect,$_POST['contactnumber']) : '';
		

		$agregoinvitado		= isset($_POST['invito']) ? mysqli_real_escape_string($connect,$_POST['invito']) : '';

		if($agregoinvitado <> 'Default'){
			$arr['mensajepaso']='Entro al default';
			if($agregoinvitado == '0'){
				$arr['mensajepaso']='Entro al agrego invitado';
				$nombreinvita = isset($_POST['Nominv']) ? mysqli_real_escape_string($connect,$_POST['Nominv']) : '';
				if($nombreinvita){
					$arr['mensajepaso']='Entro al nombre invita';
					$sql ="INSERT  INTO t_referencias (	               
						nombre)
					VALUES
						 ('{$nombreinvita}')";	
					 $result = $dbMaster->execute($connect,$sql);


					 $arr['mensajepaso']=$nombreinvita;
					 $arr['sql']=$sql;


					 $sqlte ="Select * from t_referencias where nombre = '{$nombreinvita}'";
					 $referencias = $dbMaster->getRowAsAssoc($connect,$sqlte);

					 $agentname = $referencias['id'];

				}else{
					$arr['mensajepaso']='no Entro al agrego invitado';
					$agentname = 0;
				}
			}else{
				$arr['mensajepaso']='no Entro al agrego invitado';
				$agentname = $agregoinvitado;
			}

		}else{
			$arr['mensajepaso']='No Entro al default';
			$agentname = 0;
		}
				
		$sql ="Select * from t_customer where f_username = '{$username}'";
		$username_ = $dbMaster->getRowAsAssoc($connect,$sql);
				
		if($username_){
		
			$arr['message']= 'Nombre de usuario ya existe.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;					
		}
		
		
		
		if(!$emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL)){			
			
			$arr['message']= 'Dirección de correo electrónico no válida.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;
			
		}else{
			
			$sql ="Select * from t_customer where f_email = '{$email}'";
			$email_result = $dbMaster->getRowAsAssoc($connect,$sql);
			
			if($email_result){		
				$arr['message']= 'La dirección de correo ya existe.';
	    		$arr['result'] = 'error';
	    		echo json_encode($arr);	
	    		exit;					
			}
		}
		
		
		if($_POST['confirmPassword']!=$_POST['password']){			
			$arr['message']= 'Contraseña y Confirmar contraseña no coinciden.';
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
				 	
		 	$arr['message']= 'Por favor complete los campos requeridos.';
    		$arr['result'] = 'error';
    		echo json_encode($arr);	
    		exit;		 	
		}
		
		if($_POST['paddleNumber'] != ''){
			$paddleNumber = mysqli_real_escape_string($connect,$_POST['paddleNumber']);

			$sql ="Select * from t_customer where paddle_number = '{$paddleNumber}'";
			$puddle_number = $dbMaster->getRowAsAssoc($connect,$sql);
    		if($puddle_number){
				$arr['message']= 'El número de paleta ya es propiedad de otro usuario';
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
						 f_real,
						 paddle_number,
						 f_dateregister
						
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
				       '{$password_}',
				       '{$paddleNumber}',
					   now()
					  )";	 
				
		$registration = $dbMaster->execute($connect,$sql);

		$subject  = utf8_decode('Su nueva información de confirmación de usuario');
		$semail   = "subastas@maxilana.com";
		$domainname = "subastas.maxilana.com";
		$msg = utf8_decode("<p style='line-height: 1'><strong>Estimado(a) ".$firstname."</strong></p>")
			 . utf8_decode("<p style='line-height: 1.2'>¡Felicidades!, le damos la más cordial bienvenida al sitio de Subastas Maxilana, en donde podrá elegir la subasta en la que quiere participar y el lote que le interesa comprar, además una vez registrado podrá solicitar un reporte de condición de las piezas, más fotos o detalles que le interese conocer.</p>")
			 . utf8_decode("<p>Es necesario finalizar su registro, con la cuenta:</p>")
			 . utf8_decode("<p><strong>Usuario: </strong>".$username."</p>")
			 . utf8_decode("<p><strong>Contraseña: </strong>".$password_."</p>")
	  
			 . utf8_decode("<br><p>Click para confirmar el registro:</p>")
			 . utf8_decode("<p><a href='https://".$domainname."/confirm.php?sk=".$serial."'>https://".$domainname."/confirm.php?sk=".$serial."</a></p>")
			 . utf8_decode("<p style='line-height: 1'><strong>Gracias,</strong><br>- Gerente de subastas Maxilana</p>");

		$mail =	new PHPMailer\PHPMailer\PHPMailer;

		$mail->isSMTP();                                 // Set mailer to use SMTP
		$mail->Host = 'smtp.office365.com';  			 // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                          // Enable SMTP authentication
		$mail->Username = 'subastas@maxilana.com';    	 // SMTP username
		$mail->Password = 'suba$tamax1lana';             // SMTP password
		$mail->SMTPSecure = 'tls';                       // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                               // TCP port to connect to

		$mail->From = $semail;
		$mail->FromName = 'Subastas Maxilana';
		//$mail->AddReplyTo($_POST['email'],$_POST['nombre']);
		$mail->addAddress($email);     	 // Add a recipient
		$mail->Subject = $subject;
		$mail->Body = $msg;
		$mail->IsHTML(true);
		$mail->send();

			
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