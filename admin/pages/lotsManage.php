<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function(){

      $(function () {
        $('.dataTables').DataTable();
      });
  $("#chk-lot").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});   
	$('#del_lots').click(function() {
		 var baseUrl = '<?php echo BASE_URL ?>';
		
      if($('.chk-lot:checked').length == 0) {
        //toastr.info('Please select Lot(s) to delete!');
       alert('Please select Lot(s) to delete!');
      } else { 

	  aID = [];

        $('.chk-lot:checked').each(function() {
          aID.push($(this).val());
        });
	 
		 
            console.log(aID);
            $.confirm({
                title: "",                
                content: "Delete item?",               
                buttons: {                   
                    cancel:function(){
                    },
                     OK: function(){
                        $.ajax({          
                            type: 'POST',
                            data: {id:aID},
                            url: baseUrl+'api/admin/lotsDelete.php',           
                            success: function(result) {
							 
                                datahere =  jQuery.parseJSON(result);  
                                if(datahere.status=="200"){ 
                                  location.reload();                       
                                }else{
                                  showMsg('Failed',"Invalid",'red');  
                                }
                            }    
                        });
                    }
                }
            });
      }
    });
    
  });

</script>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $title; ?></h1>
    </div>


    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title  float-left">List</h3>
					<button class="btn btn-success btn-script-add  btn-xs float-right  " data-toggle="modal" data-target="#modalLots" data-type="add"> <i class="fa fa-plus"></i> Add New Lot</button>
                   <button class="btn btn-danger btn-script-del  btn-xs float-right mr-3" disabled id="del_lots"  data-type="del"><i class="fa fa-trash"></i> Delete</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col mb-3">
                  
                </div>
              </div>
              <?php if($result): $resultado = $result;?>
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
                      <?php foreach ($result as $key => $value): 
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
                  <div class="text-center"><h2>No Data Available</h2></div>
                </div>
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

<div class="modal" tabindex="-1" role="dialog" id="modalLots">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='formDetails' class="formName" enctype="multipart/form-data" method="POST" action="<?php echo BASE_URL.'api/admin/lotsAdd.php' ?>">
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
                      <label class="col-md-3">Orden</label>
                      <div class="col-md-9">
                        <input type="text" name="orden" id="orden" required value="" placeholder="Orden" class="f form-control"  />
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
                  <div class="form-group row" style="display: none;">
                      <label class="col-md-3">Reserve Bid</label>
                      <div class="col-md-9">
                        <input type="number" name="reservebid" id="reservebid" value="" placeholder="Reserve Bid" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Bid Increment</label>
                      <div class="col-md-9">
                        <input type="number" name="bidincrement" id="bidincrement" required value="" placeholder="Bid Increment" class="f form-control"  />
                      </div>
                  </div>
				  <div class="form-group row">
                      <label class="col-md-3">Shipping Fee</label>
                      <div class="col-md-9">
                        <input type="number" name="fee" id="fee" required value="" placeholder="Shipping Fee" class="f form-control"  />
                       <a href="https://www.fedex.com/en-us/online/rating.html" target="_blank"> Shipping Calculator</a>
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
    $(document).ready(function(){
        var baseUrl = '<?php echo BASE_URL ?>';
        var homeUrl = '<?php echo HOME_URL ?>';
        
        $('#modalLots').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('type') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          if(recipient == 'add'){
            modal.find('.modal-title').text('Add Lot')
            modal.find('#formDetails').attr('action', baseUrl+'api/admin/lotsAdd.php');
          }else{
            modal.find('.modal-title').text('Edit Lot')
            modal.find('#formDetails').attr('action', baseUrl+'api/admin/lotsEdit.php');
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
            modal.find('#orden').val(data.f_order);
            modal.find('#fee').val(data.amout);
           primaryimage = homeUrl+'rimage/products/'+data.f_primary_image;
      if(imageExists(primaryimage+'.e.jpg')) validPImage = primaryimage+'.e.jpg';
      else if(imageExists(primaryimage+'.e.jpeg')) validPImage = primaryimage+'.e.jpeg';
      else if(imageExists(primaryimage+'.e.png')) validPImage = primaryimage+'.e.png';
      else if(imageExists(primaryimage+'.e.gif')) validPImage = primaryimage+'.e.gif';
      else validPImage = '<?php echo ASSETS_URL ?>'+'img/photo-not-available.jpg';
      modal.find('#imageUpload').attr('src', validPImage);
		modal.find("#image_row").html('');
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
			
			 
			
			
			
          }
        })
        // $(".btn-script-add").on('click',function(){
        //     $('#modalLots').modal('show')
        //     $("#modalTitle").text("Add Lot");
        // });

        // $(".btn-script-edit").on('click',function(){
        //     var data = $(this).data('data');
        //     $('#modalLots').modal('show');

        //     $("#modalLots").on('shown.bs.modal', function(){
        //       $("#modalTitle").text("Edit Lot");
        //       alert('The modal is fully shown.');
        //     });
        // });


        $(".btn-script-remove").on('click',function(){

            id = $(this).data('id');
            console.log(id);
            $.confirm({
                title: "",                
                content: "Delete item?",               
                buttons: {                   
                    cancel:function(){
                    },
                     OK: function(){
                        $.ajax({          
                            type: 'POST',
                            data: {id:id},
                            url: baseUrl+'api/admin/lotsDelete.php',           
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result);  
                                if(datahere.status=="200"){ 
                                  location.reload();                       
                                }else{
                                  showMsg('Failed',"Invalid",'red');  
                                }
                            }    
                        });
                    }
                }
            });
        });

        $("#imageUpload").on('click',function(){               
           $("#file").trigger('click');    
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
</script>
