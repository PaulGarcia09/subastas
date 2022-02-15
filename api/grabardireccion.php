<?php
    include('../config/config.php');
    $date = date('Y-m-d H:i:s');
        $tarjeta = $_POST['Card'];
         
        
        $id=$_POST['id'];
        $direccion=$_POST['direccion'];
        $colonia=$_POST['colonia'];
        $codigopostal=$_POST['codigopostal'];
        $estado=$_POST['estado'];
        $municipio= $_POST['municipio'];
        $country= $_POST['country'];
        $cliente =$_POST['cliente'];
        if($_POST['option'] == '0'){
            $insert = "insert into t_direccionesdeenvio (usuarioid,direccion,colonia,codigopostal,estado,municipio,idubicacion,pais) VALUES ('$cliente','$direccion','$colonia','$codigopostal','$estado','$municipio','$id','$country')";
            $dbMaster->execute($connect,$insert);
        }
        else{
            $update ="update t_direccionesdeenvio set direccion='{$direccion}', colonia='{$colonia}' ,codigopostal='{$codigopostal}', estado='{$estado}', municipio='{$municipio}', pais='{$country}' where usuarioid='{$cliente}' and idubicacion='{$id}'";
            $dbMaster->execute($connect,$update);
        }

        echo ("OK");
?>