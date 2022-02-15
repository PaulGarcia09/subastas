<?php
include('../../config/config.php');

    $id = $_GET['lotid'];
    $sql = "select * from t_lots WHERE  f_lots_id='{$id}'";
	$response = $dbMaster->getRowAsAssoc($connect,$sql);
    echo json_encode($response);
?>