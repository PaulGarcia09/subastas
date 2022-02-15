<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $title; ?></h1>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Paypal Setup</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fb" class="font-weight-bold">Sandbox paypal email</label>
                        <input type="text" class="form-control" required id="sandboxpaypal" name="sandboxpaypal" placeholder="Sandbox paypal" value="<?php  echo $setting['sandbox'] ?>">
                      <div class="form-group">
                        <label for="twitter" class="font-weight-bold">Live paypal email</label>
                        <input type="text" class="form-control" required id="livepaypal" name="livepaypal" placeholder="Live paypal" value="<?php  echo $setting['live'] ?>">
                      </div><div class="form-group">
                        <label for="twitter" class="font-weight-bold">Active paypal</label>
						<select id="active_type" class="form-control" name="active_type" required="">
											<option value="">--Please Select-- </option> 
											<option <?php if(  $setting['active_type']==0){echo "selected";}?> value="0">Sandbox </option> 
											<option <?php if(  $setting['active_type']==1){echo "selected";}?> value="1">Live </option> 
										 </select> 
						
                           </div>
					  
					  
					 </div>
                    </div>
                     
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </div>
        </form>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </main>
  <script type="text/javascript">
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>