<?php 
    include('../config/config.php');

	
	$lotid = $_GET['lotid'];

    $sql ="select l.f_title,l.f_number,l.f_description,l.f_primary_image,l.f_current_bid,l.f_selected,c.paddle_number,l.f_message,l.f_status,l.f_bid_increment,l.f_minimum_bid from t_lots l left join t_customer c on c.f_customer_id = l.f_bid_user where f_lots_id='{$lotid}'";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);
	
	$sqli ="select * from t_lots where f_status=1 and f_selected=1";
    $siguiente = $dbMaster->getRowAsAssoc($connect,$sqli);
   
	$listitems['idnext'] = $siguiente['f_lots_id'];
	$listitems['nextlot'] = $siguiente['f_nextlot'];
	

	$listitems ['currentbid']= number_format(floatval($result['f_current_bid']), 0);	

	$listitems ['ide']= $lotid;
	$listitems ['message']= $result['f_message'];
	$listitems ['paleta']= $result['paddle_number'];
	$listitems ['status']= $result['f_status'];
    $listitems ['img'] = $result['f_primary_image'];
	$listitems ['desc'] = $result['f_description'];
	$listitems ['numberlot']= $result['f_number'];
	$listitems ['title'] = $result['f_title'];
	
	if($result['f_selected']=='1'){
		$listitems['item']='yes';		
	}else{
		$listitems['item']='no';
	}

	if($result['f_current_bid']!=""){		
		$listitems ['button1']= number_format(floatval($result['f_current_bid'])+floatval($result['f_bid_increment']),0);
		$listitems ['button2']= number_format(floatval($result['f_current_bid'])+floatval($result['f_bid_increment'])+floatval($result['f_bid_increment']),0);
	}else{
		$listitems ['button1']= number_format(floatval($result['f_minimum_bid']),2);
		$listitems ['button2']= number_format(floatval($result['f_minimum_bid'])+floatval($result['f_bid_increment']),2);
		
	}

	$sql = "SELECT * FROM ( SELECT * FROM t_lots_history WHERE f_lot_id ='{$lotid}' ORDER BY f_amount DESC LIMIT 6) tmp ORDER BY f_date,f_amount ASC";

    $result_highest = $dbMaster->getResultAsAssoc($connect,$sql); 

	$count = 0;

	foreach($result_highest as $value){
    
		$sql_paddle ="select * from t_customer where  f_customer_id = '{$value["f_user_id"]}'";
		$result_paddle = $dbMaster->getRowAsAssoc($connect,$sql_paddle);

		if($value['ofertaenlinea'] == 1){
			$status = "Línea";
		}else{
			$status = "Presencial";
		}
		
		if($count == count($result_highest)-1){
			$listitems['contents'][] = '<div style="padding: 5px; display: flex; flex-wrap: nowrap;width: 100%">
			<div style="width: 50%; font-weight: bold;font-size: 36px; text-align:left;color:black;">' .$result_paddle['paddle_number'].'</div>
				<div style="width: 50%; font-weight: bold;font-size: 36px; text-align:left;color:black;">' .$status.'</div>
		  		<div style="width: 50%; font-weight: bold;font-size: 36px; text-align:right;color:black;">' .number_format($value["f_amount"], 0).'</div>      
		 	</div>';
		}else{
			$listitems['contents'][] = '<div style="padding: 5px; display: flex; flex-wrap: nowrap;width: 100%">
			<div style="width: 50%; font-weight: bold;font-size: 32px; text-align:left">' .$result_paddle['paddle_number'].'</div>
			<div style="width: 50%; font-weight: bold;font-size: 32px; text-align:left">' .$status.'</div>
		  <div style="width: 50%; font-weight: bold;font-size: 32px; text-align:right">' .number_format($value["f_amount"], 0).'</div>      
		 </div>';
		}
		$count++;
	}
	$listitems['count']=$count;
	$listitems['xx']=count($result_highest);
	$listitems['result']='ok';

	echo json_encode($listitems);
	exit;

?>