<?php
include('../config/config.php');
if(isset($_POST['lotid'])){
    $id = $_POST['lotid'];
    $sql = "select * from t_lots WHERE  f_lots_id='{$id}'";
	$response = $dbMaster->getRowAsAssoc($connect,$sql);
    echo json_encode ($response);
}
?>