 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"> <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-7"><div class="alert alert-primary  " role="alert">	You may add embed code in the box to enable live audio
or video streaming. <br>
Code is provided by your live streaming services provider</div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Audio/Video Stream (Embed Code)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="fb" class="font-weight-bold">Stream</label>
                        <textarea class="textarea" name="tstream" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?php echo $stream['f_video'] ?>
                        </textarea>
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
  </div>
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