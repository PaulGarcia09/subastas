<?php
include('../config/config.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $message = $_POST['message'];
    $update = "update t_lots set f_message = '{$message}' WHERE f_lots_id ='{$id}'";
    $dbMaster->execute($connect,$update);
}
?>