<?php
    include('../config/config.php');
	require '../libraries/phpmailer/src/PHPMailer.php';
	require '../libraries/phpmailer/src/SMTP.php';
	require '../libraries/phpmailer/src/Exception.php';
	$url=BASE_URL;
    $datenow= date("Y-m-d");
	if($_POST['bidamount']){
		$lotid = $_POST['lotid'];
		$error ="";
		if(!isset($_SESSION['auction_brodcaster']['userid'] )){
	  		$needtologin='1';  		
	    }
		$userid = $_SESSION['auction_brodcaster']['userid'] ;
		$username = $_SESSION['auction_brodcaster']['username'] ;
		$paleta = $_SESSION['auction_brodcaster']['paleta'] ;
		
		$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_POST['bidamount']));
		$amount = (int)$amount;
		if(!preg_match('/^[0-9]*\.?[0-9]+$/',$amount) || number_format($amount,2)=='0.0' || strlen($amount)==0){					
		    $error.='Oferta inválida';
		}else{				
			$sql ="select * from t_lots where f_status = '1'  and f_lots_id = '{$lotid}'";
			$showresult = $dbMaster->getRowAsAssoc($connect,$sql);

			$sql ="select * from t_customer where f_customer_id= '{$userid}' and paddle_number='{$paleta}'";
			$showresultCliente = $dbMaster->getRowAsAssoc($connect,$sql);
			
			if(empty($showresult)){		
				$error .='El artículo no existe';
			}
			else if(empty($showresultCliente)){		
				$needtologin='1';
				$error .='El cliente no existe o no tiene paleta asignada.';
				unset($_SESSION['auction_brodcaster']);
			}
				else{ 
				$bloqued=($showresult['bloquedbids'] =='') ? 0: (int)$showresult['bloquedbids'];
				$currentBid = ($showresult['f_bid_increment'] =='') ? 0: (int)$showresult['f_bid_increment'];
				$askingBid = $showresult['f_current_bid'] ? 0 : (int)$showresult['f_current_bid'];
				$contador = ($showresult['contador'] =='') ? 0: (int)$showresult['contador'];
				if((int)$askingBid == 0){
					$currentBid = ($showresult['f_minimum_bid'] =='') ? 0: (int)$showresult['f_minimum_bid'];
				}
				$currentBid = (int)$showresult['f_current_bid'];
				if($currentBid == 0){
					$currentBid = ((int)$showresult['f_current_bid'] + (int)$showresult['f_minimun_bid']);
				}
				if($amount <= $currentBid ){			
					$error .='La cantidad debe ser igual o mayor que la oferta solicitada';
				}
				if(floatval($showresult['f_limitbid']) <= floatval($amount) ){
					$error.='La cantidad ingresada es mayor al limite permitido';
				}
				$sql ="select * from t_lots where f_status = '1'  and f_lots_id = '{$lotid}' and f_bid_user ='{$userid}'";
				$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
				if(!empty($showresult)){
					$error .='No es posible apostar, usted tiene la oferta más alta.';
				}
				$sql ="select * from t_customer where f_customer_id ='{$userid}' and f_bloqued=1";
				$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
				if(!empty($showresult)){
					$error .='El usuario esta bloqueado para ofertar.';
				}
				if($bloqued == 1){
					$error .='Las ofertas ya se encuentran bloqueadas.';
				}
			}
		}
		
		if($error==""){
			
			if($_POST['enviacorreo'] == "1"){

				$sql ="select * from t_lots where f_status = '1'  and f_lots_id = '{$lotid}'";
				$bidlot = $dbMaster->getRowAsAssoc($connect,$sql);

				$numberlot = $bidlot['f_number'];

				$sql ="select * from t_customer where f_customer_id= '{$bidlot['f_bid_user']}'";
				$userlot = $dbMaster->getRowAsAssoc($connect,$sql);

				$email = $userlot['f_email'];
				setlocale(LC_TIME, 'es_ES', 'esp_esp'); 
				$fecha= utf8_decode(strftime("%d de %B del %Y", strtotime($bidlot['f_start_date'])));
				$subject = utf8_decode('Aviso de oferta superada - LOVE TO HELP');
    
				$body = utf8_decode('Estimado participante '.$userlot['f_firstname'].' '.$userlot['f_lastname'].' a la subasta del '.$fecha.',
				<br>le informamos que su oferta por el lote '.$numberlot.', ha sido superada,<br> puede ingresar a: <a href="'.$url.'lotedetalle.php?id='.$lotid.'">Subastas Maxilana Lote '.$numberlot.'<a> y validar el status de su oferta,<br>
				gracias por participar y mucha suerte.
				Atte.<br>
				Subastas Maxilana
				');
			
					$semail   = "subastas@maxilana.com";
					$domainname = "subastas.maxilana.com";
			
				
					$mail =	new PHPMailer\PHPMailer\PHPMailer;
			
					$mail->isSMTP();                                 // Set mailer to use SMTP
					$mail->Host = 'smtp.office365.com';  			 // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                          // Enable SMTP authentication
					$mail->Username = 'subastas@maxilana.com';    	 // SMTP username
					$mail->Password = 'suba$tamax1lana';             // SMTP password
					$mail->SMTPSecure = 'tls';                       // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                             // TCP port to connect to
			
					$mail->From = $semail;
					$mail->FromName = 'Subastas Maxilana';
					$mail->addAddress($email);     	 // Add a recipient
					$mail->Subject = $subject;
			
					$mail->Body = $body;
					$mail->IsHTML(true);
					$mail->send();

			}

			if($contador == '1'){
				$update = "update t_lots set 
				f_current_bid ='{$amount}',
				f_bid_user_name='{$username}',
				f_bid_user ='{$userid}',
				f_message='',
				bloquedbids=0,
				contador=0 
				where f_lots_id = '{$lotid}'		                  
				and f_status ='1'";
			}else{
				$update = "update t_lots set 
				f_current_bid ='{$amount}',
				f_bid_user_name='{$username}',
				f_bid_user ='{$userid}',
				bloquedbids=0,
				contador=0 
				where f_lots_id = '{$lotid}'		                  
				and f_status ='1'";
			}

			$dbMaster->execute($connect,$update);
			
			$date = date('Y-m-d H:i:s');
			
			if($showresult['f_selected']=='1'){
				$stat='2';	
			}else{
				$stat='1';
			}
			
			 $sql ="INSERT  INTO t_lots_history (	               
		                   f_lot_id,
		                   f_user_id,
		                   f_username,
		                   f_date,
		                   f_amount,
		                   f_type)
				       VALUES
				            ('{$lotid}',
				            '{$userid}',
				             '{$username}',
				             now(),
				             '{$amount}',
				             '$stat')";	
				$result = $dbMaster->execute($connect,$sql);
			
			  if($result){
				  $array['status'] =200;
				  $array['amount']=$amount;
				  $array['suma']=$askingBid;
				  $array['current']=$currentBid;
				  $array['bloqueo']=$bloqued;
	            echo json_encode($array);
	            exit;
			  }
		}else{
			$array['message'] =$error;
            echo json_encode($array);
            exit;
		}
	}

