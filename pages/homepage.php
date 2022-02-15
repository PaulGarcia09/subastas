<?php
    $datenow= date("Y-m-d");

    mysqli_set_charset($connect, 'utf-8');
    $sql ="select f_lots_id,f_title,f_number,f_description,f_start_date,f_event,f_primary_image,f_minimum_bid,f_reserve_bid,f_limitbid,f_bid_increment,f_current_bid,f_bid_user_name,l.f_date,f_bid_user,f_status,f_selected,f_message,f_nextlot,f_finalylot,f_typenext,f_order,COUNT(h.f_lot_id)as totalofertas from t_lots l left join t_lots_history h on l.f_lots_id=h.f_lot_id where l.f_start_date>='{$datenow}' and f_status = 1 GROUP by f_lots_id order by f_order,f_number asc";

    $catalog = $dbMaster->getResultAsAssoc($connect,$sql);

    $sqle ="select * from t_instituciones";

    $instituciones = $dbMaster->getResultAsAssoc($connect,$sqle);

    $sqlie="select * from t_events where f_start_date >= CURDATE() and f_status >0 order by f_events_id asc";
    $upcommingAuction = $dbMaster->getResultAsAssoc($connect,$sqlie);
    
?>
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

.modal-content{
  width: 480px !important;
}

