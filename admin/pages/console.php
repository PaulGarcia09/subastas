  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $title; ?></h1>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid"> 
	<?php if($result): ?>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-light">
              <div class="card-header">
			  <h4>Auction Information</h4>
			 
				</div>  <div class="card-body">
		  <div class="member-img">
            <img class="img-thumbnail img-responsive" src="<?php echo HOME_URL ?>rimage/products/<?php echo $result['f_primary_image'] ?>.e.jpg" alt="First slide">
          </div>
          <div>
            
				<p> <span class="ml-3 font-weight-bold  ">Lot Title:		</span> <span ><?php echo $result['f_title'] ?>						 		</span>										</p>
				<p> <span class="ml-3 font-weight-bold  ">Lot Number:		</span> <span ><?php echo $result['f_number'] ?>						 	</span>										</p>
				<p> <span class="ml-3 font-weight-bold  ">Paddle Number:	</span>	<span id="higbuser"><?php echo $result_paddle['paddle_number'] ?>	 	</span> 										</p>
				<p> <span class="ml-3 font-weight-bold  ">High Bid:		</span>	<span id="highamount">$  <?php echo number_format(floatval($result['f_current_bid'])) ?>	</span></p>
				<p> <span class="ml-3 font-weight-bold  ">Bid Increment:	</span>	<span id="bidicrement">$ <?php echo number_format(floatval($result['f_bid_increment'])) ?>	</span> 										</p>
				<p style="display: none;"> <span class="ml-3 font-weight-bold  ">Reserve Bid:	</span>	<span >$  <?php echo $result['f_reserve_bid'] ?>					</span>										</p>
				<p> <span class="ml-3 font-weight-bold  ">Message:		</span>	<span ><?php echo $result['f_message'] ?>							</span>										</p>
		 
            
          </div>       
          </div>       
        </div>
        <span class="btn btn-info btn-sm btn-script-update ml-4" style="margin-top:10px; background-color:red;font-size:large;" data-type="reloadpages"><i class="fa fa-refresh"></i>REINICIAR PAGINA</span>
        <span class="btn btn-info btn-sm btn-script-update ml-4" style="margin-top:10px; background-color:#F9FC82;font-size:large;color: black;" data-type="deletereloadpages"><i class="fa fa-refresh"></i>QUITAR REINICIO DE PAGINA</span>
        <hr>
        <span class="btn btn-info btn-sm btn-script-update ml-4" style="margin-top:10px; background-color:#FE752C;font-size:large;" data-type="deleteoferta"><i class="fa fa-refresh"></i>ELIMINAR OFERTA ACTUAL</span>
        <button  class="btn btn-primary btn-sm btn-script-update ml-4" data-type="desbloqued" id="desblockOferts" data-data="Ofertas bloqueadas"><i class="fa fa-ban"></i> Desbloquear Ofertas</button >
        </div>
        <div class="col-md-8">
		<div class="card card-light">
              <div class="card-header">
			   <h4>Controls</h4>
			 
				</div>
		
            <div class="card-body">
            <div class="form-group row">
              <label class="col-12 font-weight-bold ">Message 
                <span class="btn btn-info btn-sm btn-script-update mr-4 ml-3" data-type="message" data-data="Inician las ofertas"><i class="fa fa-bullhorn"></i> Inicio de ofertas</span>
                <span class="btn btn-info btn-sm btn-script-update mr-4 ml-4" data-type="message" data-data="El lote está a punto de cerrar"><i class="fa fa-bullhorn"></i> Apunto de cerrar</span>

              </label>
              <div class="col-9">
                <input type="text" class="form-control" placeholder="Custom Message" id="message" name="message">
              </div>
              <div class="col-3">
                <span class="btn btn-success btn-script-update btn-block" data-type="message" data-data="message"><i class="fa fa-send-o"></i><i class="fa fa-bullhorn"></i> Send</span>
              </div>
            </div>
            <div class="form-group row mt-4">
            <button  class="btn btn-primary btn-sm btn-script-update ml-4" data-type="bloqued" id="blockOferts" data-data="Ofertas bloqueadas"><i class="fa fa-ban"></i> Bloquear Ofertas</button >
            <button  class="btn btn-primary btn-sm btn-script-update ml-4" data-type="message" data-data="Lote vendido"><i class="fa fa-gavel"></i> Lote vendido</button >
            <button  class="btn btn-primary btn-sm btn-script-update ml-4" data-type="nextlot" data-data="Next Lot"><i class="fa fa-forward"></i> Next Lot</button >
            </div>
            <div class="form-group row mt-4">
              <?php 
                  $firstBid = ( (int)$result['f_current_bid']+(int)$result['f_bid_increment']);
                  $secondBid = ( $firstBid+(int)$result['f_bid_increment']);
                  $thirdBid = ( $secondBid+(int)$result['f_bid_increment']);
                ?>  
       
                <label class="col-12 col-form-label font-weight-bold ">Paddle Number:</label>
              <div class="col-sm-9">
                <input type="text" id="paddle_number" name="paddle_number" required value="" placeholder="Enter Paddle Number" class="f form-control"  />
              </div>
              <label class="col-12 col-form-label font-weight-bold ">Quick Bid
                <input type="button" id="btn1" class="btn btn-primary btn-sm btn-script-update mr-5 ml-3" data-type="bid" data-amount="<?php echo $firstBid; ?>"  data-data="<?php echo $firstBid; ?>"> 
                <input type="button" id="btn2" class="btn btn-primary btn-sm btn-script-update mr-5 ml-5" data-type="bid" data-amount="<?php echo $secondBid; ?>" data-data="<?php echo $secondBid; ?>"> 
              </label>
              <div class="col-sm-9">
                <input type="hidden" id="lotid" name="lotid" value="<?php echo $result['f_lots_id'] ?>"/>
                <input type="hidden" id="currentBid" value="<?php echo $result['f_bid_increment'] ?>"/>
                <input type="text" id="bidamount" name="bidamount" required value="" placeholder="Enter Flex Bid" class="f form-control"  />
              </div>
              <div class="col-sm-3">
                <span class="btn btn-success btn-script-update btn-block"  data-type="bid" data-data="bid"><i class="fas fa-gavel"></i> Bid</span>
              </div>
            </div>
            <div class="form-group row mt-4">
              <label class="col-12 col-form-label font-weight-bold ">Increment
                <span class="btn btn-danger btn-sm btn-script-update  mr-5 ml-3" data-type="increment" data-data="/~2">/2</span>
                <span class="btn btn-danger btn-sm btn-script-update  mr-5" data-type="increment" data-data="/~3">/3</span>
                <span class="btn btn-danger btn-sm btn-script-update  mr-5" data-type="increment" data-data="/~4">/4</span>
                <span class="btn btn-success btn-sm btn-script-update mr-5" data-type="increment" data-data="x~2">x2</span>
                <span class="btn btn-success btn-sm btn-script-update mr-5" data-type="increment" data-data="x~3">x3</span>
                <span class="btn btn-success btn-sm btn-script-update mr-5" data-type="increment" data-data="x~4">x4</span>
              </label>
              <div class="col-sm-9">
                <input type="text" id="incrementAmount" name="incrementAmount" required value="" placeholder="Enter Increment" class="f form-control"  />
              </div>
              <div class="col-sm-3">
                <span class="btn btn-success btn-script-update btn-block" data-type="increment" data-data="increment"><i class="fa fa-gavel"></i> Change</span>
              </div>
            </div>
            <div class="form-group row mt-4">
              <label class="col-12 col-form-label font-weight-bold ">Adjustment</label>
              <div class="col-sm-9">
                <input type="text" id="substract" name="substract" required value="" placeholder="Enter Subtract" class="f form-control"  />
              </div>
              <div class="col-sm-3">
                <span class="btn btn-success btn-script-update btn-block" data-type="substract"><i class="fa fa-gavel"></i> Subtract</span>
              </div>
            </div>

            <div class="form-group row mt-5"><div class="col-sm-12">
              <span class="btn btn-success btn-script-update btn-block" data-type="close"><i class="fa fa-ban"></i> Close This Lot</span>
            </div>
            </div>
        </div>
        </div>
        </div>
      </div>  <?php else: ?>
            <div class="row">
              
            </div>
          <?php endif; ?>
      <div class="row">
        <div class="col">
          <?php if($lots): ?>
            <div class="table-responsive">
              <table class="dataTables table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Lot ID</th>
                  <th width="10%">Image</th>
                  <th width="20%">Lot Title</th>
                  <th>Lot Number</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Lot In Progress</th>
                  <th width="5%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($lots as $key => $value): 
                    $imagecat = $value['f_primary_image'];
                    $imageLoc = HOME_URL."rimage/products/".$imagecat.".e.";
                  ?>

                    <tr>
                      <td><?php echo $value['f_lots_id']; ?></td>
                      <td><img src="<?php echo $imageLoc."jpg";?>" onerror='<?php echo HOME_URL."rimage/products/photo-not-available.e.jpg"?>' class="img-thumbnail w-50" alt=""></td>
                      <td><?php echo $value['f_title']; ?></td>
                      <td><?php echo $value['f_number']; ?></td>
                      <td><?php echo date('M d, Y', strtotime($value['f_start_date'])); ?></td>
                      <td>
                        <?php if($value['f_status']=='1'):?>
                          <span class="badge badge-success">Activate</span>
                        <?php elseif($value['f_status']=='2'):?>
                          <span class="badge badge-danger">Closed</span>
                        <?php else:?>
                          <span class="badge badge-info">Not Active</span>
                        <?php endif; ?>
                      <td><?php echo ($value['f_selected'] == '') ? 'No':'Yes'; ?></td>
                      <td align="right" nowrap>
                       
						  <?php if($value['f_selected']!='1' && $value['f_status']=='1' && strtotime($value['f_start_date'])==strtotime(date('Y-m-d'))){?>
                          <button  class="btn btn-success  btn-xs  btn-script-update" data-type="golive" data-data='<?php echo $value['f_lots_id']; ?>'  >Go Live!</button>
                         <?php }?> <button class="btn btn-primary btn-xs btn-script-edit" data-toggle="modal" data-target="#modalLots" data-type="edit" data-data='<?php echo json_encode($value) ?>'>Edit</button>
                        
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <div class="col">
              <div class="text-center"><h2>NO auction at this time</h2></div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>
