<?php
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
	require '../funciones.php'; 
	$link2 = conexion($host,$dbnombre,$dbuser,$dbpass);
	mysqli_set_charset($link2, 'latin1');

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

		<title>Costo de envío de artículos</title>

	<script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script></head>

<?php

	if (isset($_SESSION['registrado']) && $_SESSION['registrado'] == true)

		{
		}

	else

		{

			echo '<div class="advertencia" onclick="javascript:cerrarNotificaciones(this)">Esta página es sólo para usuarios registrados <br> <a href="index.php">Inicie sesión aquí</div>';
			exit;

		}

	$now = time(); // Se obtiene la hora actual para ver si sigue vigente la sesión
	if($now > $_SESSION['expira'])

		{

		  session_destroy();
		  echo '<div class="informacion" onclick="javascript:cerrarNotificaciones(this)">Su sesión ha terminado, necesita volver a realizar el <a href="index.php"> inicio de sesión</a> para poder continuar.</div>';
		  exit;

		}

	else

		{

			$_SESSION['expira'] = $now + (10 * 60);  // Si la sesión todavía no se termina y sigue trabajando le damos otros 10 minutos adicionales a la hora actual, en caso que pase más de 10 minutos sin actividad entonces se cerrará la sesión

		}

?>

	<body onload="CargarPantalla()">

	<!-- Este div es el que sirve para que se muestren los copos de nieve (va acompañado de un script que está abajo) -->

		<div id="snowflakeContainer">

		    <p class="snowflake">*</p>

		</div>



		<a href="logout.php" class="logout">Cerrar sesión</a>

		<div id="busqueda">

			<img id="cargando" src="cargando.gif">
				<div id="campos" class="filtrosdiv">

				<span> Información de costo de envío de artículos por upc </span>
				<br>
						<div>

						Upc:
						<br>
						<input type="text" id="upc" onkeypress="return searchKeyPress(event);" onfocusout="validarFoco()" size="13"  />
						<br>

						</div>

					<div>

					Descripción:
					<br>
					<input type="text" id="descripcionupc" disabled="true" size="30" />
					<br>

					</div>
					<div>

					Costo:
					<br>
					<input type="text" id="CostoUpc" disabled="true" size="30" />
					<br>

					</div>

				<div>

				Nuevo costo:
				<br>
				<input type="text" id="nuevoCostoUpc" size="30" />
				<br>

				</div>

				<input type="button" id="btnGrabar" class="boton" value="  Grabar  " onclick="grabarInformacionUPC()" />

				<input type="hidden" id="codigoSucursal" />

				</div>
			<div id="campos" class="filtrosdiv">

			<span> Información de costo de envío de artículo por tipo</span>
			<br>
			<div>

			Tipo de artículo
			<br>
			<select name="tipo" id="TipoArticulo" class="wrapper-dropdown-5" OnChange="ConsultarPorTipo(this);">
			<option value="Todos">
			</option>
			<?php
			$strSQL = "select id, nombre from tipos order by id asc";
			//$result = mysql_query($strSQL);
			$result = mysqli_query($link2, $strSQL);

			//while($renglon = mysql_fetch_array($result))
			while($renglon = mysqli_fetch_array($result))
			{
			?>
			<option value="<?php echo $renglon["id"]; ?>"
			<?php
			if(isset($tipo) and ($renglon["id"]==$tipo))
			{
			$tiponombre = utf8_encode(strtolower($renglon["nombre"]));
			echo "selected";
			}
			?>
			>
			<?php
			echo $renglon["id"]."-".utf8_encode(ucfirst(strtolower($renglon["nombre"])));
			?>
			</option>
			<?php
			}

			//mysql_free_result($result);

			?>
			</select>
			<br>

			</div>

			<div>

			Costo de envío
			<br>
			<input type="text" disabled="true" id="costoEnvioPorTipo" />
			<br>

			</div>

			<div>

			Nuevo costo:
			<br>
			<input type="text" id="nuevoCostoPorTipo" size="30" />
			<br>

			</div>

			<input type="button" id="btnGrabar" class="boton" value="  Grabar  " onclick="grabarInfoPorTipo()" />

			<input type="hidden" id="codigoSucursal" />

			</div> 

				<div id="tabla" class="tabla">

			    </div>

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
