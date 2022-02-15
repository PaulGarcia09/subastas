<?php 
  $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
 
  
  
    define('HOME_URL', $protocol . $_SERVER['SERVER_NAME'] ."/");
    define('BASE_URL', $protocol . $_SERVER['SERVER_NAME'] ."/");
    define('ASSETS_URL', $protocol . $_SERVER['SERVER_NAME'] ."/assets/");
    define('PUBLIC_URL', $protocol . $_SERVER['SERVER_NAME'] ."/public/");
 
	define('PAGE_TITLE', "Auction Broadcaster");
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
?>
<?php echo BASE_URL ?>
<?php echo ASSETS_URL ?>
<?php echo PUBLIC_URL ?>
<?php echo PAGE_TITLE ?>
<?php echo $actual_link ?>