<div class="modal" tabindex="-1" role="dialog" id="modalLots">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lot Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='formDetails' class="formName" enctype="multipart/form-data" method="POST" action="<?php echo BASE_URL.'api/admin/lotsEdit.php?console=true' ?>">
            <div class='row'>
                <div class="col-12 text-right">
                    <div class="form-group">
                        <label>Activate</label>
                        <input type="checkbox" value="true" name="activebox" id="activebox">
                    </div>
                </div>
            </div>
            <div class='row'>
               <div class="col">   
                  <div class="form-group row">
                      <input type="hidden" name="lotid" id="lotid" value=""/>
                      <label class="col-md-3">Title</label>
                      <div class="col-md-9">
                        <input type="text" name="title" id="title" required value="" placeholder="Title" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Lot Number</label>
                      <div class="col-md-9">
                        <input type="text" name="lotnumber" id="lotnumber" required value="" placeholder="Lot Number" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Description</label>
                      <div class="col-md-9">
                        <textarea class="form-control" rows="3" name="lot_description" id="lot_description" required></textarea>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Start Date</label>
                      <div class="col-md-9">
                        <input type="date" name="untilDate" id="untilDate" required value="" placeholder="Start Date" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Minimum Bid</label>
                      <div class="col-md-9">
                        <input type="number" name="minimumbid" id="minimumbid" required value="" placeholder="Minimum Bid" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Reserve Bid</label>
                      <div class="col-md-9">
                        <input type="number" name="reservebid" id="reservebid" required value="" placeholder="Reserve Bid" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Bid Increment</label>
                      <div class="col-md-9">
                        <input type="number" name="bidincrement" id="bidincrement" required value="" placeholder="Bid Increment" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3">Pdf</label>
                    <div class="col-md-9">
                      <input  type='file' accept="image/*" name="pdfdoc"  accept="application/pdf"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-12">
                      <label>Image</label>
                      <small>Note: Image must be in JPG format.  For best result, the recommended image size is 700x700 pixels.</small>
                    </div>
                    <div class="col-12">
                      <input  type='file' accept="image/*" name="primary_image" id="file" onchange="readURL(this);"  style="display:none"/>
                      <img width="100" height="100" id="imageUpload" src='<?php echo ASSETS_URL."img/photo-not-available.jpg" ?>'>
                    </div>
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col">
                <label>Additional Images</label><br>
                <small>Note: Image must be in JPG format.  For best result, the recommended image size is 700x700 pixels.</small>
                <table class="list" id="images">
                  <tbody id="image_row">                    
                  </tbody>
                  <tfoot>                   
                    <tr>
                       <td></td>
                       <td><a class="btn-sm btn-success" onclick="addImage();" style="cursor:pointer;"><span>Add Image</span></a></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col text-right">
                <button type="submit" class="btn btn-success mt-3">Save</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var baseUrl = '<?php echo BASE_URL ?>';
  var homeUrl = '<?php echo HOME_URL ?>';
  $(".btn-script-update").on('click',function(){
    var id = $('#lotid').val();
    var currentBid = $('#currentBid').val();
    var data = $(this).data('data');
    var type = $(this).data('type');

    // message field
    if(type == "message"){
      if(data == "message"){
        message = $("#message").val();
      }else message = data;
      postData = {id:id, message:message};
    }

    if(type == "nextlot"){
      postData = {id:id,nextlot:id};
    }

    if(type == "bloqued"){
      postData = {id:id,bloqued:id};
    }
    if(type == "desbloqued"){
      postData = {id:id,desbloqued:id};
    }
    
    if(type == "reloadpages"){
      postData = {reloadpages:"reloadpages"};
    }

    if(type == "deletereloadpages"){
      postData = {deletereloadpages:"deletereloadpages"};
    }

    if(type == "deleteoferta"){
      postData = {deleteoferta:"deleteoferta",id:id};
    }

    // Quick bid
    if(type == "bid"){
      paddle_number = $("#paddle_number").val()
      if(data == "bid"){
        bid = $("#bidamount").val();
      }else bid =  $(this).data('amount');
      postData = {id:id, bidamount:bid, paddle_number:paddle_number};
    }

    // increment
    if(type == "increment"){
      if(data == "increment"){
        incrementAmount = $("#incrementAmount").val();
        status = true;
      }else{
        incrementAmount = data;
        status = false;
      } 
      postData = {id:id, increment:incrementAmount, status:status, currentBid:currentBid};
    }

    // substract
    if(type == "substract"){
      substract = $("#substract").val();
      postData = {id:id, substract:substract,currentBid:currentBid};
    }

    // Close
    if(type == "close"){
      postData = {id:id, close:"close"};
    } 
	if(type == "golive"){
		 
		   
      postData = {id:data, golive:"golive"};
    }
    $.ajax({          
        type: 'POST',
        data: postData,
        url: baseUrl+'api/admin/console.php',           
        success: function(result) {  
            datahere =  jQuery.parseJSON(result);  
            if(datahere.status=="200"){ 
              location.reload();                       
            }else{
              $.alert({title: 'Failed!', content: datahere.message,}); 
            }
        }    
    });
      
  });

  $('#modalLots').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('type') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      // if(recipient == 'add'){
      //   modal.find('.modal-title').text('Add Lot')
      //   modal.find('#formDetails').attr('action', baseUrl+'api/admin/lotsAdd.php');
      // }else{
      //   modal.find('.modal-title').text('Edit Lot')
      //   modal.find('#formDetails').attr('action', baseUrl+'api/admin/lotsEdit.php');

      // }
      var data = button.data('data') 
      if(data.f_status == '1'){
        modal.find('#activebox').attr('checked', true);
      }else{
        modal.find('#activebox').attr('checked', false);
      }
      modal.find('#lotid').val(data.f_lots_id);
      modal.find('#title').val(data.f_title);
      modal.find('#lotnumber').val(data.f_number);
      modal.find('#lot_description').val(data.f_description);
      modal.find('#untilDate').val(data.f_start_date);
      modal.find('#minimumbid').val(data.f_minimum_bid);
      modal.find('#reservebid').val(data.f_reserve_bid);
      modal.find('#bidincrement').val(data.f_bid_increment);
      primaryimage = homeUrl+'rimage/products/'+data.f_primary_image;
      if(imageExists(primaryimage+'.e.jpg')) validPImage = primaryimage+'.e.jpg';
      else if(imageExists(primaryimage+'.e.jpeg')) validPImage = primaryimage+'.e.jpeg';
      else if(imageExists(primaryimage+'.e.png')) validPImage = primaryimage+'.e.png';
      else if(imageExists(primaryimage+'.e.gif')) validPImage = primaryimage+'.e.gif';
      else validPImage = '<?php echo ASSETS_URL ?>'+'img/photo-not-available.jpg';
      modal.find('#imageUpload').attr('src', validPImage);

      $.each(data.imageAdditional, function( index, value ) {
        image = homeUrl+'rimage/products/'+value.f_image_path;
        if(imageExists(image+'.e.jpg')) validImage = image+'.e.jpg';
        else if(imageExists(image+'.e.jpeg')) validImage = image+'.e.jpeg';
        else if(imageExists(image+'.e.png')) validImage = image+'.e.png';
        else if(imageExists(image+'.e.gif')) validImage = image+'.e.gif';
        else validImage = '<?php echo ASSETS_URL ?>'+'img/photo-not-available.jpg';
        
        image_row_id = value.f_image_additional_id;
        ctr = index;
        dataimage = '<tr id="'+image_row_id+ctr+'">'+
          '<td class="left"><img src="'+validImage+'" id="image'+ctr+'" border="0" width="100" height="120" valign="bottom" style="margin:10px;">'+
          '<input type="hidden" name="addnl_image_hidden[]" value="">'+
          '<input type="hidden" id="addnl_image_delete'+ctr+'" name="addnl_image_delete[]" value="">'+                 
          '<input type="file" name="addnl_image[]" value="" onchange="readURLs(this,'+ctr+')"></td>'+
          '<td class="left"><button type="button" class="removeImage" data-id="'+ctr+'" data-img="'+value.f_image_path+'" style="cursor:pointer">Remove</button></td>'+
          // '<td class="left"><a class="button" onclick="$(\'#'+image_row_id+'\').remove();" style="cursor:pointer"><span>Remove</span></a></td>'+
          '</tr>'; 
        modal.find("#image_row").append(dataimage);
      }); 
    })

  $("#imageUpload").on('click',function(){               
     $("#file").trigger('click');    
  }); 

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
</script>

