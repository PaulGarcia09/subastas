<?php

include('../config/config.php');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

date_default_timezone_set('America/Mazatlan');
header("Content-Type: text/html;charset=utf-8");

//header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html;charset=utf-8");
/* Iniciar la sesión */
session_start();
$datenow= date("Y-m-d");
    $evento = $_SESSION['evento'];
 
    $sql ="select f_lots_id,f_title,f_number,f_minimum_bid,f_reserve_bid,f_limitbid,f_bid_increment,f_current_bid,f_bid_user_name,l.f_date,f_bid_user,l.f_status,f_selected,f_message,f_nextlot,f_finalylot,f_typenext,f_order,COUNT(h.f_lot_id)as totalofertas,COUNT(DISTINCT h.f_user_id)as numpaletas,CONCAT(c.f_firstname,' ',c.f_lastname)as Nombrecte from t_lots l left join t_lots_history h on l.f_lots_id=h.f_lot_id left join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=19 GROUP by f_lots_id order by f_order,f_number asc";
    $catalog = $dbMaster->getResultAsAssoc($connect,$sql);
    
    $sqlcount1 ="SELECT COUNT(DISTINCT f_bid_user) as Totalusuarios FROM `t_lots` where f_event=19 and f_bid_user <> ''";
    $total1 = $dbMaster->getResultAsAssoc($connect,$sqlcount1);

    $sqlcount2 ="SELECT COUNT(DISTINCT(h.f_user_id)) AS Totalofertando FROM `t_lots_history` h inner join t_lots l on h.f_lot_id=l.f_lots_id where l.f_event=19";
    $total2 = $dbMaster->getResultAsAssoc($connect,$sqlcount2);



    $sql ="SELECT SUM(f_current_bid) as Totalalmomento, SUM(f_minimum_bid) as Totalinicial FROM `t_lots` where f_event=19";
    $total = $dbMaster->getResultAsAssoc($connect,$sql);


    $sqlotofer ="SELECT COUNT(f_lots_id) as lotessinoferta FROM `t_lots` where f_event=19 and f_bid_user = ''";
    $total3 = $dbMaster->getResultAsAssoc($connect,$sqlotofer);

    $sqlotofer ="SELECT COUNT(f_lots_id) as lotesconoferta FROM `t_lots` where f_event=19 and f_bid_user <> ''";
    $total4 = $dbMaster->getResultAsAssoc($connect,$sqlotofer);
?> 
<html>
<meta charset="utf-8">
<head>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="costoenvio.css">

<script type="text/javascript" src="costoenvio.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<title>Consola Love To Help</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script></head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Información de lotes</h1>
    
    <div class="card" style="width: 25rem;">
  <div class="card-body">
  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Precio inicial</span>
  </div>
  <input type="text" disabled class="form-control" style="text-align: right;    font-size: 18px;"
  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo number_format(floatval($total[0]['Totalinicial']));?>">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Ofertas actuales</span>
  </div>
  <input type="text" disabled class="form-control" style="text-align: right;    font-size: 18px;"
  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo number_format(floatval($total[0]['Totalalmomento']));?>">
</div>


<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"># Lotes ofertados</span>
  </div>
  <input type="text" disabled class="form-control" style="text-align: right;    font-size: 18px;"
  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo number_format(floatval($total4[0]['lotesconoferta']));?>">
</div>


<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"># Lotes SIN oferta</span>
  </div>
  <input type="text" disabled class="form-control" style="text-align: right;    font-size: 18px;"
  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo number_format(floatval($total3[0]['lotessinoferta']));?>">
</div>


  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Clientes con oferta</span>
  </div>
  <input type="text" disabled class="form-control" style="text-align: right;    font-size: 18px;"
  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo number_format(floatval($total2[0]['Totalofertando']));?>">
</div>

  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Clientes ganadores</span>
  </div>
  <input type="text" disabled class="form-control" style="text-align: right;    font-size: 18px;"
  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo number_format(floatval($total1[0]['Totalusuarios']));?>">
</div>
  </div>

</div>

<button class="btn btn-primary" onClick="history.go(0);">Actualizar</button>
<?php if($catalog): ?>
                <div class="table-responsive">
                <table style="margin-top:0px !important;" class="dataTables table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Lote</th>
                    <th>Ofertas</th>
                    <th># de paletas</th>
                    <th>Importe inicial</th>
                    <th>Oferta actual</th>
                    <th>Cliente</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($catalog as $key => $value): ?>

                      <tr>
                      <td><?php echo $value['f_number']. " - ". $value['f_title']; ?></td>
                      <td><?php echo $value['totalofertas']; ?></td>
                      <td><?php echo $value['numpaletas']; ?></td>
                      <td><?php echo number_format(floatval($value['f_minimum_bid']),2); ?></td>
                      <td><?php echo number_format(floatval($value['f_current_bid']),2); ?></td>
                      <td><?php echo $value['Nombrecte'];?></td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                </table>
              </div>
              <?php else: ?>
                <div class="col">
                  <div class="text-center"><h2>No hay información para mostrar</h2></div>
                </div>
              <?php endif; ?>

              </body>