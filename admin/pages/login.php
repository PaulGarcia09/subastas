<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auction Broadcaster</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo ASSETS_URL ?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo ASSETS_URL ?>css/dashboard.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo ASSETS_URL;?>fontawesome-free/css/all.min.css">

  <!-- Bootstrap 4 -->
  <script src="<?php echo ASSETS_URL ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body class="hold-transition login-page" style="height: 100vh;">
  <div class="container h-100">
    <div class="row h-100">
      <div class="offset-lg-4 col-lg-4 my-auto">   
        <div class="login-box">
          <div class="login-logo text-center">
            <a href="<?php echo BASE_URL ?>"><h3><?php echo $companyName ?></h3></a>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Sign in to start your session</p>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" name="username" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col text-right">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.login-box -->

</body>
</html>
