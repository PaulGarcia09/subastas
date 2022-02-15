<?php
    include('config/config.php');
$sql = "select * from t_pages WHERE rec_id =1";
	$pages = $dbMaster->getRowAsAssoc($connect,$sql);


    $sqle ="select * from t_instituciones";

    $instituciones = $dbMaster->getResultAsAssoc($connect,$sqle);
    
	$title = "About Us";
    include('common/header.php');
    include('pages/about.php');
    include('common/footer.php');
?>
 