<?php
	error_reporting(E_ALL);
    include('../config/config.php');


    $NumCte=$_POST['idcte'];
    $NomCliente=$_POST['cliente'];
	$email=$_POST['email'];
    $evento=$_POST['evento'];
    

    $sql ="SELECT * FROM t_events where f_number='{$evento}'";
    $ImgEvent=$dbMaster->getRowAsAssoc($connect,$sql);

    $ImgEvent=$ImgEvent['f_primary_image'];
	
            //Configuración del algoritmo de encriptación

            //Debes cambiar esta cadena, debe ser larga y unica
            //nadie mas debe conocerla
            $clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion de subastas maxilana y asi poder encriptar todo';

            //Metodo de encriptación
            $method = 'aes-256-cbc';

            // Puedes generar una diferente usando la funcion $getIV()
            $iv = base64_decode($getIV);

            /*
            Encripta el contenido de la variable, enviada como parametro.
            */
            $encriptar = function ($valor) use ($method, $clave, $iv) {
            return openssl_encrypt ($valor, $method, $clave, false, $iv);
            };

            /*
            Desencripta el texto recibido
            */
            $desencriptar = function ($valor) use ($method, $clave, $iv) {
            $encrypted_data = base64_decode($valor);
            return openssl_decrypt($valor, $method, $clave, false, $iv);
            };

            /*
            Genera un valor para IV
            */
            $getIV = function () use ($method) {
            return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
            };

	$varid="id=".$encriptar($NumCte)."&ev=".$encriptar($evento);

    $subject = utf8_decode('Activación para subasta - LOVE TO HELP');
    
    $body = utf8_decode('<div class="es-wrapper-color">
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="esd-email-paddings" valign="top">
                    <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                        <tbody>
                            <tr>
                                <td class="esd-stripe" align="center" bgcolor="#f8f9fd" style="background-color: #f8f9fd;">
                                <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                                <tbody>
                                    <tr>
                                        <td class="esd-stripe" align="center" bgcolor="#000001" style="background-color: #000001;">
                                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-structure es-p10t es-p15b es-p30r es-p30l" align="left">
                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody style="background-color:black;">
                                                                    <tr>
                                                                        <td width="540" class="esd-container-frame" align="center" valign="top">
                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center" class="esd-block-image" style="font-size: 0px;background: black;">
                                                                                        <a target="_blank" href="https://subastas.maxilana.com/activate.php?'.$varid.'"><img src="https://subastas.maxilana.com/pages/logopago.png" alt style="display: block;" width="130"></a></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
              </table>
                                    <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                        <tbody>
                                            <tr>
                                                <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" class="esd-block-text es-p10b">
                                                                                  <hr>
                                                                                    
                                                                                    <h2 style="text-align: center;">Hola '.$NomCliente.'</h2>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                        <tbody>
                            <tr>
                                <td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
                                    <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                        <tbody>
                                            <tr>
                                                <td class="esd-structure es-p40t es-p20b es-p30r es-p30l" align="left">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="540" class="esd-container-frame" align="center" valign="top">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" class="esd-block-text">
                                                                                <p style="font-size: 22px;">Te invitamos a ser parte de nuestra próxima subasta.</p>
                                                                                <p style="font-size: 20px;">Para participar solo se necesita hacer click en el siguiente enlace:</p>
                                                                                <a style="font-size: 24px;" href="https://subastas.maxilana.com/activate.php?'.$varid.'">Subastas.maxilana.com</a>
                                                                                <p style="font-size: 20px;">¡Te esperamos!</p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="esd-structure es-p20b es-m-p0t es-m-p20b es-m-p15r es-m-p15l" align="left">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="600" class="esd-container-frame" align="center" valign="top">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank" href="https://subastas.maxilana.com/activate.php?'.$varid.'">
                                                                                <img class="adapt-img" src="https://subastas.maxilana.com/rimage/products/'.$ImgEvent.'.original.jpg" alt style="display: block;" width="600"></a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="es-content esd-footer-popover" align="center">
                        <tbody>
                            <tr>
                                <td class="esd-stripe" align="center">
                                    <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                        <tbody>
                                            <tr>
                                                <td class="es-p20t es-p20r es-p20l esd-structure" align="left">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" class="esd-block-text">
                                                                                <br>
                                                                                    <p style="line-height: 120%;">&nbsp;A partir de nuestra&nbsp;siguiente subasta, su número de paleta le será asignado de forma aleatoria y se incluirá en la confirmación de participación una vez que se haya registrado.</p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                        <tbody>
                            <tr>
                                <td class="esd-stripe" align="center" bgcolor="#000001" style="background-color: #000001;">
                                    <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                        <tbody>
                                            <tr>
                                                <td class="esd-structure es-p10t es-p15b es-p30r es-p30l" align="left">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody style="background-color:black;">
                                                            <tr>
                                                                <td width="540" class="esd-container-frame" align="center" valign="top">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank" href="https://subastas.maxilana.com//activate.php?'.$varid.'"><img src="https://subastas.maxilana.com/pages/logopago.png" alt style="display: block;" width="130"></a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
      </table>
</div>');

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
    
		$mail->Body = $body;
		$mail->IsHTML(true);
		$mail->send();


		$arr['message']= 'Success';
		$arr['status'] = 200;
		echo json_encode($arr);	
		exit;
?>
