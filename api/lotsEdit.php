<?php
    include('../../config/config.php');
    require('../../admin/imageClass.php');  
	
		
	if($_POST['title']){
		$lotid =$_POST['lotid'];
		
		// $files_path	= realpath(dirname(__FILE__) . '../../../../rimage/products');
		$files_path	= '/var/www/html/rimage/products';
		$title = mysqli_real_escape_string($connect,$_POST['title']);
		$lotnumber = mysqli_real_escape_string($connect,$_POST['lotnumber']);
		$lot_description = mysqli_real_escape_string($connect,$_POST['lot_description']);
		$untilDate= mysqli_real_escape_string($connect,$_POST['untilDate']);
		// $image= mysqli_real_escape_string($connect,$_POST['image']);
		$minimumbid= mysqli_real_escape_string($connect,$_POST['minimumbid']);
		$reservebid= mysqli_real_escape_string($connect,$_POST['reservebid']);
		$bidincrement = mysqli_real_escape_string($connect,$_POST['bidincrement']);

		if(isset($_POST['activebox'])){
			$status = '1';
		}else{
			$status = '';
		}
		
		$docfile = "../documents/" . $lotid . "_.pdf";
	
		move_uploaded_file($_FILES["pdfdoc"]["tmp_name"], $docfile);	
		
		$datenow = date('Y-m-d H:i:s');
		$untilDate=date('Y-m-d',strtotime($untilDate));
		// $product_name = mysqli_real_escape_string($connect,$_POST['product_name']);		
		// $product_meta_keyword = mysqli_real_escape_string($connect,$_POST['product_meta_keyword']);
		// $product_meta_description = mysqli_real_escape_string($connect,$_POST['product_meta_description']);
		// $description = htmlentities($_POST['editor1']);
		// $description2 = htmlentities($_POST['editor2']);
		
		
		$sql ="Update t_lots set
					f_title ='{$title}', 	
					f_number='{$lotnumber}',	
					f_description='{$lot_description}', 	
					f_start_date='{$untilDate}',
					f_minimum_bid='{$minimumbid}',
					f_reserve_bid= '{$reservebid}',
					f_bid_increment='{$bidincrement}',
					f_status='{$status}', 
					f_date='{$datenow}'
					where f_lots_id ='{$lotid}'";
		$result= $dbMaster->execute($connect,$sql);
		
		
		//initialize class
		$dfunction  = new ffunction();

		if ($_FILES['primary_image']['tmp_name'] != "") {		
			$tempname = $_FILES['primary_image']['tmp_name'];
			$actualname	= $_FILES['primary_image']['name'];
			$info = @getimagesize($_FILES['primary_image']['tmp_name']);						
			$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018');
			$extname = substr($actualname, strrpos($actualname,'.')+1); 			
		
			$imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$_FILES['primary_image']['type'],$extname);
			
			$sql ="Update t_lots set f_primary_image ='{$sha1}' where f_lots_id ='{$lotid}'";
			$dbMaster->execute($connect,$sql);			
		}
		if(isset($_FILES['addnl_image'])){
			$count = count($_FILES['addnl_image']['tmp_name']);
			for ($i=0; $i<$count; $i++) {		
				if ($_POST['addnl_image_delete'][$i] == "") {
					if ($_FILES['addnl_image']['tmp_name'][$i] != "") {
						$tempname = $_FILES['addnl_image']['tmp_name'][$i];
						$actualname	= $_FILES['addnl_image']['name'][$i];
						$info = @getimagesize($_FILES['addnl_image']['tmp_name'][$i]);						
						$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018'.$i);
						$extname = substr($actualname, strrpos($actualname,'.')+1); 			
								
						$imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$info['mime'],$extname);	
						
						if ($_POST['addnl_image_hidden'][$i] == "") {
							$sql ="INSERT INTO t_image_additional (f_image_path,f_lot_id) VALUES ('{$sha1}','{$lotid}')";
							$dbMaster->execute($connect,$sql);						
						} else {
							$imgpath = $_POST['addnl_image_hidden'][$i];
							$sql ="UPDATE t_image_additional  SET f_image_path = '{$sha1}' WHERE f_image_path = '{$imgpath}'";
							$dbMaster->execute($connect,$sql);						
						}	
					}	
				} else {
					$imgpath = $_POST['addnl_image_delete'][$i];
					$sql ="DELETE FROM t_image_additional WHERE f_image_path = '{$imgpath}'";
					$dbMaster->execute($connect,$sql);						
				}	
			}	
		}
			
		$_SESSION['msglots']='ok';
		if(isset($_GET['console'])){
			header("location:../../admin/console.php");	
		}else{
			header("location:../../admin/lots.php?type=manage");	
		}
	}

?>
