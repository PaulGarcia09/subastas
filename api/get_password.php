<?php
    include('../config/config.php');

	require '../libraries/phpmailer/src/PHPMailer.php';
	require '../libraries/phpmailer/src/SMTP.php';
	require '../libraries/phpmailer/src/Exception.php';

    $datenow= date("Y-m-d");
    if(isset($_POST['forgotemail']))
  	{
		$email = mysqli_real_escape_string($connect,$_POST['forgotemail']);
		
		$sql="select * from t_customer where f_email = '$email' and f_type='user' and f_status='1'";
		$result = $dbMaster->getRowAsAssoc($connect,$sql);
		
		if($result){
			$generatepassword = $dbMaster->generaterandom(6,0);
			$newpassword = sha1($generatepassword); 	
			$update_sql = "Update t_customer set f_password = '{$newpassword}' where f_email='{$email}'";
	      	$result_update = $dbMaster->execute($connect,$update_sql);
									
			$subject  =utf8_decode('Solicitud de contraseña');
			$msg = utf8_decode("
			<p style='line-height: 1'><strong>Estimado(a) ".$result['f_firstname']."</strong></p>	
			<p>¡Recibimos la solicitud para cambiar la contraseña de su cuenta! Usando el siguiente usuario y contraseña temporal, podrá entrar al portal de subastas Maxilana <a href='http://www.subastas.maxilana.com/'>http://www.subastas.maxilana.com/</a> una vez dentro podrá cambiar a su nueva contraseña personalizada.</p>
			<p style='line-height: 1'><strong>Usuario: </strong>".$result['f_username']."</p> 
			<p><strong>Contraseña temporal: </strong>".$generatepassword."</p>			
			<p><br/></p>
			<p><strong>NO RESPONDA ESTE CORREO</strong>, es un correo automático de la lista de suscripción.</p>
			<p><br/></p>
			<p><strong>Gracias,</strong></p>
			<p>Gerente de subastas Maxilana</p>	 
			");			       			
		 
			$semail   = "subastas@maxilana.com";
			$domainname = "subastas.maxilana.com";
	
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
	
	
			

			$array['status'] =200;
			$array['message'] ="Se ha enviado un correo electrónico a {$email}";
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="No encontramos su correo electrónico en nuestra base de datos<br>(We did not find your email on our database)";
            echo json_encode($array);
            exit;
		}
		
	}else{
		$array['message'] ="Por favor, introduzca su dirección de correo electrónico<br>(Please Enter Your Email Address)";
        echo json_encode($array);
        exit;
	}
?>
