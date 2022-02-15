<?php

include('../config/config.php');

    $id = $_POST['id'];
    $update = "update t_lots set bloquedbids = '1', f_message='Ofertas bloqueadas' WHERE f_lots_id ='{$id}'";
    $dbMaster->execute($connect,$update);

?>