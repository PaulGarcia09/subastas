
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
  <main id="main" style="margin-top:20px !important;">
      <div class="container">

        <div class="section-title py-1 px-lg-1">
          <h2 style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;" data-aos="fade-up">Términos y Condicioness</h2>
        </div>
        <div class="row" style="margin-bottom: 20px;overflow: hidden;border-radius: 5px;background: #fff;box-shadow: 0px 1px 6px rgb(230 231 231);padding:5px;">
          <div class="col">
            <?php echo $pages['terms_conditions'] ?>
          </div>
        </div>



      </div>




  </main><!-- End #main -->

 <script type="text/javascript">
    $(document).ready(function(){

        $(".btn-script-login").on('click',function(){
            var data = $(this).data('data');
            showPopIt(data); 
        });

        $(".btn-script-bid").on('click',function(){
            var data = $(this).data('data');
            showBid(data,"bid"); 
        });
        $(".btn-script-view").on('click',function(){
            var data = $(this).data('data');
            showBid(data,"view"); 
        });


    });

    var geturl = '<?php echo substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) ?>';
    function showPopIt(data)
    {
        baseUrl = '<?php echo BASE_URL ?>';

        $.confirm({
            title: 'INICIAR SESIÓN (Login)',
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
                                            <label>Contraseña (Password)</label>
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
                    text: 'SE TE OLVIDÓ TU CONTRASEÑA <br>(FORGOT PASSWORD)',
                    btnClass: 'btn-danger',
                    action: function(){
                        $.confirm({
                            title: 'SE TE OLVIDÓ TU CONTRASEÑA <br>(FORGOT PASSWORD)',
                            columnClass: 'small',
                            content: `
                                <div class='container-fluid'>
                                    <div class='row'>
                                        <div class="col-12">
                                            <form id='formPassword' class="formName">
                                                <div class='row'>
                                                    <div class="col">                                                          
                                                        <div class="form-group">
                                                            <label>Introduce tu correo electrónico<br>(Enter Your Email)</label>
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
                                        text: 'CONSIGUELO AHORA<br>(GET IT NOW)',
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
                    text: 'INICIAR SESIÓN<br>(LOGIN)',
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

    function showBid(data,type)
    {
        if(data.f_current_bid != ''){
            askbid = (data.f_current_bid+data.f_bid_increment);
        }else{
            askbid = data.f_minimum_bid;
        }
        baseUrl = '<?php echo BASE_URL ?>';
        console.log(data);
        dNone = "";
        title = "OFERTA (BID)";
        sizeClass = "medium";
        infoText = "de lote";
        f_current_bid = "";
        f_bid_user_name = "";
        if(typeof(data.f_bid_user_name) != "undefined" && data.f_bid_user_name !== null) {
            f_bid_user_name = data.f_bid_user_name;
        }
        if(typeof(data.f_current_bid) != "undefined" && data.f_current_bid !== null) {
            f_current_bid = data.f_current_bid;
        }

        if(type == "view") {
          title = "Details";
            sizeClass = "small";
          dNone = "d-none";
          infoText = "Events";
        }
        $.confirm({
            title: title,
            columnClass: sizeClass,
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='bidDetails' class="formName">
                                <div class='row'>
                                    <div class="col d-flex align-items-stretch">   
                                        <div class="member">
                                          <div class="member-img">
                                              <img src="<?php echo HOME_URL ?>rimage/products/`+data.f_primary_image+`.e.jpg" class="same-size" alt="">
                                          </div>
                                          <div class="member-info text-left">
                                              <h5 class="text-center">`+data.f_title+`</h5>
                                              <p class="m-0"><strong>ID `+infoText+`(Lot ID):</strong> `+data.f_lots_id+`</p>
                                              <p class="m-0">número `+infoText+`(Lot Number): `+data.f_number+`</p>
                                              <p class="m-0 `+dNone+`">Mejor postor (Highest Bidder): `+f_bid_user_name+`</p>
                                              <p class="m-0 `+dNone+`">oferta actual (Current bid): $`+f_current_bid+`</p>
                                              <p class="m-0"><strong>Descripción (Description)</strong></p>
                                              <p class="m-0">`+data.f_description+`</p>
                                              <div class="form-group mt-4 `+dNone+`">
                                                <label class="font-weight-bold">Preguntando (Asking)</label> 
                                                <span> $`+ askbid +`</span>
                                              </div>
                                              <div class="form-group `+dNone+`">
                                                <label>Oferta (Bid)</label>
                                                <input type="hidden" name="lotid" value="`+data.f_lots_id+`"/>
                                                <input type="text" id="bidamount" name="bidamount" required   value="`+ askbid +`" class="f form-control"  />
                                              </div>
                                          </div>
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

                formSubmit: {
                    text: 'HAGA SU OFERTA (BID NOW)',
                    btnClass: 'btn-success '+dNone,
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
                            data: $("#bidDetails").serialize(),                          
                            url: '<?php echo BASE_URL ?>api/bid.php',           
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status=="200"){                           
                                    $("#bidamount").removeClass('is-invalid');
                                    $("#bidamount").addClass('is-valid');
                                    confirmOkOnly("green",'Oferta exitosa (Bid Successful)'," ",baseUrl)
                                }else{
                                    $("#bidamount").addClass('is-invalid');
                                    $("#bidamount").removeClass('is-valid');
                                     if(datahere.message=="El artículo no existe<br>(Item does not exist)"){
                                        confirmOkOnly("red",datahere.message,"Inválida",baseUrl)
                                    }else{
                                        showMsg("Inválida",datahere.message,'red');  
                                    }
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

</script>