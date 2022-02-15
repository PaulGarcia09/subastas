<?php

include('../../config/config.php');

    $id = $_POST['id'];
    $message = $_POST['mesagge'];
    $update = "update t_lots set f_message = '{$message}' WHERE f_lots_id ='{$id}'";
    $dbMaster->execute($connect,$update);

?>