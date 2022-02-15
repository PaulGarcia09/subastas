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
    $sql ="select * from t_lots where f_event=18";
    $lotestotal = $dbMaster->getResultAsAssoc($connect,$sql);

    $sqle ="select * from t_lots where f_event=18 and f_status=3";
    $adjudicados = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select * from t_lots where f_event=18 and f_status=4";
    $vendidos = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select * from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3 and c.paddle_number >= 101";
    $adjudicadoslinea = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select * from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3 and c.paddle_number < 101";
    $adjudicadospiso = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select SUM(f_current_bid) as Total from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3";
    $precioadjudicado = $dbMaster->getResultAsAssoc($connect,$sqle);


    
    $sqle ="select SUM(f_current_bid) as Total from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3 and c.paddle_number >= 101";
    $adjudicadoslineaprecio = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select SUM(f_current_bid) as Total from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_event=18 and l.f_status=3 and c.paddle_number >= 101";
    $adjudicadospisoprecio = $dbMaster->getResultAsAssoc($connect,$sqle);


    $cantidadlotestotal = count($lotestotal);
    $cantidadloteadjudicados = count($adjudicados);
    $cantidadlotesvendidos = count($vendidos);

    $ajudicadosenpiso = count($adjudicadospiso);

    $adjudicadosenlinea = count($adjudicadoslinea);


    $adjudicadoslineaprecio = $adjudicadoslineaprecio[0]['Total'] ? $adjudicadoslineaprecio[0]['Total']: 0;
    $adjudicadoslineaprecio = number_format(floatval($adjudicadoslineaprecio));

    $adjudicadospisoprecio = $adjudicadospisoprecio[0]['Total'] ? $adjudicadospisoprecio[0]['Total']: 0;
    $adjudicadospisoprecio = number_format(floatval($adjudicadospisoprecio));

    $padjudicado = $precioadjudicado[0]['Total'] ? $precioadjudicado[0]['Total']: 0;
    $padjudicado = number_format(floatval($padjudicado));




?>



<html>

	<head>

    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

@media only screen and (max-width: 600px) {

}

    </style>

		<meta charset="utf-8">

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
	<body>

	<!-- Este div es el que sirve para que se muestren los copos de nieve (va acompañado de un script que está abajo) -->

		<div id="snowflakeContainer">

		<img style="margin-left:auto;display:block; margin-right:auto; width:250px;" src="https://subastas.maxilana.com/assets/img/logosubastas.png">

		</div>

		<div id="busqueda">

		</div> <!-- busqueda -->

		<!-- Aquí se mostrará el resultado de la consulta -->
		<div id="livesearch">
      
    <div class="card-body">
    <h2>Resumen de subasta</h2>
  <div class="table-responsive" style="overflow-x:auto;">
<table id="tableUsuarios" class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Total de lotes</th>
                      <th><a class="Lotestotal"><?php echo $cantidadlotestotal?></a></th>
                    </tr>


                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <table>
                      
                    <tbody>
                        <tr>
                        <th></th>
                        <th>Cant</th>
                        <th>Importe</th>
                        </tr>
                    <tr>
                    <td>Ajudicados en piso</td>
                    <td><a class="Lotesadjudicadospiso"><?php echo $ajudicadosenpiso?></a></td>
                    <td>$<a class="adjudicadospisoprecio"><?php echo $adjudicadospisoprecio?></a></td>
                    </td>
                    <tr>
                    <td>Ajudicados en linea</td>
                    <td><a class="Lotesadjudicadoslinea"><?php echo $adjudicadosenlinea?></a></td>
                    <td>$<a class="adjudicadoslineaprecio"><?php echo $adjudicadoslineaprecio?></a></td>

                    </tr>
                    <tr>
                    <td>Total ajudicado</td>
                    <td><a class="Lotesadjudicados"><?php echo $cantidadloteadjudicados?></a></td>
                    <td>$ <a class="TotalenLotesajudicados"><?php echo $padjudicado?></a></td>
                    </tr>
                    </tbody>    
                </table>
                </div>
    </div>

        </div>

	



<div class="modal fade" id="Configuracion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
    <h4>Configuraciones</h4>

      <div class="form-group row">
          <label for="firstName" class="col-sm-4 col-form-label">Número máximo de paletas por panel:</label>
          <div class="col-sm-8">
            <input type="text" stlye="margin-top:10px;"
             class="form-control" id="paletaspiso" name="paletaspiso" placeholder=""
            value="<?php echo $settings[0]['usuariospanel']?>"
            required>
          </div>
        </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-outline-success">Guardar</button>

      </div>
    </div>
  </div>
</div>
		<script type="text/javascript">
 baseUrl = '<?php echo BASE_URL ?>';

            getdetail();


            	function getdetail(){
    $( ".animado" ).removeClass("animated-fast fade-up");
    var entro=0;
     $.ajax({
       type: 'POST',
       url: baseUrl+'administracion/callestadistica.php',	
       success: function(result) {					
         try { 
           var resultado = JSON.parse(result);           
            $(".Lotestotal").html(resultado.cantidadlotestotal);
            $(".Lotesadjudicados").html(resultado.cantidadloteadjudicados);
            $(".Lotesvendidos").html(resultado.cantidadlotesvendidos);
            $(".Lotesadjudicadospiso").html(resultado.ajudicadosenpiso);
            $(".Lotesadjudicadoslinea").html(resultado.adjudicadosenlinea);
            $(".TotalenLotesajudicados").html(resultado.padjudicado);
            $(".TotalenLotesvendidos").html(resultado.pvendido);
            
         }
         catch( err  ) {
         }
       }
     });
 
 t=setTimeout("getdetail()",500);	
}	

		</script>

	</body>

</html>

