<?php
    include('../../config/config.php');

    $datenow= date("Y-m-d");

 
		 $lotid = 910;
	$sql = "Select * from t_lots where f_selected = '1'";
			$dbresult_selected = $dbMaster->getRowAsAssoc($connect,$sql);
			
			if(count($dbresult_selected)>0){
			$array['status'] =200;
			$array['message'] ="";
            echo json_encode($array);
					exit;
			}
			$sql = "Select * from t_lots where f_lots_id = '{$lotid}'";
			 $dbresult = $dbMaster->getRowAsAssoc($connect,$sql);
		
			
			if($dbresult['f_selected']!='1' && $dbresult['f_status']=='1' && strtotime($dbresult['f_start_date'])==strtotime(date('Y-m-d'))){
			
				 $update_sql ="update t_lots set f_selected ='1' where f_lots_id ='{$lotid}'";
				 $update_result = $dbMaster->execute($connect,$update_sql);
				
				// if(!$update_result){
					// $array['message'] ="Failed";
					// echo json_encode($array);	
					// exit;
				// }else{
					
				  echo  ($dbresult['f_selected']).'<br>';
             echo    strtotime($dbresult['f_start_date']).'<br>';
             echo    strtotime(date('Y-m-d')).'<br>';
             echo    $dbresult['f_status'].'<br>';
             echo   count($dbresult_selected).'<br>';
					 
   
				// }
		 } 
   
?>
