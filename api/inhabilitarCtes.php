<?php
    include('../config/config.php');
    $date = date('Y-m-d H:i:s');

    $start = $_POST['event'];
	$sql ="SELECT DISTINCT h.f_user_id FROM `t_lots_history` h inner join t_lots l on l.f_lots_id=h.f_lot_id and l.f_event='{$start}'";
    $result = $dbMaster->getResultAsAssoc($connect,$sql);
    

    for($i = 0; $i< count($result);$i++){
        $clientesOfertando = ",".$clientesOfertando.$result[$i]['f_user_id'];
    }
    $clientesOfertando = substr($clientesOfertando, 0, -1);

    $sql ="update t_customer set f_status ='3',paddle_number='' where f_customer_id not in(1{$clientesOfertando})";
    $dbMaster->execute($connect,$sql);

    echo $sql;
?>