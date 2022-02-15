<style type="text/css">
* {box-sizing: border-box;}

.member-img {
  position: relative;
  display:inline-flex;
}
.modal-content{
  width: 480px !important;
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
.bid-history-info {background-color: #f0f0f0;padding: 20px 28px;}
.bid-history-form .modal-body {padding: 34px 0 20px;}
.bid-history-info p {font-family: sans-serif;
font-weight: 400;font-size: 14px;color: #0e0e0e;padding-bottom: 7px;}
.bid-history-info span {font-family: sans-serif;font-weight: 300;font-size: 20px;line-height: 1.2;color: #0e0e0e;}
.bid-history-info .price-area {padding-top: 18px;}
.bid-history-info .price-area span:first-child {font-family: sans-serif;
font-weight: 400;font-size: 14px;color: #999;}
.bid-history-info .price-area span:last-child {font-family: sans-serif;
font-weight: 400;font-size: 20px;color: #0e0e0e;padding-left: 20px;}
table.bid-wrap {background: inherit;padding: 24px 35px 0 30px;margin: 0 auto;display: block;}
table.bid-wrap th {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;line-height: 1;background: inherit;text-align: center;padding-bottom: 10px;}
table.bid-wrap tbody {height: 170px;width: 100%;border: 1px solid #e0e0e0;display: block;overflow-y: auto;}
table.bid-wrap tbody td {text-align: center;padding: 10px 0;line-height: 1;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
table.bid-wrap tbody tr {width: 100%;}
table.bid-wrap tbody tr td:first-child {width: 100px;}
table.bid-wrap tbody tr td:nth-child(2) {width: 122px;}
table.bid-wrap tbody tr td:last-child {width: 198px;}
table.bid-wrap tbody tr.no-bid-history td:last-child {width: 420px;}
.bid-box button:hover {background: #999;}
.bid-box button {margin: 15px auto 0;background-color: #999;display: block;}
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
.card-header{
  background-color:white !important;
}
.swiper-container {
      width: 100%;
      height: 100%;
    }
@media only screen and (min-width:100px) and (max-width:500px){
  .imgCelular{
    width: 300px;
    height:300px;
  }
  .card-body{
    padding:0px !important;
  }
}
@media screen and (max-device-width : 480px) {
  .modal-content{
    width: 356px !important;
  }
    #imagemodal .modal-dialog{
        width:300px;
    }
    .popupimg{
    width: 200px !important;
    height: 200px !important;
    margin-left: 0px !important;
}
    .jconfirm .jconfirm-box {
        background: white;
        border-radius: 4px;
        position: relative;
        outline: 0;
        padding: 15px 15px 0;
        overflow: hidden;
        margin-left: 5%; /*(modification)*/
        margin-right: 5%; /*(modification)*/
    }
    .jconfirm .jconfirm-box div.jconfirm-content-pane .jconfirm-content img{
        height:70% !important;
        width:70% !important;
        margin:auto;
    }
    #imgCentral{
    height:103px !important;
  }
}
.items {
    width: 90%;
    margin: 0px auto;
    margin-top: 100px
}

.slick-slide {
    margin: 10px
}

.slick-slide img {
    width: 100%;
    border: 0px solid #fff
}
.slick-prev:before {
  color: #007bff !important;
  background-color: #eee;
}
.slick-next:before {
  color: #007bff !important;
  background-color: #eee;
}
</style>
<script src="package/js-image-zoom.js" type="application/javascript"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/jquery.wm-zoom-1.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
 <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <main id="main" style="margin-top:20px !important;">
        <!-- ======= Team Section ======= -->
      <div class="container">

        <div class="section-title py-1 px-lg-1">
            <div class="row"  style="
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0px 2px 6px rgb(230,231,231);
            padding:10px;">
                    <div class="col-lg-8" id="todo">
                    <div class="card card-light" style="border:none !important;">
                    <div class="card-body">
                    <form id='detaillote' class="formName" style="display:inline-flex;width: 100%;">
                    <div class="item_img_list items_img_list" id="listaImgADD" style="height: 65px;"> 
            <ul style="padding: 0px;" id="ulImages">
            <?php $contador = 1; ?>
            <li class="on" id="li<?php echo "imgAdd".$contador?>" style="margin: 2px;">
                <img  class="imgAdicional" style="margin: auto;width: 52px;margin: 2px;" src="https://subastas.maxilana.com/rimage/products/<?php echo $catalog[0]['f_primary_image'] ?>.original.jpg" id="<?php echo "imgAdd".$contador?>" border="0"></li> 
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
                             style="margin: auto;width: 52px;margin: 2px;" src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" id="<?php echo "imgAdd".$contador?>" border="0"></li>            			    
                            <?php } ?>
                    <?php } ?>
                <?php } ?>
                </ul>
            </div>
                    <div style="text-align:center;width:100% !important;" id="img-container">
                    <img id="imgprincipal" src="https://subastas.maxilana.com/rimage/products/<?php echo $catalog[0]['f_primary_image'] ?>.original.jpg" style="width: 90%;object-fit: fill;margin:auto;"/>
                    </div>
</div>
    <div class="swiper-container" id="imagesCel">
     <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img style="margin: auto;" class="imgCelular" src="https://subastas.maxilana.com/rimage/products/<?php echo $catalog[0]['f_primary_image'] ?>.original.jpg"/>
      </div>
      <?php if(!empty($additional_image)){ 
                ?>
                <?php foreach ($additional_image as $valueimage) {?>
                      <?php if($valueimage['f_image_path']=="") { 
                       $contador = $contador + 1; ?>
                         <div class="swiper-slide">
                        <img  class="imgCelular"
                          id="<?php echo "imgAdd".$contador?>"
                          style="margin: auto;" src="<?php echo HOME_URL ?>rimage/no_image1.jpg" id="imagecat" border="0"></div>          			    
                      <?php } else {
                        $contador = $contador + 1;  ?>
                            <?php $imagecat = $valueimage['f_image_path']; ?>
                            <div class="swiper-slide"><img
                            class="imgCelular"
                             style="margin: auto;" src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" id="<?php echo "imgAdd".$contador?>" border="0"></div>            			    
                            <?php } ?>
                    <?php } ?>
        <?php } ?>
    </div>
 <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-black"></div>
    <div class="swiper-button-prev swiper-button-black"></div>

                    </form>
                </div>
                </div>
                </div>
                <div class="col-lg-4" style="border: 1px solid rgba(0,0,0,.125);border-radius:5px;" id="all">
                <div class="live_lot_desc" style="text-align:left; margin-top:10px;">
                <div style="height: 24px;">
                        <h5 translate="no" lang="es"
                        style="font-size:14px;" style="color: rgba(0,0,0,.45);"><span class="kw" translate="no" lang="es" id="title" >Lote | <?php echo $catalog[0]['f_number'] ?></span></h5>
                </div>
                <div>
                        <h5 translate="no" lang="es"
                        style="font-size:18px;"><span class="kw" translate="no" lang="es" id="title" ><?php echo $catalog[0]['f_title'] ?></span></h5>
                </div>
                <p class="m-0" style="margin-top:10px !important;" >Oferta inicial: $ <span id="numlote">	<?php echo number_format(floatval($catalog[0]['f_minimum_bid']),2)?><span></p>
                                
                <?php if($catalog[0]['f_status']=='1') :?>
                  <p class="m-0" >Oferta Actual: <span id="numlote" style="color:#00a650">$	<?php echo number_format(floatval($catalog[0]['f_current_bid']),2) ?><span></p>
                  <?php else :?>
                    <p class="m-0" >Oferta Final: <span id="numlote" style="color:#00a650">$	<?php echo number_format(floatval($catalog[0]['f_current_bid']),2) ?><span></p>
                <?php endif; ?>
                
                <p class="m-0" style="font-size:12px !important;margin-top:5px !important; text-align:right;">Número de ofertas: <b><?php echo $catalog[0]['totalofertas'] ?></b><a class="datahistory" data-data='<?php echo json_encode($catalog[0], JSON_NUMERIC_CHECK ) ?>' href="#HistoryOfer" style="color:#0070FF;" data-toggle="modal" data-target=".log-his"> [Historial]</a></p>
                <?php 
                if((int)$catalog[0]['f_current_bid'] <> 0){
                  $firstBid = ( (int)$catalog[0]['f_current_bid']+(int)$catalog[0]['f_bid_increment']);
                }else{
                  $firstBid = (int)$catalog[0]['f_minimum_bid'];
                }
                
                ?>


                <?php if ($catalog[0]['f_status'] =='1'): ?>
                 <?php if(isset($_SESSION['auction_brodcaster']['userid'] )):?>
                  <p style="margin-top:5px;text-align: center;width: 100%;font-size: 14px !important;" class="btn btn-primary btn-xs btn-script-bid" data-data='<?php echo json_encode($catalog[0], JSON_NUMERIC_CHECK ) ?>' data-bidamount='<?php echo $firstBid?>'><i class="fas fa-gavel"></i><?php echo(' '. number_format($firstBid,2))?></p>
                  <div id="Finaliza" class="text-center"><span>Inicia en:  <strong><span id="countdown" style="font-size: smaller;color:red;"> </span></strong></span></div>
                  <?php if($catalog[0]['f_selected'] == '1'): ?>
                    <div id="FinalizaenCerrado" style="display:none;" class="text-center"><span><strong><span id="countdown" style="color:green;">
                    <a href="<?php echo BASE_URL?>auction.php">Lote en vivo</a>  </span></strong></span></div>
                    <?php else: ?> 
                    <div id="FinalizaenCerrado" style="display:none;" class="text-center"><span><strong><span id="countdown" style="color:green;">
                    <a href="<?php echo BASE_URL?>auction.php">Evento iniciado</a>  </span></strong></span></div>
                  <?php endif; ?>
                    <?php else : ?>
                      <p style="margin-top:5px;text-align: center;width: 100%;font-size: 14px !important;" class="btn btn-primary btn-xs btn-script-login" data-data='<?php echo json_encode($catalog[0], JSON_NUMERIC_CHECK ) ?>' data-bidamount='<?php echo $firstBid?>'><i class="fas fa-user"></i> Iniciar sesión</p>
                        <div id="Finaliza" class="text-center"><span>Inicia en:  <strong><span id="countdown" style="font-size: smaller;color:red;"> </span></strong></span></div>
                        <?php if($catalog[0]['f_selected'] == '1'): ?>
                                <div id="FinalizaenCerrado" style="display:none;" class="text-center"><span><strong><span id="countdown" style="color:green;">Lote en vivo 
                                </span></strong></span></div>
                                <?php else: ?> 
                                <div id="FinalizaenCerrado" style="display:none;" class="text-center"><span><strong><span id="countdown" style="color:green;">Evento iniciado</span></strong></span></div>
                          <?php endif; ?>
                    <?php endif; ?>
                    <?php else: ?> 
                      <div id="FinalizaenCerrado" class="text-center"><span><strong><span id="countdown"> Lote adjudicado</span></strong></span></div>
                  <?php endif; ?>
                <hr>
                <p class="m-0" translate="no" style="margin-top:10px !important;"><strong>Descripción:</strong><br>
                <div class="decSpam">
               <span id="descrpcion"> <?php echo $catalog[0]['f_description'] ?></span></p>
                </div>
                </div> 
                </div>
            </div>
            <h1 style="font-size: 22px;
    text-align: left;
    font-weight: 200;
    color: #666;">Más lotes</h1>
            <div class="items" style="width: 90%;
    margin: 0px auto;
    margin-top: 10px">
            <?php if($catalogos) : ?>
              <?php foreach($catalogos as $key => $value): ?>
                <div class="col-lg-3 col-md-6 align-items-stretch" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"> 
                        <div class="member" style="    
  
  margin-bottom: 20px;
    overflow: hidden;
    text-align: center;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231)">
                            <div class="member-img">
                                <!-- <img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" class="img-fluid img-thumbnail" alt=""  style="width: auto;height: auto;text-align: center;vertical-align: middle">-->
                           
  <?php if($value['f_primary_image']==""){?>
            			    	<img src="<?php echo HOME_URL ?>rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 120px;text-align: center;vertical-align: middle">         			    
            			    	<?php }else{?>
            			    	
            			    		
            			    	           			    	
            			    	      <?php $imagecat = $value['f_primary_image'];?>
									  <?php if (file_exists("rimage/products/$imagecat.original.jpg")) { ?>
											 <a class="pop"rel="gallery" onclick='showMoreInfo(<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>)'> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" border="0"  style="
    max-width: 120px;
    max-height: 120px;;text-align: center;vertical-align: middle">
                                                </a>   			    
								<?php } else { ?>            			    		
											<img src="rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="
    max-width: 120px;
    max-height: 120px;text-align: center;vertical-align: middle">          			    
										<?php } ?>
								<?php } ?>
					

						   </div>
                            <div class="member-info text-left" style="margin: 10px;">
                                  <p class="m-0" style="font-size:14px !important">Lote: <?php echo $value['f_number']; ?></p>
                                  <p class="m-0" style="font-size:12px !important; white-space:initial; height: 50px;    overflow: hidden;
    text-overflow: ellipsis;" id="<?php echo $value['f_lots_id']?>" 
                                  title="<?php echo $value['f_title']; ?>"><?php echo $value['f_title']; ?></p>
                             
                                <spam style="display: inline-flex;width:100%;height: 20px;">
                                  <p style="font-size:10px;padding-right: 40px;">Oferta inicial: $<?php echo number_format(floatval($value['f_minimum_bid']),2); ?></p>
                                </spam>
                               
							        <?php 
							        if ($value['f_current_bid'] != ''){
							        	$askbid = floatval($value['f_current_bid']);
							        }else{
							        	$askbid = 0;
							        }
							        ?>

              <?php if($value['f_status']=='1') :?>
                  <p class="m-0" >Oferta Actual: <span id="numlote" style="color:#00a650">$	<?php echo number_format(floatval($value['f_current_bid']),2) ?><span></p>
                  <?php else :?>
                    <p class="m-0" >Oferta Final: <span id="numlote" style="color:#00a650">$	<?php echo number_format(floatval($value['f_current_bid']),2) ?><span></p>
                <?php endif; ?>
                                    
                                <p class="m-0" style="font-size:12px !important;">Número de ofertas: <b><?php echo $value['totalofertas'] ?></b><a class="datahistory" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>' href="#HistoryOfer" style="color:#0070FF;" data-toggle="modal" data-target=".log-his"> [Historial]</a></p>
                            </div>
                        </div>
                    </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <p style="text-align: right;"><a href="https://subastas.maxilana.com/evento.php?evento=<?php echo $catalog[0]['f_event']?>">Ver todo</a></p>
        </div>
        <button style="display:none" id="btnLogin" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".log-sign"></button>
  </main><!-- End #main -->
  <div class="modal fade bs-modal-lg log-his" id="HistoryModal" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <div class="modal-bodyHistory" style="padding: 0px 0 20px;"> 

      </div>
    </div>
    </div>
  </div>
      
  <script type="text/javascript">

var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
if (isMobile) {
  document.getElementById("listaImgADD").style.display="none";
  document.getElementById("img-container").style.display="none";
  $(document).ready(function(){
  $('.items').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  });
}else{
  $(document).ready(function(){
  $('.items').slick({
     infinite: true,
     slidesToShow: 4,
     slidesToScroll: 4
    });
  });
  document.getElementById("imagesCel").style.display="none";
  
}



var options1 = {
    width: 400,
    height:400,
    zoomWidth: 600,
    scale: 1.5
};

new ImageZoom(document.getElementById("img-container"), options1);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>

var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  })

$(document).ready(function(){
$(".imgAdicional").on('click',function(){
          var img = $(this).attr('src');
          var id = $(this).attr('id');
          id = "#li"+id;
          $("li").removeClass("on");
          $('#imgprincipal').attr('src',img);

          $(id).addClass("on");
          $(".js-image-zoom__zoomed-area").remove();
          $(".js-image-zoom__zoomed-image").remove();
          new ImageZoom(document.getElementById("img-container"), options1);
        });
      });
      $.ajax({          
                type: 'GET',                          
                url: '<?php echo BASE_URL ?>api/validarfechadeinicio.php?id=<?php echo $catalog[0]['f_event']?>',           
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
                                            document.getElementById("Finaliza").style.display="none";
                                            document.getElementById("FinalizaenCerrado").style.display="Block";
                                           }
                                        }
                                    }
                                }
                                span.text(" "+correctNum(dias)+" días "+correctNum(hora) + " horas " + correctNum(minutos) + " minutos " + correctNum(segundos)+" segundos ");
                            }, 1000);
                          }); 
                        })()
                    }else{
                        document.getElementById("Finaliza").style.display="none";
                        document.getElementById("FinalizaenCerrado").style.display="Block";
                    }
        }
    }    
  });

  function toJSDate (dateTime) {

var dateTime = dateTime.split(" ");//dateTime[0] = date, dateTime[1] = time

var date = dateTime[0].split("-");
var time = dateTime[1].split(":");

//(year, month, day, hours, minutes, seconds, milliseconds)
return new Date(date[0], date[1], date[2], time[0], time[1], time[2], 0);

}

