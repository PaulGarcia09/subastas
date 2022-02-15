<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $title; ?></h1>
  </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  About Us Page
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body pad">
                <div class="mb-3">
                  <textarea class="textarea" name="aboutus" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php echo $pages['about_us'] ?>
                  </textarea>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
              </div>
            </div>

            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Contact Us
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body pad">
                <div class="mb-3">
                  <textarea class="textarea" name="contactus" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php echo $pages['contact_us'] ?>
                  </textarea>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
              </div>
            </div>

            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Terms and Conditions Page
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body pad">
                <div class="mb-3">
                  <textarea class="textarea" name="terms" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php echo $pages['terms_conditions'] ?>
                  </textarea>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
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