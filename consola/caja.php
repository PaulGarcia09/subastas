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
    if($Orden == "P"){
      $sql ="SELECT DISTINCT c.f_customer_id, CONCAT(c.f_firstname,' ',c.f_lastname) as Nombre, l.f_event,c.paddle_number FROM t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user WHERe f_event={$evento} and l.f_status=3 and c.paddle_number <= 100 order by c.paddle_number asc";
    }else{
      $sql ="SELECT DISTINCT c.f_customer_id, CONCAT(c.f_firstname,' ',c.f_lastname) as Nombre, l.f_event,c.paddle_number FROM t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user WHERe f_event={$evento} and l.f_status=3 order by c.paddle_number asc";
    }
   
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
    <div>
    <?php if($Orden == "T") : ?>
      <a class="btn btn-primary" href="caja.php?Ord=P">Mostra solo piso</a>
    <?php else : ?>
      <a class="btn btn-primary" href="caja.php?Ord=T">Mostrar todo</a>
      <?php endif; ?>
    </div>
        <div class="card-body">
              
              <?php if($lots): ?>
                <div class="table-responsive">
                  <table class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Paleta</th>
                      <th width="100%">Nombre</th>
                      <th width="5%">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($lots as $key => $value): ?>
                        <tr>
                        <td><?php echo $value['paddle_number']; ?></td>
                          <td><?php echo $value['Nombre']; ?></td>
                          <td align="right" nowrap>
                           
                              <!--<a class="btn btn-success" href="imprimirpago.php?id=<?php echo $value["f_customer_id"]?>&evento=<?php echo $value['f_event']?>">Cobrar</a>!-->
                                     <button type="button" class="btn btn-info" id="Pago" data-data="<?php echo $value["f_customer_id"]?>"
                                     data-paddle="<?php echo $value["paddle_number"]?>"
                                     data-event="<?php echo $value["f_event"]?>"
                                     data-toggle="modal" data-target="#exampleModalCenter">Cobrar</button>
                             
                          </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              <?php else: ?>
                <div class="col">
                  <div class="text-center"><h2>No hay información</h2></div>
                </div>
              <?php endif; ?>
              <input type="text" style="display:none;" name="id" id="id" value="">
              <input type="text" style="display:none;" name="paddle" id="paddle" value="">
              <input type="text" style="display:none;" name="evento" id="evento" value="">
            </div>

        </div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle"></h5><br>
   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="form-group">
      <table id="myTable" style="margin-top:0px !important;" class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Lote</th>
                      <th>Titulo</th>
					            <th>Precio</th>
                      <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody id="Contenido">
              </tbody>
              </table>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Efectivo</label>
    <input type="text" class="form-control" id="efect" aria-describedby="emailHelp" placeholder="Ingresar cantidad en efectivo">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Voucher</label>
    <input type="text" class="form-control" id="vouch"  placeholder="Ingresar cantidad en voucher">
  </div>
  <h5 id="totalPago"></h5>
  <h5 class="restando" id="restan"></h5>
</form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary cobro">Imprimir</button>
      </div>
    </div>
  </div>
