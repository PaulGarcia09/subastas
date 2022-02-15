  <script>
     function isNumberKey(evt) {
        console.log(evt.type); 
        if (evt.type == "paste") {
              var clipboardData = evt.clipboardData || window.clipboardData;
              var pastedData = clipboardData.getData('Text');
              if (isNaN(pastedData)) {
                evt.preventDefault();

              } else {
                return;
              }
            }
            var keyCode = evt.keyCode || evt.which;
            if (keyCode >= 96 && keyCode <= 105) {
              // Numpad keys
              keyCode -= 48;
            }
            var charValue = String.fromCharCode(keyCode);
            if (isNaN(parseInt(charValue)) && evt.keyCode != 8) {
              event.preventDefault();
            }           
      }

  </script>
  <main id="main">
        <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg bg-white">
      <div class="container">

        <div class="section-title py-5 px-lg-5">
          <h2 data-aos="fade-up">My Account</h2>
        </div>
        <div class="row">
          <div class="col">
      
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home" >Items Won</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1" >Change Password</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Edit Profile</a>
    </li>
  
  </ul>
            <div class="tab-content">

              <!-- Items WON -->
              <div id="home" class="tab-pane fade  active show">
                <h3 class="text-center p-3">Items Won</h3>
                <div class="row">
                  <?php if(count($itemsWon) > 0): ?>
                    <?php foreach ($itemsWon as $key => $value): 
                        $imagecat = $value['f_primary_image'];
                    ?>
                        <div class="col-lg-3 col-md-4" data-aos="fade-up">
                            <div class="member">
                                <div class="member-img">
                                    <img src="<?php echo HOME_URL ?>rimage/products/<?php echo $imagecat.'.e.jpg';?>" class="same-size" />
                                </div>
                                <div class="member-info text-left">
                                    <h5 class="text-center"><?php echo $value['f_title']; ?></h5>
                                    <p class="m-0"><strong>Lot ID:</strong> <?php echo $value['f_lots_id']; ?></p>
                                    <p class="m-0">Lot number: <?php echo $value['f_number']; ?></p>
                                    <p class="m-0">Start Date: <?php echo date('F d, Y', strtotime($value['f_start_date'])) ?></p>
                                    <p class="m-0">Current bid: $ <?php echo $value['f_current_bid']; ?></p>
                                    <p class="m-0">Shipping fee: $ <?php echo $value['amout']; ?></p>
                                    <hr>
                                    <p class="m-0">Total amout: $ <?php echo ($value['amout']+$value['f_current_bid']); ?></p>
									 <hr>
			  <?php if ($value['f_status'] == 3){  ?>			
          <form action="<?php echo $paypal_url; ?>" method="POST" name="payform">
            <input type="hidden" name="custom" value="<?php echo $customer['f_customer_id']."_".$customer['f_email'] ?>">
            <INPUT TYPE="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo $business_email; ?>">
            <INPUT TYPE="hidden" name="charset" value="utf-8">
            <INPUT TYPE="hidden" NAME="return" value="<?php echo HOME_URL.'thanku.php?id='.$value['f_lots_id'].'&userid='.$customer['f_customer_id'].'&username='.$customer['f_username'].'&amount='.$value['f_current_bid'].'#team'; ?>">
            <INPUT TYPE="hidden" NAME="currency_code" value="USD">
            <INPUT TYPE="hidden" NAME="amount" value="<?php echo $value['f_current_bid']; ?>">
            <INPUT TYPE="hidden" NAME="shipping" value="<?php echo $value['amout']; ?>">
            <INPUT TYPE="hidden" NAME="item_name" value="<?php echo $value['f_title']; ?>">
            <INPUT TYPE="hidden" NAME="item_number" value="<?php echo "AB Lot No.".$value['f_lots_id']; ?>">
            <INPUT TYPE="hidden" NAME="rm" value="2">
            <INPUT TYPE="hidden" NAME="image_url" value="http://45.79.135.15/new-layout/assets/img/VA_Logo.png">

            <button class="btn btn-info btn-block btn-xs btn-script-pay"  class="pay-now" ><i class="fab fa-paypal"></i>ay now</button>
                            
          </form> 
                    
			  <?php }else if ($value['f_status'] == 4){   ?>	
			   <button class="btn btn-warning btn-block btn-xs btn-script-pay"  disabled  style="cursor: not-allowed;" ><i class="fab fa-paypal"></i>aid</button>
              
			  <?php }    ?>			  
									
								 
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                  <div class="col">
                    <div class="text-center"><h2>No Item Available</h2></div>
                  </div>
                  <?php endif; ?>
                </div>
              </div>

              <!-- CHANGE PASSWORD -->
              <div id="menu1" class="tab-pane fade">
                <h3 class="text-center p-3">Change Password</h3>
                <div class="row">
                  <div class="col-9 align-self-center">
                    <form id="passwordDetails">
                      <div class="form-group row">
                        <label for="currentPassword" class="col-sm-4 col-form-label">*Current Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">*New Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirmPassword" class="col-sm-4 col-form-label">*Confirm Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-right">
                          <span class="btn btn-success btn-script-pass">Submit</span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


              <!-- Edit account -->
              <div id="menu2" class="tab-pane fade">
                <h3 class="text-center p-3">Profile</h3>
                <div class="row">
                  <div class="col-9 align-self-center">
                    <form id="formDetails">

                      <div class="accountInfo">
                        <h4>Personal Information</h4>

                        <div class="form-group row">
                          <label for="firstName" class="col-sm-4 col-form-label">*User Name</label>
                          <div class="col-sm-8">
                            <?php echo $customer['f_username'] ?>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="firstName" class="col-sm-4 col-form-label">*First name</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_firstname'] ?>" class="form-control" id="firstName" name="firstName" placeholder="First name">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="lastName" class="col-sm-4 col-form-label">*Last name</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_lastname'] ?>" class="form-control" id="lastName" name="lastName" placeholder="Last name">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="email" class="col-sm-4 col-form-label">*E-mail</label>
                          <div class="col-sm-8">
                            <input type="email" value="<?php echo $customer['f_email'] ?>" class="form-control" id="email" name="email" placeholder="Email">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="phoneNumber" class="col-sm-4 col-form-label">*Phone number</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_telephone'] ?>" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone number">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="fax" class="col-sm-4 col-form-label">Fax number</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_fax'] ?>" class="form-control" id="fax" name="fax" placeholder="Fax number">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="fax" class="col-sm-4 col-form-label">Paddle Number</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['paddle_number'] ?>" class="form-control" id="fax" name="paddleNumber" placeholder="Paddle Number" onpaste="isNumberKey(event)" onkeydown="isNumberKey(event)">
                          </div>
                        </div>
                      </div>

                      <div class="accountInfo">
                        <h4>Address Information</h4>

                        <div class="form-group row">
                          <label for="address1" class="col-sm-4 col-form-label">*Address 1</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_address_1'] ?>" class="form-control" id="address1" name="address1" placeholder="Address 1">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="address2" class="col-sm-4 col-form-label">Address 2</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_address_2'] ?>" class="form-control" id="address2" name="address2" placeholder="Address 2">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="city" class="col-sm-4 col-form-label">*City</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_city'] ?>" class="form-control" id="city" name="city" placeholder="City">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="state" class="col-sm-4 col-form-label">*State/Province:</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_state'] ?>" class="form-control" id="state" name="state" placeholder="State/Province">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="postalCode" class="col-sm-4 col-form-label">*Post Code</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_postcode'] ?>" class="form-control" id="postalCode" name="postalCode" placeholder="Postal Code">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="country" class="col-sm-4 col-form-label">*Country</label>
                          <div class="col-sm-8">
                            <select id="country" class="form-control" name="country">
                              <?php foreach ($countryListAllIsoData as $key => $value) {
                                $countryName = $value['name'];
                                if($customer['f_country'] == $countryName){
                                  echo '<option value="'.$countryName.'" selected>'.$countryName.'</option>';
                                }else{
                                  echo '<option value="'.$countryName.'">'.$countryName.'</option>';
                                }
                              } ?>
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="accountInfo">
                        <h4>Other Information</h4>
                        
                        <div class="form-group row">
                          <label for="contactname" class="col-sm-4 col-form-label">Company Name:</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_contact_name'] ?>" class="form-control" id="contactname" name="contactname" placeholder="Company Name">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="contactnumber" class="col-sm-4 col-form-label">Company Number</label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer['f_contact_number'] ?>" class="form-control" id="contactnumber" name="contactnumber" placeholder="Company number">
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col text-right">
                          <span class="btn btn-success btn-script-edit">Submit</span>
                        </div>
                      </div>


                    </form>
                  </div>
                </div>
              </div>


            </div>

          </div>
        </div>



      </div>
    </section><!-- End Team Section -->




  </main><!-- End #main -->

