<?php
    include('config/config.php');
    $datenow= date("Y-m-d");
	
	mysqli_set_charset($connect, 'utf-8');
	
     $sql ="select f_lots_id,f_title,f_number,f_description,f_start_date,f_event,f_primary_image,f_minimum_bid,f_reserve_bid,f_limitbid,f_bid_increment,f_current_bid,f_bid_user_name,l.f_date,f_bid_user,f_status,f_selected,f_message,f_nextlot,f_finalylot,f_typenext,f_order,COUNT(h.f_lot_id)as totalofertas from t_lots l left join t_lots_history h on l.f_lots_id=h.f_lot_id where l.f_start_date>=CURDATE() and f_status >0 GROUP by f_lots_id order by f_order,f_number asc";
     $catalog = $dbMaster->getResultAsAssoc($connect,$sql);

    $sql="select * from t_events where f_start_date <= CURDATE() and f_status >0 order by f_events_id asc";
    $afterLots = $dbMaster->getResultAsAssoc($connect,$sql);

    include('common/header.php');
    include('pages/catalog-all.php');
    include('common/footer.php');
?>
