<?php
    include('../config/config.php');

    if(!isset($_SESSION['auctiobroad'])){
        header("location:index.php");
    }

    $start = $_GET['event'];
	$sql ="SELECT DISTINCT h.f_user_id FROM `t_lots_history` h inner join t_lots l on l.f_lots_id=h.f_lot_id and l.f_event='{$start}'";
    $result = $dbMaster->getResultAsAssoc($connect,$sql);
    
	$sql ="SELECT * FROM t_events";
    $eventos = $dbMaster->getResultAsAssoc($connect,$sql);

    $sql ="SELECT * FROM  t_customer";
    $clientes = $dbMaster->getResultAsAssoc($connect,$sql);
        
    include('pages/confirmacionclientes.php');
    include('common/header.php');
    include('common/footer.php');
?>