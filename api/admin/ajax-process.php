<?php 
    include('../config/config.php');
$date = date('Y-m-d H:i:s');
if($_GET['go']){
	
	$lotid =mysqli_real_escape_string($connect,$_GET['lotid']);
	
	$listitems ['date']= $date;	
    $sql ="select * from t_lots where  f_lots_id = '{$lotid}'";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);
   
    $sql ="select * from t_customer where f_customer_id ='{$result['f_bid_user']}'";
	$result_paddle = $dbMaster->getRowAsAssoc($connect,$sql);

	if($result['f_current_bid'] != ""){
		$listitems ['currentbid']= number_format($result['f_current_bid'], 2);	
	}else{
		$listitems ['currentbid']= "";	
	}
	
	$listitems ['uname']= $result_paddle['paddle_number'];
	$listitems ['message']= $result['f_message'];
	
	if($result['f_current_bid']!=""){		
		$listitems ['button1']= number_format($result['f_current_bid']+$result['f_bid_increment'],2);
		$listitems ['button2']= number_format($result['f_current_bid']+$result['f_bid_increment']+$result['f_bid_increment'],2);
		$listitems ['button3']= number_format($result['f_current_bid']+$result['f_bid_increment']+$result['f_bid_increment']+$result['f_bid_increment'],2);
	}else{
		$listitems ['button1']= number_format($result['f_current_bid']+$result['f_minimum_bid'],2);
		$listitems ['button2']= number_format($result['f_current_bid']+$result['f_minimum_bid']+$result['f_bid_increment'],2);
		$listitems ['button3']= number_format($result['f_current_bid']+$result['f_minimum_bid']+$result['f_bid_increment']+$result['f_bid_increment'],2);
	}
	
	if($result['f_selected']=='1'){
		$listitems['item']='yes';		
	}else{
		$listitems['item']='no';
	}
	
	$listitems['result']='ok';	

	$sql = "SELECT * FROM ( SELECT * FROM t_lots_history WHERE f_lot_id ='{$lotid}' ORDER BY f_amount DESC LIMIT 5) tmp ORDER BY f_history_id ASC";

	//$sql ="(select * from t_lots_history where f_lot_id ='{$lotid}' LIMIT 5) order by f_history_id ASC";
	//$sql = "select * from ( select * from t_lots_history where f_lot_id ='{$result['f_lots_id']}' order by f_amount asc limit 5 ) t_lots_history order by f_amount desc";
	//$sql = "(SELECT * FROM t_lots_history where f_lot_id ='{$result['f_lots_id']}' ORDER BY f_amount ASC LIMIT 0,1) ORDER BY f_amount DESC;";
    $result_highest = $dbMaster->getResultAsAssoc($connect,$sql); 

	foreach($result_highest as $value){

		$sql_paddle ="select * from t_customer where  f_customer_id = '{$value["f_user_id"]}'";
		$result_paddle = $dbMaster->getRowAsAssoc($connect,$sql_paddle);


		$listitems['contents'][] = '<div style="padding: 10px; display: flex; flex-wrap: nowrap;width: 100%">
                  <div style="width: 50%; font-weight: 600; text-align:center">' .$result_paddle['paddle_number'].'</div>
                  <div style="width: 50%; font-weight: 600; text-align:right">' .number_format($value["f_amount"], 2).'</div>      
                 </div>';
	}


	//echo json_encode($contents);
	echo json_encode($listitems);
	exit;
}


if($_GET['bid']){
	
	
	if(!isset($_SESSION['auction_brodcaster']['userid'] )){
  	 EXIT;
    }
	$userid = $_SESSION['auction_brodcaster']['userid'] ;
	$username = $_SESSION['auction_brodcaster']['username'] ;
	
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
	if($showresult['f_bid_user']==''){
		if($amount<$showresult['f_minimum_bid']){			
			exit;
		}
	}else{
		$totalbid = $showresult['f_current_bid'] + $showresult['f_bid_increment'];
		if($amount<$showresult['f_current_bid'] || $amount < $totalbid){		
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
		             '{$date}',
		             '{$amount}',
		             '2')";	
		$result = $dbMaster->execute($connect,$sql);
	
	
	
	
	exit;
}


?>