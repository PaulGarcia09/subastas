
<?php
	include('../config/config.php');
	$sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);
?>


<style>


@font-face {
  font-family: "MyriadPro-Light";
src:url("fonts/MyriadPro-Light.otf") format("opentype")

}


body{
  font-family: "MyriadPro-Light" !important;
}

    .flash {
  display: block;
  position: fixed;
  top: 25px;
  right: 25px;
  width: 350px;
  padding: 20px 25px 20px 85px;
  font-size: 16px;
  font-weight: 400;
  color: #0F56C6;
  background-color: #FFF;
  border: 2px solid #0F56C6;
  border-radius: 2px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
  opacity: 0;
}
    .flash__icon {
  position: absolute;
  top: 50%;
  left: 0;
  width: 1.8em;
  height: 100%;
  padding: 19px 0.4em;
  background-color: #0F56C6;
  color: #FFF;
  font-size: 36px;
  font-weight: 300;
  transform: translate(0, -50%);
}
.flash__icon .icon {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
}

.button {
  position: absolute;
  top: 50%;
  left: 50%;
  padding: 10px 20px;
  border: 2px solid #66847C;
  border-radius: 2px;
  color: #66847C;
  transform: translate(-50%, -50%);
  transition: all 0.1s;
}
.button:hover {
  cursor: pointer;
  color: #FFF;
  background-color: #66847C;
}
.button:active {
  box-shadow: none;
  background-color: #5f7b74;
}

@-webkit-keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
@-moz-keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
@-o-keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
@keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
.animate--drop-in-fade-out {
  -webkit-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  -moz-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  -ms-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  -o-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
}
main {
  font-family: "MyriadPro-Light" !important;
   line-height: 20px;
}    
            .contain {
  position: relative;
  text-align: center;
  color: white;
}


h1,h2 {
  font-family: "Helvetica Neue";
  font-weight: 100;
  text-align: center;  
  margin: 0;  
}
h1 {
  font-size: 5em;
  color: tomato !important;
}
h2 {
  font-size: 3.5em;
  color: cadetblue !important;
}

.animated-fast {
  --webkit-animation-duration: .5s;
  animation-duration: .5s;
  --webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

.animated {
  --webkit-animation-duration: 1s;
  animation-duration: 1s;
  --webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}


@keyframes fade-up {
  from {
    opacity: 0;
    --webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    --webkit-transform: none;
    transform: none;
  }
}

.fade-up {
  --webkit-animation-name: fade-up;
  animation-name: fade-up;
}
.card-body{
  background: rgb(255,255,255);
  background: linear-gradient(90deg, rgba(255,255,255,1) 58%, rgba(255,255,255,1) 63%, rgba(227,244,252,1) 66%, rgba(209,236,241,1) 100%);
}

</style>



<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <main id="main" style="margin-top:20px !important;">
        <!-- ======= Team Section ======= -->
      <div class="container" style="max-width:100% !important">

      <div class="section-title py-1 px-lg-1">
        </div>
        <div class="row"  style="
                        margin-bottom: 20px;
    overflow: hidden;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231);
    padding:10px;
    max-width: 100%;
    max-heigth:890px;">
          <?php if($result): ?>
          <div class="col-lg-12" id="todo">
		  
		     <div class="card card-light">
        <div class="card-body">
        <div class="col-lg-12" style="display: inline-flex;" id="todo">
        <div class="col-lg-8" style="
 padding: 0.5em 2.5em;
  overflow: hidden;">

     

        <span class="derecha" style="float: left; font-size:26px;FONT-WEIGHT: BOLD;">Lote: <span id="numerolote" style="line-height:normal"><?php echo $result['f_number']?> - <?php echo $result['f_title']?></span></span>
      

            <div style="text-align:center;padding:50px;" id="img-container">
            <div id="carouselExampleControls" style="width: 60%;
    margin: auto;" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100"
                      id="img1"
                      src="https://subastas.maxilana.com/rimage/products/<?php echo $result['f_primary_image'] ?>.original.jpg" alt="First slide">
                    </div>
                  <!-- <div class="carousel-item">
                    <img class="d-block w-100" src="https://subastas.maxilana.com/rimage/products/fcbd23639670a78262d52c8a2e85a21cb91f3a0b.original.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://subastas.maxilana.com/rimage/products/18321c9036d9bbea10f87c681b214478645aa166.original.jpg" alt="Third slide">
                  </div> -->
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
         <!--   <img id="imgprincipal" src="https://subastas.maxilana.com/rimage/products/<?php echo $result['f_primary_image'] ?>.original.jpg" 
            style="width: 60%;object-fit: fill;;margin:auto;"/>!-->
            <span class="derecha" style="float: left; font-size:26px;text-align: initial;margin-top:50px;"><span id="desc" 
            style="line-height:normal;color:#727376;font-size:30px"><?php echo $result['f_description']?></span></span>

            </div>
          </div>

          <div class="col-lg-4" style="
            padding: .5em;
            overflow: hidden;">

                <span class="derecha" style="font-size:30px;text-align:center">Ofertas</span></span>
                <hr>
                <div style="padding: 5px; display: flex; flex-wrap: nowrap;width: 100%">
                  <div style="width: 50%; font-weight: 600; text-align:left;font-size: x-large;">Paleta</div>
                  <div style="width: 50%; font-weight: 600; text-align:left;font-size: x-large;">Presencial/Linea</div>
                  <div style="width: 50%; font-weight: 600; text-align:right;font-size: x-large;">Oferta</div>      
                 </div>     
  
                <div class="card card-light" style="height:300px;font-size: 25px;">
                    <div class="history"></div>
                </div>
                <h1 id="ganando"></h1>
  
   <!-- <div  style="background-color:white;padding: 5px; display: flex; flex-wrap: nowrap;width: 100%;box-shadow: 0 1px 1px rgba(0,0,0,0.15);border-radius: 2px;">
              <div style="width: 50%; font-weight: 600; text-align:left;font-size: x-large;">7213</div>
                  <div style="width: 50%; font-weight: 600; text-align:left;font-size: x-large;">Linea</div>
                  <div style="width: 50%; font-weight: 600; text-align:right;font-size: x-large;">635,000.00</div>   
                 </div> -->

                <div class="contain" style="margin:20 10 10 0">
                <img src="paleta.png" style="width:235px;cursor: pointer" alt="Snow">

                <div class="centered" style="position: absolute;
	top: 21%;
	left: 50%;
	transform: translate(-50%, -50%);"><a style="font-size:68px;cursor: pointer; color:white;" id="palet"></a></div>

  <h1 class="animado" style="font-size:4.5rem !important;font-weight:bold !important;" id="ofertaalta"></h1>
  <img style="width:40%;" src="https://subastas.maxilana.com/assets/img/logosubastas.png"></img>

