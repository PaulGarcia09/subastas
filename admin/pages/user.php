<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function(){

      $(function () {
        $('.dataTables').DataTable();
      });
      function showMsg(title,contentMsg,type){
          $.alert({
            title:title,
            type:type,
            content:contentMsg
          });
      }
      function showUI(elem){
          if(elem==1){
             $.blockUI({ message: '<img src="<?php echo ASSETS_URL ;?>img/spin.gif" />' ,
              baseZ: 2000,
              css: { width: '4%', border:'0px solid #FFFFFF',cursor:'wait',backgroundColor:'none'},
              overlayCSS:  { backgroundColor: '#fffcfc',opacity:0.9,cursor:'wait'} 
              }); 
          }else{
              $.unblockUI();
          }
      }
  });
</script>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $title; ?></h1>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title    float-left">List</h3> <button class="btn btn-success btn-script-add  btn-xs float-right"> <i class="fa fa-plus"></i> Add New User</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              
              <?php if($users): ?>
                <table class="dataTables table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Paddle Number</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Status</th>
                   <th width="5%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach ($users as $key => $value): 
                      if($value['f_type'] != "admin"):
                    ?>

                      <tr>
                        <td><?php echo $value['f_customer_id']; ?></td>
                        <td><?php echo $value['f_username']; ?></td>
                        <td><?php echo $value['paddle_number']; ?></td>
                        <td><?php echo $value['f_email']; ?></td>
                        <td><?php echo $value['f_firstname']." ".$value['f_lastname']; ?></td>
                        <td><span class="badge badge-<?php echo ($value['f_status'] == 1) ? "success":"warning" ?>"><?php echo ($value['f_status'] == 1) ? "Active":"Inactive" ?></span></td>
                        <td align="right" nowrap>
                         
                            <a style="color:white;" class="btn btn-<?php echo ($value['f_status'] == 1) ? "warning":"success" ?> btn-xs btn-script-changeStat" data-id="<?php echo $value["f_customer_id"] ?>" data-status='<?php echo $value["f_status"] ?>'><?php echo ($value['f_status'] == 1) ? "Deactivate":"Activate" ?></a>
                            <button class="btn btn-primary btn-xs btn-script-edit" data-data='<?php echo json_encode($value) ?>'>Edit</button>
                            <button class="btn btn-danger btn-xs btn-script-remove" data-id='<?php echo $value["f_customer_id"] ?>'>Delete</button>
                           
                        </td>
                      </tr>
                    <?php 
                      endif;
                    endforeach; 
                    ?>
                  </tbody>
                </table>
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
                content: "Please confirm",               
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


    
    function showPopIt(data, actionx )
    {
        baseUrl = '<?php echo BASE_URL ?>';

        f_customer_id = '';
        f_username = '';
        f_password = '';
        f_real = '';
        f_email = '';
        f_firstname = '';
        f_lastname = '';
        f_telephone = '';
        f_fax = '';
        f_address_1 = '';
        f_address_2 = '';
        f_city = '';
        f_postcode = '';
        f_country = '';
        f_state = '';
        f_contact_name = '';
        f_contact_number = '';
        paddle_number='';
        required = 'required';

        if(data !=''){
          f_customer_id = data.f_customer_id;
          f_username = data.f_username;
          f_password = data.f_password;
          f_real = data.f_real;
          f_email = data.f_email;
          f_firstname = data.f_firstname;
          f_lastname = data.f_lastname;
          f_telephone = data.f_telephone;
          f_fax = data.f_fax;
          f_address_1 = data.f_address_1;
          f_address_2 = data.f_address_2;
          f_city = data.f_city;
          f_postcode = data.f_postcode;
          f_country = data.f_country;
          f_state = data.f_state;
          f_contact_name = data.f_contact_name;
          f_contact_number = data.f_contact_number;
          paddle_number = data.paddle_number;
          required = '';

        }
        $.confirm({
            title: '<?php echo $title ?>',
            columnClass: 'medium',
            content: `
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName">
                                <div class='row'>
                                    <div class="col">   
                                        <h3>Account Details</h3>

                                        <div class="form-group row">
                                            <input type="hidden" name="f_customer_id" value="`+f_customer_id+`"/>
                                            <label class="col-md-3">User name</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_username" `+required+` value="`+f_username+`" placeholder="User Name" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Password</label>
                                            <div class="col-md-9">
                                              <input type="password" name="f_password" `+required+` value="" placeholder="Password" class="f form-control"  />
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Paddle Number</label>
                                            <div class="col-md-9">
                                              <input type="text" name="paddleNumber" value="`+paddle_number+`" placeholder="Paddle Number" maxlength = "4" class="f form-control" onkeypress='return valideKey(event);' onkeyup='validarEntero(this)'/>
                                              <i style="font-size: 11px;">Choose any 4 numbers from 0-9.</i>
                                            </div>
                                        </div>
                                        <h3>Personal Details</h3>
                                        <div class="form-group row">
                                            <label class="col-md-3">First Name</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_firstname" required value="`+f_firstname+`" placeholder="First Name" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Last Name</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_lastname" required value="`+f_lastname+`" placeholder="Last Name" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Email</label>
                                            <div class="col-md-9">
                                              <input type="email" name="f_email" required value="`+f_email+`" placeholder="Email" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Telephone</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_telephone" value="`+f_telephone+`" placeholder="Telephone" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Fax</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_fax" value="`+f_fax+`" placeholder="Fax" class="f form-control"  />
                                            </div>
                                        </div>
                                        <h3>Address</h3>
                                        <div class="form-group row">
                                            <label class="col-md-3">Address1</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_address_1" required value="`+f_address_1+`" placeholder="Address1" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Address2</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_address_2"  value="`+f_address_2+`" placeholder="Address2" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">City</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_city" required value="`+f_city+`" placeholder="City" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Postal Code</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_postcode" required value="`+f_postcode+`" placeholder="Postal Code" class="f form-control"  />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">Country</label>
                                            <div class="col-md-9">
                                            <select id="country" class="form-control" name="country" required>
											<option value="`+f_country+`">`+f_country+`</option> 
                                              <?php foreach ($countryListAllIsoData as $key => $value) {
												  
                                                $countryName = $value['name'];?>
												 
                                                <option value="<?php echo $countryName;  ?>"><?php echo $countryName;  ?></option>';
                                             
											 <?php  } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">State/Province</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_state" required value="`+f_state+`" placeholder="State/Province" class="f form-control"  />
                                            </div>
                                        </div>
                                        <h3>Other Information</h3>
                                        <div class="form-group row">
                                            <label class="col-md-3">Company Name</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_contact_name" value="`+f_contact_name+`" placeholder="Company Name" class="f form-control"  />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Company Number</label>
                                            <div class="col-md-9">
                                              <input type="text" name="f_contact_number" value="`+f_contact_number+`" placeholder="Company Number" class="f form-control"  />
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
						//alert(actionx);
                        //showUI(1);
                        if(actionx == "add"){
                          urlAction = baseUrl+'api/admin/userAdd.php';
                        }else{
                          urlAction = baseUrl+'api/admin/userEdit.php';
                        }
                        $.ajax({          
                            type: 'POST',
                            data: $("#formDetails").serialize(),                          
                            url: urlAction,           
                            success: function(result) { 
							              
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status=="200"){            
                                   location.reload(); 
                                }else{
                                    //showMsg("Invalid",datahere.message,'red'); 
                                    //alert(datahere.message);
                                     
                                     console.log(data);
                                    if(actionx == "add"){
                                        showPopIt("","add");
                                        $.alert({
                                          title:"Invalid",
                                          type:"red",
                                          content:datahere.message
                                        });
                                    }else{
                                        showPopIt(data,"edit");
                                        $.alert({
                                          title:"Invalid",
                                          type:"red",
                                          content:datahere.message
                                        });
                                    }                                     
                                    //
                                    //showPopIt('',"add"); 
                                }
                                //showUI(0);
                            }    
                        });

                          //return false;
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
    function validarEntero(e){
      var valor = e.value;
      if(valor !== ""){
        e.value=parseInt(valor);
      }
    }
    function valideKey(evt) {
                var code = evt.which ? evt.which : evt.keyCode;
                if (code == 8) {
                    //backspace
                    return true;
                } else if (code >= 48 && code <= 57) {
                    return true;
                } else {
                    return false;
                }
            }

</script>
