<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">   
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
  $(document).ready(function(){

      $(function () {
        $('#exTable').DataTable();
      });
      function showMsg(title,contentMsg,type){
          $.alert({
            title:title,
            type:type,
            content:contentMsg
          });
      }
      function showUI(elem){
          if(elem==1){
             $.blockUI({ message: '<img src="<?php echo ASSETS_URL ;?>img/spin.gif" />' ,
              baseZ: 2000,
              css: { width: '4%', border:'0px solid #FFFFFF',cursor:'wait',backgroundColor:'none'},
              overlayCSS:  { backgroundColor: '#fffcfc',opacity:0.9,cursor:'wait'} 
              }); 
          }else{
              $.unblockUI();
          }
      }
  });
</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $title; ?></h1>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <a class="btn" onclick="DesCustomer()" style="border: 2px solid;">Inhabilitar clientes</a>
        <a class="btn" onclick="EntrarEnvio()" style="border: 2px solid;">Enviar correos</a>
          <form action="confirmacionclientes.php" method='GET'>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Enviar correo a clientes para confirmación de asistencia</h3>
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
                            <select name="event" id="eventos"  onchange="this.form.submit()">
                            <option value="">Seleccionar Evento</option>
                            <?php foreach ($eventos as $valuedata) {?>
                                <option value='<?php echo $valuedata['f_number']?>'
                                <?php
                                    if($start==$valuedata['f_number'])
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
                    <div class="card-body table-responsive">
              
              <?php if($resultArray && $start): ?>
                <table id="exTable" class="dataTables table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Paleta</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Celular</th>
                    <th>Estatus</th>
                   <th width="5%"></th>
                   <th>Identificación</th>
                   <th>Send Email</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach ($resultArray as $key => $value): 
                      if($value['f_type'] != "admin"):
                    ?>

                      <tr>
                        <td><?php echo $value['f_customer_id']; ?></td>
                        <td><?php echo $value['paddle_number']; ?></td>
                        <td><?php echo $value['f_firstname']." ".$value['f_lastname']; ?></td>
                        <td><?php echo $value['f_email']; ?></td>
                        <td><?php echo $value['f_telephone']; ?></td>
                        <td><span class="badge badge-<?php echo ($value['f_status'] == 1) ? "success":"warning" ?>"><?php echo ($value['f_status'] == 1) ? "Active":"Inactive" ?></span></td>
                        <td align="right" nowrap>
                         
                        <a style="color:white;" class="btn btn-<?php echo ($value['f_status'] == 1) ? "warning":"success" ?> btn-xs btn-script-changeStat" data-id="<?php echo $value["f_customer_id"] ?>" data-status='<?php echo $value["f_status"] ?>'><?php echo ($value['f_status'] == 1) ? "Deactivate":"Activate" ?></a>
                        <a style="color:white;" class="btn btn-primary btn-xs btn-script-edit" data-data='<?php echo json_encode($value) ?>'>Edit</a>
                           
                        </td>
                        <td>    
                        <button type="button" class="btn btn-<?php echo ($value['extencion'] == '') ? "warning":"success" ?>" 
                        data-toggle="modal" onclick="EditImg(this);" data-target="#modalImages" data-type="editar" data-data='<?php echo json_encode($value) ?>'><?php echo ($value['extencion']=='') ?"Cargar":"Editar"?></button></td>
                        <th id="status">
                    <img src="https://subastas.maxilana.com/admin/pages/noimg.png" id="<?php echo $value['f_customer_id']?>" style="width: 26px;height: 26px;" atl="OK"></img></th>
                      </tr>
                    <?php 
                      endif;
                    endforeach; 
                    ?>
                  </tbody>
                </table>
              <?php else: ?>
                <div class="col">
                  <div class="text-center"><h2>No Data Available</h2></div>
                </div>
              <?php endif; ?>

            </div>
                <!-- /.card-body -->
                </form>
            </div>
          </div>
  
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </main>


  <div class="modal fullscreen-modal fade" tabindex="-1" role="dialog" id="modalImages"  aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form id='formImages' class="formName" enctype="multipart/form-data" method="POST" action="<?php echo BASE_URL.'api/admin/cargaridentificaciones.php' ?>">
  <div class='row'>
                      <div class="col">
                                        <div class="form-group row">
                                        <label class="col-md-3">Frontal</label>
                                        <div class="col-md-9" id="imagenSource">
                                          <input type="text" class="f form-control"  id="idcustomer" hidden  name="idcustomer">
                                          <input type="text" class="f form-control"  id="evento" hidden value="<?php echo ($start) ?>" name="evento">
                                          
                                          <input type="text" class="f form-control"  id="customer"  name="customer">
                                          <input type="file" class="f form-control" accept="image/*" id="primary_image" value="" name="primary_image" multiple>
                                        
                                        </div>
                                      </div>
                                      <div class="row">
                                      <div class="col text-right">
                                        <button type="submit" class="btn btn-success mt-3">Save</button>
                                        </div>
                                      </div>
                      </div>
                </div>
        </form>
        </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
  function OError(x){
    x.src="https://subastas.maxilana.com/rimage/no_image.jpg"
  }
  function EditImg(e){
    var datos = jQuery.parseJSON(e.dataset.data);
    var Nombre = datos.f_firstname.toUpperCase()+" "+datos.f_lastname.toUpperCase();
    var id = datos.f_customer_id;
    $("#customer").val(Nombre);
    $("#idcustomer").val(id);
    $('#borrar').remove();
    $("#imagenSource").append('<div id="borrar"><img id="imgprincipal" onerror="OError(this)" class="imgprincipal" style="width: 290px;" src="<?php echo HOME_URL ?>api/admin/verimagen.php?id='+id+'"></img></div>');
  }
$(".btn-script-changeStat").on('click',function(){

id = $(this).data('id');
status = $(this).data('status');
$.ajax({          
    type: 'POST',
    data: {id:id, status:status},
    url: baseUrl+'api/admin/userChangeStatConfirm.php',           
    success: function(result) {  
        datahere =  jQuery.parseJSON(result);  
        if(datahere.status=="200"){ 
          location.reload();                       
        }else{
          showMsg('Failed',"Invalid",'red');  
        }
    }    
});
});
$(".btn-script-edit").on('click',function(){
            var data = $(this).data('data');     
            showPopIt(data,"edit"); 
});
    var evento= <?php echo ($start) ?>;
    var resultados= <?php echo json_encode($respuestaEnviar)?>;
    var Datos=[];
    for (var i = 0; i < resultados.length ;i++){
      if(resultados[i].f_status=='3'){
        Datos=Datos.concat(resultados[i]);
      }
    }
    baseUrl = '<?php echo BASE_URL ?>';
    function EnviarCorreo(){
      Datos = Datos ? Datos : '';

        if(Datos !== ''){
            if(Datos.length >0){
                infodata={
                    idcte: Datos[0].f_customer_id,
                    cliente: decode_utf8(Datos[0].f_firstname)+ ' ' + decode_utf8(Datos[0].f_lastname),
                    email: Datos[0].f_email,
                    evento: evento
                };
               var IdeIMG="#"+Datos[0].f_customer_id.toString();
                $(IdeIMG).attr("src", "https://subastas.maxilana.com/admin/pages/okcorreo.png");
                Datos.shift();
                sendemail(infodata);
            }else{
              alert('Se enviaron los correos exitosamente');
              location.reload();
            }
        }
    }
    function DesCustomer(){
        infodata={
            event:evento
        }
        $.ajax({    
                        data:  infodata,      
                        type: 'POST',                     
                        url: baseUrl+'api/inhabilitarCtes.php',           
                        success: function(result) {  
                          if(result !== ""){
                            location.reload();
                          }
                        }
        });
    }
    function EntrarEnvio()
    {
        setInterval('EnviarCorreo()',3000);
    }
    function sendemail(infodata){
                $.ajax({    
                        data:  infodata,      
                        type: 'POST',                     
                        url: baseUrl+'api/sendemaillconfirm.php',           
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
    function encode_utf8(s) {
  return unescape(encodeURIComponent(s));
}

function decode_utf8(s) {
  return decodeURIComponent(escape(s));
}
function showPopIt(data, actionx )
    {
        baseUrl = '<?php echo BASE_URL ?>';

        f_customer_id = '';
        f_username = '';
        f_password = '';
        f_real = '';
        f_email = '';
        f_firstname = '';
        f_lastname = '';
        f_telephone = '';
        f_fax = '';
        f_address_1 = '';
        f_address_2 = '';
        f_city = '';
        f_postcode = '';
        f_country = '';
        f_state = '';
        f_contact_name = '';
        f_contact_number = '';
        paddle_number='';
        required = 'required';

        if(data !=''){
          f_customer_id = data.f_customer_id;
          f_username = data.f_username;
          f_password = data.f_password;
          f_real = data.f_real;
          f_email = data.f_email;
          f_firstname = data.f_firstname;
          f_lastname = data.f_lastname;
          f_telephone = data.f_telephone;
          f_fax = data.f_fax;
          f_address_1 = data.f_address_1;
          f_address_2 = data.f_address_2;
          f_city = data.f_city;
          f_postcode = data.f_postcode;
          f_country = data.f_country;
          f_state = data.f_state;
          f_contact_name = data.f_contact_name;
          f_contact_number = data.f_contact_number;
          paddle_number = data.paddle_number;
          required = '';

        }
        $.confirm({
            title: '<?php echo $title ?>',
            columnClass: 'medium',
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName" enctype='multipart/form-data'>
                                <div class='row'>
                                    <div class="col">   
                                        <h3>Account Details</h3>

                                        <div class="form-group row">
                                            <input type="hidden" name="f_customer_id" value="`+f_customer_id+`"/>
                                            <label class="col-md-3">User name</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_username" `+required+` value="`+f_username+`" placeholder="User Name" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Password</label>
                                            <div class="col-md-9">
                                              <input type="password" name="f_password" `+required+` value="" placeholder="Password" class="f form-control"  />
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Paddle Number</label>
                                            <div class="col-md-9">
                                              <input type="text" name="paddleNumber" value="`+paddle_number+`" placeholder="Paddle Number" maxlength = "4" class="f form-control" onkeypress='return valideKey(event);' onkeyup='validarEntero(this)'/>
                                              <i style="font-size: 11px;">Choose any 4 numbers from 0-9.</i>
                                            </div>
                                        </div>
                                        <h3>Personal Details</h3>
                                        <div class="form-group row">
                                            <label class="col-md-3">First Name</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_firstname" required value="`+f_firstname+`" placeholder="First Name" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Last Name</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_lastname" required value="`+f_lastname+`" placeholder="Last Name" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Email</label>
                                            <div class="col-md-9">
                                              <input type="email" name="f_email" required value="`+f_email+`" placeholder="Email" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Telephone</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_telephone" value="`+f_telephone+`" placeholder="Telephone" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Fax</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_fax" value="`+f_fax+`" placeholder="Fax" class="f form-control"  />
                                            </div>
                                        </div>
                                        <h3>Address</h3>
                                        <div class="form-group row">
                                            <label class="col-md-3">Address1</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_address_1" required value="`+f_address_1+`" placeholder="Address1" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Address2</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_address_2"  value="`+f_address_2+`" placeholder="Address2" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">City</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_city" required value="`+f_city+`" placeholder="City" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Postal Code</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_postcode" required value="`+f_postcode+`" placeholder="Postal Code" class="f form-control"  />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">Country</label>
                                            <div class="col-md-9">
                                            <select id="country" class="form-control" name="country" required>
											<option value="`+f_country+`">`+f_country+`</option> 
                                              <?php foreach ($countryListAllIsoData as $key => $value) {
												  
                                                $countryName = $value['name'];?>
												 
                                                <option value="<?php echo $countryName;  ?>"><?php echo $countryName;  ?></option>';
                                             
											 <?php  } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">State/Province</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_state" required value="`+f_state+`" placeholder="State/Province" class="f form-control"  />
                                            </div>
                                        </div>
                                        <h3>Identificaciones</h3>
                                        <div class="form-group row">
                                            <label class="col-md-3">Frontal</label>
                                            <div class="col-md-9">
                                            <input type="file" class="f form-control" accept="image/*" id="primary_image" value="" name="primary_image" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`,
                buttons: {
                cancel: function () {
                    //close
                },    

                formSubmit: {
                    text: 'Save',
                    btnClass: 'btn-success',
                    action: function () {            

                        // check if input is required
                        var validForm = false;
                        this.$content.find('form :required').each(function(){
                            if( !$(this).val()  ) {
                              $(this).addClass('is-invalid');
                              $(this).removeClass('is-valid');

                              validForm = true;
                            }else{
                              $(this).removeClass('is-invalid');
                              $(this).addClass('is-valid');
                            }
                        })
                        if(validForm){
                           return false;
                        }
						//alert(actionx);
                        //showUI(1);
                        if(actionx == "add"){
                          urlAction = baseUrl+'api/admin/userAdd.php';
                        }else{
                          urlAction = baseUrl+'api/admin/userEdit.php';
                        }
                        var x =$('#formDetails').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
                        $.ajax({          
                            type: 'POST',
                            data: $("#formDetails").serialize(),                          
                            url: urlAction,           
                            success: function(result) { 
							              
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status=="200"){            
                                   location.reload(); 
                                }else{
                                    //showMsg("Invalid",datahere.message,'red'); 
                                    //alert(datahere.message);
                                     
                                     console.log(data);
                                    if(actionx == "add"){
                                        showPopIt("","add");
                                        $.alert({
                                          title:"Invalid",
                                          type:"red",
                                          content:datahere.message
                                        });
                                    }else{
                                        showPopIt(data,"edit");
                                        $.alert({
                                          title:"Invalid",
                                          type:"red",
                                          content:datahere.message
                                        });
                                    }                                     
                                    //
                                    //showPopIt('',"add"); 
                                }
                                //showUI(0);
                            }    
                        });

                          //return false;
                    }
                },
               
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.           
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it

                });    
      
            }
        });
    }


	
  </script>