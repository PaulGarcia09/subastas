
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

        $sql="SELECT * from t_settings";
        $settings = $dbMaster->getRowAsAssoc($connect,$sql);
     
        $rangopaletas = floatval($settings['rangopaletas']);

        $contador = 0;
       while($paddle == null){
        $sql="SELECT random_num
        FROM (
          SELECT FLOOR(1+Rand() * {$rangopaletas}) AS random_num 
          UNION
          SELECT FLOOR(1+Rand() * {$rangopaletas}) AS random_num
        ) AS numbers_mst_plus_1
        WHERE `random_num` NOT IN (SELECT CONVERT(paddle_number, UNSIGNED) FROM t_customer)
        LIMIT 1";
        $paddle = $dbMaster->getRowAsAssoc($connect,$sql);

        $contador = $contador + 1 ;

        if($contador == 30 && $paddle==null){
               
           $arr['message']= 'No hay paletas para asignar.';
           $arr['result'] = 'error';
           echo json_encode($arr);	
           exit;	
        }

       }

       $paleta = strval($paddle['random_num']);
       $update = "update t_customer set f_status = '1', paddle_number='{$paleta}' , registroenpiso=1, fechaenpiso='{$datenow}' WHERE f_customer_id =".$cliente;
       $dbMaster->execute($connect,$update);

       $sql="SELECT paddle_number from t_customer where f_customer_id=".$cliente;
       $paddle = $dbMaster->getRowAsAssoc($connect,$sql);

       echo json_encode($paddle);
        exit;
?> 