<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }
    
    $sql ="SELECT * FROM t_customer ORDER BY f_type,f_customer_id asc";
	$users = $dbMaster->getResultAsAssoc($connect,$sql);

	// d($users);


    $title = "User";

   	include('common/header.php');
   	// include('common/sidebar.php');
    include('pages/user.php');
    include('common/footer.php');

?>
