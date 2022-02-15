<?php
    include('../config/config.php');
    require_once 'http_client.php';
    $date = date('Y-m-d H:i:s');

    $sql ="select * from t_settings";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);

    echo json_encode($result);

?>