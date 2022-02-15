<style type="text/css">
* {box-sizing: border-box;}

.member-img {
  position: relative;
  display:inline-flex;
}

.img-zoom-lens {
  position: absolute;
  border: 1px solid #d4d4d4;
  /*set the size of the lens:*/
  width: 60px;
  height: 60px;
}

.img-zoom-result {
  border: 0.5px solid #d4d4d4;
  /*set the size of the result div:*/
  width: 300px;
  height: 150px;
}
.img-initial{
    width: 500px;
    height: 250px;
    object-fit: contain;
    border-style: solid;
    border-width: 2px;
    border-color: white;
    background-color: white;
}
ul li::marker{
  color: white;

}
.item_img_list ul li.on, .item_img_list ul li.active, .item_img_list ul li:hover {
    border: 1px #00deff solid;
}
.item_img_list ul li {
    border: #e0e0e0 solid 1px;
}
.decSpam{
  height: 100px;
  overflow: scroll;
}
.card-header{
  background-color:white !important;
}
.video-container {
            width: 380px;
            margin: 15px;
        }
</style>
<link rel="stylesheet" href="assets/css/jquery.wm-zoom-1.0.min.css">
<script src="package/js-image-zoom.js" type="application/javascript"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/jquery.wm-zoom-1.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.14.3/video-js.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.14.3/video.min.js"></script>
    <script src="https://player.live-video.net/1.6.1/amazon-ivs-videojs-tech.min.js"></script>

