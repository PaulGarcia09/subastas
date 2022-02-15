<?php
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

	date_default_timezone_set('America/Mazatlan');
	header("Content-Type: text/html;charset=utf-8");

	//header('Access-Control-Allow-Origin: *');
	header("Content-Type: text/html;charset=utf-8");
	/* Iniciar la sesión */
	session_start();

?>

<html>

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="costoenvio.css">

		<script type="text/javascript" src="costoenvio.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<title>Consola Love To Help</title>

	<script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script></head>

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
		<div id="livesearch"></div>


		<script type="text/javascript">

	

		</script>

	<!-- Este script es el que genera los copos de nieve (va acompañado de un div que está más arriba) -->
	<!--
		<script type="text/javascript" src="fallingsnow_v6.js"></script>
	-->


	</body>

</html>
