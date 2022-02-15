<style>
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
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Eliminar ofertas</h1>
</div>


    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <?php if(isset($_GET['evento'])): ?>
                <h3 class="card-title  float-left">Listado de lotes</h3>
              <?php else : ?>
                <h3 class="card-title  float-left">Eventos</h3>
              <?php endif;?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col mb-3">
                  
                </div>
              </div>
              <?php if($result && !isset($_GET['evento'])): $resultado = $result;?>
                <div class="table-responsive">
                  <table class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th width="20%">Titulo</th>
                      <th>Numero</th>
                      <th>Fecha</th>
                      <th width="5px">Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $key => $value): 
                        $imagecat = $value['f_primary_image'];
                      ?>

                        <tr>
                   
                          <td><?php echo $value['f_events_id']; ?></td>
                          <td><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" width="150" class="img-thumbnail" alt=""></td>
                          <td><?php echo $value['f_title']; ?></td>
                          <td><?php echo $value['f_number']; ?></td>
                          <td><?php echo date('Y-m-d', strtotime($value['f_start_date'])); ?></td>
                        
                          
                          <td align="right" nowrap>
                            
                              <a class="btn btn-primary" href="deleteoferts.php?evento=<?php echo $value['f_events_id']?>">Seleccionar</a>
                           <!--
                              <button class="btn btn-danger btn-xs btn-script-remove" data-id='<?php echo $value["f_lots_id"] ?>'>Delete</button>
                            -->
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              <?php else: ?>
                <?php if($lotes): $lots = $lotes;?>
                <div class="table-responsive">
                  <table class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th> `<input type="checkbox" id="chk-lot" /></th>
                      <th>ID</th>
                      <th>Image</th>
                      <th>PDF</th>
                      <th width="20%">Title</th>
                      <th>Number</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Progress</th>
                      <th width="5%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($lots as $key => $value): 
                        $imagecat = $value['f_primary_image'];
                      ?>

                        <tr>
                          <td><input type="checkbox" class="chk-lot" value="<?php echo $value['f_lots_id']; ?>" /> </td>
                          <td><?php echo $value['f_lots_id']; ?></td>
                          <td><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" width="150" class="img-thumbnail" alt=""></td>
                          <td>
                            <?php $pdffile = HOME_URL."documents/".$value['f_lots_id']."_.pdf"; ?>                             
                            <?php if(file_exists($pdffile)) { ?>
                              <a href="../documents/<?php echo $value['f_lots_id'].'_.pdf'; ?>" target="_blank"><img src="/images/pdfdoc.jpg" alt="" title="Download PDF" border="0"></a>         
                            <?php } else { ?>   
                              <span class="btn btn-xs btn-danger">None</span>
                            <?php } ?>  
                          </td>
                          <td><?php echo $value['f_title']; ?></td>
                          <td><?php echo $value['f_number']; ?></td>
                          <td><?php echo date('Y-m-d', strtotime($value['f_start_date'])); ?></td>
                          <td><span class="badge badge-<?php echo ($value['f_status'] == 1) ? "success":"danger" ?>"><?php echo ($value['f_status'] == 1) ? "Active":"Inactive" ?></span></td>
                          <td><span class="badge badge-<?php echo ($value['f_selected'] == '') ? "danger":"success" ?>"><?php echo ($value['f_selected'] == '') ? "No":"Yes" ?></span></td>
                          <td align="right" nowrap>
                            
                              <button class="btn btn-primary btn-xs btn-script-edit btn-block" data-toggle="modal" data-target="#modalLots" data-type="edit" data-data='<?php echo json_encode($value) ?>'>Edit</button>
                           <!--
                              <button class="btn btn-danger btn-xs btn-script-remove" data-id='<?php echo $value["f_lots_id"] ?>'>Delete</button>
                            -->
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              <?php else: ?>
                <div class="col">
                  <div class="text-center"><h2>No hay información para mostrar</h2></div>
                </div>
              <?php endif; ?>
              <?php endif; ?>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade bs-modal-lg log-his" id="HistoryModal" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 480px !important;">
        <div class="modal-header" style="background-color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      <div class="modal-bodyHistory" style="padding: 0px 0 20px;"> 

      </div>
    </div>
    
      </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $('.btn-script-edit').click(function(){
  
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
        Content= Content + '<div class="price-area cc_cursor">'
        Content= Content + '<span>OFERTA ACTUAL</span>'
        Content= Content + '<span>$ '+formatNumber(ponerdecimales(lotdata.f_current_bid.toString()))+'</span>'
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
        Content= Content + '<div class="price-area cc_cursor" style="text-align: center !important;margin-top:10px;">'
        Content= Content + '<a class="btn btn-primary" id="DeleteOfert" style="color:white;"  data-data='+lotdata.f_lots_id+'>ELIMINAR ÚLTIMA OFERTA</span>'
        Content= Content + '</div>'
     $('.modal-bodyHistory').html(Content);
     $('#HistoryModal').modal('show'); 

     $(document).ready(function(){
        $('#DeleteOfert').click(function(){
            var infolote = $(this).data('data');
            $.ajax({
            url: '<?php echo BASE_URL ?>api/deleteoferts.php',
            type: 'post',
            data: {id: infolote},
            success: function(response){
             location.reload();
            }
         });

        });
     });
   }
 });
});
});
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imageUpload')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

   var noImage = '<?php echo ASSETS_URL ?>'+'img/photo-not-available.jpg';
  function addImage(){ 
  var ctr = $('#image_row').children('tr').length; 
    var image_row_id = 'image_row_id'+ctr;                
    dataimage = '<tr id="'+image_row_id+'">'+
          '<td class="left"><img src="'+noImage+'" id="image'+ctr+'" border="0" width="100" height="120" valign="bottom" style="margin:10px;">'+
          '<input type="hidden" name="addnl_image_hidden[]" value="">'+
          '<input type="hidden" name="addnl_image_delete[]" value="">'+                 
          '<input type="file" name="addnl_image[]" value="" onchange="readURLs(this,'+ctr+')"></td>'+
          '<td class="left"><a class="button" onclick="$(\'#'+image_row_id+'\').remove();" style="cursor:pointer"><span>Remove</span></a></td>'+
          '</tr>';         
    $("#image_row").append(dataimage);
  }
 

$(document).on('click', ".removeImage", function() {
  $(this).parent().parent().addClass('d-none');
  ctr = $(this).data('id');
  img = $(this).data('img');
  $('#addnl_image_delete'+ctr).val(img)
});

  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imageUpload')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(90);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
  function readURLs(input,id) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image'+id)
                  .attr('src', e.target.result)
                  .width(100)
                  .height(90);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
  function removeRow(id1,id2) {
    alert('reasd');
    $("#image_row_id"+id1).hide();  
    $("#addnl_image_delete"+id1).val(id2);
  }
function imageExists(image_url){

    var http = new XMLHttpRequest();

    http.open('HEAD', image_url, false);
    http.send();

    return http.status != 404;

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
