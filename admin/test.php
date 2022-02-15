<?php
    include('../config/config.php');

    if(!isset($_SESSION['auctiobroad'])){
        header("location:index.php");
    }
    dd($_SESSION);
    $sql ="select * from t_events where f_status!='2' order by f_start_date,f_number asc";
	$result = $dbMaster->getResultAsAssoc($connect,$sql);
    // dd($result);
    $title = "Events";
   	include('common/header.php');
	include('pages/test.php');
    include('common/footer.php');
?>
