<?php

	include('../../config/debe.php');
	ini_set("memory_limit","100M");
    require('../function.class.php');
	
	$dbMaster = new ConnectionDB();
	$connect = $dbMaster->DBmaster();  
	define ('datenow', date('Y-m-d H:i:s'));
	

if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
{
	$file_name		= strip_tags($_FILES['upload_file']['name']);
	
	
	//check if file is in the record
	$sql = "
		SELECT *
		FROM t_lots
		WHERE f_primary_image = '$file_name'
		LIMIT 1;
	
	";
	
	$rec = $dbMaster->getRowAsAssoc($connect,$sql);
	
	
	if($rec){
			
			//initialize class
			$dfunction  = new ffunction();
			 
			$lot_id = $rec['f_lots_id'];			
			$file_id 		= strip_tags($_POST['upload_file_ids']);
			$file_size 		= $_FILES['upload_file']['size'];
			$file_type = $_FILES['upload_file']['type'];
			$files_path		= '../../rimage/products/';
			
			
			$actualname	      = $_FILES['upload_file']['name'];
			$fileExt = substr($actualname, strrpos($actualname, '.')+1); // get file extension
			$sha1=sha1(Date('Y-m-d H:i:s').'marcus2014');
			$newName = $sha1.".".$fileExt;
			//$recordName = $sha1.".d";
			$file_location 	= $files_path . $newName;
			
			
			// approved file types
			$approved_types = array("image/png","image/jpg","image/jpeg");
			// approved file extensions
			$approved_exts = array("png","jpg","jpeg");
			
			
			if (!in_array($_FILES['upload_file']['type'], $approved_types)){
			
			
				//pass only jpeg is allowed
				
			}else{	
			
					if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $file_location)){
												
						//update the record
						$sq = "
							UPDATE t_lots
							SET f_primary_image = '$newName'
							WHERE f_lots_id = '$lot_id'
							;
						
						";
						
						$exec = $dbMaster->execute($connect,$sq);
						
						
						if($exec){
						
							echo "	<script>
										alert('Image upload completeds.');
										window.close();
									</script>";
						}
						
						//$myfile = fopen("debug.txt", "w") or die("Unable to open file!");
						//$txt = $sq."\n";
						//fwrite($myfile, $txt);	
						//fclose($myfile);
						
						
							
						echo $file_id;	
											
					}else{
						echo 'system_error';
					}
					
			}			
	
	}else{
	
		echo 'file_error';
	}
	
	
	
	
	
}
?>