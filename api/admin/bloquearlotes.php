<?php

include('../../config/config.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $update = "update t_lots set bloquedbids = '1' WHERE f_lots_id ='{$id}'";
    $dbMaster->execute($connect,$update);
}
?>