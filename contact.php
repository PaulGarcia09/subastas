<?php
    include('config/config.php');
$sql = "select * from t_pages WHERE rec_id =1";
	$pages = $dbMaster->getRowAsAssoc($connect,$sql);

	$title = "Contact Us";
    include('common/header.php');
    include('pages/contact.php');
    include('common/footer.php');
?>
