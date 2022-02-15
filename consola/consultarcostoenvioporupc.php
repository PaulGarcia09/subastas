<?php
 require_once "../rematesComponent/pagoremates.php";

 // Instanciamos la clase que nos ayudará en el manejo del pago en linea
 $objpago = new Pago();

    if (!$objpago->consultaCostoEnvioPorUpc($_POST['id'],$arrayRespuesta)){
        echo "errorconexion";
    }
     else{ 
        echo json_encode($arrayRespuesta);
    }   
?>  