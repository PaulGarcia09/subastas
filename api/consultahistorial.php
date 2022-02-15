<?php
    include('../config/config.php');
    require_once 'http_client.php';
    $date = date('Y-m-d H:i:s');
    $lotid = $_POST['id'];
    //$sql ="select DATE_SUB(DATE_SUB(now(),INTERVAL 1 HOUR),INTERVAL 1 MINUTE) as fechaactual, DATE_ADD(TIMESTAMP(f_start_date),INTERVAL 12 HOUR) as fechaevento from t_events where f_start_date >= DATE_FORMAT(NOW(), '%Y-%m-%d')";
    $sql="SELECT * FROM t_lots_history h inner join t_customer c on h.f_user_id=c.f_customer_id where f_lot_id = '{$lotid}' order by f_date asc";
    $result = $dbMaster->getResultAsAssoc($connect,$sql);

    echo json_encode($result);

?>