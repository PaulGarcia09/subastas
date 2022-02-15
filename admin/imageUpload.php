<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }

    $sql = "SELECT * FROM t_events WHERE f_status = '1' ORDER BY f_start_date DESC";
	$events = $dbMaster->getResultAsAssoc($connect,$sql);	

	$title = "File Upload";
   	include('common/header.php');
   	include('common/sidebar.php');
    include('pages/imageUpload.php');
    include('common/footer.php');
?>
