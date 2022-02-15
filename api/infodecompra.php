<?php
    include('../config/config.php');
    $date = date('Y-m-d H:i:s');
        $usuario = $_POST['costumer'];
        $id= $_POST['id'];
        $lote= $_POST['lotid']; 
        $monto= $_POST['total']; 
        $dir = $_POST['dir'];
            $update = "insert into informaciondecompras (id,usuario,lotid,monto,iddireccion) VALUES ('$id','$usuario','$lote','$monto','$dir')";
			$dbMaster->execute($connect,$update);
            echo ("OK");
?>