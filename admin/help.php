<?php
    include('../config/config.php');
	if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }

    $title = "Help";
   	include('common/header.php');
   	include('common/sidebar.php');
    include('pages/help.php');
    include('common/footer.php');
?>
