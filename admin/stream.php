<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }

    if(isset($_POST['tstream'])){
   	 	
   	  $update = "update t_stream set f_video = '{$_POST['tstream']}'";
   	  $dbMaster->execute($connect,$update);
    }
	
	$sql = "select * from t_stream";
	$stream = $dbMaster->getRowAsAssoc($connect,$sql);

	$title = "Stream";
   	include('common/header.php');
   	include('common/sidebar.php');
    include('pages/stream.php');
    include('common/footer.php');
?>
