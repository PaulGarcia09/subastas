<?php
 require_once "../rematesComponent/pagoremates.php";

 // Instanciamos la clase que nos ayudará en el manejo del pago en linea
 $objpago = new Pago();

    if (!$objpago->GrabarNuevoCosto($_POST['costo'],$costo,$_POST['id'])){
        echo "errorconexion";
    }
     else{ 
        echo json_encode($costo);
    }   
?>  