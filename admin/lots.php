<?php
    include('../config/config.php');

    if(!isset($_SESSION['auctiobroad'])){
        header("location:index.php");
    }
    if($_GET['type'] == "manage"){
	    $sql ="Select t.*, f.amout from t_lots t
				left join t_lots_fee f ON f.f_lots_id = t.f_lots_id
				where 
				
				
				f_status!='2' AND f_status !='3' AND f_status !='4' ORDER BY f_order,f_number*1 ASC";
    	$title = "Manage Lots";
    }else{
	    $sql ="select * from t_lots where f_status='2' OR f_status='3' OR f_status='4' ORDER BY f_number*1 ASC";
    	$title = "Completed Lots";
    }

	$result = $dbMaster->getResultAsAssoc($connect,$sql);
   	 foreach ($result as $key => $value) {
        $lotid = $value['f_lots_id'];
        $sql ="select * from t_image_additional where f_lot_id ='{$lotid}' ORDER BY f_image_additional_id ";
        $result[$key]['imageAdditional'] = $dbMaster->getResultAsAssoc($connect,$sql); 
    }
    
    include('common/header.php');
   	// include('common/sidebar.php');
   	if($_GET['type'] == "manage"){
    	include('pages/lotsManage.php');
    }else{
    	include('pages/lotsCompleted.php');
    }
    include('common/footer.php');
?>
