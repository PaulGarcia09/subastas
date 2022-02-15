<?php
    include('../config/config.php');

    if(!isset($_SESSION['auctiobroad'])){
        header("location:index.php");
    }
    
    $sql="select * from t_events where f_start_date >= CURDATE() and f_status >0 order by f_events_id asc";
    $result = $dbMaster->getResultAsAssoc($connect,$sql);
    if(isset($_GET['evento'])){

        $evento = $_GET['evento'];
        $sqle ="SELECT * FROM t_lots WHERE f_event='{$evento}' and f_status=1";
        $lotes = $dbMaster->getResultAsAssoc($connect,$sqle);
       
    }




    // dd($result);
    $title = "Events";
   	include('common/header.php');
   	include('common/sidebar.php');
	include('pages/deleteoferts.php');
    include('common/footer.php');
?>
