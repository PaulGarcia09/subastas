<?php
    $datenow= date("Y-m-d");

    mysqli_set_charset($connect, 'utf-8');
    $sql ="select f_lots_id,f_title,f_number,f_description,f_start_date,f_event,f_primary_image,f_minimum_bid,f_reserve_bid,f_limitbid,f_bid_increment,f_current_bid,f_bid_user_name,l.f_date,f_bid_user,f_status,f_selected,f_message,f_nextlot,f_finalylot,f_typenext,f_order,COUNT(h.f_lot_id)as totalofertas from t_lots l left join t_lots_history h on l.f_lots_id=h.f_lot_id where l.f_start_date>='{$datenow}' GROUP by f_lots_id order by f_order asc";

    $catalog = $dbMaster->getResultAsAssoc($connect,$sql);

    $sqle = "SELECT * FROM `t_events` order by f_events_id ASC"
    $eventoscom  =$dbMaster->getResultAsAssoc($connect,$sqle);
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
#imgPopUp{
    margin-left:0px !important;
    height: 250px !important;
}
}
.pop{
    cursor: pointer;
}
</style>
<div tabindex="-1" class="modal fade" id="imagemodal" role="dialog">
								  <div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header">
										<button class="close" type="button" data-dismiss="modal">×</button>
										
									</div>
									<div class="modal-body">
										<img src="" class="imagepreview" style="width:100%;object-fit: contain;border-style: solid; border-width: 2px; border-color:black;background-color:black">
                                        <p class="m-0" id="pTItulo"></p>
									</div>
									<div class="modal-footer">
										<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
									</div>
								   </div>
					</div>
			</div>
  <main id="main">
        <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg bg-white">
      <div class="container">
   <div class="row">
            <?php if(count($nextAuc) > 0): ?>
                <?php foreach ($nextAuc as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                    $dateformat = date("Y-m-d", strtotime($value['f_start_date']));
                ?>
                    <div class="col-lg-12 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                      <div class="member" style="width: 100%;padding: 20px;margin-top: 20px;box-shadow: 0px 2px 15px #f2592a;">
                            <div class="row">
							
							<div class=" col-lg-3 member-img  ">
                                <!-- <a href='javascript:void(0)' class="btn-script-view" data-data='<?php echo json_encode($value) ?>'> -->
                                    <a class="pop" rel="gallery">
                                    <img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" class="img-fluid img-thumbnail" alt="" style="width: auto;height: 190px;text-align: center;vertical-align: middle">
                                </a><!-- <div class="d-flex align-items-center blink_me p-2">
							 
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="catalog.php?catdate=<?php echo $dateformat ?>#team" class="btn-get-started scrollto  ">Next Auctions</a>
      </div> -->
                            </div>
							
                            <div class="col-lg-9 text-center member-info"> <a href="catalog.php">
                                <h1 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" title="<?php echo $value['f_title']; ?>"><?php echo $value['f_title']; ?></h1>
                                <h4>
                                <?php
                                if($value['f_eventtype'] == '1'){
                                        echo 'Subasta en vivo';
                                    }else{
                                        echo 'Finaliza:';
                                    }
                                ?>
                                
                                <?php 
                                          setlocale(LC_TIME, "spanish");
                                          $mi_fecha = $value['f_start_date'];
                                          $mi_fecha = str_replace("/", "-", $mi_fecha);			
                                          $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));				
                                          $Mes_Anyo = strftime("%A, %d de %B de %Y", strtotime($Nueva_Fecha));
                                          echo ($Mes_Anyo)
                                ?></h2>
                                <p class="text-left pt-5" class="text-left"style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"  title="<?php echo $value['f_description']; ?>"><?php echo $value['f_description']; ?></p>
                           </a> </div> 
							
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div> 
        <div class="section-title py-5 px-lg-5">
          <h2 data-aos="fade-up">Próximas subastas</h2>
        </div>
        <div class="row">
            <?php if(count($eventoscom) > 0): ?>
                <?php foreach ($eventoscom as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                    $dateformat = date("Y-m-d", strtotime($value['f_start_date']));
                ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" onclick="changeInfo('<?php echo $value['f_events_id']?>')" data-aos="fade-up">
                        <div class="member" style="width: 100%;">
                            <div class="member-img">
                                
								  <?php if($value['f_primary_image']==""){?>
            			    	<img src="<?php echo HOME_URL ?>rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">         			    
            			    	<?php }else{?>
            			    	
            			    		
            			    	           			    	
            			    	      <?php $imagecat = $value['f_primary_image'];?>
									  
									  <?php if (file_exists("rimage/products/$imagecat.original.jpg")) { ?>
											  <a class="pop" rel="gallery" onclick="showMoreInfo('<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>')"> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">
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
                               <h5 class="text-left" style="font-size:13px !important;" id="<?php echo $value['f_lots_id']?>" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" title="<?php echo $value['f_title']; ?>"><?php echo $value['f_title']; ?></h5>
                                <small style="color:#B8B6B6;font-style: italic;"> <?php if(isset($_GET['status'])) $status = $_GET['status'];
                                    if($value['f_eventtype'] == '1'){
                                        echo 'Subasta en vivo';
                                    }else{
                                        echo 'Finaliza:';
                                    }
                                ?><br> <?php 
                                setlocale(LC_TIME, "spanish");
                                $mi_fecha = $value['f_start_date'];
                                $mi_fecha = str_replace("/", "-", $mi_fecha);			
                                $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));				
                                $Mes_Anyo = strftime("%A, %d de %B de %Y", strtotime($Nueva_Fecha));
                                echo ($Mes_Anyo)
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
 
        
        <?php if(count($eventoscom) > 0): 
            $entrada = 0;?>

        <div class="section-title py-5 px-lg-5">
        <h2 data-aos="fade-up">Pre ofertas en lotes</h2>
        </div>

        <?php foreach ($eventoscom as $key => $value2): 
        $dateformat = date("Y-m-d", strtotime($value2['f_start_date'])); ?>
        <div class="AllFormat" id="<?php echo "allFormat".$value2['f_events_id'] ?>" style="display: none;">
        <div class="text-center"><span>Finaliza en:  <strong><span id="countdown"> 14 días 08 horas 25 minutos 07 segundos </span></strong></span></div>
        <?php $Subasta = $value2['f_events_id']; ?>
            <?php   
                $lotes = array();
                    foreach ($catalog as $key => $prelot){
                    if($prelot['f_event'] == $Subasta){
                    array_push($lotes,$prelot);
                    }
                }
            ?>

        <div class="row">
            <?php if(count($lotes) > 0): ?>
                <?php foreach ($lotes as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                ?>
                    <div class="col-lg-3 col-md-6 align-items-stretch" data-aos="fade-up" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"> 
                        <div class="member" style="min-height: 95%;width: 100%;">
                            <div class="member-img">
                                <!-- <img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" class="img-fluid img-thumbnail" alt=""  style="width: auto;height: auto;text-align: center;vertical-align: middle">-->
                           
  <?php if($value['f_primary_image']==""){?>
            			    	<img src="<?php echo HOME_URL ?>rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">         			    
            			    	<?php }else{?>
            			    	
            			    		
            			    	           			    	
            			    	      <?php $imagecat = $value['f_primary_image'];?>
									  <?php if (file_exists("rimage/products/$imagecat.original.jpg")) { ?>
											 <a class="pop"rel="gallery" onclick='showMoreInfo(<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>)'> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">
                                                </a>   			    
								<?php } else { ?>            			    		
											<img src="rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">          			    
										<?php } ?>
								<?php } ?>
					

						   </div>
                            <div class="member-info text-left">
                                  <h4 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-size:14px !important" id="<?php echo $value['f_lots_id']?>" 
                                  title="<?php echo $value['f_title']; ?>"><?php echo $value['f_title']; ?></h4>
                                  <p class="m-0"><strong>Lote:</strong> <?php echo $value['f_number']; ?></p>
                                  <p class="m-0" style="font-size:12px !important;" >Oferta inicial: $<?php echo number_format(floatval($value['f_minimum_bid']),2); ?></p>
                                <small 
                                style="font-style: italic;
                                font-size: 12px;
                                line-height: 26px;
                                color: #656262;">Finaliza: 
                                <?php 
                                  setlocale(LC_TIME, "spanish");
                                  $mi_fecha = $value['f_start_date'];
                                  $mi_fecha = str_replace("/", "-", $mi_fecha);			
                                  $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));				
                                  $Mes_Anyo = strftime("%a, %d de %b de %Y", strtotime($Nueva_Fecha));
                                  echo ($Mes_Anyo)
                                  ?>
                                </small>
                               
							        <?php 
							        if ($value['f_current_bid'] != ''){
							        	$askbid = floatval($value['f_current_bid']);
							        }else{
							        	$askbid = 0;
							        }
							        ?>

                                <p class="m-0" style="font-size:12px !important;">Oferta actual: $  <b> <?php echo number_format($askbid, 2); ?></b></p>
                                    
                                <p class="m-0" style="font-size:12px !important;">Numero de ofertas: <b><?php echo $value['totalofertas'] ?></b><a class="datahistory" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>' href="#HistoryOfer" data-toggle="modal" data-target=".log-his"> [Historial]</a></p>
                                <div class="absolute-bottom" style="ext-align: center;width: 100%;}">
                                    <?php 
                                    if(isset($_SESSION['auction_brodcaster'])){
                                        $goto_bid = 'bid';
                                    }else{
                                        $goto_bid = 'login';
                                    }
                                    ?>
                                    <p style="margin-top:5px;text-align: center;width: 100%;font-size: 14px !important;}" class="btn btn-warning btn-xs btn-script-<?php echo $goto_bid ?>" data-data='<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>'><i class="fas fa-gavel"></i> Ofertar</p>
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
        <?php endforeach; ?>
        </div>
            <?php endif; ?>
      </div>

      <div class="modal fade bs-modal-lg log-his" id="HistoryModal" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 480px !important;">
        <div class="modal-header" style="background-color:white;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body" style="padding: 0px 0 20px;"> 

      </div>
    </div>
    
  </div>
    </section><!-- End Team Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row">

        <?php echo $pages['about_us'] ?>
          

        </div>

      </div>
      
    </section><!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <?php echo $pages['contact_us'] ?>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script type="text/javascript">
  var subastas = <?php echo json_encode($eventoscom) ?>;

  if(subastas.length > 0){
    document.getElementById("allFormat"+subastas[0]['f_events_id']).style.display="block";
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
                              segundos--;
                                if(segundos == -1) {
                                  segundos = 59;
                                  minutos--;
                                  
                                    if(minutos == -1) {
                                      minutos = 59;
                                      hora--;
                                      
                                        if(hora==-1) {
                                           dias --;
                                           if(dias== -1){;
                                           }
                                        }
                                    }
                                }
                                span.text(" "+correctNum(dias)+" días "+correctNum(hora) + " horas " + correctNum(minutos) + " minutos " + correctNum(segundos)+" segundos ");
                            }, 1000);
                          }); 
                        })()
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
    function showPopIt(data)
    {
        baseUrl = '<?php echo BASE_URL ?>';

        $.confirm({
            title: '',
            columnClass: 'medium',
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName">
                            <div class='row'>
                                    <div class="col">   
                                        <div class="form-group" style="text-align: center;">
                                        <p style="text-align: center;color:#acacac;">Iniciar sesión</p>
                                        <img src="https://subastas.maxilana.com/assets/img/logo%20subastasN.png" style="text-align: center;
                                        height: 50px;
                                        margin: 0 auto;" alt="Subasas MAxilana">
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col">   
                                        <div class="form-group">
                                            <label>Nombre de usuario o correo electrónico</label>
                                            <input type="text" 
                                            style="
                                            width: 100%;
                                            background-color: #f0f0f0;
                                            margin: 10px 0;
                                            height: 40px;
                                            border-radius: 55px;
                                            display: grid;
                                            grid-template-columns: 15% 85%;
                                            padding: 0 0.4rem;"
                                            
                                            name="username" required value="" placeholder="" class="f form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input 
                                            style="
                                            width: 100%;
                                            background-color: #f0f0f0;
                                            margin: 10px 0;
                                            height: 40px;
                                            border-radius: 55px;
                                            display: grid;
                                            grid-template-columns: 15% 85%;
                                            padding: 0 0.4rem;"
                                            type="password" name="password" required value="" placeholder="" class="f form-control"  />
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

    function showBid(data,type)
    {
        if(data.f_current_bid != ''){
            askbid = (data.f_current_bid+data.f_bid_increment);
        }else{
            askbid = data.f_minimum_bid;
        }
        baseUrl = '<?php echo BASE_URL ?>';        
        dNone = "";
        title = "OFERTA";
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
                                              <img src="<?php echo HOME_URL ?>rimage/products/`+data.f_primary_image+`.e.jpg" class="popupimg" alt="">
                                          </div>
                                          <div class="member-info text-left">
                                              <h5 class="text-center" style="font-size:16px;">`+data.f_title+`</h5>
                                              <p class="m-0"><strong>Lote:</strong> `+data.f_number+`</p>
                                              <p class="m-0"><strong>Descripción</strong></p>
                                              <p class="m-0">`+data.f_description+`</p>
                                              <p class="m-0 `+dNone+`">Oferta actual: `+ formatDollar(f_current_bid) +`</p>
                                              <div class="form-group mt-4 `+dNone+`">
                                                <label class="font-weight-bold">Sugerido:</label> 
                                                <span> `+ formatDollar(askbid) +`</span>
                                              </div>
                                              <div class="form-group `+dNone+`">
                                                <label>Oferta</label>
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
                    text: 'OFERTAR',
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
    function showMoreInfo(data,type)
    {   
        infoLote={
            id : data.f_lots_id
        };
            $.ajax({          
            type: 'POST',
            data: infoLote,                          
            url: '<?php echo BASE_URL ?>api/ImgenAditional.php',           
            success: function(result) {  
            datahere =  jQuery.parseJSON(result);
                MostrarModal(data,type,datahere);
            }    
            });
    }
    function MostrarModal(data,type,imgAdd){
        var url='';
        var contentPreview='<div class="mySlides" style="width:100%">'
        contentPreview = contentPreview + '<img id="imgPopUp" style="margin-left: 40px;" src="<?php echo HOME_URL ?>rimage/products/'+data.f_primary_image+'.original.jpg" class="popupimg" alt="">'
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
                contentPreview = contentPreview + '<img id="imgPopUp" style="margin-left: 40px;" src="'+url+'" class="popupimg" alt="">'
                contentPreview = contentPreview + '</div>'
            }

        }

        baseUrl = '<?php echo BASE_URL ?>';
            title = "Detalles";
            sizeClass = "small";
            dNone = "d-none";
            infoText = "Events";
            $.confirm({
            title: title,
            columnClass: sizeClass,
            content: `
            <div class='container-fluid' style='heigth:500px;'>
            <div class='row'>
            <div class="col-12">
                <form id='bidDetails' class="formName">
                    <div class='row'>
                        <div class="col d-flex align-items-stretch">   
                            <div class="member">
                            <div class="member-img">`+
                            contentPreview
                            +`</div>
                            <div class="container" >
                            <a class="prev" style="position: absolute;left: 10px;top: 90px;" 
                            onclick="plusSlides(-1)">❮</a>
                            <a class="next" style="position: absolute;rigth: 10px;top: 90px;"  onclick="plusSlides(1)">❯</a>
                            </div>
                            <div class="member-info text-left">
                                <h5 class="text-center" style="font-size:16px;">`+data.f_title+`</h5>
                                <p class="m-0"><strong>Lote:</strong> `+data.f_number+`</p>
                                <p class="m-0"><strong>Descripción</strong></p>
                                <p class="m-0">`+data.f_description+`</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            </div>`,
            buttons: {
            Cerrar: function () {
            //close
            },    


            },
            });
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
     $('.modal-body').html(Content);
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


