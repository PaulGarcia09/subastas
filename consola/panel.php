<?php
    include('../config/config.php');
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

	date_default_timezone_set('America/Mazatlan');
	header("Content-Type: text/html;charset=utf-8");

	//header('Access-Control-Allow-Origin: *');
	header("Content-Type: text/html;charset=utf-8");
	/* Iniciar la sesión */
	session_start();

    $panel = $_GET['panel'];

    $panel = intval($panel);

    $items_ppage = $_GET['pp'];

    $items_ppage = intval($items_ppage);
    $num_inicio=(($panel-1)*$items_ppage);
    
    $num_fin=($items_ppage);
    
    $Limit =" LIMIT $num_inicio, $num_fin";

    $datenow= date("Y-m-d");
    $sql ="select * from t_customer where fechaenpiso = '{$datenow}' and registroenpiso=1 ORDER BY paddle_number*1 ASC ".$Limit;
    $lots = $dbMaster->getResultAsAssoc($connect,$sql);
    
    $sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
    $result = $dbMaster->getRowAsAssoc($connect,$sql);
?>

<html>

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="costoenvio.css">

		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	
		<title>Consola Love To Help</title>
    
        <style>
            .container {
  position: relative;
  text-align: center;
  color: white;
}

.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

.centered {
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.jconfirm .jconfirm-box{
    width:350px !important;
}
.jconfirm-content{
    color:black;
    font-size:18px;
}
        </style>
	<script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script></head>

	<body>

	<!-- Este div es el que sirve para que se muestren los copos de nieve (va acompañado de un script que está abajo) -->

		<div id="snowflakeContainer" style="display: flex;">

		<img style="margin-left:auto;display:block; margin-right:auto; width:150px;height: 50px;" src="https://subastas.maxilana.com/assets/img/logosubastas.png">
        <p style="font-size: 30px;
    font-weight: bold;color:#001AD2">Lote : </p>
    <p style="font-size: 30; margin-left: 10px;
    font-weight: bold;color:#001AD2" id="lote"><?php echo $result['f_number']?></p> 

        <p style="font-size: 30px;margin-left: 30px;
    font-weight: bold;color:#001AD2">Paleta : </p>
    <p style="font-size: 30px; margin-left: 10px;
    font-weight: bold;color:#001AD2" id="higbuser"></p> 
        <p style="font-size: 30px; margin-left:90px;
    font-weight: bold;color:#001AD2">Oferta Actual: </p> 
    <p style="font-size: 30px; margin-left: 10px;
    font-weight: bold;color:#001AD2" id="highamount"></p> 

		</div>

		<!-- Aquí se mostrará el resultado de la consulta -->
		<div id="livesearch">

        <div class="card-body" style="max-width: 90%;
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    margin-right: auto;
    margin-left: auto;
">
        <?php foreach ($lots as $key => $value): ?>
                <div class="container" style="margin:0 60 60 0;flex-grow: 1;" 
                data-data="<?php echo $value['f_customer_id']?>" data-paleta="<?php echo $value['paddle_number']?>" data-user="<?php echo $value['f_username']?>">
                <img src="paleta.png" style="width:120;cursor: pointer" alt="Snow">

                <div class="centered"><a style="font-size:50px;cursor: pointer"><?php echo $value['paddle_number']?></a></div>
                </div>
        
        <?php endforeach; ?>

        </div>




        
		<script type="text/javascript">
                var OfertaActual =0;
                var id='<?php echo $result['f_lots_id'];?>';
                var ajax_status =<?php echo '0';?>;
                baseUrl = '<?php echo BASE_URL ?>';
                HomeUrl ='<?php echo HOME_URL ?>';
                $(".container").on('click',function(){
                    var data = $(this).data('data');
                    var datapaleta = $(this).data('paleta');
                    var datauser = $(this).data('user');
                    var dataoferta = OfertaActual;
            //         Texto = 'Ofertará la paleta:<b> '+ datapaleta + '</b>  la cantidad de :$ '+dataoferta+'<b></b>?'
                    
            //         $.confirm({
            // title: " ",                
            // content: Texto,               
            // buttons: {
               
            //   cancel:function(){

            //   },
            //    OK: function(){
                   data={
                       lotid: id,
                       userid:data,
                       username:datauser,
                       paleta:datapaleta,
                       bidamount:dataoferta
                   }
            $.ajax({          
                type: 'POST',
                data:data,                          
                url: '<?php echo BASE_URL ?>api/bidpiso.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result); 
                    if(datahere.status=="200"){                           
                       // confirmOkOnly("green",'Successfully',"info",baseUrl+"/auction.php")
                        //showMsg("Successfully",datahere.message,'green');  
                        //location.reload();
                    }               
				}    
            });
			
			    //  }
            });
          // });
    // });
        <?php if(!empty($result)){?>
        getdetail();
        <?php }?>
    function getdetail(){
	
    if(ajax_status==0){	
      
       $.ajax({
         type: 'POST',
         url: baseUrl+'api/ajax-process.php?go=1&lotid='+id,	
         success: function(result) {					
           try { 
             var responson = eval('(' + result + ')');					
             
             if(responson.result=='ok'){
                
                var Boton1 = responson.button1;
              var increments = responson.incrementos;
              increments = increments.replace(",", "");
              increments = increments.replace(".00", "");
              var res = Boton1.replace(",", "");
              Boton1 =  parseFloat(Math.ceil(res));
              var rounded1 = (Boton1)
              rounded1 = Math.round(rounded1/100) * 100;

              OfertaActual= rounded1;


                currentbid = responson.currentbid;
                $('#highamount').html('$ '+responson.currentbid);
                $('#higbuser').html(responson.uname);
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
                id=datahere.f_lots_id
                $('#lote').html(datahere.f_number);
            }
            }
          }
    });
}

		</script>

	</body>

</html>
