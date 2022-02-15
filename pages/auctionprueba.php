
  <main id="main">
        <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg bg-white">
      <div class="container">

        <div class="section-title py-5 px-lg-5">
          <h2 data-aos="fade-up"><i class="fa fa-bullhorn" style=" color:#ff5821"></i> Live Auction</h2>
        </div>
        <div class="row">
          <?php if($result): ?>
          <div class="col-lg-6">
		  
		     <div class="card card-light">
              <div class="card-header">
			  
            <div class="alert alert-primary text-center"  role="alert">
              <p id="msgbid"> <?php echo $result['f_message'];?></p>
            </div>
			 
				</div>  <div class="card-body">
            <div class="member-img">
              <img class="same-size" src="<?php echo HOME_URL ?>rimage/products/<?php echo $result['f_primary_image'] ?>.e.jpg" alt="First slide">
            </div>
            <form id='bidDetails' class="formName">
                <h5 class="text-center" translate="no" lang="es"><span class="kw" translate="no" lang="es"><?php echo $result['f_number'].".".$result['f_title'] ?></span></h5>
                <p class="m-0"><strong>Lot number:</strong> 	<?php echo $result['f_number'] ?></p>
                <p class="m-0"><strong>Initial Bid:</strong> 	<span> <?php setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $result['f_minimum_bid']) ?></span> </p>
                <p class="m-0"><strong>Paddle Number:</strong>	<span id="higbuser"> <?php echo $result_paddle['paddle_number'] ?> </span></p>
                <p class="m-0"><strong>Highest bid:</strong> 	<span id="highamount"> <?php echo $result['f_current_bid'] ?></span> </p>
                <p class="m-0" translate="no"><strong>Description:</strong><br><?php echo $result['f_number'].".".$result['f_description'] ?></p>
                
					<?php 
							if($result['f_message']=='Lot Sold'){
								$display="style='display:none;'";	
							}else{
								$display="";
							}
						?><div id="holderbid" <?php echo $display;?>>
				<hr><h5 class="text-center">Bidding Area</h5>	<hr>	
                <div class="form-group mt-4">
                  <?php 
                    $firstBid = ( (int)$result['f_current_bid']+(int)$result['f_bid_increment']);
                    $secondBid = ( $firstBid+(int)$result['f_bid_increment']);
                    $thirdBid = ( $secondBid+(int)$result['f_bid_increment']);
                  ?>   
                  <span><strong>Quick Bid</strong></span> 
				  
				<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn1" data-amount="<?php echo $firstBid; ?>">
				<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn2" data-amount="<?php echo $secondBid; ?>">
				<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn3" data-amount="<?php echo $thirdBid; ?>">
				
				<br>
				<span style="color:red;font-size:10px;">Asking</span>
				  
                 <!-- <span class="btn btn-primary btn-script-quick"  id="btn1" data-amount="<?php echo $firstBid; ?>"> <?php echo $firstBid; ?></span>
                  <span class="btn btn-primary btn-script-quick"  id="btn2" data-amount="<?php echo $secondBid; ?>"><?php echo $secondBid; ?></span>
                  <span class="btn btn-primary btn-script-quick"  id="btn3" data-amount="<?php echo $thirdBid; ?>"><?php echo $thirdBid; ?></span>-->
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"><strong>Bid</strong></label>
                  <div class="col-sm-7">
                    <input type="hidden" id="lotid" name="lotid" value="<?php echo $result['f_lots_id'] ?>"/>
                    <input type="text" id="bidamount" name="bidamount" required value="" placeholder="" class="f form-control"  />
                  </div>
                  <div class="col-sm-3">
                    <span class="btn btn-success btn-script-bid"><i class="fas fa-gavel"></i> Bid</span>
                  </div>
                </div></div>
            </form>
          </div>
          </div>
          </div>
          <div class="col-lg-6">
          <div id="player"></div>
            <br/>
            <br/>
            <br/>
            <div style="position: relative;max-width: 320px;width: 100%;border-radius: 5px; box-shadow: 5px 10px 18px #f2f2f2" id="top_five">
              <div style="background-color:#003681; color:white; padding: 10px;">
                Lot <?php echo $result['f_number'] ?>. <?php echo $result['f_title'] ?>
              </div>
              <div style="padding: 10px; display: flex; flex-wrap: nowrap;width: 100%">
                  <div style="width: 50%; font-weight: 600; text-align:left">Paddle Number</div>
                  <div style="width: 50%; font-weight: 600; text-align:right">Bid</div>      
                 </div>              
              <div id="top_five_result">
                             
              </div>              
            </div>


          </div>
          <?php else: ?>
            <div class="col text-center">
            <?php if(trim($stream['f_video'])==''): ?>
                <h3>No Auction Available</h3>
                <?php else: ?>
                <h3>¡Gracias!</h3>
                <div id="player"></div>
            <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
        <?php if($result): ?>
