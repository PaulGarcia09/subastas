<?php
    include('config/config.php');
$sql = "select * from t_pages WHERE rec_id =1";
	$pages = $dbMaster->getRowAsAssoc($connect,$sql);

    $title = "Terms and Conditions";
    
    include('common/header.php');
    include('pages/terms.php');
    include('common/footer.php');
?>
