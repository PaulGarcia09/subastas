var Stream;
showred =0;
ajax_status ='0';
var t;
var t2;
var t3;
var BaseUrl;
var HomeURL;
var ID;
function ConsultarLote(BaseURL,HomeURL){
    infodata={
      id : '01',
    };
    $.ajax({    
        data:  infodata,      
        type: 'POST',                     
        url: BaseURL+'/api/auctionprocess.php',           
        success: function(result) {  
          datahere =  jQuery.parseJSON(result); 
            var content = "";
            t3=setTimeout(validarvendido(datahere.f_lots_id,BaseURL,HomeURL),1000);
            if(datahere !== null){
                document.getElementById("final").style.display="none";
                content = content + '<div class="col-lg-6">';
                content = content + '<div class="card card-light">';
                content = content + '<div class="card-header">';
                 
                content = content + '<div class="alert alert-primary text-center"  role="alert">';
                content = content + '<p id="msgbid">'+datahere.f_message+'</p></div>';
                
                content = content + ' </div>  <div class="card-body">';
                content = content + ' <div class="member-img">';
               content = content + '<img class="same-size" src="'+HomeURL+'rimage/products/'+datahere.f_primary_image+'" alt="First slide"></div>';
               
               content = content + '<form id="bidDetails" class="formName">';
               content = content + '<h5 class="text-center" translate="no" lang="es"><span class="kw" translate="no" lang="es">'+datahere.f_lots_id+"."+datahere.f_title+'</span></h5>';
               content = content + '<p class="m-0"><strong>Lot number:</strong>'+datahere.f_number+'></p>';
               content = content + '<p class="m-0"><strong>Initial Bid:</strong> 	<span>'+datahere.f_minimum_bid+'</span> </p>';
               content = content + '<p class="m-0"><strong>Paddle Number:</strong>	<span id="higbuser">'+datahere.paddle_number+'</span></p>';
               content = content + '<p class="m-0"><strong>Highest bid:</strong> 	<span id="highamount">'+datahere.f_current_bid+'</span> </p>';
               content = content + '<p class="m-0" translate="no"><strong>Description:</strong><br>'+datahere.f_number+'.'+datahere.f_description+'</p>';
                   
                if(datahere.f_message=='Lot Sold'){
                var display="style='display:none;'";	
                }else{
                var display="";
                }
                content = content + '<div id="holderbid"'+display+'>';
                content = content + '<hr><h5 class="text-center">Bidding Area</h5>	<hr>';
                content = content +'<div class="form-group mt-4">';
                       var firstBid = parseInt(datahere.f_current_bid)+parseInt(datahere.f_bid_increment);
                       var secondBid = firstBid+parseInt(datahere.f_bid_increment);
                       var thirdBid =  secondBid+parseInt(datahere.f_bid_increment);
                content = content +'<span><strong>Quick Bid</strong></span>';
                     
                content = content +'<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn1" data-amount="'+firstBid+'">';
                content = content +'<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn2" data-amount="'+secondBid+'">';
                content = content +'<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn3" data-amount="'+thirdBid+'">';
                   
                content = content +'<br>';
                content = content +'<span style="color:red;font-size:10px;">Asking</span>';
                     
                    // <!-- <span class="btn btn-primary btn-script-quick"  id="btn1" data-amount="<?php echo $firstBid; ?>"> <?php echo $firstBid; ?></span>
                    //  <span class="btn btn-primary btn-script-quick"  id="btn2" data-amount="<?php echo $secondBid; ?>"><?php echo $secondBid; ?></span>
                    //  <span class="btn btn-primary btn-script-quick"  id="btn3" data-amount="<?php echo $thirdBid; ?>"><?php echo $thirdBid; ?></span>-->
                content = content +'</div>';
                   
                content = content +'<div class="form-group row">';
                content = content +'<label class="col-sm-2 col-form-label"><strong>Bid</strong></label>';
                content = content +'<div class="col-sm-7">';
                content = content +'<input type="hidden" id="lotid" name="lotid" value="'+datahere.f_lots_id+'"/>';
                content = content +'<input type="text" id="bidamount" name="bidamount" required value="" placeholder="" class="f form-control"/>';
                content = content +'</div>';
                content = content +'<div class="col-sm-3">';
                content = content +'<span class="btn btn-success btn-script-bid"><i class="fas fa-gavel"></i> Bid</span>';
                content = content +'</div>';
                content = content +'</div></div>';
                content = content +'</form>';
                content = content +'</div>';
                content = content +'</div>';
                content = content +'</div>';
                content = content +'<div class="col-lg-6">';
                content = content +' <div id="player"></div>';
                content = content +'<br/>';
                content = content +'<br/>';
                content = content +'<br/>';
                content = content +'<div style="position: relative;max-width: 320px;width: 100%;border-radius: 5px; box-shadow: 5px 10px 18px #f2f2f2" id="top_five">';
                content = content +'<div style="background-color:#003681; color:white; padding: 10px;">Lot'+datahere.f_number+datahere.f_title+'';
                content = content +'</div>';
                content = content +'<div style="padding: 10px; display: flex; flex-wrap: nowrap;width: 100%">';
                content = content +'<div style="width: 50%; font-weight: 600; text-align:left">Paddle Number</div>';
                content = content +'<div style="width: 50%; font-weight: 600; text-align:right">Bid</div>';      
                content = content +'</div>';      
                content = content +'<div id="top_five_result">';
                content = content +'</div>';
                content = content +'</div>';
                content = content +'</div>';

                document.getElementById("Inicio").innerHTML+=content;
                getdetail(BaseURL,datahere.f_lots_id);

            }else{
                if(Stream == null || Stream == ""){
                    document.getElementById("Final").style.display="static";
                }else{
                    
                }
            }

            //FIN MAIN
                  
        }    
    });
}
function consultarStream(BaseURL){
    infodata={
        id : '02',
      };
    $.ajax({    
        data:  infodata,      
        type: 'POST',                     
        url: BaseURL+'/api/auctionprocess.php',           
        success: function(result) {  
          datahere =  jQuery.parseJSON(result);
          Stream = datahere.f_video.toString().trim();
        }    
    });
}
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    width: '100%',
    //videoId: '<?php echo trim($stream['f_video']);?>',
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
function getdetail(baseU,id){
    baseUrl = baseU;
    ID = id;
           $.ajax({
               type: 'POST',
               url: baseUrl+'api/ajax-process.php?go=1&lotid='+id,	
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
                           }
                           ajax_status=0;
                       }
                       
                   }
                   catch( err  ) {
                       //alert(err);
                   }
               }
           });
   t=setTimeout(getdetail(baseU,id),1000);	
}	
function validarvendido(id,baseU,HomeURL){
    infodata={
        id : '01',
      };
      $.ajax({    
          data:  infodata,      
          type: 'POST',                     
          url: baseU+'/api/auctionprocess.php',  
          success: function(result) {					
            datahere =  jQuery.parseJSON(result); 
            if(parseInt(datahere.f_lots_id) !== parseInt(id)){
                ConsultarLote(baseU,HomeURL);
            }
        }
    })
}