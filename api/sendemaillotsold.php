<?php
	error_reporting(E_ALL);
    include('../config/config.php');


    $numLote=$_POST['idlote'];
    $DescLote=$_POST['title'];
    $NomCliente=$_POST['cliente'];
    $email=$_POST['email'];
    $precio=$_POST['precio'];

    $subject = utf8_decode('Confirmación de lote ganado - LOVE TO HELP');
    
    $body = utf8_decode('Muy buen día <b>'.$NomCliente.'</b> le informamos que usted obtuvo la adjudicación de el lote número: <b>' .$numLote.' '.$DescLote.'</b><br>
	El importe total de su adjudicación fue de: <b>$'.$precio.'</b><br>
	Si ya registró su pago en línea en la página de la subasta, le contactaremos para confirmar el envío al domicilio que registró.<br>
	En caso de que aún no haya registrado su pago, favor de contactarnos al teléfono: 6677593500 ext. Subastas<br>
	o enviarno un correo a la dirección: subastas@maxilana.com<br>
	Gracias por seguir nuestros eventos y le invitamos a consultar nuestro calendario de las próximas subastas.<br>
	<br>
	Atte: <a href="subastas.maxilana.com">subastas.maxilana.com</a>');

		$semail   = "subastas@maxilana.com";
		$domainname = "subastas.maxilana.com";
		require '../libraries/phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                 // Set mailer to use SMTP
		$mail->Host = 'smtp.office365.com';  			 // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                          // Enable SMTP authentication
		$mail->Username = 'subastas@maxilana.com';    	 // SMTP username
		$mail->Password = 'suba$tamax1lana';             // SMTP password
		$mail->SMTPSecure = 'tls';                       // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                             // TCP port to connect to

		$mail->From = $semail;
		$mail->FromName = 'Subastas Maxilana';
		//$mail->AddReplyTo($_POST['email'],$_POST['nombre']);
		$mail->addAddress($email);     	 // Add a recipient
        $mail->Subject = $subject;

        $mail->addBCC('despinoza@maxilana.com');
    
		$mail->Body = $body;
		$mail->IsHTML(true);
		$mail->send();


		$arr['message']= 'Success';
		$arr['status'] = 200;
		echo json_encode($arr);	
		exit;
?>