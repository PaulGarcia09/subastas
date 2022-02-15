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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Images</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fb" class="font-weight-bold">Upload Logo <small>(Will be automatically resized and centered.)</small> </label>
                        <div>
                          <img height="70" style="background: black;"   id="logo" src='<?php echo ASSETS_URL."img/".$setting['logo_image'] ?>'>
                        </div>
                        <div class="mt-2">
                          <input  type='file' accept="image/*" name="logos" onchange="readURL(this,'logo');" />
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fb" class="font-weight-bold">Upload Center Image <small>(800 pixels Wide & 450 pixels high) </small> </label>
                        <div>
                          <img height="70"   id="banner" src='<?php echo ASSETS_URL."img/".$setting['center_image'] ?>'>
                        </div>
                        <div class="mt-2">
                          <input  type='file' accept="image/*" name="banner" onchange="readURL(this,'banner');" />
                        </div>
                      </div>
                    </div>

                  <!--    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fb">Upload Side Ad <small>(160 pixels wide & 270 pixels high)  </small> </label>
                        <div>
                          <img width="300"  id="ads" src='<?php echo ASSETS_URL."img/".$setting['ad_image'] ?>'>
                        </div>
                        <div class="mt-2">
                          <input  type='file' accept="image/*" name="ads" onchange="readURL(this,'ads');" />
                        </div>
                      </div>
                    </div>-->

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Social Media</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fb" class="font-weight-bold">Facebook</label>
                        <input type="text" class="form-control" id="fb" name="fb" value="<?php echo $setting['facebook_url'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="twitter" class="font-weight-bold">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $setting['twitter_url'] ?>">
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