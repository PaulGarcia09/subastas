<?php
	include('../../config/config.php');	
	$adminid = $_SESSION['auctiobroad']['user_id'];
	if (isset($_FILES['userfile']['tmp_name'])) {
		$allowed_filetypes = array('.csv');
		$max_filesize = 10485760;
		$upload_path = '/var/www/html/admin/bulkuploader/bulkFiles/';
		$event = $_POST['event'];
		$arr['message'] = $event;
		$filename = $_FILES['userfile']['name'];
		$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
		
		if ($event == "") {
			$arr['message'] = "You have not selected an event!";
			$arr['result'] = "error";
		} elseif ($_FILES['userfile']['tmp_name'] == "") {
			$arr['message'] = "You have not selected a CSV file!";
			$arr['result'] = "error";
		} elseif (filesize($_FILES['userfile']['tmp_name']) > $max_filesize) {
			$arr['message'] = "The file you attempted to upload is too large!";
			$arr['result'] = "error";
		} elseif (!in_array($ext,$allowed_filetypes)) {
			$arr['message'] = "The file you attempted to upload is not allowed!";		
			$arr['result'] = "error";
		} else {	
			$uploadFile = $upload_path.$filename;
			if (move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadFile)) {
				
				//$datenow = date('Y-m-d H:i:s');		
				$csvFile = fopen($uploadFile,'r');
				fgetcsv($csvFile);		
				
				while (($line = fgetcsv($csvFile)) !== false) {
					$idnumber = $line[1];
					//$arr['message'] = $idnumber;
					$sql ="SELECT f_lots_id FROM t_lots WHERE f_number='{$idnumber}' AND f_lots_event='{$event}' AND f_lots_admin='{$adminid}'";
					$lot_check = $dbMaster->getRowAsAssoc($connect,$sql);
					if (!$lot_check) {
						
						$sql = "INSERT INTO t_lots (f_title,f_number,f_description,f_event,f_primary_image,f_minimum_bid,f_reserve_bid,f_limitbid,f_bid_increment,f_status,f_date,f_start_date)
							VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$event."','".$event."')";
						$dbMaster->execute($connect,$sql);
					
					}	
				} 
				fclose($csvFile);
				$arr['message'] = "You have successfully uploaded the CSV file.";
				$arr['result'] = "success";
			}
		}
	} else {
		$arr['message'] = "There was a problem loading the file. Please try again.";
		$arr['result'] = "error";
	}
	echo json_encode($arr);	
	exit;
?>
