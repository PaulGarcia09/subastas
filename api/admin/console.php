<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if(isset($_POST['message']))
  	{
		$id = $_POST['id'];
		$message = $_POST['message'];
		$sql = "update t_lots set f_message='{$message}' where f_lots_id = '{$id}'";
   	   	$result = $dbMaster->execute($connect,$sql);
		if ($message =="Lote vendido"){
		$sql= "update t_lots set
    	            f_status ='3',
    	            f_selected=''
    	       where f_lots_id ='{$id}'";
    	$result = $dbMaster->execute($connect,$sql);

    	//Prepare next Lot
		$datenow= date("Y-m-d");  	
		$sqln ="SELECT * FROM t_lots WHERE f_start_date = '{$datenow}' AND f_selected = '' AND f_status='1' ORDER BY f_order,f_number,f_lots_id ASC";
		$lotsn = $dbMaster->getResultAsAssoc($connect,$sqln);
		foreach($lotsn as $valuen){
			$nextlot = $valuen['f_number'];	
			$nextid = $valuen['f_lots_id'] + 0;	
			$update = "update t_lots set f_message='',f_status = '1', f_selected = '1', f_nextlot=0 where f_number = '$nextlot' AND f_lots_id = $nextid";
			$dbMaster->execute($connect,$update);
			//exit($nextlot."<<>>".$nextid);	
			break;
		}} 
		
		if($result){
			$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Failed";
            echo json_encode($array);
            exit;
		}
		
	}


	if(isset($_POST['bidamount']))
  	{
		$lotid = $_POST['id'];
		$paddle_number = $_POST['paddle_number'];
		$error ="";
		
		$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_POST['bidamount']));
		
		if($paddle_number == "" || strlen($paddle_number)==0){
			$error.='Please enter a paddle number <br>';
		}else{
			$sqluser_paddle ="select * from t_customer where f_status = '1' and paddle_number = '{$paddle_number}'";
			$getuserpaddle = $dbMaster->getRowAsAssoc($connect,$sqluser_paddle);
			if(empty($getuserpaddle)){	
				$error .='Paddle number not found <br>';
			}else{
				$username = $getuserpaddle['f_username'];
				$userid = $getuserpaddle['f_customer_id'];
			}
		}

		if(!preg_match('/^[0-9]*\.?[0-9]+$/',$amount) || number_format($amount,2)=='0.0' || strlen($amount)==0){					
		    $error.='Invalid bid <br>';
		}else{				
			$sql ="select * from t_lots where f_status = '1'  and f_lots_id = '{$lotid}'";
			$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
			if(empty($showresult)){		
				$error .='Amount must be equal or greater than asking bid <br>';
			}else{ 
				$currentBid = ($showresult['f_bid_increment'] =='') ? 0: (int)$showresult['f_bid_increment'];
				$askingBid = ($showresult['f_current_bid'] =='') ? 0: (int)$showresult['f_current_bid'];
				if( (int)$amount < ($askingBid + $currentBid)){			
					$error .='Amount must be equal or greater than asking bid';
				}
			}
		}
		
		if($error==""){
			
			
			$insert ="INSERT  INTO t_lots_history (	               
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
		             '2')";	
		$result2 = $dbMaster->execute($connect,$insert);


			$update = "update t_lots set 
			                  f_current_bid ='{$amount}',
			                  f_bid_user_name='{$username}',
			                  f_bid_user ='{$userid}'
			                  where f_lots_id = '{$lotid}'		                  
			                  and f_status ='1'";
			$result = $dbMaster->execute($connect,$update);


			if($result){
				$array['status'] =200;
				$array['message'] ="";
	            echo json_encode($array);
	            exit;
						
			}else{
				$array['message'] ="Failed";
	            echo json_encode($array);
	            exit;
			}
		}else{
			$array['message'] =$error;
            echo json_encode($array);
            exit;
		}
	}

	if(isset($_POST['increment']))
  	{	
		$lotid = $_POST['id'];
		$currentBid = $_POST['currentBid'];
		$error ="";
		if(isset($_SESSION['auction_brodcaster']['userid'] )){
	  		$needtologin='1';  		
			$userid = $_SESSION['auction_brodcaster']['userid'] ;
			$username = $_SESSION['auction_brodcaster']['username'] ;
	    }else{
			$userid = $_SESSION['auctiobroad']['user_id'] ;
			$username = "";	    	
	    }
		
		if($_POST['status'] == "true"){
			$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_POST['increment']));
		}else{
			$arrayAmount = explode("~",$_POST['increment']);
			if($arrayAmount[0] == "/") $newAmount = ($currentBid / $arrayAmount[1]);
			else $newAmount = ($currentBid * $arrayAmount[1]);
			$amount = str_replace(",", "",mysqli_real_escape_string($connect,$newAmount));
		}
		
		$update = "update t_lots set 
		                  f_bid_increment ='{$amount}',
		                  f_bid_user_name='FloorBidder'
		                  where f_lots_id = '{$lotid}'		                  
		                  and f_status ='1'";
		$result = $dbMaster->execute($connect,$update);
		if($result){
			$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Failed";
            echo json_encode($array);
            exit;
		}
	}

	if(isset($_POST['substract']))
  	{	
		$lotid = $_POST['id'];
		$currentBid = $_POST['currentBid'];
		$error ="";
		if(isset($_SESSION['auction_brodcaster']['userid'] )){
	  		$needtologin='1';  		
			$userid = $_SESSION['auction_brodcaster']['userid'] ;
			$username = $_SESSION['auction_brodcaster']['username'] ;
	    }else{
			$userid = $_SESSION['auctiobroad']['user_id'] ;
			$username = "";	    	
	    }
		
		$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_POST['substract']));
		
		$amount = $currentBid - $amount;	
		$update = "update t_lots set 
		                  f_current_bid ='{$amount}',
		                  f_bid_user_name='FloorBidder'
		                  where f_lots_id = '{$lotid}'		                  
		                  and f_status ='1'";
		$result = $dbMaster->execute($connect,$update);
		if($result){
			$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Failed";
            echo json_encode($array);
            exit;
		}
	}

	if(isset($_POST['close']))
  	{
		$lotid = $_POST['id'];
  		$sql= "update t_lots set
    	            f_status ='2',
    	            f_selected=''
    	       where f_lots_id ='{$lotid}'";
    	$result = $dbMaster->execute($connect,$sql);

    	//Prepare next Lot
		$datenow= date("Y-m-d");  	
		$sqln ="SELECT * FROM t_lots WHERE f_start_date = '{$datenow}' AND f_selected = '' AND f_status='1' ORDER BY f_order,f_number,f_lots_id ASC";
		$lotsn = $dbMaster->getResultAsAssoc($connect,$sqln);
		foreach($lotsn as $valuen){
			$nextlot = $valuen['f_number'];	
			$nextid = $valuen['f_lots_id'] + 0;	
			$update = "update t_lots set f_message='',f_status = '1', f_selected = '1',f_nextlot=0 where f_number = '$nextlot' AND f_lots_id = $nextid";
			$dbMaster->execute($connect,$update);
			//exit($nextlot."<<>>".$nextid);	
			break;
		} 

    	if($result){
			$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
            exit;
					
		}else{
			$array['message'] ="Failed";
            echo json_encode($array);
            exit;
		}
  	}
	if(isset($_POST['golive']))
  	{ 
		 $lotid = $_POST['id'];
		 
		 $sql = "Select * from t_lots where f_selected = '1'";
			$dbresult_selected = $dbMaster->getRowAsAssoc($connect,$sql);
			
			if($dbresult_selected){
				
				if(!$update_result){
					
					$array['message'] = 'Another lot is still in progress. You need to close it first';
            echo json_encode($array);
            exit;
				}
			}
			
			$sql = "Select * from t_lots where f_lots_id = '{$lotid}'";
			$dbresult = $dbMaster->getRowAsAssoc($connect,$sql);
		
			
			if($dbresult['f_selected']!='1' && $dbresult['f_status']=='1' && strtotime($dbresult['f_start_date'])==strtotime(date('Y-m-d'))){
			
				$update_sql ="update t_lots set f_selected ='1' where f_lots_id ='{$lotid}'";
				$update_result = $dbMaster->execute($connect,$update_sql);
				
				if(!$update_result){
					$array['message']= 'an error occur please try again later.';
					 
            echo json_encode($array);
            exit;
				}else{
					
					$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
            exit;
				}
			}
			exit;
			 	
		
	  }
	  if(isset($_POST['nextlot']))
  	{
		$id = $_POST['id'];
		$sql = "update t_lots set f_nextlot=1 where f_lots_id = '{$id}'";
   	   	$result = $dbMaster->execute($connect,$sql);

	}
	if(isset($_POST['bloqued'])){
		$id = $_POST['id'];
		$sql = "update t_lots set contador=1 where f_lots_id = '{$id}'";
   	   	$result = $dbMaster->execute($connect,$sql);
	}
	if(isset($_POST['desbloqued'])){
		$id = $_POST['id'];
		$sql = "update t_lots set contador=0,bloquedbids = '0', f_message='' where f_lots_id = '{$id}'";
   	   	$result = $dbMaster->execute($connect,$sql);
	}
	if(isset($_POST['reloadpages'])){
		$sql = "update t_settings set f_reset=1";
   	   	$result = $dbMaster->execute($connect,$sql);
	}
	if(isset($_POST['deletereloadpages'])){
		$sql = "update t_settings set f_reset=0";
   	   	$result = $dbMaster->execute($connect,$sql);
	}
	if(isset($_POST['deleteoferta'])){

		$id = $_POST['id'];
		$sql = "SELECT f_history_id FROM t_lots_history WHERE f_lot_id='{$id}' order by f_date desc limit 1";
		$resultUltimo = $dbMaster->getRowAsAssoc($connect,$sql);
		
		$HistoryId=$resultUltimo['f_history_id'];

		$sql = "DELETE from t_lots_history where f_history_id='{$HistoryId}'";
		$result = $dbMaster->execute($connect,$sql);


		$sql = "SELECT * FROM t_lots_history WHERE f_lot_id='{$id}' order by f_date desc limit 1";
		$resultNuevo = $dbMaster->getRowAsAssoc($connect,$sql);


		$Cantidad=$resultNuevo['f_amount'];
		$UsuarioNombre=$resultNuevo['f_username'];
		$UsuarioID=$resultNuevo['f_user_id'];	

		$sql = "UPDATE t_lots set f_bid_user_name='{$UsuarioNombre}', f_bid_user='{$UsuarioID}',f_current_bid='{$Cantidad}' where f_lots_id='{$id}'";
		$result = $dbMaster->execute($connect,$sql);

	}
	  
?>
