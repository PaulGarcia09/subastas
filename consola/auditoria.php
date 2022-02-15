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
    $sql ="SELECT sum(importeventa)Totalvendido, sum(importeefectivo) Totalefectivo, sum(importevoucher) Totalvoucher FROM `ventas` WHERE evento=".$evento;
    $totales = $dbMaster->getResultAsAssoc($connect,$sql);

    $sqle ="SELECT saldoinicial FROM t_settings";
    $saldos = $dbMaster->getResultAsAssoc($connect,$sqle);

    $saldosfianl = (floatval($saldos[0]['saldoinicial'])+floatval($totales[0]['Totalvendido']));

    $sql ="SELECT l.f_number,l.f_title,l.f_event,l.f_minimum_bid,l.f_current_bid,l.f_status as status, c.paddle_number FROM t_lots l inner join t_customer c on l.f_bid_user = c.f_customer_id where l.f_status in(3,4) and f_event=".$evento;
    $lotes = $dbMaster->getResultAsAssoc($connect,$sql);

    $sql ="select COUNT(f_lots_id) as totalajudicado from t_lots where f_status in(3,4) and f_event=".$evento;
    $lotesadj = $dbMaster->getResultAsAssoc($connect,$sql);

    $sql ="select SUM(f_current_bid)total from t_lots where f_status in(3,4) and f_event=".$evento;
    $importeadj = $dbMaster->getResultAsAssoc($connect,$sql);

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
    <h1>Resumen para cierre</h1>
<?php if($totales): ?>
                <div class="table-responsive">
                  <table style="margin-top:0px !important;" class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Vendido</th>
                      <th>Efectivo</th>
                      <th>Voucher</th>
                      <th>Adjudicados/vendidos</th>
                      <th>Importe ajudicados/vendidos</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($totales as $key => $value): ?>

                        <tr>
                        <td><?php echo number_format(floatval($value['Totalvendido'])); ?></td>
                        <td><?php echo number_format(floatval($value['Totalefectivo'])); ?></td>
                        <td><?php echo number_format(floatval($value['Totalvoucher'])); ?></td>
                        
                        <?php endforeach; ?>
                        <td><?php echo $lotesadj[0]['totalajudicado']; ?></td>
                        <td><?php echo number_format(floatval($importeadj[0]['total'])); ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="table-responsive">
                  <table style="margin-top:0px !important;" class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Saldo Inicial</th>
                      <th>Saldo Final</th>
                    </tr>
                    </thead>
                    <tbody>
     
                        <tr>
                        <td><?php echo number_format(floatval($saldos[0]['saldoinicial'])); ?></td>
                        <td><?php echo number_format(floatval($saldosfianl)); ?></td>
                        </tr>
  
                    </tbody>
                  </table>
                </div>

                <div class="table-responsive">
                  <table style="margin-top:0px !important;" class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Numero de lote</th>
                      <th>Titulo</th>
                      <th>Importe inicial</th>
                      <th>Importe final</th>
                      <th>P/L</th>
                      <th>Estatus</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($lotes as $key => $value): ?>

                        <tr>
                        <td><?php echo $value['f_number']; ?></td>
                        <td><?php echo $value['f_title']; ?></td>
                        <td><?php echo number_format(floatval($value['f_minimum_bid'])); ?></td>
                        <td><?php echo number_format(floatval($value['f_current_bid'])); ?></td>
                        <td><?php if(floatval($value['paddle_number']) <= 100)  {
                                  echo ("P");
                        }else{
                          echo ("L");
                        }?></td>
                      <td><?php if($value['status'] == "3")  {
                                  echo "Adjudicado";
                        }else{
                          echo "Vendido";
                        }?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              <?php else: ?>
                <div class="col">
                  <div class="text-center"><h2>No Data Available</h2></div>
                </div>
              <?php endif; ?>

              </body>