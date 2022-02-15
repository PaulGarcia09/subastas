<?php
	include('../../config/config.php');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $lotid = $_GET['idlote'];
        $iduser = $_GET['idUser'];
        $amount = $_GET['amount'];
		$error ="";
		$amount = str_replace(",", "",mysqli_real_escape_string($connect,$amount));
		
				
			$sql ="select * from t_lots where f_status = '1'  and f_lots_id = '{$lotid}'";
			$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
			if(empty($showresult)){		
				$error .='El artículo no existe';
			}else{ 
				$currentBid = ($showresult['f_bid_increment'] =='') ? 0: (int)$showresult['f_bid_increment'];
				$askingBid = ($showresult['f_current_bid'] =='') ? 0: (int)$showresult['f_current_bid'];
				if((int)$askingBid == 0){
					$currentBid = ($showresult['f_minimum_bid'] =='') ? 0: (int)$showresult['f_minimum_bid'];
				}
				if( (int)$amount < ($askingBid + $currentBid)){			
					$error .='La cantidad debe ser igual o mayor que la oferta solicitada<br>';
				}
				$sql ="select * from t_lots where f_status = '1'  and f_lots_id = '{$lotid}' and f_bid_user ='{$iduser}'";
				$showresult = $dbMaster->getRowAsAssoc($connect,$sql);
				if(!empty($showresult)){
					$error .='No es posible apostar, usted tiene la oferta más alta.<br>';
				}
			}
        

        if($error == ''){
            $sql ="select * from t_customer where f_customer_id ='{$iduser}'";
            $showresult = $dbMaster->getRowAsAssoc($connect,$sql);
            $username=$showresult['f_username'];
    
                $update = "update t_lots set 
                f_current_bid ='{$amount}',
                f_bid_user_name='{$username}',
                f_bid_user ='{$iduser}'
                where f_lots_id = '{$lotid}'		                  
                and f_status ='1'";
                $dbMaster->execute($connect,$update);
    
                $date = date('Y-m-d H:i:s');
    
                if($showresult['f_selected']=='1'){
                $stat='2';	
                }else{
                $stat='1';
                }
    
                $sql ="INSERT  INTO t_lots_history (	               
                f_lot_id,
                f_user_id,
                f_username,
                f_date,
                f_amount,
                f_type)
                VALUES
                ('{$lotid}',
                '{$iduser}',
                '{$username}',
                now(),
                '{$amount}',
                '$stat')";	
                $result = $dbMaster->execute($connect,$sql);
        }
        if($result){
            $array['status'] =200;
          echo json_encode($array);
          exit;
        }
        else{
            $array['message'] =$error;
            $array['iduser']=$iduser;
            $array['amount'] =$amount;
            echo json_encode($array);
            exit;
		}
?>