
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



$sql="SELECT * from t_settings";
$settings = $dbMaster->getRowAsAssoc($connect,$sql);

$rangopaletas = floatval($settings['rangopaletaslinea']);

    $sql ="SELECT f_customer_id,f_telephone,paddle_number, concat(f_firstname,' ', f_lastname) as Nombre FROM `t_customer` where f_customer_id >1 order by paddle_number*1 asc";
    $usuarios = $dbMaster->getResultAsAssoc($connect,$sql);

    foreach ($usuarios as $key => $value):

        while($paddle == null){
            $sql="SELECT random_num
            FROM (
              SELECT FLOOR({$rangopaletas}+RAND()*(9999-{$rangopaletas})) AS random_num 
              UNION
              SELECT FLOOR({$rangopaletas}+RAND()*(9999-{$rangopaletas})) AS random_num
            ) AS numbers_mst_plus_1
            WHERE `random_num` NOT IN (SELECT paddle_number FROM t_customer)
            LIMIT 1";
            $paddle = $dbMaster->getRowAsAssoc($connect,$sql);
          }

        $cliente=$value['f_customer_id'];


        $update = "update t_customer set f_status = '1', paddle_number='{$paddle['random_num']}' , fechaenpiso='0000-00-00 00:00:00', registroenpiso=0 WHERE f_customer_id =".$cliente;
        $resultado =  $dbMaster->execute($connect,$update);

        $paddle=null;

    endforeach;

     

?>
