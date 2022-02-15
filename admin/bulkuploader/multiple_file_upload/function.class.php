<?php
ini_set('memory_limit','90M');

class ffunction {
	
	public function createImage($tempname,$actualname,$path,$sha1,$filetype,$extname) 
	{
		
		global $destination_path;   
	    global $destination_path2; 
		
		global $new_width; 
	    global $new_height;
	    
	    global $new_widthb; 
	    global $new_heightb;
	    
	    $new_width = 150;
	    $new_height =100;    
	    
	    $new_widthb = 250;
	    $new_heightb = 250;  
	 
	    $quality = 500;
		$approved_types = array("image/jpg","image/jpeg","image/png","image/gif");
		if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
			$extname = "jpg";
	    }
	    
		
		if (in_array($filetype,$approved_types)) {
			$destination_path = $path.'/'.$sha1.'.a.'.$extname;
		    $destination_path2 =$path.'/'.$sha1.'.b.'.$extname;    		    
		    
		    $destimg=imagecreatetruecolor($new_width,$new_height) or die("Problem In Creating image 1");
			imagealphablending($destimg,false);
			imagesavealpha($destimg,true);	    			    
			if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				$srcimg =imagecreatefromjpeg($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagejpeg($destimg,$destination_path) or die("Problem In saving");	
			} elseif ($filetype == "image/png") {				    	
				$srcimg =imagecreatefrompng($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagepng($destimg,$destination_path) or die("Problem In saving");	
			} elseif ($filetype == "image/gif") {				    	
				$srcimg =imagecreatefromgif($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagegif($destimg,$destination_path) or die("Problem In saving");	
			}
	    	$srcimg2 = $srcimg;
	    	
	    	$old_x=imageSX($srcimg2);
			$old_y=imageSY($srcimg2);	    	
			$ratio1=$old_x/$new_widthb;			
			$ratio2=$old_y/$new_heightb;			
			if($ratio1>$ratio2) {			
				$thumb_w=$new_widthb;			
				$thumb_h=$old_y/$ratio1;			
			}else {			
				$thumb_h=$new_heightb;			
				$thumb_w=$old_x/$ratio2;			
			}
	    	
	    	$destimg2=imagecreatetruecolor($thumb_w,$thumb_h) or die("Problem In Creating image 2"); 	
			imagealphablending($destimg2,false);
			imagesavealpha($destimg2,true);	    		    	
	    	imagecopyresampled($destimg2,$srcimg2,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 	   
	    	if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				imagejpeg($destimg2,$destination_path2,$quality);
			} elseif ($filetype == "image/png") {				    	
				imagepng($destimg2,$destination_path2,$quality);
			} elseif ($filetype == "image/gif") {				    	
				imagegif($destimg2,$destination_path2,$quality);
			}
	    
	    	imagedestroy($destimg);
	    	imagedestroy($destimg2);
	    	
	        $destination_path3 =$path.'/'.$sha1.'.original.'.$extname; 
		    move_uploaded_file($tempname,$destination_path3);
	    	
		}
		
		$Desti = array();
		$Desti['ori'] = $destination_path2;
		$Desti['thumb'] = $destination_path;
		return $Desti;
	
	} 
		
		
	public function createImageads($tempname,$actualname,$path,$sha1,$filetype,$extname) 
	{
		
		global $destination_path;   
	    global $destination_path2; 
		
		global $new_width; 
	    global $new_height;
	    
	    global $new_widthb; 
	    global $new_heightb;
	    
	    $new_width = 150;
	    $new_height =100;    
	    
	    $new_widthb = 40;
	    $new_heightb = 40;  
	    	    
	    $new_widthc = 164;
	    $new_heightc = 126;  
	 
	    $quality = 500;
		$approved_types = array("image/jpg","image/jpeg","image/png","image/gif");
		if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
			$extname = "jpg";
	    }
	    
		
		if (in_array($filetype,$approved_types)) {
			$destination_path = $path.'/'.$sha1.'.a.'.$extname; // thumbnail
		    $destination_path2 =$path.'/'.$sha1.'.b.'.$extname; // preview  
		    $destination_path3 =$path.'/'.$sha1.'.c.'.$extname; // big		    
	
		    
		    $destimg=imagecreatetruecolor($new_width,$new_height) or die("Problem In Creating image 3");
			imagealphablending($destimg,false);
			imagesavealpha($destimg,true);	    			    
			if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				$srcimg =imagecreatefromjpeg($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagejpeg($destimg,$destination_path) or die("Problem In saving");	
			} elseif ($filetype == "image/png") {				    	
				$srcimg =imagecreatefrompng($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagepng($destimg,$destination_path) or die("Problem In saving");	
			} elseif ($filetype == "image/gif") {				    	
				$srcimg =imagecreatefromgif($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagegif($destimg,$destination_path) or die("Problem In saving");	
			}
	    	$srcimg2 = $srcimg;
	    	$srcimg3 = $srcimg;
	    	
	    	$old_x=imageSX($srcimg2);
			$old_y=imageSY($srcimg2);	    	
			$ratio1=$old_x/$new_widthb;			
			$ratio2=$old_y/$new_heightb;			
			if($ratio1>$ratio2) {			
				$thumb_w=$new_widthb;			
				$thumb_h=$old_y/$ratio1;			
			}else {			
				$thumb_h=$new_heightb;			
				$thumb_w=$old_x/$ratio2;			
			}
	    	
	    	$destimg2=imagecreatetruecolor($thumb_w,$thumb_h) or die("Problem In Creating image 4"); 	
			imagealphablending($destimg,false);
			imagesavealpha($destimg,true);	    		    	
	    	imagecopyresampled($destimg2,$srcimg2,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 	    
	    	if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				imagejpeg($destimg2,$destination_path2,$quality);
			} elseif ($filetype == "image/png") {				    	
				imagepng($destimg2,$destination_path2,$quality);
			} elseif ($filetype == "image/gif") {				    	
				imagegif($destimg2,$destination_path2,$quality);
			}
	    
	    		    	
	    	$old_x=imageSX($srcimg2);
			$old_y=imageSY($srcimg2);	    	
			$ratio1=$old_x/$new_widthc;			
			$ratio2=$old_y/$new_heightc;			
			if($ratio1>$ratio2) {			
				$thumc_w=$new_widthc;			
				$thumc_h=$old_y/$ratio1;			
			}else {			
				$thumc_h=$new_heightc;			
				$thumc_w=$old_x/$ratio2;			
			}
	    	
	    	
	    	$destimg3=imagecreatetruecolor($thumc_w,$thumc_h) or die("Problem In Creating image 5"); 	
			imagealphablending($destimg,false);
			imagesavealpha($destimg,true);	    		    	
	    	imagecopyresampled($destimg3,$srcimg2,0,0,0,0,$thumc_w,$thumc_h,$old_x,$old_y); 	  
	    	if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				imagejpeg($destimg3,$destination_path3,$quality);
			} elseif ($filetype == "image/png") {				    	
				imagepng($destimg3,$destination_path3,$quality);
			} elseif ($filetype == "image/gif") {				    	
				imagegif($destimg3,$destination_path3,$quality);
			}
			
	    		    		   	
	    	
							    	
	    	imagedestroy($destimg);
	    	imagedestroy($destimg2);
	    	imagedestroy($destimg3);
	    
	    
	        $destination_path3 =$path.'/'.$sha1.'.original.'.$extname; 
		    move_uploaded_file($tempname,$destination_path3);
	    	
		}
		
		$Desti = array();
		$Desti['ori'] = $destination_path2;
		$Desti['thumb'] = $destination_path;
		return $Desti;
	
	} 
	
	
	
	
	
	
	
	public function createImageProduct($tempname,$actualname,$path,$sha1,$filetype,$extname) 
	{
		
		global $destination_path;   
	    global $destination_path2; 
		
		global $new_width; 
	    global $new_height;
	    
	    global $new_widthb; 
	    global $new_heightb;
	    
	    $new_width = 150;
	    $new_height =100;    
	    
	    $new_widthb = 250;
	    $new_heightb = 250;  
	    	    
	    $new_widthc = 500;
	    $new_heightc = 500;  
	    
	    $new_widthd = 40;
	    $new_heightd = 40;  
	    
	    $new_widthe = 120;
	    $new_heighte = 120;  
	    	 
	    $quality = 500;
		$approved_types = array("image/jpg","image/jpeg","image/png","image/gif");
		if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
			$extname = "jpg";
	    }
	    
		
		if (in_array($filetype,$approved_types)) {
			$destination_path = $path.'/'.$sha1.'.a.'.$extname; // thumbnail
		    $destination_path2 =$path.'/'.$sha1.'.b.'.$extname; // preview  
		    $destination_path3 =$path.'/'.$sha1.'.c.'.$extname; // big		    
		    $destination_path4 =$path.'/'.$sha1.'.d.'.$extname; // 40 by 40	
		    $destination_path5 =$path.'/'.$sha1.'.e.'.$extname; // 120 by 120
		    
		    $destimg=imagecreatetruecolor($new_width,$new_height) or die("Problem In Creating image 6");
			imagealphablending($destimg,false);
			imagesavealpha($destimg,true);	    			    
			if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				$srcimg =imagecreatefromjpeg($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagejpeg($destimg,$destination_path) or die("Problem In saving");	
			} elseif ($filetype == "image/png") {				    	
				$srcimg =imagecreatefrompng($tempname) or die("Problem In opening Source Image");       
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagepng($destimg,$destination_path) or die("Problem In saving");	
			} elseif ($filetype == "image/gif") {				    	
				$srcimg =imagecreatefromgif($tempname) or die("Problem In opening Source Image");         
				imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 
				imagegif($destimg,$destination_path) or die("Problem In saving");	
			}
	    	$srcimg2 = $srcimg;
	    	$srcimg3 = $srcimg;
	    	$srcimg4 = $srcimg;
	    	$srcimg5 = $srcimg; 		    	
	    	
	    	$old_x=imageSX($srcimg2);
			$old_y=imageSY($srcimg2);	    	
			$ratio1=$old_x/$new_widthb;			
			$ratio2=$old_y/$new_heightb;			
			if($ratio1>$ratio2) {			
				$thumb_w=$new_widthb;			
				$thumb_h=$old_y/$ratio1;			
			}else {			
				$thumb_h=$new_heightb;			
				$thumb_w=$old_x/$ratio2;			
			}
	    	
	    	$destimg2=imagecreatetruecolor($thumb_w,$thumb_h) or die("Problem In Creating image 7"); 	
			imagealphablending($destimg2,false);
			imagesavealpha($destimg2,true);	    		    	
	    	imagecopyresampled($destimg2,$srcimg2,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 	
	    	if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				imagejpeg($destimg2,$destination_path2,$quality);
			} elseif ($filetype == "image/png") {				    	
				imagepng($destimg2,$destination_path2,0);
			} elseif ($filetype == "image/gif") {				    	
				imagegif($destimg2,$destination_path2,$quality);
			}
	    
	    		    	
	    	$old_x=imageSX($srcimg2);
			$old_y=imageSY($srcimg2);	    	
			$ratio1=$old_x/$new_widthc;			
			$ratio2=$old_y/$new_heightc;			
			if($ratio1>$ratio2) {			
				$thumc_w=$new_widthc;			
				$thumc_h=$old_y/$ratio1;			
			}else {			
				$thumc_h=$new_heightc;			
				$thumc_w=$old_x/$ratio2;			
			}
	    	
	    	
	    	$destimg3=imagecreatetruecolor($thumc_w,$thumc_h) or die("Problem In Creating image 8"); 	
			imagealphablending($destimg3,false);
			imagesavealpha($destimg3,true);	    		    	
	    	imagecopyresampled($destimg3,$srcimg2,0,0,0,0,$thumc_w,$thumc_h,$old_x,$old_y); 	
	    	if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				imagejpeg($destimg3,$destination_path3,$quality);
			} elseif ($filetype == "image/png") {				    	
				imagepng($destimg3,$destination_path3,0);
			} elseif ($filetype == "image/gif") {				    	
				imagegif($destimg3,$destination_path3,$quality);
			}
			
	    		    	
	    	$old_x=imageSX($srcimg2);
			$old_y=imageSY($srcimg2);	    	
			$ratio1=$old_x/$new_widthd;			
			$ratio2=$old_y/$new_heightd;			
			if($ratio1>$ratio2) {			
				$thumd_w=$new_widthd;			
				$thumd_h=$old_y/$ratio1;			
			}else {			
				$thumd_h=$new_heightd;			
				$thumd_w=$old_x/$ratio2;			
			}
	    	
	    	$destimg4=imagecreatetruecolor($thumd_w,$thumd_h) or die("Problem In Creating image 9"); 	
			imagealphablending($destimg4,false);
			imagesavealpha($destimg4,true);	    	
	    	imagecopyresampled($destimg4,$srcimg2,0,0,0,0,$thumd_w,$thumd_h,$old_x,$old_y); 	  
	    	if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				imagejpeg($destimg4,$destination_path4,$quality);
			} elseif ($filetype == "image/png") {				    	
				imagepng($destimg4,$destination_path4);
			} elseif ($filetype == "image/gif") {				    	
				imagegif($destimg4,$destination_path4);
			}
	    	
	    	
	    	$old_x=imageSX($srcimg2);
			$old_y=imageSY($srcimg2);	    	
			$ratio1=$old_x/$new_widthe;			
			$ratio2=$old_y/$new_heighte;			
			if($ratio1>$ratio2) {			
				$thume_w=$new_widthe;			
				$thume_h=$old_y/$ratio1;			
			}else {			
				$thume_h=$new_heighte;			
				$thume_w=$old_x/$ratio2;			
			}
	    	
