<?php
	include('../../../config/config.php');	
    require('function.class.php');	
    ini_set("memory_limit","100M"); 

	if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")	{
		$file_name = strip_tags($_FILES['upload_file']['name']);	
		$sql = "SELECT f_lots_id FROM t_lots WHERE f_primary_image = '{$file_name}'";
		$lot = $dbMaster->getRowAsAssoc($connect,$sql);
			
		// dd($lot);	
		if ($lot) {				
			//initialize class
			$dfunction  = new ffunction();
		
			$lot_id = $lot['f_lots_id'];			
			$file_id = strip_tags($_POST['upload_file_ids']);
			$files_path	= '/var/www/html/rimage/products/';
			//$files_path	= '../../../../rimage/products';
			$max_filesize = 1000000;
			
			$tempname = $_FILES['upload_file']['tmp_name'];
			$actualname	= $_FILES['upload_file']['name'];
			$info = @getimagesize($_FILES['upload_file']['tmp_name']);						
			$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018');
			$extname = substr($actualname, strrpos($actualname,'.')+1); 						
			$approved_types = array("image/jpg","image/jpeg","image/png","image/gif");
			if (!in_array($_FILES['upload_file']['type'], $approved_types)) {
				echo "file_type_error";				
			} elseif (filesize($_FILES['upload_file']['tmp_name']) > $max_filesize) {
				echo "file_size_error";	
			} else {		
				$imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$info['mime'],$extname);
				if ($imagesuccessPath['ori'] !="") {	
					$sql = "UPDATE t_lots SET f_primary_image = '{$sha1}' WHERE f_lots_id = '{$lot_id}'";
					$dbMaster->execute($connect,$sql);
					echo $file_id;
				} else {
					echo "general_system_error";
				}
			}			
		} else {
			echo "not_in_csv_error";
		}
	} else {	
		echo "general_system_error";
	}
?>