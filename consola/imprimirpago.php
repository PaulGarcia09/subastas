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
$TotaldeArticulos=0;

$datenow= date("Y-m-d");
$sql ="SELECT * FROM `ventasdetalle` vd inner join t_lots l on vd.f_lots_id=l.f_lots_id where vd.folioventa=".$_GET['folioventa'];;
$lots = $dbMaster->getResultAsAssoc($connect,$sql);

$sql ="SELECT * FROM `ventas` v inner join t_customer c on v.f_customer_id=c.f_customer_id where folioventa=".$_GET['folioventa'];;
$usuario = $dbMaster->getResultAsAssoc($connect,$sql);


?>



<div style="font-family: Arial;font-size: 10px; padding: 0px;" class="ticketLaser" id="ticketLaser" [hidden]='1' >
      <div>
        <div style="display: inline-flex;">
          <img src="http://grupoalvarez.com.mx/Subasta/assets/img/Logopequeño.png" alt="">
          <p class="centrado" style="text-align: center ; font-family: Arial; font-size: 10px;margin-left: 100px;">
            LA NACIONAL PIGNORACIONES Y REMATES S.A. DE C.V.<br>
            DONATO GUERRA 235 SUR INT. 201 COL. JORGE ALMADA <br>
            (667) 759-35-00
          </p>
        </div>
          <div>
                <p style="text-align: right;  font-family: Arial;font-size: 10px">
                Culiacán, Sinaloa. <?php echo $lots[0]['Fecha']?>
                  </p>
            </div>
            <div style="clear: both">
                <p style="float: left;font-family: Arial;font-size: 11px;"><b>CLIENTE : <?php echo ($usuario[0]['f_firstname']. " " .$usuario[0]['f_lastname']) ?></b></p>
                <p style="float: right;font-family: Arial;font-size: 10px;"><b>FOLIO : <?php echo $lots[0]['folioventa']?></b></p>
            </div>
            <hr style="margin-top: 50px;">
      <table class="table table-hover" style="width: 100%;">
         
          <tbody>

          <?php foreach ($lots as $key => $value)
          : $TotaldeArticulos = $TotaldeArticulos + floatval($value['f_current_bid']);?>

            <tr  *ngFor="let item of itemImpreso">
    
                <td class="producto" style="text-align: left; font-size: 10px;font-family: Arial;">
                    <p style="text-align: left; font-size: 11; margin-top: 10px;">Lote : <?php echo $value['f_number']?> - <?php echo $value['f_title']?>
                      </p>
                  </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td style="font-size: 11px;margin-top: 10px;text-align: right;"> <?php echo "$".number_format(floatval($value['f_current_bid'])) ?>
    
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
          
        <hr style="margin-bottom: auto;">
        <div style="clear: both">
            <p style="float: left;font-family: Arial;font-size: 10px;"><b>Piezas : <?php echo count($lots)?></b></p>
            <p style="float: right;font-family: Arial;font-size: 12px;"><b>TOTAL :<?php echo "$".number_format(floatval($TotaldeArticulos)) ?></b></p>
        </div>
    
        <div style="clear: both">
        <?php if(floatval($usuario[0]['importeefectivo']) <> 0):?> 
            <p style="text-align: right;font-family:Arial;font-size: 10px">
                Efectivo :<?php echo "$".number_format(floatval($usuario[0]['importeefectivo'])) ?>
              </p>
              <?php endif;?>
              <?php if(floatval($usuario[0]['importevoucher']) <> 0):?> 
              <p style="text-align: right;font-family:Arial;font-size: 10px">
                Voucher :<?php echo "$".number_format(floatval($usuario[0]['importevoucher'])) ?>
              </p>
              <?php endif;?>
        </div>
                <p style="text-align: left;font-family:Arial;font-size: 10px">
                    ELABORÓ : <?php echo $_SESSION['nombre']?>
                  </p>
                
      </div>
    
    </div>

    
<script type="text/javascript">

window.print();

setTimeout(function(){ ReImprimir() }, 3000);

function ReImprimir(){ 
	window.print();
	setTimeout(function(){ regresar() }, 250);
}
function regresar(){
    var url="caja.php";
    window.location.href =url;
    }

</script>