<?php if($_SESSION['auction_brodcaster']): ?>
  <main id="main" style="margin-top:20px !important;">
        <!-- ======= Team Section ======= -->
      <div class="container">

      <div class="section-title py-1 px-lg-1">
          <h2 data-aos="fade-up" style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;"><i class="fa fa-bullhorn" style=" color:#ff5821"></i> Subasta en vivo</h2>
        </div>
        <div class="row"  style="
                        margin-bottom: 20px;
    overflow: hidden;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231);
    padding:10px;">
          <?php if($result): ?>
          <div class="col-lg-6" id="todo">
		  
		     <div class="card card-light">
        <div class="card-body" style="height: 700px;">
        <div style="height: 55px;">
        <h5 translate="no" lang="es"
              style="font-size:14px;    font-weight: bold;"><span class="kw" translate="no" lang="es" id="title" ><?php echo $result['f_title'] ?></span></h5>
        </div>
            <form id='bidDetails' class="formName">
            <div style="text-align:center;" id="img-container">
            <img id="imgprincipal" src="https://subastas.maxilana.com/rimage/products/<?php echo $result['f_primary_image'] ?>.original.jpg" style="width: 40%;object-fit: fill;;margin:auto;"/>
            </div>
            <div class="item_img_list items_img_list" id="listaImgADD" style="height: 65px;">
            <ul style="display: flex;padding: 0px;" id="ulImages">
            <?php $contador = 1; ?>
            <li class="on" id="li<?php echo "imgAdd".$contador?>" style="margin: 2px;">
                <img  class="imgAdicional" style="margin: auto;width: 52px;margin: 2px;" src="https://subastas.maxilana.com/rimage/products/<?php echo $result['f_primary_image'] ?>.e.jpg" id="<?php echo "imgAdd".$contador?>" border="0"></li> 
              <?php if(!empty($additional_image)){ 
                ?>
                <?php foreach ($additional_image as $valueimage) {?>
                      <?php if($valueimage['f_image_path']=="") { 
                       $contador = $contador + 1; ?>
                        <li id="li<?php echo "imgAdd".$contador?>" style="margin: 2px;">
                        <img  class="imgAdicional"
                          id="<?php echo "imgAdd".$contador?>"
                         style="margin: auto;width: 52px;margin: 2px;" src="<?php echo HOME_URL ?>rimage/no_image1.jpg" id="imagecat" border="0"></li>          			    
                      <?php } else {
                        $contador = $contador + 1;  ?>
                            <?php $imagecat = $valueimage['f_image_path']; ?>
                            <li id="li<?php echo "imgAdd".$contador?>" style="margin: 2px;"><img
                            class="imgAdicional"
                             style="margin: auto;width: 52px;margin: 2px;" src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" id="<?php echo "imgAdd".$contador?>" border="0"></li>            			    
                            <?php } ?>
                    <?php } ?>
                <?php } ?>
                </ul>
            </div>
            <div class="live_lot_desc">
                <p class="m-0" ><strong>Número de lote:</strong> <span id="numlote">	<?php echo $result['f_number'] ?><span></p>
                <p class="m-0" translate="no"><strong>Descripción:</strong>
                <div class="decSpam">
               <span id="descrpcion"> <?php echo $result['f_description'] ?></span></p>
                </div>
             </div>   
					<?php 
							if($result['f_message']=='Lot Sold'){
								$display="style='display:none;'";	
							}else{
								$display="";
							}
						?>
            <hr>
            <div id="holderbid" stlye="height: 113px;">
                <div class="form-group mt-4" id="bindingarea">
                  <?php 
                    $firstBid = ( (int)$result['f_current_bid']+(int)$result['f_bid_increment']);
                    $secondBid = ( $firstBid+(int)$result['f_bid_increment']);
                    $thirdBid = ( $secondBid+(int)$result['f_bid_increment']);
                  ?>   
                  <span><strong>Oferta rápida</strong></span> 
				  
				<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn1" data-amount="<?php echo $firstBid; ?>">
				<input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn2" data-amount="<?php echo $secondBid; ?>">
				<!-- <input type="button"  class="btn btn-primary btn-script-quick mr-4"  id="btn3" data-amount="<?php echo $thirdBid; ?>"> -->
				
				<br>
                </div>
                
                <div class="form-group row" id="apuestaBid">
                  <label class="col-sm-3 col-form-label"><strong>Ofertar</strong></label>
                  <div class="col-sm-6">
                    <input type="hidden" id="lotid" name="lotid" value="<?php echo $result['f_lots_id'] ?>"/>
                    <input type="text" id="bidamount" name="bidamount" required value="" placeholder="" class="f form-control"  />
                  </div>
                  <div class="col-sm-3">
                    <a class="btn btn-success btn-script-bid" id="btnOpen" style="font-size:14px;color:white;"><i class="fas fa-gavel"></i> Ofertar</a>
                  </div>
                </div></div>
            </form>
          </div>
          </div>
          </div>
          <div class="col-lg-5" id="todo2">
       
            <div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;height: 50px; padding:0px;
              width: 100%;display: inline-flex;" id="mipaleta">
             <img src="https://subastas.maxilana.com/pages/chat.png" style="
    width: 35px;
    margin-left: 20px;
    height: 40px;
    margin-top: 5px;"/> 
             <p id="msgbid" style="margin-top:15px;margin-left:30px;font-weight: bolder;"> <?php echo $result['f_message'];?></p>
            </div>

              <div style="height: 40px;">
              <p class="m-0">Oferta incial: <span id="ofertainicial"  > <?php echo number_format($result['f_minimum_bid'])?></span> </p>
              <p class="m-0"><strong>Oferta más alta:</strong> 	<span id="highamount"> <?php echo $result['f_current_bid'] ?></span> </p>
                <p class="m-0" ><strong>Paleta:</strong>	<span id="higbuser"> <?php echo $result_paddle['paddle_number'] ?> </span></p>
              </div>

              <div style="margin-bottom: 23px;">
               <p style="position:absolute; right:15px;"> Mi Paleta:  <strong><?php echo $_SESSION['auction_brodcaster']['paleta'] ?></strong> </p>
              </div>
            <div style="height: 58px;">
            <input type="button" style="width:90%; margin-top: 10px;
    margin-left: 24px;
    margin-bottom: 10px;" class="btn btn-primary btn-script-quick mr-4" id="btn1Rapid" data-amount="<?php echo $firstBid; ?>">
    </div>
            <div style="position: relative;width: 100%;border-radius: 5px; box-shadow: 5px 10px 18px #f2f2f2" id="top_five">
              <div style="background-color:#003681; color:white; padding: 10px;text-overflow: ellipsis;height: 40px;">
                <p style="text-overflow: ellipsis;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;"> Lote <span id="desc"> <?php echo $result['f_number'] ?>. <?php echo $result['f_title'] ?><span></p>
              </div>
              <div style="padding: 5px; display: flex; flex-wrap: nowrap;width: 100%">
                  <div style="width: 50%; font-weight: 600; text-align:left">Paleta</div>
                  <div style="width: 50%; font-weight: 600; text-align:right">Oferta</div>      
                 </div>              
              <div id="top_five_result" style="height: 165px;">
                             
              </div>
            </div>
            <hr>
          <div class="video-container">
          <video id="amazon-ivs-videojs" type="application/x-mpegURL" controls autoplay preload="auto"
          class="video-js vjs-4-3 vjs-big-play-centered"></video>
          </div>

            <!-- <div id="twitch-embed"></div> -->
           <!-- <div id="player"></div>-->

          </div>
          <?php else: ?>
            <div class="col text-center" id="final">
            <?php if(trim($stream['f_video'])==''): ?>
                <h3>No hay información para mostrar</h3>
                <?php else: ?>
                <h3>¡Gracias!</h3>
                <div class="video-container">
          <video id="amazon-ivs-videojs" type="application/x-mpegURL" controls autoplay preload="auto"
          class="video-js vjs-4-3 vjs-big-play-centered"></video>
          </div>
            <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
        <?php if($result): ?>

      </div>
      <?php endif; ?>




  </main><!-- End #main -->

