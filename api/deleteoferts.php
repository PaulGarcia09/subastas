<?php
    include('../config/config.php');

        $id = $_POST['id'];
		$sql = "SELECT f_history_id FROM t_lots_history WHERE f_lot_id='{$id}' order by f_date desc limit 1";
		$resultUltimo = $dbMaster->getRowAsAssoc($connect,$sql);
		
		$HistoryId=$resultUltimo['f_history_id'];

		$sql = "DELETE from t_lots_history where f_history_id='{$HistoryId}'";
		$result = $dbMaster->execute($connect,$sql);


		$sql = "SELECT * FROM t_lots_history WHERE f_lot_id='{$id}' order by f_date desc limit 1";
		$resultNuevo = $dbMaster->getRowAsAssoc($connect,$sql);


		$Cantidad=$resultNuevo['f_amount'];
		$UsuarioNombre=$resultNuevo['f_username'];
		$UsuarioID=$resultNuevo['f_user_id'];	

		$sql = "UPDATE t_lots set f_bid_user_name='{$UsuarioNombre}', f_bid_user='{$UsuarioID}',f_current_bid='{$Cantidad}' where f_lots_id='{$id}'";
		$result = $dbMaster->execute($connect,$sql);


        echo $id;
	  
?>
