<?php 
include('../config/config.php');
$id=$_GET['id'];


$sql ="SELECT DISTINCT(h.f_user_id),c.f_firstname,c.f_lastname,c.f_telephone,c.f_email,c.paddle_number FROM `t_lots_history` h inner join t_customer c on c.f_customer_id = h.f_user_id inner join t_lots l on l.f_lots_id = h.f_lot_id where l.f_event='{$id}' and h.f_user_id not in(select f_bid_user from t_lots where f_event = '{$id}') order by h.f_user_id asc";
$resultUsusuarios = $dbMaster->getResultAsAssoc($connect,$sql);

$tabla='<table><tbody>';
foreach ($resultUsusuarios as $key => $value){
$usuario = $value['f_user_id'];
$tabla=$tabla.'<tr>
<th colspan="2" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">'.$value['f_firstname'].' '.$value['f_lastname'].'</th>
<th colspan="2" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Paleta: '.$value['paddle_number'].'</th>
<th colspan="2" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Celular: '.$value['f_telephone'].'</th></tr>';
$sql ="SELECT DISTINCT(f_lot_id),l.f_number,l.f_title FROM t_lots_history h inner join t_lots l on l.f_lots_id = h.f_lot_id where h.f_user_id='{$usuario}' and l.f_event='{$id}'";
    $resultadoPorUsuario = $dbMaster->getResultAsAssoc($connect,$sql);
        $tabla=$tabla.'<tr><td colspan="1" style="border: 1px solid gray;">Lote</td><td colspan="5" style="border: 1px solid gray;">Articulo</td></tr>';
        foreach($resultadoPorUsuario as $key => $valor){
        $tabla=$tabla.'<tr>';
        $tabla=$tabla.'<td colspan="1" style="border: 1px solid gray;">'.$valor['f_number'].'</td>';
        $tabla=$tabla.'<td colspan="5" style="border: 1px solid gray;">'.$valor['f_title'].'</td>';
        $tabla=$tabla.'</tr>';
    }
   
 }
 $tabla=$tabla.'</tbody></table>';

 include('exportarinteres.php');
exit; ?>