<?php 
include('../config/config.php');
$id=$_GET['id'];


$sql ="select l.f_number,l.f_title,c.f_firstname,c.f_lastname,c.paddle_number,l.f_current_bid,e.f_title as eventot from t_lots l left join t_customer c on c.f_customer_id = l.f_bid_user inner join t_events e on e.f_events_id = l.f_event where f_event='{$id}' order by f_number asc";
$resultados = $dbMaster->getResultAsAssoc($connect,$sql);


$nombrearchivo = $resultados[0]['eventot'];
$tabla='<table><tbody>';
$tabla=$tabla.'<tr>
<th colspan="1" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Lote</th>
<th colspan="5" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Titulo</th>
<th colspan="1" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Precio actual</th>
<th colspan="3" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Nombre cliente</th>
<th colspan="1" style="text-align:left;background:#C8D0FC;border: 1px solid gray;">Paleta</th></tr>';
foreach ($resultados as $key => $valor){
        

        $tabla=$tabla.'<tr><td colspan="1" style="border: 1px solid gray;">'.$valor['f_number'].'</td>';
        $tabla=$tabla.'<td colspan="5" style="border: 1px solid gray;">'.utf8_decode($valor['f_title']).'</td>';
        $tabla=$tabla.'<td colspan="1" style="border: 1px solid gray;">'.$valor['f_current_bid'].'</td>';
        $tabla=$tabla.'<td colspan="3" style="border: 1px solid gray;">'.utf8_decode($valor['f_firstname']).' '.utf8_decode($valor['f_lastname']).'</td>';
        $tabla=$tabla.'<td colspan="1" style="border: 1px solid gray;">'.$valor['paddle_number'].'</td>';
        $tabla=$tabla.'</tr>';
 }
 $tabla=$tabla.'</tbody></table>';

 include('exportarofertasactuales.php');
exit; ?>