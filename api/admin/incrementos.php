<?php
    include('../../config/config.php');

    $id = $_POST['id'];

    $bidincrement = $_POST['increment'];

    $sql ="Update t_lots set
    f_bid_increment='{$bidincrement}'
    where f_lots_id ='{$id}'";
$result= $dbMaster->execute($connect,$sql);

?>