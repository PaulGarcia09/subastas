<?php
    include('../../config/config.php');
    require('../../admin/imageClass.php');  
    $datenow= date("Y-m-d");
    if($_FILES['product_image']['tmp_name'] != ""){
    	$dfunction  = new ffunction();
		$lotid =$_POST['eventid'];
			//$files_path	= realpath(dirname(__FILE__) . '../../../../../rimage/products');
			$files_path	= '/var/www/html/rimage/products';
		$tempname = $_FILES['product_image']['tmp_name'];
		$actualname	= $_FILES['product_image']['name'];
		$info = @getimagesize($_FILES['product_image']['tmp_name']);						
		$sha1 = sha1(Date('Y-m-d H:i:s').'larry2018');
		$extname = substr($actualname, strrpos($actualname,'.')+1); 			
	
		$imagesuccessPath = $dfunction->createImageProduct($tempname,$actualname,$files_path,$sha1,$_FILES['product_image']['type'],$extname);
		
		$sql ="Update t_events set f_primary_image ='{$sha1}' where f_events_id ='{$lotid}'";
		$dbMaster->execute($connect,$sql);
    }

    if($_POST['title']){
		$lotid =$_POST['eventid'];

		$title = mysqli_real_escape_string($connect,$_POST['title']);
		$lotnumber = mysqli_real_escape_string($connect,$_POST['lotnumber']);
		$lot_description = mysqli_real_escape_string($connect,$_POST['lot_description']);
		$untilDate= mysqli_real_escape_string($connect,$_POST['untilDate']);
		  $image= mysqli_real_escape_string($connect,$_POST['image']);
		  $typevent= mysqli_real_escape_string($connect,$_POST['event']);

		if(isset($_POST['activebox'])){
			$status = '1';
		}else{
			$status = '';
		}
		
		// $docfile = "../documents/" . $get_lotid . "_.pdf";
	
		// move_uploaded_file($_FILES["pdfdoc"]["tmp_name"], $docfile);	
		
		// $datenow = date('Y-m-d H:i:s');
		$untilDate=date('Y-m-d',strtotime($untilDate));
		// dd($untilDate);
		// $product_name = mysqli_real_escape_string($connect,$_POST['product_name']);		
		// $product_meta_keyword = mysqli_real_escape_string($connect,$_POST['product_meta_keyword']);
		// $product_meta_description = mysqli_real_escape_string($connect,$_POST['product_meta_description']);
		// $description = htmlentities($_POST['editor1']);
		// $description2 = htmlentities($_POST['editor2']);
		
	
		
		$sql ="Update t_events set
					f_title ='{$title}', 	
					f_number='{$lotnumber}',	
					f_description='{$lot_description}', 
					f_start_date = '{$untilDate}',
					f_eventtype='{$typevent}',
					f_status = '{$status}'
					where f_events_id ='{$lotid}'";
					// f_primary_image='{$image}',
		$result= $dbMaster->execute($connect,$sql);	
		if($result){	
			
			$_SESSION['msglots']='ok';			
			header("location:../../admin/events.php");
		 }
	}
?>
