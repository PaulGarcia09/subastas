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
//Carácteres para la contraseña
   $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
   $password = "";
   //Reconstruimos la contraseña segun la longitud que se quiera
   for($i=0;$i<7;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,62),1);
   }
   
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
    WHERE `random_num` NOT IN (SELECT paddle_number FROM t_customer)
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
   $paddle=$paddle['random_num'];
   $password_ 	= sha1($password);  
   $username=$_POST['cuenta'];

   $sql ="Select * from t_customer where f_username = '{$username}'";
   $username_ = $dbMaster->getRowAsAssoc($connect,$sql);
           
   if($username_){
   
       $arr['message']= 'El usuario ingresado ya existe.';
       $arr['result'] = 'error';
       echo json_encode($arr);	
       exit;					
   }

   $firstname=$_POST['Nombres'];
   $lastname=$_POST['Apellidos'];
   $email=$_POST['Correo'];
   $telephone=$_POST['Celular'];
   $address1=$_POST['Direccion'];
   $address2=$_POST['Colonia'];
   $city=$_POST['Ciudad'];
   $state=$_POST['Estado'];
   $postcode=$_POST['Cp'];
   $country=$_POST['Pais'];
   $tailtag=$_POST['Apoyo'];
   $agentname=$_POST['Invito'];

   $serial = sha1($username.$password.date('Y-m-d H:i:s').'jeff');
		
   $sql="INSERT  INTO t_customer
               (
                    f_username,
                    f_password,
                    f_email,
                    f_firstname,
                    f_lastname,
                    f_telephone,
                    f_fax,
                    f_address_1,
                    f_address_2,
                    f_city,
                    f_postcode,
                    f_country,
                    f_state,
                    f_institucion,
                    f_agent_name,
                    f_contact_name,
                    f_contact_number,
                    f_status,
                    f_serial,
                    f_type,
                    f_real,
                    paddle_number,
                    registroenpiso,
                    fechaenpiso
                   
                )
           
           VALUES('{$username}',
                  '{$password_}',
                  '{$email}',
                  '{$firstname}',
                  '{$lastname}',
                  '{$telephone}',
                  '{$fax}',
                  '{$address1}',
                  '{$address2}',
                  '{$city}',
                  '{$postcode}',
                  '{$country}',
                  '{$state}',
                  '{$tailtag}',
                  '{$agentname}',
                  '{$contactname}',
                  '{$contactnumber}',
                  '1',
                  '{$serial}',
                  'user',
                  '{$password}',
                  '{$paddle}',
                  '1',
                  '{$datenow}'
                 )";	 
        $registration = $dbMaster->execute($connect,$sql);


        $arr['message']= $sql;
       

        $sql="SELECT * FROM t_customer where paddle_number=".$paddle;
        $paddle = $dbMaster->getRowAsAssoc($connect,$sql);

    echo json_encode($paddle);

?>
   