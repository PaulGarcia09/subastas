<?php
    include('../config/config.php');
    
	$sql = "select * from t_stream";
	$stream = $dbMaster->getRowAsAssoc($connect,$sql);

    echo json_encode($stream);

?>