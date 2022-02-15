
  <main id="main">
        <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg bg-white">
      <div class="container">

        <div class="section-title py-5 px-lg-5">
          <h2 data-aos="fade-up">Privacy Policy</h2>
        </div>
        <div class="row">
          <div class="col">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis auctor elit, a sodales est luctus vel. Nulla tellus purus, rutrum in imperdiet ac, congue in est. Phasellus nec nibh ultrices, tempor ex quis, posuere justo. In et felis sapien. Morbi at leo in eros euismod ultricies. Quisque interdum laoreet sollicitudin. Aenean erat neque, elementum id tincidunt vitae, malesuada vel diam. Aenean volutpat iaculis tempus. Curabitur eleifend elementum molestie. Phasellus lacinia mi sed ligula dictum dictum in ultrices nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ornare nunc eget porta hendrerit.</p>  
            <p>Nunc tellus leo, pulvinar id euismod at, consequat ultrices leo. Donec vitae tristique leo. In eu eros egestas, volutpat enim at, tempor nunc. Nunc pellentesque finibus commodo. Duis lacinia laoreet urna, vitae faucibus dui egestas nec. Mauris commodo lectus vel finibus ultricies. Aliquam mattis nisl quis aliquam rhoncus. Proin ultricies dolor nisl, iaculis euismod neque consequat sed. Morbi euismod, felis a luctus blandit, massa tortor bibendum odio, ac consectetur mauris libero id purus. Mauris congue justo eget gravida tincidunt. Donec condimentum quis ex non lacinia. Cras tincidunt neque orci, et hendrerit enim posuere quis. Nunc tempor enim at nunc iaculis, id hendrerit nunc pharetra. Integer accumsan gravida arcu, quis consequat diam lacinia nec. Suspendisse dictum tincidunt scelerisque.</p> 
            <p>Cras in augue vel elit pulvinar hendrerit. Sed venenatis ornare justo a gravida. Donec tristique varius ligula, at faucibus libero. Quisque dapibus vestibulum tortor sed luctus. Integer commodo mauris dapibus, sollicitudin massa ut, venenatis est. Nunc vestibulum egestas libero, sit amet imperdiet lorem feugiat id. Vivamus lorem felis, semper et vestibulum ac, luctus a quam. Aliquam quam mauris, viverra eu congue vel, feugiat et nulla. Aliquam eget odio in tellus tincidunt laoreet. Vestibulum consequat dui non elit dictum, ac aliquet purus sodales.</p> 
            <p>Suspendisse quis augue in sapien ornare blandit quis eget odio. Aliquam eget felis lacus. Fusce accumsan, dolor eu tincidunt semper, quam diam ultrices nisl, quis mollis nunc diam a arcu. Ut blandit tortor vel consectetur malesuada. Nam sollicitudin tincidunt quam at finibus. Maecenas porttitor sapien id erat egestas sodales. Aliquam commodo, nulla porta faucibus tincidunt, nibh nulla facilisis velit, sit amet fermentum sem odio sit amet mauris. Aliquam ut tellus scelerisque, congue ex sed, porttitor nulla. Integer ac rhoncus libero, a ornare erat.</p> 
            <p>Etiam non fringilla ex. Vestibulum magna nunc, rutrum eget aliquet ut, ullamcorper ac urna. Aliquam rutrum nec mauris ut molestie. Pellentesque elementum ipsum et ante pharetra fermentum ut a felis. Sed interdum posuere placerat. Nam gravida fermentum nisl, interdum sollicitudin urna rhoncus nec. Quisque elementum leo sed dui sagittis, in dapibus velit gravida.</p>  
          </div>
        </div>



      </div>
    </section><!-- End Team Section -->




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


    
    function showPopIt(data)
    {
        baseUrl = '<?php echo BASE_URL ?>';
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
                                            <label>User name</label>
                                            <input type="text" name="username" required value="" placeholder="" class="f form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" required value="" placeholder="" class="f form-control"  />
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
                                    if(data){
                                      $.confirm({autoClose: 'ok|100',})            
                                      showUI(0);
                                      showBid(data,"bid"); 
                                    }else{
                                    //  confirmOkOnly("green",'Log-in successful!'," ",baseUrl)
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

    function showBid(data,type)
    {
        baseUrl = '<?php echo BASE_URL ?>';
        console.log(data);
        dNone = "";
        title = "BID";
        sizeClass = "medium";
        infoText = "Lot";
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
                                              <p class="m-0"><strong>`+infoText+` ID:</strong> `+data.f_lots_id+`</p>
                                              <p class="m-0">`+infoText+` number: `+data.f_number+`</p>
                                              <p class="m-0 `+dNone+`">Highest Bidder: `+f_bid_user_name+`</p>
                                              <p class="m-0 `+dNone+`">Current bid: $`+f_current_bid+`</p>
                                              <p class="m-0"><strong>Description</strong></p>
                                              <p class="m-0">`+data.f_description+`</p>
                                              <div class="form-group mt-4 `+dNone+`">
                                                <label class="font-weight-bold">Asking</label> 
                                                <span> $`+(data.f_current_bid+data.f_bid_increment)+`</span>
                                              </div>
                                              <div class="form-group `+dNone+`">
                                                <label>Bid</label>
                                                <input type="hidden" name="lotid" value="`+data.f_lots_id+`"/>
                                                <input type="text" id="bidamount" name="bidamount" required   value="`+(data.f_current_bid+data.f_bid_increment)+`" class="f form-control"  />
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
                                   // confirmOkOnly("green",'Bid Successful'," ",baseUrl)
                                }else{
                                    $("#bidamount").addClass('is-invalid');
                                    $("#bidamount").removeClass('is-valid');
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

