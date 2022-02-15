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
    $sql ="select * from t_customer where fechaenpiso = '{$datenow}' and registroenpiso=1 ORDER BY paddle_number*1 ASC";
    $usuarios = $dbMaster->getResultAsAssoc($connect,$sql);

    $sqle ="select * from t_settings";

    $settings = $dbMaster->getResultAsAssoc($connect,$sqle);


    $cantidadPaneles = count($usuarios);

    $usuarip = floatval($settings[0]['usuariospanel']);

    $totalpaneles = ceil($cantidadPaneles / $usuarip);

    

?>



<html>

	<head>

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
		<ul class="navs">
        <li><a href="adminpanel.php">Panel de Usuarios</a></li>
        <li><a href="registro.php">Registrar Clientes</a></li>
        <li><a href="imprimiradjudicacion.php">Imprimir adjudicación</a></li>
        <li><a href="caja.php">Caja</a></li>
        <li><a href="auditoria.php">Auditoría</a></li>
    </ul>

		</div> <!-- busqueda -->

		<!-- Aquí se mostrará el resultado de la consulta -->
		<div id="livesearch">
      
    <div class="card-body" style="width: 1200px;
    margin-left: auto;
    margin-right: auto;">

<button type="button" class="btn btn-outline-secondary" id="Config" style="margin-top: -4px;"  
       data-data="<?php echo $value["f_customer_id"]?>" data-event="<?php echo $value["f_event"]?>"
                                    data-target="#Configuracion"data-toggle="modal" data-target="#Configuracion">CONFIGURACION</button>

          <?php for ($i = 1; $i <= $totalpaneles; $i++)
          {?>

            <button type="button" 
            style="width:100%; height:5% !important;margin-top:10px;"
            class="btn btn-outline-primary" data-data="<?php echo $i?>">Ingresar al panel <?php echo $i?></button>


          <?php }?>
  
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
      var totalpp = "<?php echo $usuarip?>";
      $(".btn-outline-primary").click(function(){
        var panel = $(this).data('data');
          window.location.href="panel.php?panel="+panel+"&pp="+totalpp;

      })

      $(".btn-outline-success").click(function(){
        paletas = $('#paletaspiso').val();

        if(paletas == "" || paletas =='0'){
          paletas =0;
        }

        if(parseFloat(paletas) != 0){
          infodata={
                cantidadpaletas : paletas
                  };
              $.ajax({    
              data:  infodata,      
              type: 'POST',                     
              url: 'paletaspanel.php',           
              success: function(result) {  
              location.reload();
              }
              });
        }
    })

		</script>

	</body>

</html>