<script type="text/javascript">
    $(document).ready(function(){
        function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
          return true;
      }

        baseUrl = '<?php echo BASE_URL ?>';
        $(".btn-script-pass").on('click',function(){
            $.ajax({          
                type: 'POST',
                data: $("#passwordDetails").serialize(),                          
                url: '<?php echo BASE_URL ?>api/changePassword.php',           
                success: function(result) {  
                    datahere =  jQuery.parseJSON(result); 
                    if(datahere.status=="200"){                           
                        $("#bidamount").removeClass('is-invalid');
                        $("#bidamount").addClass('is-valid');
                        confirmOkOnly("green",'Successfully',"info",baseUrl+"/myAccount.php")
                    }else{
                        $("#bidamount").addClass('is-invalid');
                        $("#bidamount").removeClass('is-valid');
                        showMsg("Invalid",datahere.message,'red');  
                    }                }    
            });
        });

        $(".btn-script-edit").on('click',function(){
          $.ajax({          
            type: 'POST',
            data: $("#formDetails").serialize(),                          
            url: '<?php echo BASE_URL ?>api/updateAccount.php',           
            success: function(result) {  
              datahere =  jQuery.parseJSON(result); 
              if(datahere.status=="200"){                           
                  $("#bidamount").removeClass('is-invalid');
                  $("#bidamount").addClass('is-valid');
                  confirmOkOnly("green",'Successfully',"info",baseUrl+"/myAccount.php")
              }else{
                  $("#bidamount").addClass('is-invalid');
                  $("#bidamount").removeClass('is-valid');
                  showMsg("Invalid",datahere.message,'red');  
              }                
            }    
          });
        });
$('.pay-now').click(function() {
          $('.pay-now').attr('disabled', true);
      
          payform.submit();
        });

    });
</script>




