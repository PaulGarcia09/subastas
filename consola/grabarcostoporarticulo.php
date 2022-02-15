<?php
 require_once "../rematesComponent/pagoremates.php";

 // Instanciamos la clase que nos ayudará en el manejo del pago en linea
 $objpago = new Pago();

    if (!$objpago->grabarcostoporupc($_POST['id'],$_POST['costo'],$_POST['activo'],$_POST['tipo'])){
        echo "errorconexion";
    }
     else{ 
        echo json_encode($_POST['costo']);
    }   
?>  