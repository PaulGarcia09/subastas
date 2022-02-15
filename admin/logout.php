<?php
	if(!isset($_SESSION)){
		session_start();
	}
	unset($_SESSION['auctiobroad']);
	header("location:index.php");
?>