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
    $cliente=$_POST['cte'];


    $datenow= date("Y-m-d");
    $sql ="select * from t_customer where f_customer_id=".$cliente;
    $cte = $dbMaster->getResultAsAssoc($connect,$sql);
    echo($cte[0]['paddle_number']);

?>