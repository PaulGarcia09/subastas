<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $title; ?></h1>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form action="correolotesganados.php" method='GET'>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Enviar correo a clientes con lotes ganados</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fb" class="font-weight-bold">Seleccionar Envento</label>
                        <div>
                        <?php if($eventos): ?>
                            <select name="date" id="eventos"  onchange="this.form.submit()">
                            <?php foreach ($eventos as $valuedata) {?>
                                <option value='<?php echo $valuedata['f_start_date']?>'
                                <?php
                                    if($start==$valuedata['f_start_date'])
                                    {
                                    echo "selected";
                                    }     
                                ?>><?php echo $valuedata['f_title']?>
                                </option>
                            <?php } ?>
                            </select> 
                        <?php else : ?>
                        <h2>No hay eventos para mostrar<h2>
                        <?php endif ; ?>
                        </div>
                      </div>
                    </div>
                    <?php if($result): ?>
                    <div class="col-md-12">
                        <div class="form-group">
                        <table class="dataTables table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Número de lote</th>
                        <th>Nombre artículo</th>
                        <th style="width: 15%;">Precio</th>
                        <th>idCliente</th>
                        <th>Nombre Cliente</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        </tr>
                    </thead>
                    </tbody>
                    <?php foreach ($result as $columnas) {?>
                    <tr>
                    <th><?php echo $columnas['f_lots_id'] ?></th>
                    <th><?php echo $columnas['f_number'] ?></th>
                    <th><?php echo $columnas['f_title'] ?></th>
                    <th><?php setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $columnas['f_current_bid']) ?></th>
                    <th><?php echo $columnas['f_customer_id'] ?></th>
                    <th><?php echo $columnas['f_firstname']. ' '.$columnas['f_lastname']  ?></th>
                    <th><?php echo $columnas['f_email']?></th>
                    <th id="status">
                    <img src="https://subastas.maxilana.com/admin/pages/noimg.png" id="<?php echo $columnas['f_lots_id']?>" style="width:50%;" atl="OK"></img></th>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                        </div>
                    </div>
                    <?php endif ; ?>
                  </div>
                </div>
                <!-- /.card-body -->
                </form>
                <div class="card-footer">
                  <a class="btn" onclick="EntrarEnvio()">Enviar correos</a>
                </div>
            </div>
          </div>
  
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </main>
  <script type="text/javascript">
    var eventos = <?php echo json_encode($eventos) ?>;
    var resultados = <?php echo json_encode($result) ?>;
    baseUrl = '<?php echo BASE_URL ?>';
    function EnviarCorreos(){
        resultados = resultados ? resultados : '';

        if(resultados !== ''){
            if(resultados.length >0){
                var total = parseFloat(resultados[0].f_current_bid);
                total = ponerdecimales(total.toString());
                total = formatNumber(total);
                infodata={
                    idlote: resultados[0].f_number,
                    title: resultados[0].f_title,
                    cliente: resultados[0].f_firstname+ ' ' + resultados[0].f_lastname,
                    email: 'erickogarcia12@gmail.com',
                    precio: total,
                };
                document.getElementById(resultados[0].f_lots_id.toString()).src="https://subastas.maxilana.com/admin/pages/okcorreo.png";
                resultados.shift();
                sendemail(infodata);
            }else{
              alert('Se enviaron los correos exitosamente');
              location.reload();
            }
        }
    }
    function EntrarEnvio()
    {
        setInterval('EnviarCorreos()',3000);
    }
    function sendemail(infodata){
                $.ajax({    
                        data:  infodata,      
                        type: 'POST',                     
                        url: baseUrl+'/api/sendemaillotsold.php',           
                        success: function(result) {  
                        }
                });
    }
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
    function removeItemFromArr(arr, value) { return arr.filter(function(ele){ return ele != value; });}
  </script>