<script type="text/javascript">
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
  baseUrl = '<?php echo BASE_URL ?>';
function adminlots(act,lotid){	
			$("#valid_box").hide();
			$("#wbox").hide();
			$("#wbox").html('');
			$.blockUI('Please Wait..');			
			$.ajax({
				type: 'POST',
				url: baseUrl+'api/admin-console.php?action='+act+'&lotid='+lotid,				
				success: function(result) {					
					try {
							var responson = eval('(' + result + ')');
						 	if(responson.result=='okE'){	
						 		location.reload(true);						 									
							}else if(responson.result=='error'){
								$.unblockUI();
								$("#wbox").html(responson.message);
								$("#wbox").show();
							}
					}
					catch( err  ) {
 						$("#wbox").html("Sorry but an error occurred while processing.\n  Please try again after a few minutes.");
 						$("#wbox").show();
 						$.unblockUI();
					}
				}
			});
}
showred =0;
ajax_status =<?php echo '0';?>;
var t;
var x;
baseUrl = '<?php echo BASE_URL ?>';
var Apuesta = <?php echo floatval($result['f_current_bid'])?>;
var contador = 0;
var Preblocount = 6;
var Saltos =  <?php echo floatval($result['f_bid_increment']) ?>;
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
function getdetail(){
	 if(ajax_status==0){	
			$.ajax({
				type: 'POST',
				url: baseUrl+'api/admin/admin-ajax-process.php?go=1&lotid=<?php echo $result['f_lots_id'];?>',	
				success: function(result) {					
					try { 
						var responson = eval('(' + result + ')');					
						
						if(responson.result=='ok'){		
              var UltimaApuesta = responson.currentbid.replace(",","");
              var Boton1 = responson.button1;
              var increments = responson.increment;
              increments = increments.replace(",", "");
              increments = increments.replace(".00", "");
              var res = Boton1.replace(",", "");
              Boton1 =  parseFloat(Math.ceil(res));
              var rounded1 = (Boton1)
              rounded1 = Math.round(rounded1/100) * 100;
              var rounded2 = rounded1 + parseFloat(increments);
							$('#btn1').val(formatNumber(ponerdecimales(rounded1.toString())));
							$('#btn2').val(formatNumber(ponerdecimales(rounded2.toString())));
							$('#btn1').data("amount",formatNumber(ponerdecimales(rounded1.toString())));
							$('#btn2').data("amount",formatNumber(ponerdecimales(rounded1.toString())));
							
							$('#highamount').html(responson.currentbid);
              responson.currentbid = responson.currentbid ? responson.currentbid : 0;
              Rangos(responson.currentbid,<?php echo $result['f_lots_id'];?>);
              if(parseFloat(UltimaApuesta) != Apuesta){
                 contador = 0;
                 Apuesta = parseFloat(UltimaApuesta);
                 $( "#blockOferts" ).prop( "disabled", true );

                 $.ajax({       
                      type: 'POST',
                      url: baseUrl+'api/admin/reiniciarcontador.php?lotid=<?php echo $result['f_lots_id'];?>',           
                      success: function(result) {  
                          
                      }
                      });

              }else{
                contador = contador + 1 ;
                if(contador == 10){
                  $( "#blockOferts" ).prop( "disabled", false );
                }
              }
							$('#higbuser').html(responson.uname);
							$('#msgbid').html(responson.message);
							$('#bidicrement').html(responson.increment);
							
						
						}
						ajax_status=0;
					}
					catch( err  ) {
						//alert(err);
					}
				}
			});
	 }
	
   t=setTimeout("getdetail()",300);	
}	
function getBlock(){
  var lote = <?php echo $result['f_lots_id'];?>;
  $.ajax({
				type: 'POST',
				url: baseUrl+'api/admin/blocklot.php?lotid=<?php echo $result['f_lots_id'];?>',	
				success: function(result) {					

						var responson = jQuery.parseJSON(result);

              if(responson.contador == "1"){
                Preblocount = Preblocount - 1;
                postData = {id:lote, mesagge:"Las ofertas se bloquerán en "+ Preblocount + " segundos"};
                      if(Preblocount >= 0){
                        $.ajax({       
                      type: 'POST',
                      data: postData,
                      url: baseUrl+'api/admin/msgblock.php',           
                      success: function(result) {  
                          
                      }
                      });
                      }else{
                        $.ajax({       
                      type: 'POST',
                      data: postData,
                      url: baseUrl+'admin/bloquearlotes.php',           
                      success: function(result) {  
                          
                      }
                      });
                  }

                }else{
                  Preblocount = 6;
                } 
                }  
			});
	x=setTimeout("getBlock()",800);	
}
function Rangos(Apuesta,lote){
  var res = Apuesta.replace(",", "");
  var Oferta = res.replace(".00","");
  var Rangos = <?php echo json_encode($rangos);?>;

  for(var i = 0; Rangos.length; i++){
      if(Rangos[i].f_finaly == 0){
        if(parseFloat(Oferta) >=  parseFloat(Rangos[i].f_startbid) && parseFloat(Oferta) <= parseFloat(Rangos[i].f_endbid)){
          if(Saltos !== parseFloat(Rangos[i].f_increment)){
            console.log("Incremento: "+Rangos[i].f_increment);
            Saltos = parseFloat(Rangos[i].f_increment);
            postData = {id:lote, increment: Saltos};
            $.ajax({       
                      type: 'POST',
                      data: postData,
                      url: baseUrl+'api/admin/incrementos.php',           
                      success: function(result) {  
                          
                      }
                      });

          }
          break;
          }
      }else{
        if(parseFloat(Oferta) >= parseFloat(Rangos[i].f_startbid)){
          if(Saltos !== parseFloat(Rangos[i].f_increment)){
            Saltos = parseFloat(Rangos[i].f_increment);
            postData = {id:lote, increment: Saltos};
            $.ajax({       
                      type: 'POST',
                      data: postData,
                      url: baseUrl+'api/admin/incrementos.php',           
                      success: function(result) {  
                          
                      }
                });
            
          }
          break;
        }
      }
     

  }



}

getBlock();
getdetail();
	
	
</script>