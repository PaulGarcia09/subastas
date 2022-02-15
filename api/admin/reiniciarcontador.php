<?php

include('../../config/config.php');

    $id = $_GET['lotid'];

    $sql ="select * from t_lots where f_status = '1'  and f_lots_id = '{$id}'";
    $showresult = $dbMaster->getRowAsAssoc($connect,$sql);
    $contador = ($showresult['contador'] =='') ? 0: (int)$showresult['contador'];
    if($contador == '1'){
        $update = "update t_lots set f_message = '',bloquedbids=0,contador=0 WHERE f_lots_id ='{$id}'";
    }else{
        $update = "update t_lots set bloquedbids=0,contador=0 WHERE f_lots_id ='{$id}'";
    }

   
    $dbMaster->execute($connect,$update);

?>