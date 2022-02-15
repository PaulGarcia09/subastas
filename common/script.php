<script type="text/javascript">
    $(document).ready(function(){

        $(".btn-script-login").on('click',function(){
            var data = $(this).data('data');
            showPopIt(data); 
        });

        $(".btn-script-bid").on('click',function(){
            var data = $(this).data('data');
            showBid(data); 
        });


    });


    
    function showPopIt(data)
    {
        
        $.confirm({
            title: 'LOGIN',
            columnClass: 'small',
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName">
                                <div class='row'>
                                    <div class="col">   
                                        <div class="form-group">
                                            <label>User name asd</label>
                                            <input type="text" name="username" required value="" placeholder="User Name" class="f form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" required value="" placeholder="Password" class="f form-control"  />
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
                    text: 'LOGIN',
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
                                  if(datahere.message != ''){
                                    showMsg("Successfully",datahere.message,'green'); 
                                  }else{
                                    showBid(data); 
                                  }                           
                                }else{
                                    showMsg("Invalid",datahere.message,'red');  
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

    function showBid(data)
    {
        baseUrl = '<?php echo BASE_URL ?>';
        console.log(data);
        $.confirm({
            title: 'LOGIN',
            columnClass: 'medium',
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName">
                                <div class='row'>
                                    <div class="col d-flex align-items-stretch">   
                                        <div class="member">
                                          <div class="member-img">
                                              <img src="<?php echo HOME_URL ?>rimage/products/`+data.f_primary_image+`.e.jpg" class="same-size" alt="">
                                          </div>
                                          <div class="member-info text-left">
                                              <h5 class="text-center">`+data.f_title+`</h5>
                                              <p class="m-0"><strong>Lot ID:</strong> `+data.f_lots_id+`</p>
                                              <p class="m-0">Lot number: `+data.f_number+`</p>
                                              <p class="m-0">Highest Bidder: `+data.f_bid_user_name+`</p>
                                              <p class="m-0">Current bid: $`+data.f_current_bid+`</p>
                                              <p class="m-0"><strong>Description</strong></p>
                                              <p class="m-0">`+data.f_description+`</p>
                                              <div class="form-group mt-4">
                                                <label class="font-weight-bold">Asking</label> 
                                                <span>`+data.f_current_bid+`</span>
                                              </div>
                                              <div class="form-group">
                                                <label>Bid</label>
                                                <input type="hidden" name="lotid" value="`+data.f_lots_id+`"/>
                                                <input type="text" name="bidamount" required value="" placeholder="`+(data.f_current_bid+data.f_bid_increment)+`" class="f form-control"  />
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
                cancel: function () {
                    //close
                },    

                formSubmit: {
                    text: 'BID NOW',
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
                        showUI(1);

                        $.ajax({          
                            type: 'POST',
                            data: $("#formDetails").serialize(),                          
                            url: '<?php echo BASE_URL ?>api/bid.php',           
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status=="200"){                           
                                    confirmOkOnly("green",'Successfully',"info",baseUrl)
                                }else{
                                    showMsg("Invalid",datahere.message,'red');  
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