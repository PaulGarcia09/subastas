<?php
    include('../config/config.php');
    $date = date('Y-m-d H:i:s');
        $tarjeta = $_POST['Card'];
        $vencimiento= $_POST['Expires'];
        $codigoseguridad= $_POST['Ccv2']; 
        $tarjetahabiente= $_POST['Titular']; 
        $monto= $_POST['total']; 

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


            $tarjetaEncode = $encriptar($tarjeta);
            $VencimientoEncode = $encriptar($vencimiento);
            $codigoseguridadEncode = $encriptar($codigoseguridad);
            $tarjetahabienteEncode = $encriptar($tarjetahabiente);
            $id = uniqid();
            $id = substr(sha1(time()), 0, 2) . $id;

            $update = "insert into informacionpw2 (id,tarjeta,vencimiento,ccv2,nombre,monto,fecha) VALUES ('$id','$tarjetaEncode','$VencimientoEncode','$codigoseguridadEncode','$tarjetahabienteEncode','$monto',now())";
			$dbMaster->execute($connect,$update);

            $arrayDatos = array(
                'id' => $id,
                'merchancity' =>"CULIACAN",
                'merchanname' =>"MAXILANA ECOMM",
                'merchanid' =>"8279402",
                'terminal_id'=>"82794021",
                'correoEmpresa' =>"webmaxilana@maxilana.com",
                'correoserv' =>"smtp.office365.com",
                'correopass' =>"cceMaxiWeb2015"
            );

            echo json_encode($arrayDatos);
?>