@media screen and (max-device-width : 480px) {
    #cartaMember{
        margin:0 auto !important;
        margin-bottom:20px !important;
        width: 250px !important;
    }
    #eventsMember img{
        width: 250px !important;
        height: 100% !important;
    }
    #videoPlayer{
      display:none;
  }     

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
@media screen and (min-width: 768px) {
    #imgCentral{
    height:330px !important;
  }      
}
@media screen and (max-device-width: 1875px){
    #videoPlayer{
        display:none;
    }
}
.pop{
    cursor: pointer;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: "DM Sans", sans-serif;
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
#videoPlayer{
    position: fixed;
    bottom: 0;
    left: 0px;
    width: 380px;
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
</style>
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
        <!-- ======= Team Section ======= -->

      <div class="container">
        <div class="section-title py-4" style="margin-bottom:-20px;">
          <h1 style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;">Próximas subastas</h1>
        </div>
        <div class="row">
            <?php if(count($upcommingAuction) > 0): ?>
                <?php foreach ($upcommingAuction as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                    $dateformat = date("Y-m-d", strtotime($value['f_start_date']));
                ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" onclick="changeInfo('<?php echo $value['f_events_id']?>')">
                        <div class="member" id="cartaMember" style="    
                        width:200px;
                        margin-bottom: 20px;
    overflow: hidden;
    text-align: center;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231)">
                            <div class="member-img" id="eventsMember">
                                
								  <?php if($value['f_primary_image']==""){?>
            			    	<img src="<?php echo HOME_URL ?>rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">         			    
            			    	<?php }else{?>
            			    	
            			    		
            			    	           			    	
            			    	      <?php $imagecat = $value['f_primary_image'];?>
									  
									  <?php if (file_exists("rimage/products/$imagecat.original.jpg")) { ?>
											  <a class="pop" rel="gallery" onclick="showMoreInfo('<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>')"> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" border="0"  style="width: 200px;height:210px;text-align: center;vertical-align: middle">
                                                   </a>        			    
								<?php } else { ?>
									<?php if (file_exists("rimage/products/$imagecat.original.png")) { ?>
											  <a class="pop" rel="gallery" onclick="showMoreInfo('<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>')"> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.png';?>" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">
                                                </a>      			    
									<?php } else { ?>
										<?php if (file_exists("rimage/products/$imagecat.original.gif")) { ?>
											   <a class="pop" rel="gallery" onclick="showMoreInfo('<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>')"> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.gif';?>" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">
                                                     	 </a>       
										<?php } else { ?>            			    		
											<img src="rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">          			    
										<?php } ?>
									<?php } ?>
								<?php } ?>
					
            			    	<?php }?>
							  
								 
                            </div>
                               <div class="member-info">
                               <h5 class="text-center" style="font-size:13px !important;margin-top:10px;" id="<?php echo $value['f_lots_id']?>" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" title="<?php echo $value['f_title']; ?>"><?php echo $value['f_title']; ?></h5>
                                <small> <?php if(isset($_GET['status'])) $status = $_GET['status'];
                                    if($value['f_eventtype'] == '1'){
                                        echo 'Subasta en vivo';
                                    }else{
                                        echo 'Finaliza:';
                                    }
                                ?> <?php 
                                setlocale(LC_TIME, "spanish");
                                $mi_fecha = $value['f_start_date'];
                                $mi_fecha = str_replace("/", "-", $mi_fecha);			
                                $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));				
                                $Mes_Anyo = strftime("%a, %d de %b de %Y", strtotime($Nueva_Fecha));
                                echo utf8_encode($Mes_Anyo)
                                ?></small>
                                 <br>
                                 <?php 
                                    $file = 'catalogos/catalogo'.$value['f_start_date'].'.pdf'; 
                                    if(file_exists($file)) { 
                                        $url=$file;
                                    ?>
                                    <a target="_blank" href="<?php echo $url?>"><?php echo $exists?> Ver catálogo</a>
                                <br>
                                <a download="<?php echo 'Catálogo subasta '.$value['f_start_date']?>" href="<?php echo $url?>">Descargar catálogo</a>
                                        <?php   }?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
            <?php if(count($nextAuc) > 0): ?>
                <?php foreach ($nextAuc as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                    $dateformat = date("Y-m-d", strtotime($value['f_date']));
                ?>
        
                <?php endforeach; ?>
            <?php endif; ?>
 
        
        <?php if(count($upcommingAuction) > 0): 
            $entrada = 0;?>

<p align="center">

 <!-- <video id="videoPlayer" width="640" height="360" controls muted loop autoplay>
  <source src="videos/start.mp4" type="video/mp4">
  <source src=".ogg" type="video/ogg">
 Su navegador no soporta el video.
</video> -->
 </p>


        <div class="section-title py-1 px-lg-1">
        <h1 style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;">Lotes</h1>
        </div>
        <div class="AllFormat" id="<?php echo "allFormat".$value2['f_events_id'] ?>">
        <?php if($upcommingAuction[0]['f_eventtype'] == '2'){ ?>

      
            <div id="Finaliza" class="text-center"><span style="font-size:24px;">Finaliza en:  <strong><span style="font-size:24px;" id="countdown">  </span></strong>
            <br><?php  
                                            setlocale(LC_TIME, "spanish");
                                            $mydate = $value['f_start_date'];
                                            $mydate = str_replace("/", "-", $mydate);			
                                            $newfecha = date("d-m-Y", strtotime($mydate));				
                                            $diaexacto = strftime("%a, %d de %b", strtotime($newfecha));
                                            echo utf8_encode(ucfirst($diaexacto). " a las " .$value['horafin']." (Hora sinaloa) ")
            
            ?></span></div>
        <div id="FinalizaenCerrado" style="display:none;" class="text-center"><span><strong><span id="countdown"> Evento finalizado </span></strong></span></div>
    <?php }
    else{?>
        <div id="Finaliza" class="text-center"><span style="font-size:24px;">Inicia en:  <strong><span style="font-size:24px;" id="countdown"> </span></strong></span></div>
        <div id="FinalizaenCerrado" style="display:none;" class="text-center"><span><strong><span id="countdown"> Evento iniciado </span></strong></span></div>
 <?php } ?>
        <?php $Subasta = $upcommingAuction[0]['f_events_id']; ?>
            <?php   
                $lotes = array();
                    foreach ($catalog as $key => $prelot){
                    if($prelot['f_event'] == $Subasta){
                    array_push($lotes,$prelot);
                    }
                }
            ?>

        <div class="row" style="margin-top:10px;">
            <?php if(count($lotes) > 0): ?>
                <?php foreach ($lotes as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                ?>
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
					

						   </div>
                            <div class="member-info text-left" style="margin: 10px;">
                                  <p class="m-0" style="font-size:14px !important">Lote: <?php echo $value['f_number']; ?></p>
                                  <p class="m-0" style="font-size:12px !important; white-space:initial; height: 50px;    overflow: hidden;
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

                                <p class="m-0" style="font-size:12px !important;">Oferta actual: $  <strong> <?php echo number_format($askbid, 2); ?></strong></p>
                                    
                                <p class="m-0" style="font-size:12px !important;">Número de ofertas: <b><?php echo $value['totalofertas'] ?></b><a class="datahistory" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>' href="#HistoryOfer" style="color:#0070FF;" data-toggle="modal" data-target=".log-his"> [Historial]</a></p>
                                <div class="absolute-bottom" style="ext-align: center;width: 100%;}">
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


                                   
                                </div>
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
        <div>
            <div class="section-title py-1 px-lg-1">
        <h1 style="font-size: 26px;
    text-align: center;
    font-weight: 300;
    color: #666;">Instituciones de apoyo</h1>
        </div>
        <div class="AllFormat">
        <div class="row">
        
        <?php foreach ($instituciones as $key => $ints): ?>
        <div class="col-lg-3 col-md-6 align-items-stretch" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"> 
            <div class="member" style="text-align: center;">
                <div class="member-img">
                    <img src="https://subastas.maxilana.com/assets/img/instituciones/<?php echo $ints['imagen']?>"/>
                </div>
                <div class="member-info text-center">
                 <a target="_blank" href="<?php echo $ints['sitioweb']?>"> <?php echo $ints['nombre']?> </a>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
        </div>
            </div>
        </div>
            <?php endif; ?>
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



    <!-- ======= About Section ======= -->
      <div class="container">

        <div class="row">

        <?php echo $pages['about_us'] ?>
          

        </div>

      </div>
      

    <!-- ======= Contact Section ======= -->
      <div class="container">

        <?php echo $pages['contact_us'] ?>

      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script type="text/javascript">
var videoPlayer = document.getElementById('videoPlayer');
var myInterval =  setTimeout(() => {
    validarvideo();
}, 5000);


function validarvideo(){
    
    var videoElement = document.querySelector('video');

    if (!videoElement.paused) {
        myStopFunctionInterval();
    }else{
        videoPlayer.play();
        videoPlayer.firstChild.nodeValue = 'Pause';

    }
    
}
function myStopFunctionInterval() {
  clearInterval(myInterval);
}

  var subastas = <?php echo json_encode($upcommingAuction) ?>;


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



var valuJson = <?php echo json_encode($catalog) ?>;
var slideIndex = 1;

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
    function showBid(data,type)
    {
        window.location.href = "<?php echo HOME_URL ?>lotedetalle.php?id="+data.f_lots_id;
    }
    function showMoreInfo(data,type)
    {   
        window.location.href = "<?php echo HOME_URL ?>lotedetalle.php?id="+data.f_lots_id;
    }
    function MostrarModal(data,type,imgAdd){
        var url='';
        var contentPreview='<div class="mySlides" style="width:100%">'
        contentPreview = contentPreview + '<img id="imgPopUp" src="<?php echo HOME_URL ?>rimage/products/'+data.f_primary_image+'.original.jpg" class="popupimg" alt="">'
        contentPreview = contentPreview + '</div>';
        if(imgAdd.length >0){
            for(var i = 0 ; i < imgAdd.length ; i ++ ){
                var urlBase = '<?php echo HOME_URL ?>';
                if(UrlExists(urlBase+'rimage/products/'+imgAdd[i].f_image_path+'.original.jpg')){
                url = urlBase+'rimage/products/'+imgAdd[i].f_image_path+'.original.jpg';
                }

                else if(UrlExists(urlBase+'rimage/products/'+imgAdd[i].f_image_path+'.original.png')){
                url = urlBase+'rimage/products/'+imgAdd[i].f_image_path+'.original.png'
                }
                else if(UrlExists(urlBase+'rimage/products/'+imgAdd[i].f_image_path+'.original.gif')){
                url = urlBase+'rimage/products/'+imgAdd[i].f_image_path+'.original.gif'
                }
                contentPreview = contentPreview +'<div class="mySlides" style="display:none;">';
                contentPreview = contentPreview + '<img id="imgPopUp" src="'+url+'" class="popupimg" alt="">'
                contentPreview = contentPreview + '</div>'
            }

        }


           var HtmlContent = "<div class='container-fluid' style='heigth:500px;'>";
           HtmlContent = HtmlContent +"<div class='row'>";
           HtmlContent = HtmlContent +'<div class="col-12">';
           HtmlContent = HtmlContent +'<form id="bidDetails" class="formName">';
           HtmlContent = HtmlContent +"<div class='row'>";
           HtmlContent = HtmlContent +'<div class="col d-flex align-items-stretch">';
           HtmlContent = HtmlContent +'<div class="member">';
           HtmlContent = HtmlContent +'<div class="member-img">'+contentPreview+'</div>';
           HtmlContent = HtmlContent +'<div class="container" >';
           HtmlContent = HtmlContent +'<a class="prev" style="position: absolute;left: 10px;top: 90px;" onclick="plusSlides(-1)">❮</a>';
           HtmlContent = HtmlContent +'<a class="next" style="position: absolute;rigth: 10px;top: 90px;"  onclick="plusSlides(1)">❯</a>';
           HtmlContent = HtmlContent +'</div>';
           HtmlContent = HtmlContent +'<div class="member-info text-left">';
           HtmlContent = HtmlContent +'<h5 class="text-center" style="font-size:16px;">'+data.f_title+'</h5>';
           HtmlContent = HtmlContent +'<p class="m-0"><strong>Lote:</strong>'+data.f_number+'</p>';
           HtmlContent = HtmlContent +'<p class="m-0"><strong>Descripción</strong></p>';
           HtmlContent = HtmlContent +'<p class="m-0">'+data.f_description+'</p>';
           HtmlContent = HtmlContent +'</div>';
           HtmlContent = HtmlContent +'</div>';
           HtmlContent = HtmlContent +'</div>';
           HtmlContent = HtmlContent +'</div>';
           HtmlContent = HtmlContent +'</form>';
           HtmlContent = HtmlContent +'</div>';
           HtmlContent = HtmlContent +'</div>';
           HtmlContent = HtmlContent +'</div>';
            document.getElementById("bodyImage").innerHTML = HtmlContent;	
            AbrirModal();
    }

    function AbrirModal(){
    $('#imagemodal').modal('show')
}
    function plusSlides(n) {
  showSlides(slideIndex += n);
}

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
function toJSDate (dateTime) {

var dateTime = dateTime.split(" ");//dateTime[0] = date, dateTime[1] = time

var date = dateTime[0].split("-");
var time = dateTime[1].split(":");

//(year, month, day, hours, minutes, seconds, milliseconds)
return new Date(date[0], date[1], date[2], time[0], time[1], time[2], 0);

}
function changeInfo(date){
   window.location.href="<?php echo BASE_URL ?>evento.php?evento="+date;
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


