<?php
 require_once "../rematesComponent/pagoremates.php";

 // Instanciamos la clase que nos ayudará en el manejo del pago en linea
 $objpago = new Pago();

    if (!$objpago->actualizarcostoporupc($_POST['id'],$_POST['costo'],$_POST['activo'],$_POST['tipo'],$ccosto)){
        echo "errorconexion";
    }
     else{ 
        echo json_encode($ccosto);
    }   
?>  