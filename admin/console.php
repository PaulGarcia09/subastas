<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }

    $sql ="select * from t_lots where f_status ='1' and f_selected ='1' ORDER BY f_number*1 ASC";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);

    $sql ="select * from t_customer where f_customer_id ='{$result['f_bid_user']}'";
    $result_paddle = $dbMaster->getRowAsAssoc($connect,$sql);

    $datenow= date("Y-m-d");
    $sql ="SELECT * FROM t_lots WHERE f_status='1' AND (f_start_date = '{$datenow}' OR f_selected = '1') ORDER BY f_order,f_number*1 ASC";
    $lots = $dbMaster->getResultAsAssoc($connect,$sql);
    
    foreach ($lots as $key => $value) {
        $lotid = $value['f_lots_id'];
        $sql ="select * from t_image_additional where f_lot_id ='{$lotid}' ORDER BY f_image_additional_id ";
        $lots[$key]['imageAdditional'] = $dbMaster->getResultAsAssoc($connect,$sql); 
    }

    $sqle="select * from t_rangebids";
    $rangos =$dbMaster->getResultAsAssoc($connect,$sqle); 
     
    $title = "Console";
   	include('common/header.php');
    include('pages/console.php');
    include('common/footer.php');
?>
