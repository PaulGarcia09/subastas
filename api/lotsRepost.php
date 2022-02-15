<?php
    include('../../config/config.php');
    require('../../admin/imageClass.php');  
	
	//Random number with set number of digits
	$digits = 7;
	$newlotnum = rand(pow(10, $digits-1), pow(10, $digits)-1);
	
	$lotid = $_POST['id'];
	
	$sql ="select * from t_lots where (f_status='2' OR f_status='3') and f_lots_id = '{$lotid}'";
	$lots = $dbMaster->getRowAsAssoc($connect,$sql);

	$sha ="";
	if ($lots['f_primary_image'] != "") {            			    	            			    	
		$imagecat = $lots['f_primary_image'];
		$sha = sha1($lots['f_primary_image']);
		if (file_exists("../rimage/products/$imagecat.a.jpg")) {
			//====================jpg========================//
			$file = "../rimage/products/".$lots['f_primary_image'].".a.jpg";
			$newfile = "../rimage/products/$sha.a.jpg";	
			copy($file, $newfile);
			//..............................................//
			$file = "../rimage/products/".$imagecat.".b.jpg";				
			$newfile = "../rimage/products/$sha.b.jpg";	
			copy($file, $newfile);
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".c.jpg";				
			$newfile = "../rimage/products/$sha.c.jpg";	
			copy($file, $newfile);
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".d.jpg";				
			$newfile = "../rimage/products/$sha.d.jpg";	
			copy($file, $newfile);				
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".e.jpg";				
			$newfile = "../rimage/products/$sha.e.jpg";	
			copy($file, $newfile);			
		} elseif (file_exists("../rimage/products/$imagecat.a.png")) {				
			//====================png========================//
			$file = "../rimage/products/".$lots['f_primary_image'].".a.png";
			$newfile = "../rimage/products/$sha.a.png";	
			copy($file, $newfile);
			//..............................................//
			$file = "../rimage/products/".$imagecat.".b.png";				
			$newfile = "../rimage/products/$sha.b.png";	
			copy($file, $newfile);
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".c.png";				
			$newfile = "../rimage/products/$sha.c.png";	
			copy($file, $newfile);
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".d.png";				
			$newfile = "../rimage/products/$sha.d.png";	
			copy($file, $newfile);				
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".e.png";				
			$newfile = "../rimage/products/$sha.e.png";	
			copy($file, $newfile);			
		} elseif (file_exists("../rimage/products/$imagecat.a.gif")) {				
			//====================gif========================//
			$file = "../rimage/products/".$lots['f_primary_image'].".a.gif";
			$newfile = "../rimage/products/$sha.a.gif";	
			copy($file, $newfile);
			//..............................................//
			$file = "../rimage/products/".$imagecat.".b.gif";				
			$newfile = "../rimage/products/$sha.b.gif";	
			copy($file, $newfile);
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".c.gif";				
			$newfile = "../rimage/products/$sha.c.gif";	
			copy($file, $newfile);
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".d.gif";				
			$newfile = "../rimage/products/$sha.d.gif";	
			copy($file, $newfile);				
			//..............................................//				
			$file = "../rimage/products/".$imagecat.".e.gif";				
			$newfile = "../rimage/products/$sha.e.gif";	
			copy($file, $newfile);			
		}		
	}       			    		  
	$datenow = date('Y-m-d H:i:s');
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
		f_selected,
		f_date
		)
	VALUES('{$lots['f_title']}',
		'{$newlotnum}',
		'{$lots['f_description']}',
		'{$lots['f_start_date']}',				        
		'{$sha}',
		'{$lots['f_minimum_bid']}',
		'{$lots['f_reserve_bid']}',
		'{$lots['f_bid_increment']}',
		'',
		'{$datenow}')";			
	$result= $dbMaster->execute($connect,$sql);	
	$idlast = mysqli_insert_id($connect);	
			
    $sql2 = "select * from t_image_additional where f_lot_id ='{$lotid}'";
    $additional_image =$dbMaster->getResultAsAssoc($connect,$sql2);
     
    if (!empty($additional_image)) {
		foreach ($additional_image as $val) {    
			if ($val['f_image_path'] != "") {            			    	            			    	
				$imagecat = $val['f_image_path'];
				$sha = sha1($val['f_image_path']);
				if (file_exists("../rimage/products/$imagecat.a.jpg")) {
					//====================jpg========================//					
					$file = "../rimage/products/".$imagecat.".a.jpg";
					$newfile = "../rimage/products/$sha.a.jpg";	
					copy($file, $newfile);
					//..............................................//									
					$file = "../rimage/products/".$imagecat.".b.jpg";							
					$newfile = "../rimage/products/$sha.b.jpg";	
					copy($file, $newfile);
					//..............................................//									
					$file = "../rimage/products/".$imagecat.".c.jpg";							
					$newfile = "../rimage/products/$sha.c.jpg";	
					copy($file, $newfile);
					//..............................................//														
					$file = "../rimage/products/".$imagecat.".d.jpg";							
					$newfile = "../rimage/products/$sha.d.jpg";	
					copy($file, $newfile);
					//..............................................//														
					$file = "../rimage/products/".$imagecat.".e.jpg";							
					$newfile = "../rimage/products/$sha.e.jpg";	
					copy($file, $newfile);	
				} elseif (file_exists("../rimage/products/$imagecat.a.png")) {				
					//====================png========================//					
					$file = "../rimage/products/".$imagecat.".a.png";
					$newfile = "../rimage/products/$sha.a.png";	
					copy($file, $newfile);
					//..............................................//									
					$file = "../rimage/products/".$imagecat.".b.png";							
					$newfile = "../rimage/products/$sha.b.png";	
					copy($file, $newfile);
					//..............................................//									
					$file = "../rimage/products/".$imagecat.".c.png";							
					$newfile = "../rimage/products/$sha.c.png";	
					copy($file, $newfile);
					//..............................................//														
					$file = "../rimage/products/".$imagecat.".d.png";							
					$newfile = "../rimage/products/$sha.d.png";	
					copy($file, $newfile);
					//..............................................//														
					$file = "../rimage/products/".$imagecat.".e.png";							
					$newfile = "../rimage/products/$sha.e.png";	
					copy($file, $newfile);	
				} elseif (file_exists("../rimage/products/$imagecat.a.gif")) {				
					//====================gif========================//					
					$file = "../rimage/products/".$imagecat.".a.gif";
					$newfile = "../rimage/products/$sha.a.gif";	
					copy($file, $newfile);
					//..............................................//									
					$file = "../rimage/products/".$imagecat.".b.gif";							
					$newfile = "../rimage/products/$sha.b.gif";	
					copy($file, $newfile);
					//..............................................//									
					$file = "../rimage/products/".$imagecat.".c.gif";							
					$newfile = "../rimage/products/$sha.c.gif";	
					copy($file, $newfile);
					//..............................................//														
					$file = "../rimage/products/".$imagecat.".d.gif";							
					$newfile = "../rimage/products/$sha.d.gif";	
					copy($file, $newfile);
					//..............................................//														
					$file = "../rimage/products/".$imagecat.".e.gif";							
					$newfile = "../rimage/products/$sha.e.gif";	
					copy($file, $newfile);	
				}	
				$sql ="INSERT INTO t_image_additional (f_image_path,f_lot_id) VALUES('{$sha}','$idlast')";
				$dbMaster->execute($connect,$sql);		
			}   
		}     	     	
    }     
    $array['status'] =200;
	$array['message'] ="";
    echo json_encode($array);
    exit;
?>