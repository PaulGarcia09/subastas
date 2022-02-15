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
    <h1 class="h2">Eventos con tiempo determinado</h1>
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
                           
                              <button class="btn btn-primary btn-xs btn-script-remove" data-toggle="modal" data-target="#modalLots" data-type="edit" 
                              data-id='<?php echo $value["f_events_id"] ?>' data-data='<?php echo json_encode($value) ?>'>Finalizar</button>  
                             
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

<script type="text/javascript">
    $(document).ready(function(){
        var baseUrl = '<?php echo BASE_URL ?>';
        var homeUrl = '<?php echo HOME_URL ?>';


        $(".btn-script-remove").on('click',function(){

            id = $(this).data('id');
            console.log(id);
            $.confirm({
                title: "Confirm!",                
                content: "¿Está seguro de finalizar la subasta?",               
                buttons: {                   
                    cancel:function(){
                    },
                     OK: function(){
                        $.ajax({          
                            type: 'POST',
                            data: {id:id},
                            url: baseUrl+'api/endevent.php',           
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
