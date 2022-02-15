<?php include('config/config.php');
	
	$ski = mysqli_real_escape_string($connect,$_GET['sk']);
	$sql ="select * from t_customer where f_serial ='{$ski}' and f_status =3";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);
	
	if($result){
		$sql ="update t_customer set f_status ='1', f_serial ='' where f_serial ='{$ski}'";
		$dbMaster->execute($connect,$sql);
	}else{
		header("location:index.php");
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Auction Brodcaster</title>
	<?php include("INC_JS_CC.php");?>
	
</head>

<body>
	<div id="wrapper">
		<div id="header">			
			<div id="nav">
					<?php include("INC_MENU.php");?>
			</div>
			
		</div>
		
		<div id="body" style="padding-top: 140px;">
				
			<div style="margin-left:10px;margin-right:10px;min-height:500px;">
					
			
			<center><h1 style="font-size: 20px; color: rgb(105, 139, 34);">
			<br>
			<b>Felicitaciones, ha activado su cuenta. <br> Ahora puede iniciar sesión con las credenciales de su cuenta.</b></h1>
			<br><br>
			
			<span style="font-size:15px;"><a href="index.php">Haga clic en <a/> aquí para ir a la página de inicio de sesión</span>
			
			<center>
			
			
					
			</div>
		
		</div>
	</div>
	<?php include("INC_FOOTER.php");?>	
	
</body>
</html>
