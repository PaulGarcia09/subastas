<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

    if(isset($_POST['message']))
  	{
		$id = $_POST['id'];
		$message = $_POST['message'];
		$sql = "update t_lots set f_message='{$message}' where f_lots_id = '{$id}'";
   	   	$result = $dbMaster->execute($connect,$sql);
		
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
		$error ="";
		if(isset($_SESSION['auction_brodcaster']['userid'] )){
	  		$needtologin='1';  		
			$userid = $_SESSION['auction_brodcaster']['userid'] ;
			$username = $_SESSION['auction_brodcaster']['username'] ;
	    }else{
			$userid = $_SESSION['auctiobroad']['user_id'];
			$username = "";	    	
	    }
		
		
		$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_POST['bidamount']));
		
		
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
			
			
			
			$update = "update t_lots set 
			                  f_current_bid ='{$amount}',
			                  f_bid_user_name='FloorBidder',
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
		$sqln ="SELECT * FROM t_lots WHERE f_start_date = '{$datenow}' AND f_selected = '' AND f_status='1' ORDER BY f_number,f_lots_id ASC";
		$lotsn = $dbMaster->getResultAsAssoc($connect,$sqln);
		foreach($lotsn as $valuen){
			$nextlot = $valuen['f_number'];	
			$nextid = $valuen['f_lots_id'] + 0;	
			$update = "update t_lots set f_message='',f_status = '1', f_selected = '1' where f_number = '$nextlot' AND f_lots_id = $nextid";
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
?>
