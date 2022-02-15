<?php
	error_reporting(E_ALL);
    include('../config/config.php');


    $id=$_POST['id'];

    $sql ="Select * from informaciondecompras where id = '{$id}'";
    $infocompra = $dbMaster->getRowAsAssoc($connect,$sql);
    
    $idUsuario=$infocompra['usuario'];
    $idEnvio=$infocompra['iddireccion'];
    $idLote=$infocompra['lotid'];
    $total=$infocompra['monto'];
    $total = number_format($total, 2);
    
    $sql ="Select * from t_direccionesdeenvio where usuarioid = '{$idUsuario}' and idubicacion = '{$idEnvio}'";
    $infoEnvio = $dbMaster->getRowAsAssoc($connect,$sql);
    
    $domicilio=$infoEnvio['direccion'];
    $colonia=$infoEnvio['colonia'];
    $codigopostal=$infoEnvio['codigopostal'];
    $municipio=$infoEnvio['municipio'];
    $Estado=$infoEnvio['estado'];
    $pais=$infoEnvio['pais'];

    $sql ="Select * from t_customer where f_customer_id = '{$idUsuario}'";
    $InfoCostumer = $dbMaster->getRowAsAssoc($connect,$sql);

    $sql ="Select * from t_settings";
    $Infocorreo = $dbMaster->getRowAsAssoc($connect,$sql);

    $arrayCorreos = explode(",",$Infocorreo['f_correodeenvio']);

    $email=$InfoCostumer['f_email'];
    $nombrerecibe=$InfoCostumer['f_firstname'].' '.$InfoCostumer['f_lastname'];
    $celular=$InfoCostumer['f_telephone'];


    $sql ="Select * from  t_lots where f_lots_id = '{$idLote}'";
    $InfoArticulo = $dbMaster->getRowAsAssoc($connect,$sql);

    $articulo=$InfoArticulo['f_title'];
    $Lote=$InfoArticulo['f_number'];

    $update = "update t_lots set f_status=4 where f_lots_id = '{$idLote}'";
    $dbMaster->execute($connect,$update);


    $envio=0;
    $subject = utf8_decode('Gracias por tu compra - LOVE TO HELP');
    
    $body = '<table id="m_-6863763375563930348container" style="width:640px;color:rgb(51,51,51);margin:0 auto;border-collapse:collapse"> 
    <tbody>
        <tr> 
         <td style="padding:0 20px 20px 20px;vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
          <table id="m_-6863763375563930348main" style="width:100%;border-collapse:collapse"> 
           <tbody>
            <tr> 
             <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table id="m_-6863763375563930348header" style="width:100%;border-collapse:collapse"> 
               <tbody>
                <tr>
                  <td colspan="3" style="width:100%;background-color:#003681">
                            <img name="m_-7870061969043156846_header_logo" src="https://subastas.maxilana.com/pages/logopago.png" border="0" alt="" class="CToWUd">
                            </td>
                        </tr>
                    </tbody>
                <tr> 
                 <td colspan="3" style="text-align:right;padding:7px 0 5px 0;vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> <h2 style="font-size:20px;line-height:24px;margin:0;padding:0;font-weight:normal;color:rgb(0,0,0)!important">Confirmaci&oacute;n de pedido</h2></td> 
                </tr>
            <tr> 
             <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table id="m_-6863763375563930348summary" style="width:100%;border-collapse:collapse"> 
               <tbody>
                <tr> 
                 <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> <h3 style="font-size:18px;color:rgb(204,102,0);margin:15px 0 0 0;font-weight:normal">Hola,</h3> <p style="margin:1px 0 0 0;font:13px/18px Arial,sans-serif"> Gracias por tu pedido.
                </tr>
                <tr> 
                 <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> </td> 
                </tr> 
               </tbody>
              </table> </td> 
            </tr> 
            <tr> 
             <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table style="border-collapse:collapse"> 
              </table> </td> 
            </tr> 
            <tr> 
             <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table style="width:100%;border-top:3px solid rgb(45,55,65);border-collapse:collapse" id="m_-6863763375563930348criticalInfo"> 
               <tbody>
                <tr> 
                  <td  <p style="margin:2px 0 9px 0;font:14px Arial,sans-serif"> <span style="font-size:14px;color:rgb(102,102,102)">
                    Tu pedido se enviar&aacute; a:</span> <br> <b> '.$nombrerecibe.' <br>
                    Contacto:'.$celular.'<br>
                    Domicilio:'.$domicilio.','.$colonia.','.$codigopostal.'<br> 
                    '.$municipio.','.$Estado.'<br>'.$pais.'</b> <p style="margin:2px 0 9px 0;font:14px Arial,sans-serif"></p></td> 
                    <td style="margin:2px 0 9px 0;font:14px Arial,sans-serif">
               </td>
                </tr> 
               </tbody>
              </table> </td> 
            </tr> 
            <tr> 
             <td style="border-bottom:1px solid rgb(204,204,204);vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> <h3 style="font-size:18px;color:rgb(204,102,0);margin:15px 0 0 0;font-weight:normal">Resumen del pedido</h3> </td> 
            </tr> 
    
             <td style="padding-left:2px;vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table style="width:95%;border-collapse:collapse" id="m_-6863763375563930348costBreakdownNoAsin"> 
               <tbody>
                <tr> 
                 <td colspan="2" style="padding:0 0 16px 0;text-align:left!important;line-height:18px;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> </td> 
                </tr> 
                <tr> 
                <td style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> 
                Lote: </td> 
                <td style="width:70%;text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> 
                $'.$$Lote.' </td> 
               </tr> 
                <tr> 
                 <td style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif">
                  Articulo: </td> 
                 <td style="width:70%;text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif">
                  '.$articulo.'</td> 
                </tr>
                <tr> 
                 <td style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> 
                 Precio: </td> 
                 <td style="width:70%;text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> 
                 $'.$total.' </td> 
                </tr> 
                <tr> 
                <td style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> 
                Envio: </td> 
                <td style="width:70%;text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> 
                $'.number_format($envio, 2).'</td> 
                </tr> 
                <tr> 
                 <td style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> Subtotal: </td> 
                 <td style="width:70%;text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif">$'.$total.'</td> 
                </tr> 
                <tr> 
                 <td colspan="2" style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> <p style="margin:1px 0 0 0;font:13px/18px Arial,sans-serif"></p> </td> 
                </tr> 
    
                <tr> 
                 <td colspan="2" style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> <p style="margin:1px 0 0 0;font:13px/18px Arial,sans-serif"></p> </td> 
                </tr> 
                <tr> 
                 <td colspan="2" style="text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> <p style="margin:1px 0 0 0;font:13px/18px Arial,sans-serif"></p> </td> 
                </tr> 
                <tr> 
                 <td style="font-size:14px;font-weight:bold;font:12px/16px Arial,sans-serif;text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-family:Arial,sans-serif"> <strong>
                 Total :</strong> </td> 
                 <td style="font-size:14px;font-weight:bold;font:14px/16px Arial,sans-serif;text-align:left!important;line-height:18px;padding:0 10px 0 0;vertical-align:top;font-family:Arial,sans-serif"> <strong>
                 $'.$total.'</strong> </td> 
                </tr> 
                <tr> 
                 <td colspan="2" style="padding:0 0 16px 0;text-align:left!important;line-height:18px;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> </td> 
                </tr> 
                <tr> 
                 <td colspan="2" style="border-top:1px solid rgb(234,234,234);padding:0 0 16px 0;text-align:left!important;line-height:18px;vertical-align:top;font-size:13px;font-family:Arial,sans-serif"> </td> 
                </tr> 
               </tbody>
              </table> </td> 
            <tr> 
             <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table id="m_-6863763375563930348selfService" style="width:100%;border-collapse:collapse"> 
              </table> </td> 
            </tr> 
            <tr> 
             <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table id="m_-6863763375563930348closing" style="width:100%;padding:0 0 0 0;border-collapse:none"> 
               <tbody>
                <tr> 
                 <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"><br> <br>Esperamos volver a verte pronto.<br> <span style="font-size:16px;font-weight:bold"> <strong><a href="http://subastas.maxilana.com" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://Amazon.com.mx&amp;source=gmail&amp;ust=1591545364432000&amp;usg=AFQjCNGjL2QKniZLm2uCQECs5sZCsx0dJw">Subastas.maxilana.com</a></strong> </span> </p> </td> 
                </tr> 
               </tbody>
            <tr> 
             <td style="vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif"> 
              <table id="m_-6863763375563930348marketingContent" style="width:100%;border-bottom:1px solid rgb(234,234,234);border-collapse:collapse;padding:0"> 
               <tbody>
                <tr> 
                 <td style="padding:10px 0;vertical-align:top;font-size:13px;line-height:18px;font-family:Arial,sans-serif">
     <table id="m_-6863763375563930348main" style="width:100%;border-collapse:collapse"> 
                   <tbody>
                    <tr>
                                  <td colspan="3" style="width:100%;background-color:#003681">
                            <img name="m_-7870061969043156846_header_logo" src=""http://grupoalvarez.com.mx:8089/MaxilanaWEB/assets/EsrLogo.png" border="0" alt="" class="CToWUd">
                      </td>
                      </tr>
                     </tbody>
                   </table>
                   
    ';

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
    $longitud = count($arrayCorreos);
    for($i=0; $i<$longitud; $i++)
    { 
      $mail->addBCC($arrayCorreos[$i]);
    }
		$mail->Body = $body;
		$mail->IsHTML(true);
		$mail->send();


		$arr['message']= 'Success';
		$arr['status'] = 200;
		echo json_encode($arr);	
		exit;
		
		
