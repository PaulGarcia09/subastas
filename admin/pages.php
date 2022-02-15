<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }

    if(isset($_POST['aboutus'])){
		// dd($_POST);
		$update_about = mysql_escape_string($_POST['aboutus']);
		//$update_about = $_POST['aboutus'];
	   	  $update = "update t_pages set about_us = '".$update_about."' WHERE rec_id =1";
	   	  $dbMaster->execute($connect,$update);
		$msg = "<span style='color:green;'>Page Updated</span>";
	}

	if(isset($_POST['contactus'])){
		$update_contact = mysql_escape_string($_POST['contactus']);
		//$update_contact = $_POST['contactus'];
	   	  $update = "update t_pages set contact_us = '".$update_contact."' WHERE rec_id =1";
	   	  $dbMaster->execute($connect,$update);
	$msg = "<span style='color:green;'>Page Updated</span>";

	}

	if(isset($_POST['terms'])){
		$update_terms = mysql_escape_string($_POST['terms']);
		//$update_terms = $_POST['terms'];
	   	  $update = "update t_pages set terms_conditions = '".$update_terms."' WHERE rec_id =1";
	   	  $dbMaster->execute($connect,$update);
	$msg = "<span style='color:green;'>Page Updated</span>";
	}

	$sql = "select * from t_pages WHERE rec_id =1";
	$pages = $dbMaster->getRowAsAssoc($connect,$sql);

	$title = "Pages";
   	include('common/header.php');
   	include('common/sidebar.php');
    include('pages/pages.php');
    include('common/footer.php');
?>
