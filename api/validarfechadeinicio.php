<?php
    include('../config/config.php');
    require_once 'http_client.php';
    $date = date('Y-m-d H:i:s');
    $event = $_GET['id'];
    //$sql ="select DATE_SUB(DATE_SUB(now(),INTERVAL 1 HOUR),INTERVAL 1 MINUTE) as fechaactual, DATE_ADD(TIMESTAMP(f_start_date),INTERVAL 12 HOUR) as fechaevento from t_events where f_start_date >= DATE_FORMAT(NOW(), '%Y-%m-%d')";
    $sql="select DATE_SUB(DATE_SUB(now(),INTERVAL 0 HOUR),INTERVAL -1 MINUTE) as fechaactual,CONCAT(f_start_date,' ',horafin) as fechaevento from t_events where f_events_id ='{$event}'";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);

    echo json_encode($result);

?>