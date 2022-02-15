<style>
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
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
@media screen and (max-device-width : 480px) {
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
  .modal-body{
    width:350px !important;
  }
  .modal-bodyHistory{
    width:350px !important;
  }
  .modal-content{
      width:100% !important;
  }
}
@media screen and (min-width: 768px) {
    .jconfirm .jconfirm-box div.jconfirm-content-pane .jconfirm-content img{
        height:70% !important;
        width:70% !important;
        margin:auto;
    }        
}

.moda-bodyHistory{
    width: 560px !important;
}
body.modal-open {
overflow: visible !important;
}

table.bid-wrap tbody td {
    text-align: center;
    padding: 10px 0;
    line-height: 1;
    font-family: sans-serif;
    font-weight: 400;
    font-size: 14px;
    color: #0e0e0e;
}
table.bid-wrap th {
    font-family: sans-serif;
    font-weight: 400;
    font-size: 14px;
    color: #0e0e0e;
    line-height: 1;
    background: inherit;
    text-align: center;
    padding-bottom: 10px;
}
table.bid-wrap {
    background: inherit;
    padding: 24px 35px 0 30px;
    margin: 0 auto;
    display: block;
}
table.bid-wrap tbody {
    height: 170px;
    width: 100%;
    border: 1px solid #e0e0e0;
    display: inline-table;
    overflow-y: auto;
}
/*Bid History Popup*/
.bid-history-info {background-color: #f0f0f0;padding: 20px 28px;}
.bid-history-form .modal-body {padding: 34px 0 20px;}
.bid-history-info p {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;padding-bottom: 7px;}
.bid-history-info span {font-family: sans-serif;font-weight: 300;font-size: 20px;line-height: 1.2;color: #0e0e0e;}
.bid-history-info .price-area {padding-top: 18px;}
.bid-history-info .price-area span:first-child {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #999;}
.bid-history-info .price-area span:last-child {font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;padding-left: 20px;}
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
</style><script>
</script>
  <main id="main" style="margin-top:20px !important;">
        <!-- ======= Team Section ======= -->
      <div class="container">

        <div class="section-title py-1 px-lg-1">
          <h2 style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;"><?php echo $events[0]['f_title']?></h2>
        </div>
        <div tabindex="-1" class="modal fade" id="imagemodal" role="dialog">
								  <div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header" style="background-color: white;border-color: white;">
										<button class="close" type="button" data-dismiss="modal">×</button>
										
									</div>
									<div class="modal-bodyImage" id="bodyImage" style="background-color: white;
    border-color: white;">
									</div>
									<div class="modal-footer" style="background-color: white;border-color: white;">
										<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
									</div>
								   </div>
					</div>
			</div>
        <div class="AllFormat">
          <div class="col-lg-12 col-md-12" style="margin-top:10px;">
            <div class="row" >
              <?php if(count($catalog) > 0): ?>
                  <?php foreach ($catalog as $key => $value):
                      $imagecat = $value['f_primary_image'];
                  ?>
                      <div class="col-lg-3 col-md-4">
                          <div class="member" style="    
  margin-bottom: 20px;
    overflow: hidden;
    text-align: center;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231)">
                              <div class="member-img">
                              <?php if($value['f_primary_image']==""){?>
            			    	<img src="<?php echo HOME_URL ?>rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">         			    
            			    	<?php }else{?>
            			    	
            			    		
            			    	           			    	
            			    	      <?php $imagecat = $value['f_primary_image'];?>
									  <?php if (file_exists("rimage/products/$imagecat.original.jpg")) { ?>
											 <a class="pop"rel="gallery" onclick='showMoreInfo(<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>)'> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" border="0"  style="
    max-width: 240px;
    max-height: 240px;;text-align: center;vertical-align: middle">
                                                </a>   			    
								<?php } else { ?>            			    		
											<img src="rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="
    max-width: 240px;
    max-height: 240px;text-align: center;vertical-align: middle">          			    
										<?php } ?>
								<?php } ?>
					
							  
							
                                 <?php 
                                 $id_user = $value['f_bid_user'];
                                 $sql ="select * from t_customer where f_customer_id = '{$id_user}'";
                                 $pdlnumber = $dbMaster->getRowAsAssoc($connect,$sql);


                                 ?>
                              </div>
                              <div class="member-info text-left" style="margin: 10px;">

                              <p class="m-0" style="font-size:14px !important">Lote: <?php echo $value['f_number']; ?></p>
                                  <p class="m-0" style="font-size: 12px !important;
    white-space: initial;
    height: 50px;
    overflow: hidden;
    text-overflow: ellipsis;" id="<?php echo $value['f_lots_id']?>" 
                                  title="<?php echo $value['f_title']; ?>"><?php echo $value['f_title']; ?></p>
                                  <spam style="display: inline-flex;width:100%;height: 20px;">
                                  <p style="font-size:10px;padding-right: 40px;">Oferta inicial: $<?php echo number_format(floatval($value['f_minimum_bid']),2); ?></p>
                                  <p style="font-size:10px;"><?php echo $value['f_start_date']; ?></p>
                                </spam>
                               
							        <?php 
							        if ($value['f_current_bid'] != ''){
							        	$askbid = floatval($value['f_current_bid']);
							        }else{
							        	$askbid = 0;
							        }
							        ?>
                                    <?php if($value['f_status']=='1') :?>
                                      <p class="m-0" style="font-size:12px !important;">Oferta actual: $  <strong> <?php echo number_format($askbid, 2); ?></strong></p>
                                    <?php else: ?>
                                      <p class="m-0" style="font-size:12px !important;">Vendido en: $  <strong> <?php echo number_format($askbid, 2); ?></strong></p>
                                    <?php endif; ?>
                                    <p class="m-0" style="font-size:12px !important;">Número de ofertas: <b><?php echo $value['totalofertas'] ?></b><a class="datahistory" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>' href="#HistoryOfer" style="color:#0070FF;" data-toggle="modal" data-target=".log-his"> [Historial]</a></p>
                                  <?php if(isset($_GET['status'])): ?>
                                    <?php if($_GET['status'] == "completed"): ?>
                                      <a class="btn btn-info btn-xs btn-block text-white btn-script-view" href="https://subastas.maxilana.com/lotedetalle.php?id=<?php echo $value['f_lots_id']?>"><i class="fas fa-eye"></i> Ver</a>
                                    <?php else: ?>
									<?php


									if($value['f_selected']==1){ ?>
										 <p style="font-size:12px;" class=" blink_me  btn btn-success btn-xs btn-script-bid" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>'><i class="fas fa-gavel fa-pulse"></i> Ofertar</p>
									
									<?php
									}else{
									if($value['f_start_date']!=$datenow){
										
										
												if($value['f_start_date']>$datenow){
										?>
									
									 <p class="btn btn-primary btn-xs btn-block btn-script-bid" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>'><i class="fas fa-gavel"></i> Ofertar</p>
									
									<?php }else{?>
									 <p style="cursor: not-allowed;" class="btn btn-dark btn-xs btn-block"><i class="fas fa-gavel"></i> Ofertar</p>
									
									<?php }}else{?>

                                        <?php 
                                    if($value['f_status'] == '1'){ 
                                        if(isset($_SESSION['auction_brodcaster'])){
                                            $goto_bid = 'bid';
                                        }else{
                                            $goto_bid = 'login';
                                        }?>
                                        <p style="margin-top:5px;text-align: center;width: 100%;font-size: 14px !important;}" class="btn btn-primary btn-xs btn-script-bid" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>'><i class="fas fa-gavel"></i> Ofertar</p>
                                    
                                   <?php } ?>
									<?php }}?>
									
                                       
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <?php 
                                    if(isset($_SESSION['auction_brodcaster'])){
                                        $goto_bid = 'bid';
                                    }else{
                                        $goto_bid = 'login';
                                    }
                                    ?>
                                <?php 
                                    if($value['f_status'] == '1'){ ?>
                                        <p style="margin-top:5px;text-align: center;width: 100%;font-size: 14px !important;}" class="btn btn-primary btn-xs btn-script-bid" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>'><i class="fas fa-gavel"></i> Ofertar</p>
                                    
                                   <?php } ?>
                                  <?php endif; ?>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
              <?php else: ?>
              <div class="col">
                <div class="text-center"><h2>Información no disponible</h2></div>
              </div>
              <?php endif; ?>
            </div>
            </div>
            </div>

      </div>
      <div class="modal fade bs-modal-lg log-his" id="HistoryModal" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 480px;">
        <div class="modal-header" style="background-color:white;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-bodyHistory" style="padding: 0px 0 20px;"> 

      </div>
    </div>
    
  </div>




  </main><!-- End #main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script type="text/javascript">

var iduser;
var slideIndex = 1;
iduser = '<?php echo ($_SESSION['auction_brodcaster']['paleta'])?>';
var valuJson = <?php echo json_encode($catalog) ?json_encode($catalog) : [] ?>;

    $(document).ready(function(){

        $(".btn-script-login").on('click',function(){
            var data = $(this).data('data');
            $( ".login" ).click();
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
   
    function toJSDate (dateTime) {

var dateTime = dateTime.split(" ");//dateTime[0] = date, dateTime[1] = time

var date = dateTime[0].split("-");
var time = dateTime[1].split(":");

//(year, month, day, hours, minutes, seconds, milliseconds)
return new Date(date[0], date[1], date[2], time[0], time[1], time[2], 0);

}
function showBid(data,type)
    {
        window.location.href = "<?php echo HOME_URL ?>lotedetalle.php?id="+data.f_lots_id;
    }
    function plusSlides(n) {
  showSlides(slideIndex += n);
}
console.log(<?php echo $USUARIOS_ACTIVOS?>);
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    if(http.status!=404){
        return true;
    }else{
        return false;
    }
    
}
function showMoreInfo(data,type)
    {   
        window.location.href = "<?php echo HOME_URL ?>lotedetalle.php?id="+data.f_lots_id;
    }

function changeInfo(date){
    for (var i = 0; i < subastas.length; i++){
        document.getElementById("allFormat"+subastas[i]['f_events_id']).style.display="none";
    }
    document.getElementById("allFormat"+date).style.display="block";
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
</script>
