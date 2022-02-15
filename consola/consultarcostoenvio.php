<?php
 require_once "../rematesComponent/pagoremates.php";

 // Instanciamos la clase que nos ayudará en el manejo del pago en linea
 $objpago = new Pago();

    if (!$objpago->consultaCostoEnvio($arrayDatos)){
        echo "errorconexion";
    }
     else{ 
        echo json_encode($arrayDatos);
    }   
?>  