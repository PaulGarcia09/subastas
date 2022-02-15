
  <?php
    include('../config/config.php');
    $sql ="SELECT * FROM t_customer where f_status='3'";
	$resultArray = $dbMaster->getResultAsAssoc($connect,$sql);
    $result = array();
    for($i = 0 ; $i < count($resultArray); $i++){
        $respuestaEnviar[]=array(
            'f_lots_id'=>$resultArray[$i]['f_customer_id'],
            'f_username'=>$resultArray[$i]['f_username'],
            'f_email'=>$resultArray[$i]['f_email'],
            'f_firstname'=>$resultArray[$i]['f_firstname'],
            'f_lastname'=>$resultArray[$i]['f_lastname'],
            'f_telephone'=>$resultArray[$i]['f_telephone'],
        );
    }
    echo json_encode($respuestaEnviar);

?>
