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

<link type="text/css" href="css/uploader.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/uploader.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
	new multiple_file_uploader
	({
		form_id: "fileUpload", 
		autoSubmit: true,
		server_url: "uploader.php" // PHP file for uploading the browsed files
	});
});
</script>


<style>

html, body, h1, form, fieldset, legend, ol, li {
	margin: 0;
	padding: 0;
}
body {
	background: #333333;
	color: #FFFFFF;
	font-family: Georgia, "Times New Roman", Times, serif;
	padding: 20px;
}

form#fileUpload {
	
	background:#538BAC;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	padding: 20px;
	width: 800px;
}

form#fileUpload fieldset {
	border: none;
	margin-bottom: 10px;
}
form#fileUpload fieldset:last-of-type {
	margin-bottom: 0;
}

form#fileUpload legend {
	color:#000000;
	font-size: 16px;
	font-weight: bold;
	padding-bottom: 10px;
	text-shadow: 0 1px 1px #c0d576;
}

form#fileUpload > fieldset > legend:before {
	content: "";
	/*content: "Step " counter(fieldsets) ": ";*/
	counter-increment: fieldsets;
}

form#fileUpload fieldset fieldset legend {
	color: #FFFFFF;
	font-size: 13px;
	font-weight: normal;
	padding-bottom: 0;
}

form#fileUpload ol li {
	background: #b9cf6a;
	background: rgba(255,255,255,.3);
	border-color: #e3ebc3;
	border-color: rgba(255,255,255,.6);
	border-style: solid;
	border-width: 2px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	line-height: 30px;
	list-style: none;
	padding: 5px 10px;
	margin-bottom: 2px;
}
form#fileUpload ol ol li {
	background: none;
	border: none;
	float: left;
}


form#fileUpload label {
	float: left;
	font-size: 13px;
	width: 110px;
}
form#fileUpload fieldset fieldset label {
	background:none no-repeat left 50%;
	line-height: 20px;
	padding: 0 0 0 30px;
	width: auto;
}
form#fileUpload label[for=visa] {
	background-image: url(visa.gif);
}
form#fileUpload label[for=amex] {
	background-image: url(amex.gif);
}
form#fileUpload label[for=mastercard] {
	background-image: url(mastercard.gif);
}
form#fileUpload fieldset fieldset label:hover {
	cursor: pointer;
}


form#fileUpload input:not([type=radio]),
form#fileUpload textarea,
form#fileUpload select {
	background: #ffffff;
	border: none;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	-khtml-border-radius: 3px;
	border-radius: 3px;
	font: italic 13px Georgia, "Times New Roman", Times, serif;
	outline: none;
	padding: 5px;
	width: 200px;
}
form#fileUpload input:not([type=submit]):focus,
form#fileUpload textarea:focus {
	background: #eaeaea;
}
form#fileUpload input[type=radio] {
	float: left;
	margin-right: 5px;
}

form#fileUpload button {
	background: #384313;
	border: none;
	-moz-border-radius: 20px;
	-webkit-border-radius: 20px;
	-khtml-border-radius: 20px;
	border-radius: 20px;
	color: #ffffff;
	display: block;
	font: 18px Georgia, "Times New Roman", Times, serif;
	letter-spacing: 1px;
	margin: auto;
	padding: 7px 25px;
	text-shadow: 0 1px 1px #000000;
	text-transform: uppercase;
}
form#fileUpload button:hover {
	background: #1e2506;
	cursor: pointer;
}

</style>


</head>

<body>



<div id="frm">

 
 
 
 <form name="fileUpload" id="fileUpload" action="javascript:void(0);" enctype="multipart/form-data">

		<fieldset>
		
		<ol style="margin-top:0px">
			<li>&nbsp;
            <span style="font-size:22px; color:##FFFFFF; font-family:Arial, Helvetica, sans-serif;">Image Uploader</span>
            <span style="float:right; color:#FF0000; font-weight:600">
            	<?php	if(strlen($msg)){ echo $msg; }	?>            	
           		&nbsp;
                <input type="button"  value="Close" onClick="window.close();" style="width:110px; cursor:pointer"/>
            </span>
            </li>
            
            <li>
            	<div style="font-family: Georgia, 'Times New Roman', Times, serif; font-size:13px; color:#FFFFFF">
                	
                    <span style="color:#000000">
                    	<p>
                        Instructions for image uploader: 
                        	Drag and drop the file in the upload box, 
                            the file will only be uploaded if it is found 
                            in the list of the images you included in the bulk uploader page. 
                        </p>
                    </span>
                    
					<div class="upload_box">
                        
                        <div class="file_browser">
                        	<input type="file" name="multiple_files[]" id="_multiple_files" class="hide_broswe" multiple />
                        </div>
                        <div class="file_upload">
                        	<input type="submit" value="Upload" class="upload_button" style="background:url(file_icons/upload_files.png); background-repeat:no-repeat" />                           
                        </div>
                        
                        </div>	
                        
                        
                        <div class="file_boxes">
                        
                        </div>
                        <span id="removed_files"></span>

                    
                </div>	
    				
                    <br /><br />
                </div>
            	
                <span style="margin-left:20px">
            
            	
               

                

            
            </span>
            <br /><br />
                
			</li>
            
            
           
                
				
			
		</ol>
	</fieldset>
</form>	

		
    	
	


</div>



</body>
</html>