<!-- Load the Twitch embed script -->
<script src="https://player.twitch.tv/js/embed/v1.js"></script>

<!-- Create a Twitch.Player object. This will render within the placeholder div -->
<script type="text/javascript">
const PLAYBACK_URL="https://f29d4834c510.us-west-2.playback.live-video.net/api/video/v1/us-west-2.479809362377.channel.wR0FPqTWPZTd.m3u8";
(function play() {
            // Get playback URL from Amazon IVS API
            var PLAYBACK_URL = '';
            
            // Register Amazon IVS as playback technology for Video.js
            registerIVSTech(videojs);

            // Initialize player
            var player = videojs('amazon-ivs-videojs', {
               techOrder: ["AmazonIVS"]
            }, () => {
               console.log('Player is ready to use!');
               // Play stream
               player.src({
               src: "https://f29d4834c510.us-west-2.playback.live-video.net/api/video/v1/us-west-2.479809362377.channel.wR0FPqTWPZTd.m3u8", 
               type: 'application/x-mpegURL'
              });
            });
  })();

    var embed = new Twitch.Embed("twitch-embed", {
    channel: "maxilana",
    width: '100%',
    height: 240,
    layout: "video",
    autoplay: true,
    parent: ["subastas.maxilana.com"],
    theme:"ligth",
    allowfullscreen: true
  });
    embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
        var player = embed.getPlayer();
        player.play();
    });
</script>

<script type="text/javascript">

function eliminarElemento(id){
	element = document.getElementsByClassName(id);	
	if (!element){
	  } else {
      $(id).remove();
	}
}


var options1 = {
    width: 400,
    zoomWidth: 500,
    offset: {vertical: 0, horizontal: 10}
};

// If the width and height of the image are not known or to adjust the image to the container of it
var options2 = {
    fillContainer: true,
    offset: {vertical: 0, horizontal: 10}
};
new ImageZoom(document.getElementById("img-container"), options2);

