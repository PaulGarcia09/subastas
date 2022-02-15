<?php
    include('../config/config.php');

    if(!isset($_SESSION['auctiobroad'])){
        header("location:index.php");
    }

    $start = $_GET['event'];

    $sql ="SELECT c.f_customer_id,f_username,f_password,f_real,f_email,f_firstname,f_lastname,f_telephone
    f_telephone,
    f_fax,
    f_address_1,
    f_address_2,
    f_city,
    f_postcode,
    f_country,
    f_state,
    f_serial,
    f_status,
    f_bloqued,
    f_type,
    f_institucion,
    f_agent_name,
    f_contact_name,
    f_contact_number,
    i.extencion,
    paddle_number
    FROM t_customer c inner join t_identifications i on   c.f_customer_id=i.f_customer_id";
	$resultArray = $dbMaster->getResultAsAssoc($connect,$sql);
    $result = array();
    for($i = 0 ; $i < count((array)$resultArray,COUNT_RECURSIVE); $i++){
        $respuestaEnviar[]=array(
            'f_customer_id'=>$resultArray[$i]['f_customer_id'],
            'f_username'=>$resultArray[$i]['f_username'],
            'f_email'=>$resultArray[$i]['f_email'],
            'f_telephone'=>$resultArray[$i]['f_telephone'],
            'f_firstname'=>utf8_encode($resultArray[$i]['f_firstname']),
            'f_lastname'=>utf8_encode($resultArray[$i]['f_lastname']),
            'f_status'=>$resultArray[$i]['f_status'],
        );
    }

    $result=$clientes;

	$sql ="SELECT * FROM t_events where f_start_date >= CURDATE()";
    $eventos = $dbMaster->getResultAsAssoc($connect,$sql);


        
    
    include('common/header.php');
    include('pages/confirmacionclientes.php');
    include('common/footer.php');
?>