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
    $sql ="select * from t_lots where f_event=18";
    $lotestotal = $dbMaster->getResultAsAssoc($connect,$sql);

    $sqle ="select * from t_lots where f_event=18 and f_status=3";
    $adjudicados = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select * from t_lots where f_event=18 and f_status=4";
    $vendidos = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select * from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3 and c.paddle_number >= 101";
    $adjudicadoslinea = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select * from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3 and c.paddle_number < 101";
    $adjudicadospiso = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select SUM(f_current_bid) as Total from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3";
    $precioadjudicado = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select SUM(f_current_bid) as Total from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=4";
    $preciovendido = $dbMaster->getResultAsAssoc($connect,$sqle);

    $cantidadlotestotal = count($lotestotal);
    $cantidadloteadjudicados = count($adjudicados);
    $cantidadlotesvendidos = count($vendidos);

    $ajudicadosenpiso = count($adjudicadospiso);

    $adjudicadosenlinea = count($adjudicadoslinea);


    $pvendido = $preciovendido[0]['Total'] ? $preciovendido[0]['Total']: 0;
    $pvendido = number_format(floatval($pvendido));
    $padjudicado = $precioadjudicado[0]['Total'] ? $precioadjudicado[0]['Total']: 0;
    $padjudicado = number_format(floatval($padjudicado));

    $listitems['cantidadlotestotal']=$cantidadlotestotal;
    $listitems['cantidadloteadjudicados']=$cantidadloteadjudicados;
    $listitems['cantidadlotesvendidos']=$cantidadlotesvendidos;
    $listitems['ajudicadosenpiso']=$ajudicadosenpiso;
    $listitems['adjudicadosenlinea']=$adjudicadosenlinea;
    $listitems['pvendido']=$pvendido;
    $listitems['padjudicado']=$padjudicado;


    echo json_encode($listitems);


?>