var ofini =  '<?php echo $result['f_minimum_bid'] ?>';
var Texto;
var maxBid;
  <?php if(!empty($result)){?>
    validarMaximoPujas();
    
ofini = ponerdecimales(ofini.toString())
document.getElementById("ofertainicial").innerHTML="$"+formatNumber(ofini);
  <?php }?>

    $(document).ready(function(){
        baseUrl = '<?php echo BASE_URL ?>';

        $(".btn-script-bid").on('click',function(){
        var cantidad = 0;
        var cantidadApostada = 0;
        var CantidadMostrar;
        bidamount = document.getElementById('bidamount').value;
        cantidadApostada = parseFloat(bidamount)
        cantidad = parseFloat('<?php echo $result['f_current_bid'] ?>');
        if(cantidad == NaN || cantidad == 0){
        cantidad = parseFloat('<?php echo $result['f_minimum_bid'] ?>');
        }
        var TotalMaximo =  parseFloat('<?php echo $result['f_bid_increment']?>') * parseFloat(maxBid);
        if(parseFloat(cantidadApostada) > parseFloat((cantidad + TotalMaximo))){
        CantidadMostrar = parseFloat(cantidadApostada).toString();
        CantidadMostrar = formatNumber(ponerdecimales(CantidadMostrar.toString()));
        Texto = '¿Está seguro de ofertar la cantidad de <b>$'+ CantidadMostrar + '</b> al lote: <b>'+document.getElementById("title").innerHTML+'</b>?'
        bandera = true;
        }else{
        Texto = 'Por favor confirmar';
        bandera = true;
        }
			  $.confirm({
            title: " ",                
            content: Texto,               
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
										confirmOkOnly("red",datahere.message,"Inválida",baseUrl)
									}else{
										showMsg("Inválida",datahere.message,'red');  
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
                          
                        }else{
                            $("#bidamount").addClass('is-invalid');
                            $("#bidamount").removeClass('is-valid');
                            showMsg("Inválida",datahere.message,'red');  
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
  var id='<?php echo $result['f_lots_id'];?>';
  var NvoID='';
  baseUrl = '<?php echo BASE_URL ?>';
  HomeUrl ='<?php echo HOME_URL ?>';
  var reloadpages='';
  var Stream;
  var r = setTimeout("ReiniciarPagina()",1000);	
  <?php if(empty($result)){?>
    InLive = setTimeout("ValidarSubastaActiva()",1000)
  <?php }?>
  consultarStream(baseUrl);

  <?php if(empty($result)){?>
    InLive = setTimeout("ValidarSubastaActiva()",1000)
  <?php }?>
  function validarMaximoPujas(){
          bidamount = document.getElementById("bidamount").value;
          $.ajax({          
                type: 'GET',
                url: '<?php echo BASE_URL ?>api/ValidarPuja.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result);
                    maxBid = parseFloat(datahere.f_maxbid)
                }
        });
  }

  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

  function ReiniciarPagina(){
    reloadpages = localStorage.getItem("reload");
      $.ajax({        
        type: 'GET',                     
        url: baseUrl+'/api/reloadpages.php',           
        success: function(result) {  
          datahere =  jQuery.parseJSON(result);
          var reloadResponse = datahere.f_reset;
          if(reloadResponse !== '0'){

            if(reloadpages !== '1'){
              localStorage.setItem("reload", "1");
              location.reload();
            }
            
          }else{
            localStorage.setItem("reload", "0");
          }
        }    
    });
    r = setTimeout("ReiniciarPagina()",1000);	

  }
  function ValidarSubastaActiva(){
      $.ajax({        
        type: 'GET',                     
        url: baseUrl+'/api/auction/consultarsubastaactiva.php',           
        success: function(result) {  
          datahere =  jQuery.parseJSON(result);
          if(datahere !== null){
              location.reload();
          }else{
            InLive = setTimeout("ValidarSubastaActiva()",1000)
          }
        }    
    });
  
  }
	function getdetail(){
	
  if(ajax_status==0){	
    
     $.ajax({
       type: 'POST',
       url: baseUrl+'api/ajax-process.php?go=1&lotid='+id,	
       success: function(result) {					
         try { 
           var responson = eval('(' + result + ')');					
           
           if(responson.result=='ok'){
            responson.contents = responson.contents ? responson.contents : '';

            
             $('#top_five_result').html(responson.contents);

             var Boton1 = responson.button1;
              var increments = responson.incrementos;
              increments = increments.replace(",", "");
              increments = increments.replace(".00", "");
              var res = Boton1.replace(",", "");
              Boton1 =  parseFloat(Math.ceil(res));
              var rounded1 = (Boton1)
              rounded1 = Math.round(rounded1/100) * 100;
              var rounded2 = rounded1 + parseFloat(increments);

							$('#btn1').val(formatNumber(ponerdecimales(rounded1.toString())));
							$('#btn2').val(formatNumber(ponerdecimales(rounded2.toString())));
              $('#btn1Rapid').val(formatNumber(ponerdecimales(rounded1.toString())));

							$('#btn1').data("amount",formatNumber(ponerdecimales(rounded1.toString())));
							$('#btn2').data("amount",formatNumber(ponerdecimales(rounded2.toString())));
              $('#btn1Rapid').data("amount",formatNumber(ponerdecimales(rounded1.toString())));
              
            if(responson.bloquedbids == "1"){
              $( "#btn1" ).prop( "disabled", true );
              $( "#btn2" ).prop( "disabled", true );
              $( "#btn1Rapid" ).prop( "disabled", true );
              $( "#bidamount" ).prop( "disabled", true );
              $( "#btnOpen" ).prop( "disabled", true );
            }else{
              $( "#btn1" ).prop( "disabled", false );
              $( "#btn2" ).prop( "disabled", false );
              $( "#btn1Rapid" ).prop( "disabled", false );
              $( "#bidamount" ).prop( "disabled", false );
              $( "#btnOpen" ).prop( "disabled", false );
            }

             $('#highamount').html('$ '+responson.currentbid);
             $('#higbuser').html(responson.uname);
             $('#msgbid').html(responson.message);
            var statuslot=responson.status;
            if(statuslot !== '3' && statuslot !== '2'){
              var itemsvisibles=$("#btn1Rapid").is(":visible");
              if(!itemsvisibles){
                document.getElementById("bindingarea").style.display="block";
                document.getElementById("btn1Rapid").style.display="initial";
                document.getElementById("apuestaBid").style.display="flex";
              }

            }
                
             if(responson.message=='Lot Sold'){
              NvoID=id;
              ConsultarLote(baseUrl,HomeUrl,NvoID);
             }						
             
             if(responson.item=='no'){
              NvoID=id;
              ConsultarLote(baseUrl,HomeUrl,NvoID);
             }
             ajax_status=0;
           }
           
         }
         catch( err  ) {
         }
       }
     });
  }
 
 t=setTimeout("getdetail()",200);	
}	

<?php if(!empty($result)){?>
getdetail();
<?php }?>
	function blinkthis(){

	 $("#msgbid").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
	 t2=setTimeout("blinkthis()",2000);	
}
blinkthis();
var Contador = 0;

function rtrim(str, filter) {
  filter || ( filter = '' );
  for (var j = str.length - 1; j >= 0 && filtering(str.charAt(j), filter); j--);          
  return str.substring(0, j + 1);
}

function ConsultarLote(BaseURL,HomeURL,NvoID){
  id=NvoID;
    infodata={
      id : '01',
    };
    $.ajax({    
        data:  infodata,      
        type: 'POST',                     
        url: BaseURL+'/api/auctionprocess.php',           
        success: function(result) {  
          responson =  jQuery.parseJSON(result); 
          datahere = responson.arrayDatos;
          Imagenes = responson.ImagenesAdicionales;
            var content = "";
            if(datahere !== null){
                if(datahere.f_lots_id !== id){
                  document.getElementById("bidamount").value="";  
                  if(datahere.f_nextlot == '1'){
                    if(datahere.f_typenext == '0'){
                      document.getElementById("top_five_result").innerHTML="";
                      id=datahere.f_lots_id;
                      id=id ? id : datahere.f_lots_id;
                      document.getElementById("lotid").value=id;
                      document.getElementById("ulImages").innerHTML="";
                      document.getElementById("bindingarea").style.display="block";
                      document.getElementById("btn1Rapid").style.display="initial";
                      document.getElementById("apuestaBid").style.display="flex";
                      
                      document.getElementById("imgprincipal").src = 'https://subastas.maxilana.com/rimage/products/'+datahere.f_primary_image+".original.jpg";
                      
                      
                      titulo=datahere.f_title.toString();
                      titulo=titulo.replace(/\s*$/,"");
                      
                      document.getElementById("title").innerHTML=titulo;
                      document.getElementById("desc").innerHTML="";
                      document.getElementById("desc").innerHTML=datahere.f_number+"."+titulo;
                      document.getElementById("descrpcion").innerHTML=datahere.f_description.toString();


                      document.getElementById("numlote").innerHTML=datahere.f_number.toString();


                      var minimumbid = ponerdecimales(datahere.f_minimum_bid.toString());
                      document.getElementById("ofertainicial").innerHTML="$"+formatNumber(minimumbid);
                      document.getElementById("higbuser").innerHtml="";
                      var paleta = datahere.paddle_number ? datahere.paddle_number : "";
                      document.getElementById("higbuser").innerHtml= paleta.toString();
                      document.getElementById("highamount").innerHtml="";
                      var ofertamaxima = datahere.f_current_bid ? datahere.f_current_bid : "";
                      document.getElementById("highamount").innerHtml=formatNumber(ponerdecimales(ofertamaxima.toString()));
                      document.getElementById("top_five_result").innerHTML="";

                      document.getElementById("bindingarea").style.display="block";
                      document.getElementById("btn1Rapid").style.display="initial";
                      document.getElementById("apuestaBid").style.display="flex";
                      var contenidoimg = '';
                      var contador = 1;
                      contenidoimg = contenidoimg + '<li class="on" id="liimgAdd'+contador+'" style="margin: 2px;">';
                      contenidoimg = contenidoimg + '<img  class="imgAdicional" style="margin: auto;width: 52px;margin: 2px;" src="https://subastas.maxilana.com/rimage/products/'+datahere.f_primary_image+'.e.jpg"';
                      contenidoimg = contenidoimg + 'id="imgAdd'+contador+'" border="0"></li>';
                      if(Imagenes.length > 0 || Imagenes !== null){
                        for(var i = 0; i < Imagenes.length ; i ++){
                              contador = contador + 1;
                              contenidoimg = contenidoimg + '<li id="liimgAdd'+contador+'" style="margin: 2px;">';
                              contenidoimg = contenidoimg + '<img  class="imgAdicional" style="margin: auto;width: 52px;margin: 2px;" src="https://subastas.maxilana.com/rimage/products/'+Imagenes[i].f_image_path+'.e.jpg"';
                              contenidoimg = contenidoimg + 'id="imgAdd'+contador+'" border="0"></li>';
                            }
                      }
                      document.getElementById("ulImages").innerHTML=contenidoimg;

$(".imgAdicional").on('click',function(){
          var img = $(this).attr('src');
          img= img.replace("e.jpg","original.jpg");
          var id = $(this).attr('id');
          id = "#li"+id;
          $("li").removeClass("on");
          $('#imgprincipal').attr('src',img);
          $(id).addClass("on");
          $(".js-image-zoom__zoomed-area").remove();
          $(".js-image-zoom__zoomed-image").remove();
          new ImageZoom(document.getElementById("img-container"), options2);
        });

        $(".js-image-zoom__zoomed-area").remove();
          $(".js-image-zoom__zoomed-image").remove();
          new ImageZoom(document.getElementById("img-container"), options2);


                    }else{
                      id=datahere.f_lots_id;
                      location.reload();
                    }

              }else{

                  infodata={
                  id : '03',
                  lot: id
                  };
                  $.ajax({    
                  data:  infodata,      
                  type: 'POST',                     
                  url: BaseURL+'api/auctionprocess.php',           
                  success: function(result) {  
                  datasold =  jQuery.parseJSON(result);
                  document.getElementById("bindingarea").style.display="none";
                  document.getElementById("apuestaBid").style.display="none";
                  document.getElementById("btn1Rapid").style.display="none";
                  }
                  });
              }
            }
            }else{
                if(Stream == null || Stream == ""){
                    document.getElementById("todo").innerHTML="";
                    document.getElementById("todo").innerHTML='<div class="col text-center" id="final"><h3>No Auction Available</h3></div>';
                }else{
                  infodata={
                  id : '04',
                  lot: id
                  };
                  $.ajax({    
                  data:  infodata,      
                  type: 'POST',                     
                  url: BaseURL+'api/auctionprocess.php',           
                  success: function(result) {  
                        if(result=="null"){
                            location.reload();
                        }else{
                          if(Contador == 10){
                              infodata={
                              id : '05',
                              lot: id
                              };
                              $.ajax({    
                              data:  infodata,      
                              type: 'POST',                     
                              url: BaseURL+'api/auctionprocess.php',           
                              success: function(result) {  
                              datasold =  jQuery.parseJSON(result);
                              }
                              });
                          }
                          Contador = Contador + 1;
                          document.getElementById("bindingarea").style.display="none";
                          document.getElementById("apuestaBid").style.display="none";
                          document.getElementById("btn1Rapid").style.display="none";
                        }
                  }
                  });

                }
            }
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
        url: BaseURL+'api/auctionprocess.php',           
        success: function(result) {  
          datahere =  jQuery.parseJSON(result);
          Stream = datahere.f_video.toString().trim();
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


	
</script>
<script>	
$(document).ready(function(){
$(".imgAdicional").on('click',function(){
          var img = $(this).attr('src');
          img= img.replace("e.jpg","original.jpg");
          var id = $(this).attr('id');
          id = "#li"+id;
          $("li").removeClass("on");
          $('#imgprincipal').attr('src',img);

          $(id).addClass("on");
          $(".js-image-zoom__zoomed-area").remove();
          $(".js-image-zoom__zoomed-image").remove();
          new ImageZoom(document.getElementById("img-container"), options2);
        });
      });

			$(document).ready(function(){
				$('.my-zoom-1').WMZoom();
				$('.my-zoom-2').WMZoom({
					config : {
						inner : true
					}
				});
			});
    </script>
<?php else:  ?>
<script>
  window.location.href = "index.php";
</script>
<?php endif; ?>

