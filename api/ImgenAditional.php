<?php
      include('../config/config.php');

    $lotid=$_POST['id'];

	$sql ="select * from t_image_additional where f_lot_id ='{$lotid}' ";
	$additional_image = $dbMaster->getResultAsAssoc($connect,$sql);
    echo json_encode($additional_image);
?>
