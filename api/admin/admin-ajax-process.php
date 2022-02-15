<?php include('../../config/config.php');
include('_INC_security.php');
$date = date('Y-m-d H:i:s');

//Start Adjustment
if (isset($_GET['adj'])) {
$adjustment = $_GET['adj'];
$alotid = $_GET['alotid'];
    $sqla ="select f_current_bid,f_bid_user,f_lots_id from t_lots where f_status ='1' and f_selected ='1'";
    $resulta = $dbMaster->getRowAsAssoc($connect,$sqla);
$userid = $resulta['f_bid_user'];    
$username = "adjustment";    
$lotid = $resulta['f_lots_id'];
$amount = $resulta['f_current_bid'] - abs($adjustment);
$update = "update t_lots set 
	                  f_current_bid ='{$amount}',
	                  f_bid_user_name='{$username}',
	                  f_bid_user ='{$userid}'
	                  where f_lots_id = '{$lotid}'
	                  and f_selected ='1'
	                  and f_status ='1'";
	$dbMaster->execute($connect,$update);
	 $sqlh ="INSERT  INTO t_lots_history (	               
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
		$resulth = $dbMaster->execute($connect,$sqlh);
	
// End Adjustment
}

/*
$sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
$msgresult = $dbMaster->getRowAsAssoc($connect,$sql);
$thecurbid = $msgresult['f_current_bid'];
$theresbid = $msgresult['f_reserve_bid'];
$thelotid = $msgresult['f_lots_id'];
$thelotid = $thelotid + 0;//Converts to number
if(isset($_GET['val'])){
if ($_GET['val'] == "Lot Sold" && $thecurbid < $theresbid) {	
$_GET['val'] = "Reserve Not Met";
}
}	
*/

if($_GET['go']){
	
	$listitems ['date']= $date;	
    $sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);

    $sql ="select * from t_customer where f_customer_id ='{$result['f_bid_user']}'";
	$result_paddle = $dbMaster->getRowAsAssoc($connect,$sql);

	$listitems ['currentbid']= number_format(floatval($result['f_current_bid']), 2);	
	$listitems ['uname']= $result_paddle['paddle_number'];
	$listitems ['message']= no_magic_quotes(htmlentities($result['f_message']));

	$listitems ['increment']= number_format($result['f_bid_increment'],2);
	if($result['f_current_bid']!=""){		
		$listitems ['button1']= number_format($result['f_current_bid']+$result['f_bid_increment'],2);
		$listitems ['button2']= number_format($result['f_current_bid']+$result['f_bid_increment']+$result['f_bid_increment'],2);
		$listitems ['button3']= number_format($result['f_current_bid']+$result['f_bid_increment']+$result['f_bid_increment']+$result['f_bid_increment'],2);
	}else{
		$listitems ['button1']= number_format(floatval($result['f_current_bid'])+floatval($result['f_bid_increment']),2);
		$listitems ['button2']= number_format(floatval($result['f_current_bid'])+floatval($result['f_bid_increment'])+floatval($result['f_bid_increment']),2);
	}
	$listitems['result']='ok';	
	echo json_encode($listitems);
	
	exit;
}


if($_GET['bid']){
	
	$userid = '1';
	$username = 'FloorBidder';
	
	$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_GET['val']));
	$lotid = mysqli_real_escape_string($connect,$_GET['lotid']);

	if(!preg_match('/^[0-9]*\.?[0-9]+$/',$amount) || number_format($amount,2)=='0.0'){					
	    exit;
	}				
	$sql ="select * from t_lots where  f_lots_id = '{$lotid}' and f_selected ='1' and f_status ='1' ";
	$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
	if(empty($showresult)){		
		exit;
	}
	
	if($showresult['f_message'] =='Lot Sold'){
		exit;
	}
	

	if($showresult['f_bid_user']==''){
		if($amount<$showresult['f_minimum_bid']){			
			exit;
		}
	}else{
		if($amount<$showresult['f_current_bid']){				
			exit;
		}
	}
	
	$update = "update t_lots set 
	                  f_current_bid ='{$amount}',
	                  f_bid_user_name='{$username}',
	                  f_bid_user ='{$userid}'
	                  where f_lots_id = '{$lotid}'
	                  and f_selected ='1'
	                  and f_status ='1'";
	$dbMaster->execute($connect,$update);
	
	
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
		             '2')";	
		$result = $dbMaster->execute($connect,$sql);
	
	exit;
}


if($_GET['msg']){
	
	$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_GET['val']));
	$lotid = mysqli_real_escape_string($connect,$_GET['lotid']);
	
				
	$sql ="select * from t_lots where  f_lots_id = '{$lotid}' and f_selected ='1' and f_status ='1' ";
	$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
		
	if(empty($showresult)){		
		exit;
	}
	
	if($showresult['f_message'] =='Lot Sold'){
		exit;
	}
	
	
	$update = "update t_lots set 
	                  f_message ='{$amount}'
	                
	                  where f_lots_id = '{$lotid}'
	                  and f_selected ='1'
	                  and f_status ='1'";
	$dbMaster->execute($connect,$update);
	exit;
}


if($_GET['incr1']){
	
	$amount = str_replace(",", "",mysqli_real_escape_string($connect,$_GET['val']));
	$lotid = mysqli_real_escape_string($connect,$_GET['lotid']);
	
	
	
	
				
	$sql ="select * from t_lots where  f_lots_id = '{$lotid}' and f_selected ='1' and f_status ='1' ";
	$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
	if(empty($showresult)){		
		exit;
	}
	
	if($_GET['act']=='x'){
		if($amount=='1'){
			$amount = $showresult['f_bid_increment']/2;
		}elseif($amount=='2'){
			$amount = $showresult['f_bid_increment']/3;
		}elseif($amount=='3'){
			$amount = $showresult['f_bid_increment']/4;
		}elseif($amount=='4'){
			$amount = $showresult['f_bid_increment']*2;
		}elseif($amount=='5'){
			$amount = $showresult['f_bid_increment']*3;
		}elseif($amount=='6'){
			$amount = $showresult['f_bid_increment']*4;
		}	
	}
	
	
	$update = "update t_lots set 
	                  f_bid_increment ='{$amount}'
	                  where f_lots_id = '{$lotid}'
	                  and f_selected ='1'
	                  and f_status ='1'";
	$dbMaster->execute($connect,$update);
	exit;
}





?>