<?php 
    include('../config/config.php');
$date = date('Y-m-d H:i:s');
	
	if($_POST['id']== "01"){
	$sql ="select * from t_lots where f_selected=1";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);

	$sql ="select * from t_image_additional where f_lot_id ='{$result['f_lots_id']}' ";
	$additional_image = $dbMaster->getResultAsAssoc($connect,$sql);

	$listitems['arrayDatos'] = $result;
	$listitems['ImagenesAdicionales'] = $additional_image;				
	
	echo json_encode($listitems);
	exit;
	}

	if($_POST['id']== "02"){
	$sql ="select * from t_stream";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);
	echo json_encode($result);
	exit;
	}	
	if($_POST['id']== "03"){
		$sql ="select * from t_lots where f_lots_id=".$_POST['lot'];
		$result = $dbMaster->getRowAsAssoc($connect,$sql);


		$idLote=$result['f_number'];

		$sql ="select * from t_customer where f_customer_id ='{$result['f_bid_user']}'";
		$result_paddle = $dbMaster->getRowAsAssoc($connect,$sql);

		$listitems['currentbid']= number_format(floatval($result['f_current_bid']), 2);
		$listitems['paddle']=$result_paddle['paddle_number'];	

		if($listitems['paddle']<> null){
			$mensaje = "Lote ".$idLote." vendido a la paleta: ".$listitems['paddle']." en $".$listitems['currentbid'];
			$update = "update t_lots set f_message='$mensaje' where f_lots_id =".$_POST['lot'];
			$dbMaster->execute($connect,$update);
		}
		//echo json_encode($contents);
		echo json_encode($listitems);
		exit;
	}
	if($_POST['id']== "04"){
		
		$sql ="select * from t_lots where f_finalylot =1";
		$result = $dbMaster->getRowAsAssoc($connect,$sql);

		$sql ="select * from t_lots where f_lots_id=".$result['f_lots_id'];
		$result2 = $dbMaster->getRowAsAssoc($connect,$sql);

		$sql ="select * from t_customer where f_customer_id ='{$result2['f_bid_user']}'";
		$result_paddle = $dbMaster->getRowAsAssoc($connect,$sql);

		$listitems['currentbid']= number_format(floatval($result2['f_current_bid']), 2);
		$listitems['paddle']=$result_paddle['paddle_number'];	

		if($listitems['paddle']<> null){
			$mensaje = "Lote ".$id." vendido a la paleta: ".$listitems['paddle']." en $".$listitems['currentbid'];
			$update = "update t_lots set f_message='$mensaje' where f_lots_id =".$_POST['lot'];
			$dbMaster->execute($connect,$update);
		}
		//echo json_encode($contents);
		echo json_encode($result);
		exit;
		
	}
	if($_POST['id']=="05"){

		$sql ="select * from t_lots where f_finalylot =1";
		$result = $dbMaster->getRowAsAssoc($connect,$sql);

			$update = "update t_lots set f_finalylot=0 where f_lots_id=".$result['f_lots_id'];
			$dbMaster->execute($connect,$update);
		
		//echo json_encode($contents);
		echo json_encode($result);
		exit;
	}
?>