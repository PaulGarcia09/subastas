<?php 
    include('../config/config.php');
    require_once 'http_client.php';
$date = date('Y-m-d H:i:s');
	

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





        $sql ="select * from informacionpw2 where id='{$_POST['Reference3D']}'";
        $result = $dbMaster->getRowAsAssoc($connect,$sql);

        $sql ="select * from informaciondecompras where id='{$_POST['Reference3D']}'";
        $resultCompra = $dbMaster->getRowAsAssoc($connect,$sql);
        
        $tarjeta=$desencriptar($result['tarjeta']) ;
        $vencimiento=$desencriptar($result['vencimiento']) ;
        $ccv2=$desencriptar($result['ccv2']) ;
        $referencia = 'V-LOVETOHELP';
        $Status=$_POST['Status'];
        $Lote = $resultCompra['lotid'];
        $usuario = $resultCompra['usuario'];
        $monto =$resultCompra['monto'];
        $http = new httpClient();

        $http->Connect("via.pagosbanorte.com", 443);
            

        $params = array(
            'MERCHANT_ID'   => "8279402",
            'USER'          => "e8279402",
            'PASSWORD'      => "X=a6p$1M",
            'CMD_TRANS'     => 'AUTH',
            'TERMINAL_ID'   => "82794021",
            'AMOUNT'        => $_POST['Total'],
            'MODE'          => 'PRD',  //DEC PRD AUT
            'CUSTOMER_REF2' => $referencia, // Esto debe de ser lo que ve el cliente en su estado de cuenta    
            'CARD_NUMBER'   => $tarjeta,
            'CARD_EXP'      => $vencimiento,
            'SECURITY_CODE' => $ccv2,
            'ENTRY_MODE'    => 'MANUAL',
            'STATUS_3D'     => $_POST['Status'],
            'ECI'           => $_POST['ECI'],
            'XID'           => $_POST['XID'],
            'CAVV'          => $_POST['CAVV']
        );

        $status = $http->Post("/payw2", $params); 

        $reference=       $http->getHeader('REFERENCIA');
        $control_number=  ($http->getHeader('CONTROL_NUMBER') != null ? $http->getHeader('CONTROL_NUMBER') : $_POST['Reference3D']); // id de las tablas
        $cust_req_date=   $http->getHeader('FECHA_REQ_CTE');
        $auth_req_date=   $http->getHeader('AUTH_REQ_DATE');
        $auth_rsp_date=   $http->getHeader('AUTH_RSP_DATE');
        $cust_rsp_date=   $http->getHeader('FECHA_RSP_CTE');
        $payw_result=     $http->getHeader('RESULTADO_PAYW'); // A Probada - D Declinada - R Rechazada - T Sin respuesta del autorizador
        $auth_result=     $http->getHeader('AUTH_RESULT');    // Código enviado por el autorizador
        $payw_code=       $http->getHeader('PAYW_CODE');      // Código rechazo
        $auth_code=       $http->getHeader('CODIGO_AUT');     // Código de autorización
        $text=            $http->getHeader('TEXTO');          // Texto adicional con información de la transacción
        $card_holder=     $http->getHeader('CARD_HOLDER');
        $issuing_bank=    $http->getHeader('ISSUING_BANK');
        $card_brand=      $http->getHeader('CARD_BRAND');
        $card_type=       $http->getHeader('CARD_TYPE');
        $idlote= $Lote;
        $cliente =$usuario;
        $monto= $monto;


        // Aquí obtenemos el resultado
        $respuesta = array(
        'reference'=>       $http->getHeader('REFERENCIA'),
        'control_number'=>  ($http->getHeader('CONTROL_NUMBER') != null ? $http->getHeader('CONTROL_NUMBER') : $_POST['Reference3D']), // id de las tablas
        'cust_req_date'=>   $http->getHeader('FECHA_REQ_CTE'),
        'auth_req_date'=>   $http->getHeader('AUTH_REQ_DATE'),
        'auth_rsp_date'=>   $http->getHeader('AUTH_RSP_DATE'),
        'cust_rsp_date'=>   $http->getHeader('FECHA_RSP_CTE'),
        'payw_result'=>     $http->getHeader('RESULTADO_PAYW'), // A Probada - D Declinada - R Rechazada - T Sin respuesta del autorizador
        'auth_result'=>     $http->getHeader('AUTH_RESULT'),    // Código enviado por el autorizador
        'payw_code'=>       $http->getHeader('PAYW_CODE'),      // Código rechazo
        'auth_code'=>       $http->getHeader('CODIGO_AUT'),     // Código de autorización
        'text'=>            $http->getHeader('TEXTO'),          // Texto adicional con información de la transacción
        'card_holder'=>     $http->getHeader('CARD_HOLDER'),
        'issuing_bank'=>    $http->getHeader('ISSUING_BANK'),
        'card_brand'=>      $http->getHeader('CARD_BRAND'),
        'card_type'=>       $http->getHeader('CARD_TYPE'),
        'idlote'=> $Lote,
        'cliente' =>$usuario,
        'monto'=> $monto
        );

        $update = "insert into respuestapw2 (reference,control_number,cust_req_date,auth_req_date,auth_rsp_date,cust_rsp_date,payw_result,auth_result,payw_code,auth_code,text,card_holder,issuing_bank,card_brand,card_type,tarjeta,monto,enviado,idlote) VALUES('$reference','$control_number','$cust_req_date','$auth_req_date','$auth_rsp_date','$cust_rsp_date','$payw_result','$auth_result','$payw_code','$auth_code','$text','$card_holder','$issuing_bank','$card_brand','$card_type','$tarjeta','$monto','0','$idlote')";
        $dbMaster->execute($connect,$update);

        echo json_encode($respuesta);

        exit;
?>