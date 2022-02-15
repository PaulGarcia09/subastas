<?php
	include('config/config.php');
	
	$sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);

    include('pages/streamlive.php');
?>
