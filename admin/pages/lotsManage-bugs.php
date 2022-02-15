<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function(){

      $(function () {
        $('.dataTables').DataTable();
      });

  });
</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col mb-3">
                  <button class="btn btn-success btn-script-add">Add New Lot</button>
                </div>
              </div>
              <?php if($result): ?>
                <div class="table-responsive">
                  <table class="dataTables table table-bordered table-hover">
                    <thead>
                    <tr>
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
                          <td><?php echo $value['f_lots_id']; ?></td>
                          <td><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" class="img-thumbnail" alt=""></td>
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
                          <td><?php echo date('M d, Y', strtotime($value['f_start_date'])); ?></td>
                          <td><span class="btn btn-xs btn-<?php echo ($value['f_status'] == 1) ? "success":"danger" ?>"><?php echo ($value['f_status'] == 1) ? "Active":"Deactivate" ?></span></td>
                          <td><span class="btn btn-xs btn-<?php echo ($value['f_selected'] == '') ? "danger":"success" ?>"><?php echo ($value['f_selected'] == '') ? "No":"Yes" ?></span></td>
                          <td align="right">
                            <div>
                              <button class="btn btn-primary btn-xs btn-script-edit123" data-data='<?php echo json_encode($value) ?>'>Edit</button>
                            </div>
                            <div>
                              <button class="btn btn-danger btn-xs btn-script-remove123" data-id='<?php echo $value["f_lots_id"] ?>'>Delete</button>
                            </div>
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

<script type="text/javascript">
    $(document).ready(function(){
        var baseUrl = '<?php echo BASE_URL ?>';
        $(".btn-script-add").on('click',function(){
            showPopIt('',"add"); 
        });

        $(".btn-script-edit").on('click',function(){
            var data = $(this).data('data');
            showPopIt(data,"edit"); 
        });

        $(".btn-script-changeStat").on('click',function(){

            id = $(this).data('id');
            status = $(this).data('status');
            $.ajax({          
                type: 'POST',
                data: {id:id, status:status},
                url: baseUrl+'api/admin/userChangeStat.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result);  
                    if(datahere.status=="200"){ 
                      location.reload();                       
                    }else{
                      showMsg('Failed',"Invalid",'red');  
                    }
                }    
            });
        });

        $(".btn-script-remove").on('click',function(){

            id = $(this).data('id');
            console.log(id);
            $.confirm({
                title: "Confirm!",                
                content: "Are you sure do want to remove?",               
                buttons: {                   
                    cancel:function(){
                    },
                     OK: function(){
                        $.ajax({          
                            type: 'POST',
                            data: {id:id},
                            url: baseUrl+'api/admin/userDelete.php',           
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


    });


    
    function showPopIt(data, action)
    {
        baseUrl = '<?php echo BASE_URL ?>';

        lotid = '';
        title = '';
        lotnumber = '';
        lot_description = '';
        untilDate = '';
        image = '';
        minimumbid = '';
        reservebid = '';
        bidincrement = '';

        required = 'required';
        isActive = 'checked';
        image_url = '<?php echo ASSETS_URL."img/photo-not-available.jpg" ?>';

        if(data !=''){
          lotid = '';
          title = '';
          lotnumber = '';
          lot_description = '';
          untilDate = '';
          image = '';
          minimumbid = '';
          reservebid = '';
          bidincrement = '';

          required = '';
          isActive = 'checked';
          // if(image_url == undefined){
              image_url ='';     
          // }

        }
        $.confirm({
            title: '<?php echo $title ?>',
            columnClass: 'medium',
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName" enctype="multipart/form-data">
                                <div class='row'>
                                    <div class="col-12 text-right">
                                        <div class="form-group">
                                            <label>Activate</label>
                                            <input type="checkbox" value="true" `+isActive+` name="activebox">
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                   <div class="col">   
                                      <div class="form-group row">
                                          <input type="hidden" name="lotid" value="`+lotid+`"/>
                                          <label class="col-md-3">Title</label>
                                          <div class="col-md-9">
                                            <input type="text" name="title" required value="`+title+`" placeholder="Title" class="f form-control"  />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3">Lot Number</label>
                                          <div class="col-md-9">
                                            <input type="text" name="lotnumber" required value="`+lotnumber+`" placeholder="Lot Number" class="f form-control"  />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3">Description</label>
                                          <div class="col-md-9">
                                            <textarea class="form-control" rows="3" name="lot_description" required>`+lot_description+`</textarea>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3">Start Date</label>
                                          <div class="col-md-9">
                                            <input type="date" name="untilDate" required value="`+untilDate+`" placeholder="Start Date" class="f form-control"  />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3">Minimum Bid</label>
                                          <div class="col-md-9">
                                            <input type="number" name="minimumbid" required value="`+minimumbid+`" placeholder="Minimum Bid" class="f form-control"  />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3">Reserve Bid</label>
                                          <div class="col-md-9">
                                            <input type="number" name="reservebid" required value="`+reservebid+`" placeholder="Reserve Bid" class="f form-control"  />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-3">Bid Increment</label>
                                          <div class="col-md-9">
                                            <input type="number" name="bidincrement" required value="`+bidincrement+`" placeholder="Bid Increment" class="f form-control"  />
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
                                          <small>Note: For best result, recommended image size is 700x700 pixels.</small>
                                        </div>
                                        <div class="col-12">
                                          <input  type='file' accept="image/*" name="primary_image" id="file" onchange="readURL(this);"  style="display:none"/>
                                          <img width="100" height="200" id="imageUpload" src='`+image_url+`'>
                                        </div>
                                      </div>
                                   </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`,
                buttons: {
                cancel: function () {
                    //close
                },    

                formSubmit: {
                    text: 'Save',
                    btnClass: 'btn-success',
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
                        if(action == "add"){
                          urlAction = baseUrl+'api/admin/lotsAdd.php';
                        }else{
                          urlAction = baseUrl+'api/admin/userEdit.php';
                        }

                        var formData = new FormData();
                        formData.append('primary_image', $('#file')[0].files[0]);  

                        var postData = $("#formDetails").serialize();


                        $.ajax({          
                            type: 'POST',
                            data: {formData,postData}, //$("#formDetails").serialize(),                          
                            url: urlAction,    
                            enctype: 'multipart/form-data',       
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status==200){            
                                    location.reload();
                                }else{
                                    showMsg("Invalid",datahere.message,'red'); 
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

                $("#imageUpload").on('click',function(){               
                   $("#file").trigger('click');    
                }); 
      
            }
        });
    }

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
