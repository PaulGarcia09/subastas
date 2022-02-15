<?php
    include('../config/config.php');

    if(!isset($_SESSION['auctiobroad'])){
        header("location:index.php");
    }
    $sql ="select * from t_events where f_status!='2' order by f_start_date,f_number asc";
    $result = $dbMaster->getResultAsAssoc($connect,$sql);
    
    $sql ="SELECT * FROM t_eventstype";
	$typevents = $dbMaster->getResultAsAssoc($connect,$sql);


    // dd($result);
    $title = "Events";
   	include('common/header.php');
   	include('common/sidebar.php');
	include('pages/events.php');
    include('common/footer.php');
?>
