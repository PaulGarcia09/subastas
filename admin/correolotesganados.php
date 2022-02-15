<?php
    include('../config/config.php');

    if(!isset($_SESSION['auctiobroad'])){
        header("location:index.php");
    }

    $start = $_GET['date'];
	$sql ="select l.f_lots_id,l.f_number,l.f_title,l.f_current_bid,c.f_customer_id,c.f_firstname,c.f_lastname,c.f_email from t_lots l inner join t_customer c on l.f_bid_user = c.f_customer_id where l.f_status = 3 and l.f_start_date='{$start}'";
    $result = $dbMaster->getResultAsAssoc($connect,$sql);
    
	$sql ="SELECT * FROM t_events";
    $eventos = $dbMaster->getResultAsAssoc($connect,$sql);
        
    include('pages/correolotesganados.php');
    include('common/header.php');
    include('common/footer.php');
?>
