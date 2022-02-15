<?php
    include('../config/config.php');
	require '../libraries/phpmailer/src/PHPMailer.php';
	require '../libraries/phpmailer/src/SMTP.php';
	require '../libraries/phpmailer/src/Exception.php';
	$url=BASE_URL;
    $datenow= date("Y-m-d");
		$lotid = $_POST['lotid'];
		$userid = $_POST['userid']; ;
		$username = $_POST['username']; ;
		$paleta = $_POST['paleta'];;
		
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
				}else{
					$currentBid = (int)$showresult['f_current_bid'];
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

			if($contador == '1'){
				$update = "update t_lots set 
				f_current_bid ='{$amount}',
				f_bid_user_name='{$username}',
				f_bid_user ='{$userid}',
				f_message='',
				bloquedbids=0,
				contador=0 
				where f_lots_id = '{$lotid}'		                  
				and f_status ='1'
				and f_current_bid <> '{$amount}'";
			}else{
				$update = "update t_lots set 
				f_current_bid ='{$amount}',
				f_bid_user_name='{$username}',
				f_bid_user ='{$userid}',
				bloquedbids=0,
				contador=0 
				where f_lots_id = '{$lotid}'		                  
				and f_status ='1'
				and f_current_bid <> '{$amount}'";
			}

			// $dbMaster->execute($connect,$update);



			mysqli_query($connect, $update);
			$afected = floatval(mysqli_affected_rows($connect));
			
			if($afected > 0){
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
							   f_type,
							   ofertaenlinea)
						   VALUES
								('{$lotid}',
								'{$userid}',
								 '{$username}',
								 now(),
								 '{$amount}',
								 '$stat',
								 0)";	
					$result = $dbMaster->execute($connect,$sql);

					if($result){
						$array['sql']=$sql;
						$array['status'] =200;
						$array['amount']=$amount;
						$array['suma']=$askingBid;
						$array['current']=$currentBid;
						$array['bloqueo']=$bloqued;
					  echo json_encode($array);
					  exit;
					}
			}else{
				$error .='La cantidad debe ser igual o mayor que la oferta solicitada';
				$array['message'] =$error;
				$array['lote'] =$lotid;
				$array['userid'] =$userid;
				$array['username'] =$username;
				$array['paleta'] =$paleta;
				echo json_encode($array);
				exit;
		}
	}else{
		$array['message'] =$error;
		$array['lote'] =$lotid;
		$array['userid'] =$userid;
		$array['username'] =$username;
		$array['paleta'] =$paleta;
		echo json_encode($array);
		exit;
		}
			

	
