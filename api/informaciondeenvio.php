<?php
    include('../config/config.php');
    $date = date('Y-m-d H:i:s');

        $direcciones = "select * from t_direccionesdeenvio where usuarioid=".$_POST['id'];
        $result = $dbMaster->getResultAsAssoc($connect,$direcciones);
        $respuestaEnviar=$result;
        echo json_encode($respuestaEnviar);
?>