function obtenerFechaEnLetra($fecha)
{
// asigno a la variable $dia el dia de la semana dada una fecha ver funcion conocerDiaSemanaFecha
$dia = $this->conocerDiaSemanaFecha($fecha);

// asigno a la variable $num el número del dia de la fecha dada ejemplo: 17/06/2016 $num = 17 ver date en http://php.net/manual/es/function.date.php
$num = date("j", strtotime($fecha));

// asigno a la variable $anno el año de la fecha dada ejemplo: 17/06/2016 $anno = 2016 ver date en http://php.net/manual/es/function.date.php
$anno = date("Y", strtotime($fecha));

// asigno a la variable $mes una lista de los meses donde cada elemento de la lista concide con el numero del mes - 1
$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

// redefino la variable $mes que es una lista con el número de mes que me devuelve la (date('m', strtotime($fecha)), lo multiplico x1 y le
// resto -1 ejemplo : fecha-> 17/06/2016 (date('m', strtotime($fecha))-> m= 07*1 -> 7-1 = 6 -> $mes[6] = junio
$mes = $mes[(date('m', strtotime($fecha)) * 1) - 1];

// retorno todo los valores concatenados como quiero ejemplo: Viernes, 17 de junio del 2016
return $dia . ', ' . $num . ' de ' . $mes . ' del ' . $anno;
}

//Para conocer el dia de la semana que cae una fecha dada
function conocerDiaSemanaFecha($fecha) {

// asigno a la variable $dia una lista de los dias donde cada elemento de la lista concide con el numero del dia
$dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');

// redefino la lista $dia con el resultado de la funcion date('w', strtotime($fecha)) que devuelve el numero del dia
// que coincide con la posicion de los dias en la lista $dia ejemplo: fecha = 17/06/2016 -> date('w', strtotime($fecha)) = 5 -> $dias[5] = Viernes
$dia = $dias[date('w', strtotime($fecha))];
// retorno el valor de la variable $dia que ya no es una lista sino una cadena de caracters que corresponde a Viernes
return $dia;
}
