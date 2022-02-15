
<link rel="stylesheet" href="assets/css/jquery.wm-zoom-1.0.min.css">
<script src="package/js-image-zoom.js" type="application/javascript"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/jquery.wm-zoom-1.0.min.js"></script>
<style>
main {
   font-family: 'Gotham';
   line-height: 20px;
}
</style>

  <main id="main" style="margin-top:20px !important;">
        <!-- ======= Team Section ======= -->
      <div class="container">

      <div class="section-title py-1 px-lg-1">
        </div>
        <div class="row"  style="
                        margin-bottom: 20px;
    overflow: hidden;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0px 1px 6px rgb(230,231,231);
    padding:10px;
    max-width:960px;
    max-heigth:890px;">
          <?php if($result): ?>
          <div class="col-lg-6" id="todo">
		  
		     <div class="card card-light">
        <div class="card-body" style="height: 700px;">
        <div class="row" style="
  padding: .5em;
  overflow: hidden;">

        <span class="derecha" style="float: left; font-size:24px;margin-left:200px !important;">Lote: <span id="numerolote"><?php echo $result['f_number']?></span></span>
        <span class="izquierda" style="float: right;text-align:center; font-size:22px; margin-right:200px !important;">Oferta actual <br>
        <span id="ofertaactual" style="font-size:24px;">$ <?php echo number_format(floatval($result['f_current_bid']), 2)?> </span></span>
        </div>
            <form id='bidDetails' class="formName">
            <div style="text-align:center;" id="img-container">
            <img id="imgprincipal" src="https://subastas.maxilana.com/rimage/products/<?php echo $result['f_primary_image'] ?>.original.jpg" style="width: 40%;object-fit: fill;;margin:auto;"/>
            </div>
            <div style="text-align:center; width:500px; margin:0 auto;" id="img-container">
             <h5 style="font-size:20px;" id="title" ><?php echo $result['f_title']?></h5>
            </div>
          </form>
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
    
     $.ajax({
       type: 'POST',
       url: baseUrl+'api/ajax-process-stream.php?lotid='+id,	
       success: function(result) {					
         try { 
           var responson = eval('(' + result + ')');					
           
           if(responson.result=='ok'){
            var img = "https://subastas.maxilana.com/rimage/products/"+responson.img+".original.jpg";
            $("#imgprincipal").attr("src",img);

            $("#ofertaactual").html("$ "+responson.currentbid);
            $("#numerolote").html(responson.numberlot);
            $("#title").html(responson.title);
             if(responson.status != '1'){
                if(responson.nextlot == '1'){
                   id = responson.idnext;
                }
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


