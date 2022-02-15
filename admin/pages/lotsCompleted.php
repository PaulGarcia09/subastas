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
					<button class="btn btn-success btn-script-add  btn-xs float-right  " style="display: none;" data-toggle="modal" data-target="#modalLots" data-type="add"> <i class="fa fa-plus"></i> Add New Lot</button>
                   <button class="btn btn-danger btn-script-del  btn-xs float-right mr-3" id="del_lots"  data-type="del"><i class="fa fa-trash"></i> Delete</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col mb-3">
                  
                </div>
              </div>
                <!-- <div class="row">
                  <div class="col mb-3">
                    <button class="btn btn-success btn-script-addasd">Add New Lots</button>
                  </div>
                </div> -->
                <?php if($result): ?>
                  <div class="table-responsive">
                    <table class="dataTables table table-bordered table-hover">
                      <thead>
                      <tr>
                    <th><input type="checkbox" id="chk-lot" /></th>
                        <th>ID</th>
                        <th>Image</th>
                        <th width="20%">Title</th>
                        <th>Number</th>
                        <th>Highest Bidder</th>
                        <th>UserID</th>
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
                             <td><input type="checkbox" class="chk-lot" value="<?php echo $value['f_lots_id']; ?>" /> </td>
                            <td><?php echo $value['f_lots_id']; ?></td>
                            <td><img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" width="150" class="img-thumbnail" alt=""></td>
                            <td><?php echo $value['f_title']; ?></td>
                            <td><?php echo $value['f_number']; ?></td>
                            <td><?php echo $value['f_bid_user_name']; ?></td>
                            <td><?php echo $value['f_bid_user']; ?></td>
                            <td><?php echo date('Y-m-d', strtotime($value['f_start_date'])); ?></td>
                            <td><span class="badge badge-<?php echo ($value['f_status'] >= 3) ? "success":"warning" ?>"><?php echo ($value['f_status'] >= 3) ? "Sold":"closed" ?><?php echo ($value['f_status'] > 3) ? " - Paid":"" ?></span></td>
                             <td align="right" nowrap>
                               
                                <!--<button class="btn btn-info btn-xs btn-script-edit123" data-toggle="modal" data-target="#modalLots"  data-data='<?php echo json_encode($value) ?>'>History</button>-->
                                <button class="btn btn-info btn-xs btn-script-edit123 <?php  if($value['f_status'] > 3){ echo 'btn-block ';}?>" data-toggle="modal" data-target="#modalLots" data-id='<?php echo $value["f_lots_id"] ?>'  >History</button>
                              <?php  if($value['f_status'] <= 3){ ?>
								   <button class="btn btn-primary btn-xs btn-script-repost" data-id='<?php echo $value["f_lots_id"] ?>'>Repost</button>
							 <?php	  
							  }
                        ?>
                               
                              
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
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </main>

<div class="modal" tabindex="-1" role="dialog" id="modalLots">
  <div class="modal-dialog modal-lg" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='formDetails' class="formName" enctype="multipart/form-data" method="POST" action=" ">
             
            
			<div class="row">
              <div class="col">
               
               <table width="100%" class="dataTables table table-bordered table-hover">
				 <thead>
		          <tr style="background-color: rgb(244, 244, 248);">
		            
		           	<td class="center">Username</td>
                <td class="center">Paddle Number</td>		
		           	<td class="center">Lot ID</td>		
		           	<td class="center">Amount</td>			            		      
		            <td class="center">Date</td>
		            <td class="center">Type</td>	           
		            
		          </tr>
		        </thead>
                  <tbody id="image_row">                    
                  </tbody>
                  <tfoot>                   
                    <tr>
                       
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col text-right">
                
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

        $(".btn-script-repost").on('click',function(){

            id = $(this).data('id');
            $.confirm({
                title: " ",                
                content: "Please confirm",               
                buttons: {                   
                    cancel:function(){
                    },
                     OK: function(){
                        $.ajax({          
                            type: 'POST',
                            data: {id:id},
                            url: baseUrl+'api/admin/lotsRepost.php',           
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result);  
                                if(datahere.status==200){ 
                                  loadUrl = baseUrl + "admin/lots.php?type=manage";
                                  window.location.href = loadUrl;                      
                                }else{
                                  showMsg('Failed',"Invalid",'red');  
                                }
                            }    
                        });
                    }
                }
            });
        }); 
		
		$(".btn-script-edit123").on('click',function(){

            id = $(this).data('id');
           // alert(id);
			
			$("#image_row").html(' <img src="'+baseUrl+'assets/img/spin.gif"   alt="loading" />');
						$.post(baseUrl+"api/admin/admin-lots-history.php",{lotid: id},function(result){
				//   alert(id);
						$("#image_row").html(result);
						});
						
						 
						
                        // $.ajax({          
                            // type: 'POST',
                            // data: {id:id},
                            // url: baseUrl+'api/admin/lotsRepost.php',           
                            // success: function(result) {  
                                // datahere =  jQuery.parseJSON(result);  
                                // if(datahere.status==200){ 
                                  // loadUrl = baseUrl + "admin/lots.php?type=manage";
                                  // window.location.href = loadUrl;                      
                                // }else{
                                  // showMsg('Failed',"Invalid",'red');  
                                // }
                            // }    
                        // });
                     
               
        });


    });


    
    function showPopIt(data, action)
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

        required = 'required';

        if(data !=''){
          console.log(data);
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
                                              <small>Leave empty if you dont want to change it</small>
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
                                              <?php foreach ($countryListAllIsoData as $key => $value) {
                                                $countryName = $value['name'];
                                                echo '<option value="'.$countryName.'">'.$countryName.'</option>';
                                              } ?>
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
                        showUI(1);
                        if(action == "add"){
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
      
            }
        });
    }


</script>
