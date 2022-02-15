<?php
    include('../../config/config.php');
    require('../../admin/imageClass.php');  
    $datenow= date("Y-m-d");
    if($_POST['title']){
		
		$title = mysqli_real_escape_string($connect,$_POST['title']);
		$lotnumber = mysqli_real_escape_string($connect,$_POST['lotnumber']);
		$lot_description = mysqli_real_escape_string($connect,$_POST['lot_description']);
		$untilDate= mysqli_real_escape_string($connect,$_POST['untilDate']);
		// $image= mysqli_real_escape_string($connect,$_POST['primary_image']);

		if(isset($_POST['activebox'])){
			$status = '1';
		}else{
			$status = '';
		}
		
		
		$datenow = date('Y-m-d H:i:s');
		$untilDate=date('Y-m-d',strtotime($untilDate));
		
		$sql ="INSERT INTO t_events
					(	
					f_title, 	
					f_number, 	
					f_description, 	
					f_start_date,
					f_status,
					f_selected,
					f_date
					)
				VALUES('{$title}',
				        '{$lotnumber}',
				        '{$lot_description}',
				        '{$untilDate}',	
				        '{$status}',
				        '',
				        '{$datenow}')";	
		
	
		$result= $dbMaster->execute($connect,$sql);
		$get_lotid= mysqli_insert_id($connect);	

		if($_FILES){
	    	$dfunction  = new ffunction();
			$files_path	= realpath(dirname(__FILE__) . '../../../../rimage/products');
			$tempname = $_FILES['product_image']['tmp_name'];
			$actualname	= $_FILES['product_image']['name'];
			$info = @getimagesize($_FILES['product_image']['tmp_name']);						
			$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018');
			$extname = substr($actualname, strrpos($actualname,'.')+1); 			
		
			$imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$_FILES['product_image']['type'],$extname);
			
			$sql ="Update t_events set f_primary_image ='{$sha1}' where f_events_id ='{$get_lotid}'";
			$dbMaster->execute($connect,$sql);;
	    }

		// $docfile = "../documents/" . $get_lotid . "_.pdf";	
		// move_uploaded_file($_FILES["pdfdoc"]["tmp_name"], $docfile);	
				
		if($result){
			// if(count($_POST['product_image'])>0){				
			// 	foreach($_POST['product_image'] as $additional){
			// 	   if($additional!=""){
			// 	   	  $sql ="INSERT INTO t_image_additional (f_image_path,f_lot_id) VALUES('{$additional}','$get_lotid')";
			// 	   	  $dbMaster->execute($connect,$sql);
			// 	   }
			// 	}
			// }
			header("location:../../admin/events.php");
		}		
		
	}
?>
