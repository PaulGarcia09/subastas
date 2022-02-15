<?php 
    include('../config/config.php');
$date = date('Y-m-d H:i:s');

$sql ="select * from t_lots where f_status ='1' and f_selected ='1' order by f_number asc";
$result = $dbMaster->getRowAsAssoc($connect,$sql);


//echo json_encode($contents);
echo json_encode($result);
exit;