	    	$destimg5=imagecreatetruecolor($thume_w,$thume_h) or die("Problem In Creating image 10"); 	
			imagealphablending($destimg5,false);
			imagesavealpha($destimg5,true);	    		    	
	    	imagecopyresampled($destimg5,$srcimg2,0,0,0,0,$thume_w,$thume_h,$old_x,$old_y); 	  
	    	if ($filetype == "image/pjpeg" || $filetype == "image/jpeg") {				    
				imagejpeg($destimg5,$destination_path5,$quality);
			} elseif ($filetype == "image/png") {				    	
				imagepng($destimg5,$destination_path5,0);
			} elseif ($filetype == "image/gif") {				    	
				imagegif($destimg5,$destination_path5,$quality);
			}
	    	
	    	
							    	
	    	imagedestroy($destimg);
	    	imagedestroy($destimg2);
	    	imagedestroy($destimg3);
	    	imagedestroy($destimg4);
	    	imagedestroy($destimg5);
	    	
	    	
	        $destination_path3 =$path.'/'.$sha1.'.original.'.$extname; 
		    move_uploaded_file($tempname,$destination_path3);
	    	
		}
		
		$Desti = array();
		$Desti['ori'] = $destination_path2;
		$Desti['thumb'] = $destination_path;
		return $Desti;
	
	} 
	
}

?>