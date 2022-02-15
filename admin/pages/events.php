<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function(){

      $(function () {
        $('.dataTables').DataTable();
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
              <h3 class="card-title float-left">List</h3>
			   <button class="btn btn-success btn-xs btn-script-add float-right" data-toggle="modal" data-target="#modalLots" data-type="add"><i class="fa fa-plus"></i> Add New Event</button>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <?php if($result): ?>
                <div class="table-responsive">
                  <table class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th width="20%">Title</th>
                      <th>Number</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th width="5%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $key => $value): 
                        $imagecat = $value['f_primary_image'];
                      ?>

                        <tr>
                          <td><?php echo $value['f_events_id']; ?></td>
                          <td><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" class="img-thumbnail" alt=""></td>
                          <td><?php echo $value['f_title']; ?></td>
                          <td><?php echo $value['f_number']; ?></td>
                          <td><?php echo date('Y-m-d', strtotime($value['f_start_date'])); ?></td>
                          <td><span class="badge badge-<?php echo ($value['f_status'] == '') ? "danger":"success" ?>"><?php echo ($value['f_status'] == '') ? "Inactive":"Active" ?></span></td>
                          <td align="right" nowrap>
                           
                              <button class="btn btn-primary btn-xs btn-script-edit" data-toggle="modal" data-target="#modalLots" data-type="edit" data-data='<?php echo json_encode($value) ?>'>Edit</button>
                             
                              <button class="btn btn-danger btn-xs btn-script-remove" data-id='<?php echo $value["f_events_id"] ?>'>Delete</button>
                             
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
  </main>

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
        <form id='formDetails' class="formName" enctype="multipart/form-data" method="POST" action="<?php echo BASE_URL.'api/admin/eventsAdd.php' ?>">
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
                      <input type="hidden" name="eventid" id="eventid" value=""/>
                      <label class="col-md-3">Title</label>
                      <div class="col-md-9">
                        <input type="text" name="title" id="title" required value="" placeholder="Title" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Event Number</label>
                      <div class="col-md-9">
                        <input type="text" name="lotnumber" id="lotnumber" required value="" placeholder="Event Number" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Description</label>
                      <div class="col-md-9">
                        <textarea class="form-control" rows="3" name="lot_description" id="lot_description" required></textarea>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Tipo de subasta</label>
                      <div class="col-md-9">
                      <?php if($typevents): ?>
                            <select name="event" id="eventos" style="width: 340px;border-radius: 0.25rem;padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da">
                            <option value="">Seleccionar tipo de evento</option>
                            <?php foreach ($typevents as $valuedata) {?>
                                <option value='<?php echo $valuedata['id']?>'
                                <?php
                                    if($start==$valuedata['id'])
                                    {
                                    echo "selected";
                                    }     
                                ?>><?php echo $valuedata['nombre']?>
                                </option>
                            <?php } ?>
                            </select> 
                        <?php else : ?>
                        <h2>No hay eventos para mostrar<h2>
                        <?php endif ; ?>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3">Start Date</label>
                      <div class="col-md-9">
                        <input type="date" name="untilDate" id="untilDate" required value="" placeholder="Start Date" class="f form-control"  />
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-12">
                      <label>Image</label>
                      <small>Note: Image must be in JPG format.  For best result, the recommended image size is 700x700 pixels.</small>
                    </div>
                    <div class="col-12">
                      <input  type='file' accept="image/*" name="product_image" id="file" onchange="readURL(this);"  style="display:none"/>
                      <img width="100" height="100" id="imageUpload" src='<?php echo ASSETS_URL."img/photo-not-available.jpg" ?>'>
                    </div>
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col text-right">
                <button type="submit" class="btn btn-success">Save</button>
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
            modal.find('.modal-title').text('Add Event')
            modal.find('#formDetails').attr('action', baseUrl+'api/admin/eventsAdd.php');
            modal.find('#eventid').val("");
            modal.find('#title').val("");
            modal.find('#lotnumber').val("");
            modal.find('#lot_description').val("");
            modal.find('#untilDate').val("");
            modal.find('#imageUpload').attr('src', baseUrl+'assets/img/photo-not-available.jpg');
          }else{
            modal.find('.modal-title').text('Edit Event')
            modal.find('#formDetails').attr('action', baseUrl+'api/admin/eventsEdit.php');
            var data = button.data('data')

            if(data.f_status == '1'){
              modal.find('#activebox').attr('checked', true);
            }else{
              modal.find('#activebox').attr('checked', false);
            }
            modal.find('#eventid').val(data.f_events_id);
            modal.find('#eventos').val(data.f_eventtype);
            modal.find('#title').val(data.f_title);
            modal.find('#lotnumber').val(data.f_number);
            modal.find('#lot_description').val(data.f_description);
            modal.find('#untilDate').val(data.f_start_date);
            modal.find('#imageUpload').attr('src', homeUrl+'rimage/products/'+data.f_primary_image+'.e.jpg');
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
                title: "Confirm!",                
                content: "Are you sure you want to remove this Event?",               
                buttons: {                   
                    cancel:function(){
                    },
                     OK: function(){
                        $.ajax({          
                            type: 'POST',
                            data: {id:id},
                            url: baseUrl+'api/admin/eventsDelete.php',           
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

  
</script>
