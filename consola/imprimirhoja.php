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
$sql ="select l.f_number as NumeroLote, l.f_title as NombreLote, e.f_title as NombreEvento, c.paddle_number as Paleta, CONCAT(c.f_firstname, ' ', c.f_lastname) as NombreCliente, l.f_current_bid,now() as Fecha from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user inner join t_events e on e.f_events_id=l.f_event where f_lots_id=".$_GET['id'];
$lots = $dbMaster->getResultAsAssoc($connect,$sql);

?>

<html>
<head>

<script language="VBScript">
	SUB Print()
	OLECMDID_PRINT = 6
	OLECMDEXECOPT_DONTPROMPTUSER = 2
	OLECMDEXECOPT_PROMPTUSER = 1
	'ACA en caso de usar frames,
	'enfocamos el frame a imprimir:

	'window.parent.frames.main.document.body.focus()
	window.document.body.focus()

	'Llamamos al comando de Impresión Print

	on error resume next
	call IEWB.ExecWB (OLECMDID_PRINT, -1)

	if err.number <> 0 then
		alert "No se pudo imprimir"
	end if

	END SUB
	</script>

</head>
<?php foreach ($lots as $key => $value): ?>
<div #ticket class="ticket" id="ticket" [hidden]='1' style="margin: 0; text-align: center;" >
        <img src="http://grupoalvarez.com.mx/Subasta/assets/img/LogoTicket.png"
     
        alt="">
      <p class="centrado" style="text-align: center;font-family: Arial;font-size: 16px;">BOLETO DE ADJUDICACIÓN
      <table style="margin-bottom: 20px; padding-bottom: 40px;">
          <thead>
              <tr>
                    <p style="text-align: center;font-family: Arial;font-size: 22px; margin: auto; ">
                        Paleta: <?php echo $value['Paleta']?>
                      </p>
                      <p style="text-align: center;font-family: Arial;font-size: 18px; margin: auto; ">
                        <?php if(floatval($value['Paleta']) > 100){
                            echo("L");
                        }else{
                            echo("P");
                        }?>
                      </p>
                    <p style="text-align: center;font-family: Arial;font-size: 14px;margin: auto;" >
                        <?php echo $value['NombreCliente']?>
                      </p>
              </tr>
              <br>
              <tr>
                  <p style="text-align: center;font-family: Arial;font-size: 18px;margin: auto; ">
                      Lote: <?php echo $value['NumeroLote']?> - <?php echo $value['NombreLote']?>
                    </p>
                      <p style="text-align: center;font-family: Arial;font-size: 18px ">
                      Monto: <?php echo "$".number_format(floatval($value['f_current_bid'])) ?>
                      </p>
             
              </tr>
              <tr>
                  <p style="text-align: center;font-family: Arial;">
                      Fecha: <?php echo $value['Fecha']?>
                  </p>
              </tr>
              <tr>
                  <p style="text-align: center;font-family: Arial;font-size: 14px ">
                      Evento patrocinado por
                      <br>
                      <img src="http://grupoalvarez.com.mx/Subasta/assets/img/MaxilanaTicket.png"
                      style="margin-top: 5px; padding-left: 20px; padding-right: 20px;"
                      alt="">
                    </p>

              </tr>
          </thead>
      </table>
      <br>
      <br>
    </div>
	<?php endforeach; ?>
</html>

<script type="text/javascript">

window.print();

setTimeout(function(){ ReImprimir() }, 3000);

function ReImprimir(){ 
	window.print();
	setTimeout(function(){ regresar() }, 250);
}
function regresar(){
	window.history.back();
}

</script>