$(document).ready(function(){

$('.datahistory').click(function(){
  
  var lotdata = $(this).data('data');
  var lotid = lotdata.f_lots_id;
  // AJAX request
  $.ajax({
   url: '<?php echo BASE_URL ?>api/consultahistorial.php',
   type: 'post',
   data: {id: lotid},
   success: function(response){ 
    var Content = '';
    Content= Content + '<div class="bid-history-info">';
        Content= Content + '<p>LOTE '+lotdata.f_number+'</p>'
        Content= Content + '<span>'+lotdata.f_title+'</span>'
        Content= Content + '<div class="price-area cc_cursor">'
        Content= Content + '<span>OFERTA INICIAL</span>'
        Content= Content + '<span>$ '+formatNumber(ponerdecimales(lotdata.f_minimum_bid.toString()))+'</span>'
        Content= Content + '</div>'
        Content= Content + '</div>'
        Content= Content + '<table class="bid-wrap cc_cursor">'
        Content= Content + '<colgroup>'
        Content= Content + ' <col width="100px;">'
        Content= Content + '<col width="122px;">'
        Content= Content + '<col width="198px;">'
        Content= Content + '</colgroup>'
        Content= Content + '<thead>'
        Content= Content + '<tr>'
        Content= Content + '<th>Paleta#</th>'
        Content= Content + '<th>Oferta</th>'
        Content= Content + '<th>Fecha</th>'
        Content= Content + '</tr>'
        Content= Content + '</thead>'
        Content= Content + '<tbody>'

    if(response == '[]'){
        Content= Content + '<tr class="no-bid-history"><td colspan="3"><p style="text-align: center; margin: 50px;">No hay ofertas para mostrar</p></td></tr>'
        Content= Content + '</tbody>'
        Content= Content + '</table>'
    }else{
        datahere =  jQuery.parseJSON(response); 
        
        for(var i = 0; i < datahere.length; i ++){
            Content= Content + '<tr>'
            Content= Content + '<td>'+datahere[i].paddle_number+'</td>'
            Content= Content + '<td>$ '+formatNumber(ponerdecimales(datahere[i].f_amount.toString()))+'</td>'
            Content= Content + '<td>'+datahere[i].f_date+'</td>'
            Content= Content + '</tr>'
        }
      
        
        Content= Content + '</tbody>'
        Content= Content + '</table>'
    }
     $('.modal-bodyHistory').html(Content);
     $('#HistoryModal').modal('show'); 
   }
 });
});
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
$(document).ready(function(){
  $(".btn-script-login").on('click',function(){
            var data = $(this).data('data');
      $( "#btnLogin" ).click();
  });
$(".btn-script-bid").on('click',function(){
    var data = $(this).data('data');
    var databidamount = $(this).data('bidamount');
    showBid(data,databidamount); 
});
}); 

function showBid(data,amount){
  Swal.fire({
  title: 'Estas seguro?',
  text: "Se ofertará la cantidad de : $"+formatNumber(ponerdecimales(amount.toString())) + "\n" + "a el Lote "+ data.f_number + " " + data.f_title,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
  confirmButtonColor: '#3085d6',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    datainfo={
      bidamount : amount ,
      lotid : data.f_lots_id,
      enviacorreo : '1',
    }
    
    $.ajax({          
    type: 'POST',
    data: datainfo,                          
    url: '<?php echo BASE_URL ?>api/bid.php',           
    success: function(result) {  
        datahere =  jQuery.parseJSON(result); 
        if(datahere.status=="200"){            
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'La oferta de a registrado con éxito.',
            showConfirmButton: false,
            timer: 1500,
            willClose: () => {
              reloadpages();
              }
          })
        }else{
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: datahere.message,
            })
        }
    }    
    });
  }
})

}
function reloadpages(){
  location.reload();
}
function showMoreInfo(data,type)
    {   
        window.location.href = "<?php echo HOME_URL ?>lotedetalle.php?id="+data.f_lots_id;
    }
</script>