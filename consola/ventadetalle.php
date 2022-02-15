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
$sql ="select folioventa from ventas order by folioventa desc limit 1";
$folio = $dbMaster->getRowAsAssoc($connect,$sql);


$sqllots ="select * from t_lots where f_lots_id in(".$_POST['lots'].")";
$lots = $dbMaster->getResultAsAssoc($connect,$sqllots);

$evento = $_POST['evento'];
$folioventa = floatval($folio['folioventa'])+1;
$usuario =$_POST['usuario'];
$paleta =$_POST['paleta'];
$empleado =$_SESSION['usuario'];
$importetotal=$_POST['imp'];
$importeefe=floatval($_POST['ef']);
$importevoucher=floatval($_POST['vou']);

$sql ="INSERT  INTO ventas (	               
    evento,
    folioventa,
    f_customer_id,
    paleta,
    fechaventa,
    codigoempleado,
    importeventa,
    importeefectivo,
    importevoucher,
    solicitafactura)
VALUES
('{$evento}',
'{$folioventa}',
'{$usuario}',
'{$paleta}',
now(),
'{$empleado}',
'{$importetotal}',
'{$importeefe}',
'{$importevoucher}',
'0')";	
$result = $dbMaster->execute($connect,$sql);
$renglon = 1;
foreach ($lots as $key => $value):
    $loteid=floatval($value['f_lots_id']);
    $importeventa=floatval($value['f_current_bid']);
    $sql ="INSERT  INTO ventasdetalle (	               
        evento,
        folioventa,
        renglon,
        f_lots_id,
        importeventa)
    VALUES
    ('{$evento}',
    '{$folioventa}',
    '{$renglon}',
    '{$loteid}',
    '{$importeventa}')";
    $result = $dbMaster->execute($connect,$sql);
    $renglon = $renglon +1;

  $updates = "UPDATE t_lots SET f_status = 4 where f_lots_id ='{$loteid}'";
  $result = $dbMaster->execute($connect,$updates);
endforeach;
$lista['folioventa']=$folioventa;

echo json_encode($lista);

?>