</div>


        
		<script type="text/javascript">
        var Totalparapagar=0;
        var items = [];
        var Restando = 0;
        var evento = '<?php echo $_SESSION['evento'] ?>';
        function eliminarLote(lote){
          var Totalpagar=0;
            for(var i = 0; i < items.length; i++){
              if(lote == items[i].f_lots_id){
                items.splice(i,1);
              }
            }

            var html = "";
                        for(var i = 0 ; i<items.length; i++){
                          html = html + "<tr>";
                          html = html + "<td>"+items[i].f_number+"</td>";
                          html = html + "<td>"+items[i].f_title+"</td>";
                          html = html + "<td>"+items[i].f_current_bid+"</td>";
                          html = html + "<td><button type='button' class='btn btn-danger' id='Delete' onclick='eliminarLote("+items[i].f_lots_id+")'> Eliminar </button></td>";
                          html = html + "</tr>";
                            Totalpagar = Totalpagar + parseFloat(items[i].f_current_bid);
                            Totalparapagar= parseFloat(Totalpagar);
                        }
                      $('#efect').val("");
                      $('#vouch').val("");
                        Restando = 0;
                      $('#Contenido').html(html);
                      $('#totalPago').html("Total a pagar: $ "+formatNumber(ponerdecimales(Totalpagar.toString())));
                      $('#restan').html("Restan a pagar: $ "+formatNumber(ponerdecimales(Totalpagar.toString())));

        }


        $( ".btn-info" ).click(function() {
            var data = $(this).data('data');
            var datapaleta = $(this).data('event');
            var paleta = $(this).data('paddle');
            $('#vouch').val("");
            $('#efect').val("");
            $('#id').val(data);
            $('#paddle').val(paleta);
            $('#evento').val(datapaleta);
            var Totalpagar=0;

            infodata={
                  evento : datapaleta,
                  id: data
                  };
                  $.ajax({    
                  data:  infodata,      
                  type: 'POST',                     
                  url: 'calcularcaja.php',           
                  success: function(result) {  
                        var resultado = JSON.parse(result);
                        items = resultado;
                        var html = "";
                        for(var i = 0 ; i<resultado.length; i++){
                          html = html + "<tr>";
                          html = html + "<td>"+resultado[i].f_number+"</td>";
                          html = html + "<td>"+resultado[i].f_title+"</td>";
                          html = html + "<td>"+resultado[i].f_current_bid+"</td>";
                          html = html + "<td><button type='button' class='btn btn-danger' id='Delete' onclick='eliminarLote("+resultado[i].f_lots_id+")'> Eliminar </button></td>";
                          html = html + "</tr>";
                            Totalpagar = Totalpagar + parseFloat(resultado[i].f_current_bid);
                            Totalparapagar= parseFloat(Totalpagar);
                        }
                        Restando = 0;
                        $('#Contenido').html(html);
                        $('#totalPago').html("Total a pagar: $ "+formatNumber(ponerdecimales(Totalpagar.toString())));
                        $('#restan').html("Restan a pagar: $ "+formatNumber(ponerdecimales(Totalpagar.toString())));
                  }
                  });

        });

        $( ".cobro" ).click(function() {
            var id = $('#id').val();
            var evento=$('#evento').val();
            var efectivo = $('#efect').val();
            var voucher=$('#vouch').val();
            var paleta=$('#paddle').val();
            if(voucher==""){
              voucher = 0;
            }

            if(efectivo==""){
              efectivo = 0;
            }

            var totalcantidades = parseFloat(efectivo)+parseFloat(voucher);

            if(Totalparapagar==totalcantidades){
              var lotes ="";
              for(var i = 0; i < items.length; i++){
                lotes = lotes + items[i].f_lots_id + ",";
              }
              lotes = lotes.substring(0, lotes.length - 1);

              infodata={
                  evento : evento,
                  lots : lotes,
                  usuario: id,
                  paleta : paleta,
                  imp : Totalparapagar,
                  vou : voucher,
                  ef : efectivo
                  };
                  $.ajax({    
                  data:  infodata,      
                  type: 'POST',                     
                  url: 'ventadetalle.php',           
                  success: function(result) {  
                        var resultado = JSON.parse(result);
                        var url="imprimirpago.php?folioventa=";
                        url = url+resultado.folioventa;
                        window.location.href =url;
                      }
                  });

            }else{
                alert("La cantidad ingresada debe se igual al total a pagar");
            }


        });

        $( "#efect" ).keyup(function() {
            var ingresado = $(this).val();
            if(ingresado == ""){
                ingresado = 0;
            }
            var voucher = $('#vouch').val();
            if(voucher==""){
                voucher = 0;
            }
            calculo = parseFloat(voucher)+parseFloat(ingresado);
            calculo = Totalparapagar - parseFloat(calculo);

            if(parseFloat(calculo)>=0){
                $('#restan').html("Restan a pagar: $ "+formatNumber(ponerdecimales(calculo.toString())));
            }else{
                $(this).val("");
                calculo = parseFloat(voucher)+parseFloat(0);
                calculo = Totalparapagar - parseFloat(calculo);
                $('#restan').html("Restan a pagar: $ "+formatNumber(ponerdecimales(calculo.toString())));
                alert("La cantidad ingresada no puede ser mayor al total del pago");
            }
        });
        $( "#vouch" ).keyup(function() {
            var ingresado = $(this).val();
            if(ingresado == ""){
                ingresado = 0;
            }
            var efectivo = $('#efect').val();
            if(efectivo==""){
                efectivo = 0;
            }
            calculo = parseFloat(efectivo)+parseFloat(ingresado);
            calculo = Totalparapagar - parseFloat(calculo);

            if(parseFloat(calculo)>=0){
                $('#restan').html("Restan a pagar: $ "+formatNumber(ponerdecimales(calculo.toString())));
            }else{
                $(this).val("");
                calculo = parseFloat(efectivo)+parseFloat(0);
                calculo = Totalparapagar - parseFloat(calculo);
                $('#restan').html("Restan a pagar: $ "+formatNumber(ponerdecimales(calculo.toString())));
                alert("La cantidad ingresada no puede ser mayor al total del pago");
            }
  
        });

        function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function ponerdecimales(numero)
  {
  if(numero.indexOf(".")==-1)  { numero += ".00" } else {
     if(numero.indexOf(".") == numero.length - 2) { numero += "0" }
  }
return numero;
} 
		</script>

	</body>

</html>

