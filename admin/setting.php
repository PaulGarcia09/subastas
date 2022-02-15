<?php
    include('../config/config.php');
    if(!isset($_SESSION['auctiobroad'])){
    	header("location:index.php");
    }

    if(isset($_POST['fb'])){
		$fb = $_POST['fb'];
	   	  $update = "update t_pages set facebook_url = '".$fb."' WHERE rec_id =1";
	   	  $dbMaster->execute($connect,$update);
		$msg = "<span style='color:green;'>Page Updated</span>";
	}

	if(isset($_POST['twitter'])){
		$twitter = $_POST['twitter'];
	   	  $update = "update t_pages set twitter_url = '".$twitter."' WHERE rec_id =1";
	   	  $dbMaster->execute($connect,$update);
	$msg = "<span style='color:green;'>Page Updated</span>";

	}
	
	
	 
	//if(isset($_POST['logos'])){
		
	if($_FILES['logos']['name'] != ""){
			
			

		 	$target_dir = "/var/www/html/assets/img/";
			$target_file = $target_dir . basename($_FILES["logos"]["name"]);
			$name_logo = basename($_FILES["logos"]["name"]);
			$update_logo = "update t_pages set logo_image = '". $name_logo ."' WHERE rec_id = 1";
	   	  	$dbMaster->execute($connect,$update_logo);

			if (move_uploaded_file($_FILES["logos"]["tmp_name"], $target_file)) {
			    
			}
	 
	}	 

	if($_FILES['banner']['name'] != ""){

			$target_dir2 = "/var/www/html/assets/img/";
			$target_file2 = $target_dir2 . basename($_FILES["banner"]["name"]);
			$name_banner = basename($_FILES["banner"]["name"]);
			$update_banner = "update t_pages set center_image = '". $name_banner ."' WHERE rec_id = 1";
	   	  	$dbMaster->execute($connect,$update_banner);

			if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file2)) {
			    
			}
	}


	$sql = "select * from t_pages WHERE rec_id =1";
	$setting = $dbMaster->getRowAsAssoc($connect,$sql);
	$title = "Settings";
   	include('common/header.php');
   	include('common/sidebar.php');
    include('pages/setting.php');
    include('common/footer.php');
?>
