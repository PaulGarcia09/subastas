<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $title; ?></h1>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-6">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title" class="font-weight-bold">Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <?php if(isset($alert)): ?>
                  <div class="alert alert-<?php echo $alert['status'] ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $alert['message'] ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                      </div>
                      <div class="form-group">
                        <label for="cpassword" class="font-weight-bold">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" value="">
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