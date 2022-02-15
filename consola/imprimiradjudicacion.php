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
    $Orden = $_GET['Ord'];
    $sql ="select * from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where  l.f_event = '{$evento}' and (l.f_status='4' OR l.f_status='3') ORDER BY f_number*1 ".$Orden;
    $lots = $dbMaster->getResultAsAssoc($connect,$sql);
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
              
    <input type="text" id="Search" onkeyup="busqueda()"style="height:40px; width:50%;" placeholder="Buscar por número de lote.." title="Buscador">

    <button type="button" id="Limpiar" style="margin-top: -4px;"
    class="btn btn-outline-primary">Limpiar</button>
    <?php if($Orden == "Asc") : ?>
      <a href="imprimiradjudicacion.php?Ord=Desc">Ordenar Decendente</a>
    <?php else : ?>
       <a href="imprimiradjudicacion.php?Ord=Asc">Ordenar Acendente</a>
      <?php endif; ?>
      <?php if($lots): ?>
                <div class="table-responsive" style="margin-top: -91px;">
                  <table id="tableUsuarios" class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Número Lote</th>
                      <th width="100%">Título</th>
                      <th width="20%">Paleta</th>
                      <th width="20%">L/P</th>
                      <th width="5%">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lots as $key => $value): ?>
                        <tr>
                        <td><?php echo $value['f_number']; ?></td>
                        <td><?php echo $value['f_title']; ?></td>
                          <td><?php echo $value['paddle_number']; ?></td>
                          <td><?php if(floatval($value['paddle_number']) <= 100){
                            echo ("Presencial");
                          }else{
                            echo ("Linea");
                          }
                           ?></td>
                          <td align="right" nowrap>
                          <?php if(floatval($value['paddle_number']) <= 100):?>
                            <a class="btn btn-success" href="imprimirhoja.php?id=<?php echo $value["f_lots_id"] ?>">Imprimir</a>
                         <?php else: ?>
                          <a class="btn btn-warning" href="imprimirhoja.php?id=<?php echo $value["f_lots_id"] ?>">Imprimir</a>
                          <?php endif; ?>
                          </td>
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

            </div>

        </div>




        
		<script type="text/javascript">

$("#Limpiar").click(function(){
      $("#Search").val("");
      busqueda();
    })

function busqueda() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("Search");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableUsuarios");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

		</script>

	</body>

</html>