<!--- ALERTAS !-->

<audio id="audio" style="display:none;" >
    <source src="alerta.mp3" type="audio/mp3">
</audio>
<input type="button" style="display:none;" id="reproduce" class="reproduce" onclick="play()">

<div class="flash">
  <div class="flash__icon">
  <i class="fa fa-gavel" aria-hidden="true"></i>
  </div>
  <p class="flash__body" style="font-size:30px;">
    ¡Nueva oferta!
  </p>
</div>
<a class="button" style="display:none;" >Flash me</a>


                </div>
         </div>

          </div>
          </div>
          </div>
          </div>
          <?php else: ?>
          <?php endif; ?>
        </div>
        <?php if($result): ?>

      </div>
      <?php endif; ?>




  </main><!-- End #main -->

<script type="text/javascript">
function play(){
  var s = document.getElementById("audio");

  s.load();
  s.play();
}
var ofertamasalta =0;

$( ".button" ).click(function() {
  $( ".flash" ).addClass( "animate--drop-in-fade-out" );
  setTimeout(function(){
    $( ".flash" ).removeClass( "animate--drop-in-fade-out" );
  }, 3500);
});

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

var ofini =  '<?php echo $result['f_minimum_bid'] ?>';
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

	function getdetail(){
    $( ".animado" ).removeClass("animated-fast fade-up");
    var entro=0;
     $.ajax({
       type: 'POST',
       url: baseUrl+'api/ajax-process-stream.php?lotid='+id,	
       success: function(result) {					
         try { 
           var responson = eval('(' + result + ')');					
           
           if(responson.result=='ok'){
            var img = "https://subastas.maxilana.com/rimage/products/"+responson.img+".original.jpg";
            $("#imgprincipal").attr("src",img);
            if(ofertamasalta !== 0){
                if(ofertamasalta !== responson.currentbid){
                  entro =1;
                  $( ".flash" ).removeClass( "animate--drop-in-fade-out" );
                    $(".button").click();
                    $(".reproduce").click();

                }
            }else{
              $( ".animado" ).addClass( " animated-fast fade-up" );
            }
            if(entro == 1){ 
              $( ".animado" ).addClass( "animated-fast fade-up" ); 
            }
            ofertamasalta = responson.currentbid;
            $("#ofertaalta").html("$ "+responson.currentbid);
            $("#numerolote").html(responson.numberlot+" - "+responson.title);
            $("#title").html(responson.title);
            $(".history").html(responson.contents);
            $("#palet").html(responson.paleta);
            $('#desc').html(responson.desc);
            $("#img1").attr("src","https://subastas.maxilana.com/rimage/products/"+responson.img+".original.jpg");
             if(responson.status != '1'){
              $("#ganando").html("Ganador:");
                if(responson.nextlot == '1'){
                  ofertamasalta =0;
                   id = responson.idnext;
                }
             }else{
              $("#ganando").html("Ganando al momento:");
             }

           }
           
         }
         catch( err  ) {
         }
       }
     });
 
 t=setTimeout("getdetail()",500);	
}	

<?php if(!empty($result)){?>
getdetail();
<?php }?>
var Contador = 0;

function rtrim(str, filter) {
  filter || ( filter = '' );
  for (var j = str.length - 1; j >= 0 && filtering(str.charAt(j), filter); j--);          
  return str.substring(0, j + 1);
}

function ConsultarLote(BaseURL,HomeURL,NvoID){

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


