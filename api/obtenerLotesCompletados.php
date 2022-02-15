<?php
    include('../config/config.php');
    require_once 'http_client.php';
    $date = date('Y-m-d H:i:s');

    $sql ="select * from t_lots where f_status IN(2,3) ORDER BY f_start_date,f_number*1 ASC";
    $resultArray = array();
    $resultArray = $dbMaster->getResultAsAssoc($connect,$sql);
    $result = array();
    for($i = 0 ; $i < count($resultArray); $i++){
        $respuestaEnviar[]=array(
            'f_lots_id'=>$resultArray[$i]['f_lots_id'],
            'f_title'=>$resultArray[$i]['f_title'],
        );
    }
    echo json_encode($respuestaEnviar);
    

?>