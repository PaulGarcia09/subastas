<?php
    include('config/config.php');
    $datenow= date("Y-m-d");
    $Event = trim($_GET['ev']);
    $activar = trim($_GET['id']);
    $Event = str_replace(" ", "+", $Event);
    $activar = str_replace(" ", "+", $activar);
            //Configuración del algoritmo de encriptación

            //Debes cambiar esta cadena, debe ser larga y unica
            //nadie mas debe conocerla
            $clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion de subastas maxilana y asi poder encriptar todo';

            //Metodo de encriptación
            $method = 'aes-256-cbc';

            // Puedes generar una diferente usando la funcion $getIV()
            $iv = base64_decode($getIV);

            /*
            Encripta el contenido de la variable, enviada como parametro.
            */
            $encriptar = function ($valor) use ($method, $clave, $iv) {
            return openssl_encrypt ($valor, $method, $clave, false, $iv);
            };

            /*
            Desencripta el texto recibido
            */
            $desencriptar = function ($valor) use ($method, $clave, $iv) {
            $encrypted_data = base64_decode($valor);
            return openssl_decrypt($valor, $method, $clave, false, $iv);
            };

            /*
            Genera un valor para IV
            */
            $getIV = function () use ($method) {
            return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
            };

    $cliente=$desencriptar($activar);
    $evento=$desencriptar($Event);
    
    $sql="select DATE_SUB(DATE_SUB(now(),INTERVAL 1 HOUR),INTERVAL 1 MINUTE) as fechaactual, DATE_ADD(TIMESTAMP(f_start_date),INTERVAL 12 HOUR) as fechaevento from t_events where f_start_date >= DATE_FORMAT(NOW(), '%Y-%m-%d')";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);

    $fechaactual=date($result['fechaactual']); 
    $fechaevento=date($result['fechaevento']); 

    if($fechaactual <= $fechaevento){


        $sql="SELECT FLOOR(RAND() * 9999) AS random_num FROM t_customer WHERE 'random_num' NOT IN (SELECT paddle_number FROM t_customer) LIMIT 1";
        $paddle = $dbMaster->getRowAsAssoc($connect,$sql);

        $update = "update t_customer set f_status = '1', paddle_number='{$paddle['random_num']}' WHERE f_customer_id =".$cliente;
        $dbMaster->execute($connect,$update);
        $exitoso=1;
    }
    

    include('common/header.php');
    include('pages/activate.php');
    include('common/footer.php');
?>
