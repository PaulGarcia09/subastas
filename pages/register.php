<style type="text/css">
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}
/* Position the "next button" to the right */
.next {
  right: 15px;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
.prev:hover{
  color: white !important;
}
.popupimg{
    width: 400px !important;
    height: 400px !important;
}
.jconfirm-box .jconfirm-hilight-shake .jconfirm-type-default .jconfirm-type-animated{
    width:540px !important;
}
.jconfirm-box{
    width:540px !important;
}
.jconfirm-box .jconfirm-hilight-shake .jconfirm-type-default .jconfirm-type-animated{
    width:540px !important;
}
.jconfirm-box{
    width:540px !important;
}
@media screen and (max-device-width : 480px) {
    .jconfirm-box .jconfirm-hilight-shake .jconfirm-type-default .jconfirm-type-animated{
    width:300px !important;
}
.jconfirm-box{
    width:300px !important;
}
}
</style>
  
  
  <script>
            function valideKey(evt) {
                var code = evt.which ? evt.which : evt.keyCode;
                if (code == 8) {
                    //backspace
                    return true;
                } else if (code >= 48 && code <= 57) {
                    return true;
                } else {
                    return false;
                }
            }

  </script>
  <main id="main" style="margin-top: 20px !important;">
        <!-- ======= Team Section ======= -->
      <div class="container">
      <div class="section-title py-1 px-lg-1">
        <h1 style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;" data-aos="fade-up"><?php echo $title  ?></h1>
        </div>
        <div class="row" id="cerrado" style="display:none;margin-bottom: 20px;overflow: hidden;border-radius: 5px;background: #fff;box-shadow: 0px 1px 6px rgb(230 231 231);">
        </div>
        <div class="row" id="Todo" style="display:none;margin-bottom: 20px;overflow: hidden;border-radius: 5px;background: #fff;box-shadow: 0px 1px 6px rgb(230 231 231);">
          <div class="col-9 align-self-center">
          <span>Restan <strong><span id="countdown">00:00:00 </span></strong>para cerrar el proceso de registro</spam>
            <form id="formDetails">
              <div class="accountInfo">
              <br>
                <h4>Información de la cuenta</h4>
                <div class="form-group row">
                  <label for="userName" class="col-sm-4 col-form-label">*Nombre de usuario</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="" maxlength="16" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">*Contraseña</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="confirmPassword" class="col-sm-4 col-form-label">*Confirmar Contraseña</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="confirmPassword" class="col-sm-4 col-form-label">Número de paleta</label>
                  <div class="col-sm-8">
                   
                  <input type="text" class="form-control" id="paddleNumber" maxlength = "4" name="paddleNumber" placeholder=""  onkeypress="return valideKey(event);" onkeyup="validarEntero(this)" required>

                    <i style="font-size: 11px;">Elija los 4 números de 0-9.</i>
                  </div>
                </div>
              </div>

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
                    <option value="Default"></option>
                    <option value="0">Agregar..</option>
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
                    <span class="btn btn-success btn-script-register">Guardar</span>
                  </div>
                </div>

              </div>

            </form>
          </div>
        </div>



      </div>




  </main><!-- End #main -->
<script src="https://www.google.com/recaptcha/api.js?render=6Lf0F8kZAAAAABSEPxSgUQo2DiK6dhv-3AtpctOQ"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript">
var Cerrar;
setInterval('contador()',1000);

function contador(){
  Cerrar = Cerrar ? Cerrar : '';
  if(Cerrar !== ''){
    document.getElementById("cerrado").innerHTML = Cerrar;
  }
}

    $.ajax({          
                type: 'GET',                          
                url: '<?php echo BASE_URL ?>api/ValidarFechas.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result);
                    if(datahere !== null){
                      var now  = toJSDate(datahere.fechaactual)
                      var then = toJSDate(datahere.fechaevento)

                      var ms = moment(then,"DD/MM/YYYY HH:mm:ss").diff(moment(now,"DD/MM/YYYY HH:mm:ss"));
                      var d = moment.duration(ms);
                      var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");
                      var dias = Math.floor(d.asDays());
                      var hora = Math.floor(d['_data'].hours);
                      var minutos = Math.floor(d['_data'].minutes);
                      var segundos = Math.floor(d['_data'].seconds)
                      var Timpo = s.toString();
                      if(Timpo > '00-00-00'){
                      (function(){
                          $(document).ready(function() {
                            var time = Timpo,
                              parts = time.split(':'),
                              hours = +parts[0],
                              days = hours/24;
                              minutes = +parts[1],
                              seconds = +parts[2],
                              span = $('#countdown');
                            
                            function correctNum(num) {
                              return (num<10)? ("0"+num):num;
                            }
                          
                            var timer = setInterval(function(){
                              document.getElementById("Todo").style.display="block"
                              segundos--;
                                if(segundos == -1) {
                                  segundos = 59;
                                  minutos--;
                                  
                                    if(minutos == -1) {
                                      minutos = 59;
                                      hora--;
                                      
                                        if(hora==-1) {
                                           dias --;
                                           if(dias== -1){
                                              document.getElementById("Todo").style.display="none"
                                              document.getElementById("cerrado").innerHTML="<span style='text-align: center;margin: 0 auto;'>Estimado usuario, le informamos que el registro para esta subasta ya concluyó.<br>"+
                                              "Le invitamos a registrarse con anticipación en el siguiente evento disponible.<br>"+
                                              "Love to help y maxilana le dan las gracias y esperamos  en fecha próxima contar con su participación.<br>"+
                                              "Atte.<br><a href='index.php'>subastas.maxilana.com</a><span>";
                                              Cerrar="<span style='text-align: center;margin: 0 auto;'>Estimado usuario, le informamos que el registro para esta subasta ya concluyó.<br>"+
                                              "Le invitamos a registrarse con anticipación en el siguiente evento disponible.<br>"+
                                              "Love to help y maxilana le dan las gracias y esperamos  en fecha próxima contar con su participación.<br>"+
                                              "Atte.<br><a href='index.php'>subastas.maxilana.com</a><span>";
                                              document.getElementById("cerrado").style.display="block";
                                           }
                                        }
                                    }
                                }
                                span.text(" "+correctNum(dias)+" días "+correctNum(hora) + " horas " + correctNum(minutos) + " minutos " + correctNum(segundos)+" segundos ");
                            }, 1000);
                          }); 
                        })()
                    }else{
                          document.getElementById("Todo").style.display="none"
                          document.getElementById("cerrado").innerHTML="<span style='text-align: center;margin: 0 auto;'>Estimado usuario, le informamos que el registro para esta subasta ya concluyó.<br>"+
                          "Le invitamos a registrarse con anticipación en el siguiente evento disponible.<br>"+
                          "Love to help y maxilana le dan las gracias y esperamos  en fecha próxima contar con su participación.<br>"+
                          "Atte.<br><a href='index.php'>subastas.maxilana.com</a><span>";
                          Cerrar="<span style='text-align: center;margin: 0 auto;'>Estimado usuario, le informamos que el registro para esta subasta ya concluyó.<br>"+
                          "Le invitamos a registrarse con anticipación en el siguiente evento disponible.<br>"+
                          "Love to help y maxilana le dan las gracias y esperamos  en fecha próxima contar con su participación.<br>"+
                          "Atte.<br><a href='index.php'>subastas.maxilana.com</a><span>"
                          document.getElementById("cerrado").style.display="block";
                    }
        }else{
          document.getElementById("Todo").style.display="block";
          document.getElementById("cerrado").style.display="none";
        }
    }    
  });

    $(document).ready(function(){ 

        baseUrl = '<?php echo BASE_URL ?>';
        $(".btn-script-register").on('click',function(){
          grecaptcha.ready(function() {
          grecaptcha.execute('6Lf0F8kZAAAAABSEPxSgUQo2DiK6dhv-3AtpctOQ').then(function(token) {
            $.ajax({          
                type: 'POST',
                data: $("#formDetails").serialize(),                          
                url: '<?php echo BASE_URL ?>api/register.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result); 
                    console.log("here");
                    if(datahere.status=="200"){                           
                        confirmOkOnly("green",'Se le ha enviado un correo electrónico con el nombre de usuario y la contraseña que ingresó, en caso de que lo olvide. Para activar su cuenta, debe hacer clic en el enlace de confirmación incluido en el correo electrónico.',"Registro exitoso",baseUrl+"gracias.php")
                    }else{
                        showMsg("inválida",datahere.message,'red');  
                    }
                    // showUI(0);
                }    
              });
          });

          });
      });

        $("#invito").on('change',function(){
           var val =  ( $(this).find(":checked").val() );
            if(val == '0'){
              document.getElementById('divinvitado').style.display='flex';
            }else{
              document.getElementById('divinvitado').style.display='none';
            }
      });


    });
    $("#phoneNumber").bind('keypress', function(event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
    event.preventDefault();
    return false;
    }
    });
  function validarEntero(e){
      var valor = e.value;
      if(valor !== '')
      e.value=parseInt(valor);
    }

      function toJSDate (dateTime) {

      var dateTime = dateTime.split(" ");//dateTime[0] = date, dateTime[1] = time

      var date = dateTime[0].split("-");
      var time = dateTime[1].split(":");

      //(year, month, day, hours, minutes, seconds, milliseconds)
      return new Date(date[0], date[1], date[2], time[0], time[1], time[2], 0);

      }

     function FormatNumberLength(num, length) {
      var r = "" + num;
      while (r.length < length) {
      r = "0" + r;
      }
      return r;
      }

      function showPopIt(data)
    {
        baseUrl = '<?php echo BASE_URL ?>';

        $.confirm({
            title: 'INICIAR SESIÓN',
            columnClass: 'medium',
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName">
                                <div class='row'>
                                    <div class="col">   
                                        <div class="form-group">
                                            <label>Nombre de usuario o correo electrónico</label>
                                            <input type="text" name="username" required value="" placeholder="" class="f form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="password" required value="" placeholder="" class="f form-control"  />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`,
                buttons: {

                f_pw: {
                    text: 'SE TE OLVIDÓ TU CONTRASEÑA <br>',
                    btnClass: 'btn-danger',
                    action: function(){
                        $.confirm({
                            title: 'SE TE OLVIDÓ TU CONTRASEÑA <br>',
                            columnClass: 'small',
                            content: `
                                <div class='container-fluid'>
                                    <div class='row'>
                                        <div class="col-12">
                                            <form id='formPassword' class="formName">
                                                <div class='row'>
                                                    <div class="col">                                                          
                                                        <div class="form-group">
                                                            <label>Introduce tu correo electrónico<br></label>
                                                            <input type="text" name="forgot_email" required value="" placeholder="" class="f form-control"  />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>`,
                                buttons: {
                                    cancelar: function () {
                                        //close
                                    },
                                    formSubmit:{
                                        text: 'CONSIGUELO AHORA<br>',
                                        btnClass: 'btn-primary',
                                        action: function (){
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
                                        showUI(1);
                                        
                                        $.ajax({          
                                            type: 'POST',
                                            data: $("#formPassword").serialize(),                          
                                            url: '<?php echo BASE_URL ?>api/get_password.php',           
                                            success: function(result) {  
                                                datahere =  jQuery.parseJSON(result); 
                                                if(datahere.status=="200"){          
                                                    //showMsg("success",datahere.message,'green'); 
                                                    confirmOkOnly("green",datahere.message,"Éxito ",geturl);                                                    
                                                }else{
                                                   
                                                    showMsg("Inválida",datahere.message,'red'); 
                                                }
                                                showUI(0);
                                            }    
                                        });
                                        return false;

                                        }
                                    }
                                }
                        })
                    }
                },
                cancelar: function () {
                    //close
                }, 
                
                formSubmit: {
                    text: 'INICIAR SESIÓN<br>',
                    btnClass: 'btn-primary',
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
                        showUI(1);

                        $.ajax({          
                            type: 'POST',
                            data: $("#formDetails").serialize(),                          
                            url: '<?php echo BASE_URL ?>api/login.php',           
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status=="200"){            
                                    if(data){
                                      location.reload();
                                    }else{
                                     //  confirmOkOnly("green",'Log-in successful!'," ",baseUrl)
									window.location.replace(baseUrl+'myAccount.php?#team');
                                    }
                                }else{
                                    showMsg("Inválida",datahere.message,'red'); 
                                }
                                showUI(0);
                            }    
                        });
                        return false;
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

    $(document).ready(function(){

$(".btn-script-login").on('click',function(){
    var data = $(this).data('data');
    showPopIt(data); 
});
});

</script>




