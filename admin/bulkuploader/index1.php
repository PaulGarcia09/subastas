<?php
	include('../../config/config.php');	
	include('../_INC_security.php');
	
	define ('datenow', date('Y-m-d H:i:s'));

	$msg = "";

		if(isset($_POST['upload'])) {
		
			$allowed_filetypes = array('.csv');
			$max_filesize = 10485760;
			$upload_path = 'bulkFiles/';
			$description = $_POST['imgdesc'];
			
			$filename = $_FILES['userfile']['name'];
			$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
		
			if(!in_array($ext,$allowed_filetypes))
		  		$msg = "The file you attempted to upload is not allowed.";
				//die('The file you attempted to upload is not allowed.');
		
			if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		  		$msg = "The file you attempted to upload is too large.";
				//die('The file you attempted to upload is too large.');
		
			if(!is_writable($upload_path))
		  		$msg = "You cannot upload to the specified directory, please CHMOD it to 777.";
				//die('You cannot upload to the specified directory, please CHMOD it to 777.');
		
			if(strlen($msg) < 1){
		
				if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) {
			   
					$filePath = $upload_path.$filename;
			   
					if(file_exists($filePath)){
					
						//this sql is used to load file from csv, note that you should save the excel file in CSV(MSDOS) version in order to work
						$sql = "LOAD DATA LOCAL INFILE '".$filePath."'
								INTO TABLE t_lots
								FIELDS TERMINATED BY ',' ENCLOSED BY '\"'
								LINES TERMINATED BY '\r\n'
								IGNORE 1 LINES
								";
						
						$loadlots = $dbMaster->execute($connect,$sql);
					
					
					
						if($loadlots){
						
							$msg = "You have successfully loaded the file.";
							//echo "You have successfully loaded the file.";
								
							
							
						}else{
							
							$msg = "There was problem loading the file. Please try again.";
						}
			
						   
					}
			   
			}	//echo 'Your file upload was successful!';
		
		
		} else {
			 echo 'There was an error during the file upload.  Please try again.';
		}
}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bulk Uploader</title>

<?php include("_INC_header_css_js.php");?>
<link type="text/css" href="multiple_file_upload/css/mcstyle.css" rel="stylesheet" />



</head>

<body>



<div id="frm">

 
 
 <form name="fileUpload" id="fileUpload" method="post" enctype="multipart/form-data">
	<fieldset>
		
		<ol style="margin-top:0px">
			<li>&nbsp;
            <span style="font-size:22px; color:##FFFFFF; font-family:Arial, Helvetica, sans-serif;"><b>Auction Broadcaster</b> - Bulk Uploader</span>
            <span style="float:right; color:#FF0000; font-weight:600">
            	<?php	if(strlen($msg)){ echo $msg; }	?>            	
           		&nbsp;
            </span>
            </li>
            
            <li>
            	<div style="font-family: Georgia, 'Times New Roman', Times, serif; font-size:13px; color:#FFFFFF">
                	
                    <span style="color:#000000">
                    	<p>
                        <span style="color:#FF0000">Instructions for bulk upload</span>: Download the excel file <a href="bulkFiles/bulkform.xls"><b>here</b></a>, fill in the table. Please note that the filename of image should be the actual filename (e.g. image1.jpg or myitem.png).  Save As as "CSV(MSDOS)" type (click the file type dropdown button  then click yes on confirmation prompt). Browse to select the file then click Upload button. To upload images <a href="multiple_file_upload/index.php"><b>Click here</b></a>
                        </p>
                    </span>
                    <label for=userfile>Select File:</label>
					<input type="file" name="userfile"/>
    				<input type="hidden" name="imgdec">
    				
                    <br /><br />
                </div>
            	
                <span style="margin-left:20px">
            
            	
            <input type="submit" name="upload"  value="Upload" 
            		onClick="
                    		
                            var sel = document.getElementById('userfile').value;
                                                            
                                                            
                            if(sel == ''){
                               alert('Please select file to upload.');
                               return false;
                            }else{ 
                            alert('test');                                          
                                document.forms['fileUpload'].submit();                                                
                            };
                            
                           " 
            style="width:110px; background:##FF9900; color:##FFFFFF; cursor:pointer" />
            <input type="button"  value="Close" onClick="window.close();" style="width:110px; cursor:pointer"/>
            
            </span>
            <br /><br />
                
			</li>
            
            
           
                
				
			
		</ol>
	</fieldset>
</form>	

		
    	
	


</div>



</body>
</html>