<div class="row">
		    	<div class="col-lg-12">  <div class="card card-light">
              <div class="card-header">
			  <h2 data-aos="fade-up" class="aos-init aos-animate">Additional Images</h2>
			 
				</div>  <div class="card-body">
	    				 
		           <div class="content">
					
		           
					<?php if(!empty($additional_image)){?>
							<?php foreach ($additional_image as $valueimage) {?>
								
								<?php if($valueimage['f_image_path']=="") { ?>
									<img src="<?php echo HOME_URL ?>rimage/no_image1.jpg" id="imagecat" border="0">            			    
								<?php } else { ?>
									<?php $imagecat = $valueimage['f_image_path']; ?>
									<?php if (file_exists("../rimage/products/$imagecat.e.jpg")) { ?>
										<a  title="" href="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.c.jpg';?>" class="thickbox"><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" id="imagecat" border="0"></a>            			    
									<?php } else { ?>
										<?php if (file_exists("../rimage/products/$imagecat.e.png")) { ?>
											<a  title="" href="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.c.png';?>" class="thickbox"><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.png';?>" id="imagecat" border="0"></a>            			    
										<?php } else { ?>
											<?php if (file_exists("../rimage/products/$imagecat.e.gif")) { ?>
												<a  title="" href="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.c.gif';?>" class="thickbox"><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.gif';?>" id="imagecat" border="0"></a>            			    
											<?php } else { ?>            			    		
												<img src="<?php echo HOME_URL ?>rimage/no_image.jpg" id="imagecat" border="0">            			    
											<?php } ?>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							<?php }?>
					<?php }?>
		           
		           
		           
		           </div>
		           
		           
				</div>	
				</div>	
				</div>	

      </div>
      </div>
      <?php endif; ?>
    </section><!-- End Team Section -->




  </main><!-- End #main -->

<script type="text/javascript">
    $(document).ready(function(){
        baseUrl = '<?php echo BASE_URL ?>';    


        $(".btn-script-bid").on('click',function(){
			  $.confirm({
            title: " ",                
            content: "Por favor confirmar",               
            buttons: {
               
              cancel:function(){

              },
               OK: function(){
            $.ajax({          
                type: 'POST',
                data: $("#bidDetails").serialize(),                          
                url: '<?php echo BASE_URL ?>api/bid.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result); 
                    if(datahere.status=="200"){                           
                        $("#bidamount").removeClass('is-invalid');
                        $("#bidamount").addClass('is-valid');
                       // confirmOkOnly("green",'Successfully',"info",baseUrl+"/auction.php")
                        //showMsg("Successfully",datahere.message,'green');  
                        //location.reload();
                    }else{
                        $("#bidamount").addClass('is-invalid');
                        $("#bidamount").removeClass('is-valid');
                         if(datahere.message=="Item does not exist"){
										confirmOkOnly("red",datahere.message,"Inválida (Invalid)",baseUrl)
									}else{
										showMsg("Inválida (Invalid)",datahere.message,'red');  
									}
                    }                
					}    
            });
			
			     }
            }
          });
        });

        $(".btn-script-quick").on('click',function(){
          bidamount = $(this).data('amount');
          lotid = $("#lotid").val();
          $.confirm({
            title: " ",                
            content: "Por favor confirmar",               
            buttons: {
               
              cancel:function(){

              },
               OK: function(){
                  $.ajax({          
                      type: 'POST',
                      data: {bidamount: bidamount,lotid:lotid},                          
                      url: '<?php echo BASE_URL ?>api/bid.php',           
                      success: function(result) {  
                        datahere =  jQuery.parseJSON(result); 
                        if(datahere.status=="200"){                           
                            $("#bidamount").removeClass('is-invalid');
                            $("#bidamount").addClass('is-valid');
                           // confirmOkOnly("green",'Successfully',"info",baseUrl+"/auction.php")
                           // showMsg("Successfully",datahere.message,'green');  
                          //location.reload();
                        }else{
                            $("#bidamount").addClass('is-invalid');
                            $("#bidamount").removeClass('is-valid');
                            showMsg("Inválida (Invalid)",datahere.message,'red');  
                        }                
                      }    
                  });
              }
            }
          });



        });


    });
	
	showred =0;
	ajax_status =<?php echo '0';?>;
	var t;
	var t2;
	baseUrl = '<?php echo BASE_URL ?>';
	
	function getdetail(){
	
	 if(ajax_status==0){	
	 	ajax_status =1;
	 	
			$.ajax({
				type: 'POST',
				url: baseUrl+'api/ajax-process.php?go=1&lotid=<?php echo $result['f_lots_id'];?>',	
				success: function(result) {					
					try { 
						var responson = eval('(' + result + ')');					
						
						if(responson.result=='ok'){	
              $('#top_five_result').html(responson.contents);							
							$('#btn1').val(responson.button1);
							$('#btn2').val(responson.button2);
							$('#btn3').val(responson.button3);
							$('#btn1').data("amount",responson.button1);
							$('#btn2').data("amount",responson.button2);
							$('#btn3').data("amount",responson.button3);
							 
							$('#highamount').html('$ '+responson.currentbid);
							$('#higbuser').html(responson.uname);
							$('#msgbid').html(responson.message);
						   
							if(responson.message=='Lot Sold'){
								$("#holderbid").hide('slow');
							}						
							
							if(responson.item=='no'){
                window.location='auction.php';
                //CargarNuevoLote();
							}
							ajax_status=0;
						}
						
					}
					catch( err  ) {
						//alert(err);
					}
				}
			});
	 }
	
	t=setTimeout("getdetail()",1000);	
}	

<?php if(!empty($result)){?>
getdetail();
<?php }?>
	function blinkthis(){

	 $("#msgbid").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
	 t2=setTimeout("blinkthis()",2000);	
}
blinkthis();

function CargarNuevoLote(){
	
  if(ajax_status==0){	
    ajax_status =1;
    
     $.ajax({
       type: 'POST',
       url: baseUrl+'lotesCargar.php>',	
       success: function(result) {					
         try { 
           var responson = eval('(' + result + ')');					
           
           alert(responson);
           
         }
         catch( err  ) {
           //alert(err);
         }
       }
     });
  }
 
 t=setTimeout("getdetail()",1000);	
}	



	
</script>
<script>

  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      width: '100%',
      videoId: '<?php echo trim($stream['f_video']);?>',
      playerVars: { 'autoplay': 1, 'playsinline': 1 },
      events: {
        'onReady': onPlayerReady
      }
    });
  }
  function onPlayerReady(event) {
     event.target.mute();
    event.target.playVideo();
  }
    </script>




