<?php
    include('../../config/config.php');
    require('../../admin/imageClass.php');  
    $datenow= date("Y-m-d");
if($_POST['title']){
		//$files_path	= realpath(dirname(__FILE__) . '../../../../../rimage/products');
		$files_path	= '/var/www/html/rimage/products';
		$tempname = $_FILES['primary_image']['tmp_name'];
		$actualname	= $_FILES['primary_image']['name'];
		$info = @getimagesize($_FILES['primary_image']['tmp_name']);						
		$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018');
		$extname = substr($actualname, strrpos($actualname,'.')+1); 			
		
		$title = mysqli_real_escape_string($connect,$_POST['title']);
		$lotnumber = mysqli_real_escape_string($connect,$_POST['lotnumber']);
		$lot_description = mysqli_real_escape_string($connect,$_POST['lot_description']);
		$untilDate= mysqli_real_escape_string($connect,$_POST['untilDate']);
		// $image= mysqli_real_escape_string($connect,$_POST['image']);
		$minimumbid= mysqli_real_escape_string($connect,$_POST['minimumbid']);
		$reservebid= mysqli_real_escape_string($connect,$_POST['reservebid']);
		$bidincrement = mysqli_real_escape_string($connect,$_POST['bidincrement']);
		$fee = mysqli_real_escape_string($connect,$_POST['fee']);

		if(isset($_POST['activebox'])){
			$status = '1';
		}else{
			$status = '';
		}
		
		
		$datenow = date('Y-m-d H:i:s');
		$untilDate=date('Y-m-d',strtotime($untilDate));
		
		$sql ="INSERT INTO t_lots
					(	
					f_title, 	
					f_number, 	
					f_description, 	
					f_start_date,
					f_primary_image, 
					f_minimum_bid, 
					f_reserve_bid, 	
					f_bid_increment,
					f_status,
					f_selected,
					f_date
					)
				VALUES('{$title}',
				        '{$lotnumber}',
				        '{$lot_description}',
				        '{$untilDate}',				        
				        '{$sha1}',
				        '{$minimumbid}',
				        '{$reservebid}',
				        '{$bidincrement}',
				        '{$status}',
				        '',
				        '{$datenow}')";	
		
	
		$result= $dbMaster->execute($connect,$sql);
		$get_lotid= mysqli_insert_id($connect);	
		
		
		$sql ="INSERT INTO t_lots_fee
					(	
					f_lots_id, 	
				 
					amout
					)
				VALUES('{$get_lotid}',
				        '{$fee}' ) 
						
						
						
						";	
		
	
		$result= $dbMaster->execute($connect,$sql);
		 
		
		//#ON DUPLICATE KEY UPDATE amout='{$fee}' 
		//initialize class
		$dfunction  = new ffunction();
		
		// $imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$info,$extname);

		if ($_FILES['primary_image']['tmp_name'] != "") {
			$tempname = $_FILES['primary_image']['tmp_name'];
			$actualname	= $_FILES['primary_image']['name'];
			$info = @getimagesize($_FILES['primary_image']['tmp_name']);						
			$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018');
			$extname = substr($actualname, strrpos($actualname,'.')+1); 			
		
			$imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$_FILES['primary_image']['type'],$extname);
			
			$sql ="INSERT INTO t_image_additional (f_image_path,f_lot_id) VALUES ('{$sha1}','{$get_lotid}')";
			$dbMaster->execute($connect,$sql);						
		}	
		
			$count = count($_FILES['addnl_image']['tmp_name']);
		for ($i=0; $i<$count; $i++) {		
			if ($_FILES['addnl_image']['tmp_name'][$i] != "") {
				$tempname = $_FILES['addnl_image']['tmp_name'][$i];
				$actualname	= $_FILES['addnl_image']['name'][$i];
				$info = @getimagesize($_FILES['addnl_image']['tmp_name'][$i]);						
				$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018'.$i);
				$extname = substr($actualname, strrpos($actualname,'.')+1); 			
					
				$imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$info['mime'],$extname);
					
				$sql ="INSERT INTO t_image_additional (f_image_path,f_lot_id) VALUES ('{$sha1}','{$get_lotid}')";
				$dbMaster->execute($connect,$sql);						
			}	
		}
		
		
		$docfile = "../documents/" . $get_lotid . "_.pdf";	
		move_uploaded_file($_FILES["pdfdoc"]["tmp_name"],$docfile);	
		
		header("location:../../admin/lots.php?type=manage");
	}
?>
