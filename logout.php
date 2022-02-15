<?php
	if(!isset($_SESSION)){
		session_start();
	}
	unset($_SESSION['auction_brodcaster']);
	header("location:index.php");
?>