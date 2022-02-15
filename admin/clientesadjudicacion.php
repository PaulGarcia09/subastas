<?php 
include('../config/config.php');
$id=$_GET['id'];


$sql ="SELECT DISTINCT(f_bid_user),c.f_firstname,c.f_lastname,c.f_telephone,c.paddle_number FROM `t_lots` l inner join t_customer c on l.f_bid_user = c.f_customer_id WHERE f_event='{$id}'";
$resultUsusuarios = $dbMaster->getResultAsAssoc($connect,$sql);

$tabla='<table><tbody>';
foreach ($resultUsusuarios as $key => $value){
$usuario = $value['f_bid_user'];
$tabla=$tabla.'<tr>
<th colspan="2" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">'.$value['f_firstname'].' '.$value['f_lastname'].'</th>
<th colspan="2" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Paleta: '.$value['paddle_number'].'</th>
<th colspan="2" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Celular: '.$value['f_telephone'].'</th></tr>';
$sql ="SELECT * FROM `t_lots` WHERE f_event='{$id}' and  f_bid_user='{$usuario}' order by f_number asc";
    $resultadoPorUsuario = $dbMaster->getResultAsAssoc($connect,$sql);
        $tabla=$tabla.'<tr><td colspan="1" style="border: 1px solid gray;">Lote</td><td colspan="3" style="border: 1px solid gray;">Artículo</td><td colspan="2" style="border: 1px solid gray;">Precio</td></tr>';
        foreach($resultadoPorUsuario as $key => $valor){
        $tabla=$tabla.'<tr>';
        $tabla=$tabla.'<td colspan="1" style="border: 1px solid gray;">'.$valor['f_number'].'</td>';
        $tabla=$tabla.'<td colspan="3" style="border: 1px solid gray;">'.$valor['f_title'].'</td>';
        $tabla=$tabla.'<td colspan="2" style="border: 1px solid gray;">'.$valor['f_current_bid'].'</td>';
        $tabla=$tabla.'</tr>';
    }
   
 }
 $tabla=$tabla.'</tbody></table>';

 include('exportarlotadjust.php');
exit; ?>