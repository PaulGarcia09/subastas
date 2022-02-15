<?php
    include('../config/config.php');
    
	$sql = "select * from t_settings";
	$stream = $dbMaster->getRowAsAssoc($connect,$sql);

    echo json_encode($stream);

?>