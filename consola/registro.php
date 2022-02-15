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
    $sql ="SELECT f_customer_id,f_telephone,paddle_number, concat(f_firstname,' ', f_lastname) as Nombre 
	FROM `t_customer` where f_customer_id >1 and fechaenpiso <> '{$datenow}' order by paddle_number*1 asc";
    $usuarios = $dbMaster->getResultAsAssoc($connect,$sql);

	
    $sqlt ="select * from t_referencias";

    $invita = $dbMaster->getResultAsAssoc($connect,$sqlt);

	$sqle ="select * from t_instituciones";

    $instituciones = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqle ="select * from t_settings";

    $settings = $dbMaster->getResultAsAssoc($connect,$sqle);
?>



<html>

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

    <meta http-equiv="Expires" content="0">

    <meta http-equiv="Last-Modified" content="0">

    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

    <meta http-equiv="Pragma" content="no-cache">
    <title>Consola Love To Help</title>

		<link rel="stylesheet" type="text/css" href="costoenvio.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
     integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="registro.js"></script>  
  </head>
    <body onload="showUI(1)">

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
<!--		<button type="button" class="btn btn-primary" id="Pago" style="margin-top: -4px;"
    data-data="<?php echo $value["f_customer_id"]?>" data-event="<?php echo $value["f_event"]?>"
                                    data-target="#modalRegistro"data-toggle="modal" data-target="#modalRegistro">REGISTRAR CLIENTE</button> !-->

		<button type="button" class="btn btn-primary" id="Regis" style="margin-top: -4px;">REGISTRAR CLIENTE</button>

                                    <div class="container" id="contain" style="display: none">
            <form id="formDetails">
              <div class="accountInfo">
              <br>
                <h4>Información personal</h4>

                <div class="form-group row">
                  <label for="firstName" class="col-sm-4 col-form-label">*Nombre(s)</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="lastName" class="col-sm-4 col-form-label">*Apellido(s)</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label">*Correo electrónico</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="phoneNumber" class="col-sm-4 col-form-label">*Número celular</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" maxlength = "10" placeholder="" required>
                  </div>
                </div>

              </div>

              <div class="accountInfo">
                <h4>Address Information</h4>

                <div class="form-group row">
                  <label for="address1" class="col-sm-4 col-form-label">*Dirección</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="address1" name="address1" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="address2" class="col-sm-4 col-form-label">*Colonia</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="address2" name="address2" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="city" class="col-sm-4 col-form-label">*Ciudad</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="state" class="col-sm-4 col-form-label">*Estado:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="state" name="state" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="postalCode" class="col-sm-4 col-form-label">*Codigo postal</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-4 col-form-label">*Pais</label>
                  <div class="col-sm-8">
                    <select id="country" class="form-control" name="country" required>
                      <?php foreach ($countryListAllIsoData as $key => $value) {
                        $countryName = $value['name'];
                        echo '<option value="'.$countryName.'">'.$countryName.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-4 col-form-label">Institución de apoyo</label>
                  <div class="col-sm-8">
                    <select id="instituciones" class="form-control" name="instituciones" required>
                    '<option value="0">Ninguna</option>
                      <?php foreach ($instituciones as $key => $ints) {
                        $intsnombre = $ints['nombre'];
                        echo '<option value="'.$ints['id'].'">'.$intsnombre.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-4 col-form-label">Invitó</label>
                  <div class="col-sm-8">
                    <select id="invito" class="form-control" name="invito" required>
                    <option value="0"></option>
                      <?php foreach ($invita as $key => $ints) {
                        $intsnombre = $ints['nombre'];
                        echo '<option value="'.$ints['id'].'">'.$intsnombre.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row" style="display:none;" id="divinvitado">
                  <label for="postalCode" class="col-sm-4 col-form-label">Ingresar nombre y apellido</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Nominv" name="Nominv" placeholder="" required>
                  </div>
                </div>

                

                <div class="row" style="height: 50px;">
                  <div class="col text-right">
				  <button type="button" id="cerrarRegistro" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    <span class="btn btn-success btn-script-register">Guardar</span>

                  </div>
                </div>

              </div>

            </form>
          </div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

       <button type="button" class="btn btn-outline-secondary" id="Config" style="margin-top: -4px;"  
       data-data="<?php echo $value["f_customer_id"]?>" data-event="<?php echo $value["f_event"]?>"
                                    data-target="#Configuracion"data-toggle="modal" data-target="#Configuracion">CONFIGURACIÓN</button>

                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre" title="Type in a name">

              <?php if($usuarios): ?>
                <div class="table-responsive">
                  <table id="myTable" style="margin-top:0px !important;" class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Paleta</th>
                      <th>Nombre</th>
                      <th width="5"> </th>
                      <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($usuarios as $key => $value): ?>

                        <tr>
                        <td><?php echo $value['paddle_number']; ?></td>
						<td><?php echo $value['Nombre']; ?></td>
						<td><?php 
            $texto = array(" ", "(", ")", "-");
            $solonumeros = str_replace($texto, "", $value['f_telephone']);
            if($solonumeros==""){
              $solonumeros="6666666666";
            }
            if(strlen($solonumeros)<10){
              $solonumeros="6666666666";
            }
            $solonumeros = str_replace("+52", "", $solonumeros);
            $solonumeros = str_replace("-", "", $solonumeros);
            echo  $solonumeros?>
            </td>
                          <td>
                              <a type="button" class="btn btn-info" id="Pago" data-data="<?php echo $value["f_customer_id"]?>" data-event="<?php echo $value["f_event"]?>">Presencial</a>    
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
              <input type="text" style="display:none;" name="id" id="id" value="">
              <input type="text" style="display:none;" name="evento" id="evento" value="">
            </div>

        </div>

		<button type="button" class="btn btn-primary" id="AlertarPaleta" data-data="<?php echo $value["f_customer_id"]?>" data-event="<?php echo $value["f_event"]?>"
		data-target="#paletaAsignada"data-toggle="modal" data-target="#paletaAsignada" style="display:none;"></button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <h2 class="PaletaAsign" id="Paddle"></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
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
          <label for="firstName" class="col-sm-4 col-form-label">Número máximo de paletas en piso:</label>
          <div class="col-sm-8">
            <input type="text" stlye="margin-top:10px;"
             class="form-control" id="paletaspiso" name="paletaspiso" placeholder=""
            value="<?php echo $settings[0]['rangopaletas']?>"
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


<div class="modal fade" id="paletaAsignada" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <h2 class="PAsign" id="PAsign"></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
            <form id="formDetails">
              <div class="accountInfo">
              <br>
                <h4>Información personal</h4>

                <div class="form-group row">
                  <label for="firstName" class="col-sm-4 col-form-label">*Nombre(s)</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="lastName" class="col-sm-4 col-form-label">*Apellido(s)</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label">*Correo electrónico</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="phoneNumber" class="col-sm-4 col-form-label">*Número celular</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" maxlength = "10" placeholder="" required>
                  </div>
                </div>

              </div>

              <div class="accountInfo">
                <h4>Address Information</h4>

                <div class="form-group row">
                  <label for="address1" class="col-sm-4 col-form-label">*Dirección</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="address1" name="address1" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="address2" class="col-sm-4 col-form-label">*Colonia</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="address2" name="address2" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="city" class="col-sm-4 col-form-label">*Ciudad</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="state" class="col-sm-4 col-form-label">*Estado:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="state" name="state" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="postalCode" class="col-sm-4 col-form-label">*Codigo postal</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-4 col-form-label">*Pais</label>
                  <div class="col-sm-8">
                    <select id="country" class="form-control" name="country" required>
                      <?php foreach ($countryListAllIsoData as $key => $value) {
                        $countryName = $value['name'];
                        echo '<option value="'.$countryName.'">'.$countryName.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-4 col-form-label">Institución de apoyo</label>
                  <div class="col-sm-8">
                    <select id="instituciones" class="form-control" name="instituciones" required>
                    '<option value="0">Ninguna</option>
                      <?php foreach ($instituciones as $key => $ints) {
                        $intsnombre = $ints['nombre'];
                        echo '<option value="'.$ints['id'].'">'.$intsnombre.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-4 col-form-label">Invitó</label>
                  <div class="col-sm-8">
                    <select id="invito" class="form-control" name="invito" required>
                    <option value="0"></option>
                      <?php foreach ($invita as $key => $ints) {
                        $intsnombre = $ints['nombre'];
                        echo '<option value="'.$ints['id'].'">'.$intsnombre.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row" style="display:none;" id="divinvitado">
                  <label for="postalCode" class="col-sm-4 col-form-label">Ingresar nombre y apellido</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="Nominv" name="Nominv" placeholder="" required>
                  </div>
                </div>

                

                <div class="row" style="height: 50px;">
                  <div class="col text-right">
				  <button type="button" id="cerrarRegistro" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    <span class="btn btn-success btn-script-register">Guardar</span>

                  </div>
                </div>

              </div>

            </form>
          </div>
        </div>



      </div>
      </div>
    </div>
  </div>
</div>
	</body>

</html>
