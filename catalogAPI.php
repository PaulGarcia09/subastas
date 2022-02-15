<?php
    include('config/config.php');

    $datenow= date("Y-m-d");

    if(isset($_GET['status'])) $status = $_GET['status'];
    else $status = "prebidding";

	if (isset($_GET['catdate'])) {
		$catdate = 	$_GET['catdate'];
		//If a specific event is clicked then show lots for that date only	
		$sql ="select * from t_lots where f_status = '1' and f_selected <> '1' and f_start_date ='{$catdate}' ORDER BY f_number*1 ASC";
		$catalog = $dbMaster->getResultAsAssoc($connect,$sql);
	}   else {
		if($status == "completed"){if (isset($_GET['cdate'])) {
		
		$cdate = 	$_GET['cdate'];
		$sql ="select * from t_lots where (f_status = '3' OR f_status = '2' ) and f_start_date ='{$cdate}'  ORDER BY f_start_date,f_number ASC";
			$catalog = $dbMaster->getResultAsAssoc($connect,$sql);
	}else{
			$sql ="select * from t_lots where f_status = '3' OR f_status = '2' ORDER BY f_start_date,f_number ASC";
			$catalog = $dbMaster->getResultAsAssoc($connect,$sql);
	}
		}else{
			//if Catalog button or link was clicked then then show full catalog
			//$sql ="select * from t_lots where f_status = '1' and f_selected <> '1' and f_start_date >='{$datenow}' ORDER BY f_start_date,f_number*1 ASC";
			$sql ="select * from t_lots where f_status = '1' and f_start_date >='{$datenow}' ORDER BY f_start_date,f_number*1 ASC";
			// $sql ="select * from t_lots where f_status = '1'  ORDER BY

				// CASE 
					  // WHEN  f_selected = 1  THEN 0
					  // WHEN DATE(f_start_date) = DATE(NOW()) THEN 1
					  // WHEN DATE(f_start_date) < DATE(NOW()) THEN 3
					  // WHEN DATE(f_start_date) > DATE(NOW()) THEN 2
					  // ELSE 4
					// END , DATE(f_start_date) ASC

		 // ";
			$catalog = $dbMaster->getResultAsAssoc($connect,$sql);
		}
	}



    include('common/header.php');
    include('pages/catalog.php');
    include('common/footer.php');
?>
