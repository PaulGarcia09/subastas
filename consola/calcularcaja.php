<?php

include('../config/config.php');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

date_default_timezone_set('America/Mazatlan');
header("Content-Type: text/html;charset=utf-8");

//header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html;charset=utf-8");
/* Iniciar la sesión */
session_start();
$datenow= date("Y-m-d");
$sql ="SELECT f_lots_id,f_number,f_title,f_current_bid, now() as Fecha, CONCAT(c.f_firstname,' ',c.f_lastname) as Nombre FROM t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user WHERe l.f_event=".$_POST['evento']." and l.f_status=3 and c.f_customer_id=".$_POST['id']." order by f_number asc";
$lots = $dbMaster->getResultAsAssoc($connect,$sql);
echo json_encode($lots);
?>