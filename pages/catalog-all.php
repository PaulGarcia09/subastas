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
          <h2 data-aos="fade-up" style="font-size: 26px;
    text-align: left;
    font-weight: 300;
    color: #666;">Catálogo de subastas</h2>
          <?php 
		  if(isset($_GET['catdate']) ){
            echo '<p class="text-center">Catalog for '.date('F d, Y', strtotime($_GET['catdate'])).'</p>';
          } if( isset($_GET['cdate'])){
            echo '<p class="text-center">Catalog for '.date('F d, Y', strtotime($_GET['cdate'])).'</p>';
          } 
		  ?>
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
            
            <div class="row">
            <?php if(count($afterLots) > 0): ?>
                <?php foreach ($afterLots as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                    $dateformat = date("Y-m-d", strtotime($value['f_start_date']));
                ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" style="    
                    width:200px;
                    margin-bottom: 20px;
                    overflow: hidden;
                    text-align: center;
                    border-radius: 5px;
                    background: #fff;
                    box-shadow: 0px 1px 6px rgb(230,231,231)">
                        <div class="member-img"  onclick="changeInfo('<?php echo $value['f_events_id']?>')">
                            <?php if (file_exists("rimage/products/$imagecat.original.jpg")) { ?>
											  <a class="pop" rel="gallery" onclick="showMoreInfo('<?php echo json_encode($value, JSON_NUMERIC_CHECK ) ?>')"> 
												<img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.original.jpg';?>" border="0"  style="width: 200px;height:210px;text-align: center;vertical-align: middle">
                                                   </a>        			    
								<?php } else { ?>
                                    <img src="rimage/no_image_40x40.jpg" id="imagecat" border="0"  style="width: auto;height: 151px;text-align: center;vertical-align: middle">
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
var subastas = <?php echo json_encode($afterLots) ?>;

var iduser;
var slideIndex = 1;
iduser = '<?php echo ($_SESSION['auction_brodcaster']['paleta'])?>';
var valuJson = <?php echo json_encode($catalog) ?json_encode($catalog) : [] ?>;

    $(document).ready(function(){

        $(".btn-script-login").on('click',function(){
            var data = $(this).data('data');
            showBid(data,"bid"); 
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
            title: 'INICIAR SESIÓN',
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
                                            <label>Contraseña</label>
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
        window.location.href = "<?php echo HOME_URL ?>lotedetalle.php?id="+data.f_lots_id;
    }
    function showMoreInfo(data,type)
    {
        window.location.href = "<?php echo HOME_URL ?>lotedetalle.php?id="+data.f_lots_id;
    }
    function toJSDate (dateTime) {

var dateTime = dateTime.split(" ");//dateTime[0] = date, dateTime[1] = time

var date = dateTime[0].split("-");
var time = dateTime[1].split(":");

//(year, month, day, hours, minutes, seconds, milliseconds)
return new Date(date[0], date[1], date[2], time[0], time[1], time[2], 0);

}
function MostrarModal(data,type,imgAdd){
        var url='';
        var contentPreview='<div class="mySlides" style="width:100%">'
        contentPreview = contentPreview + '<img style="margin-left: 40px;" src="<?php echo HOME_URL ?>rimage/products/'+data.f_primary_image+'.original.jpg" class="popupimg" alt="">'
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
                contentPreview = contentPreview + '<img style="margin-left: 40px;" src="'+url+'" class="popupimg" alt="">'
                contentPreview = contentPreview + '</div>'
            }

        }

        baseUrl = '<?php echo BASE_URL ?>';
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
         window.location.href="https://subastas.maxilana.com/evento.php?evento="+date;
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
