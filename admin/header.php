<?php 
$url = $_SERVER['SCRIPT_NAME'];
$lastSlash = substr(strrchr(rtrim($url, '/\\'), '/'), 1);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?php echo $companyName ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ASSETS_URL ?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo ASSETS_URL ?>css/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo ASSETS_URL;?>fontawesome-free/css/all.min.css">

    <!-- Bootstrap 4 -->
    <script src="<?php echo ASSETS_URL ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo ASSETS_URL ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="<?php echo ASSETS_URL ?>css/jquery-confirm.css" rel="stylesheet">
    <script src="<?php echo ASSETS_URL ?>js/jquery-confirm.js"></script>
    <script src="<?php echo ASSETS_URL ?>vendor/jquery/jquery.blockUI.js"></script>

  </head>
  <style type="text/css">
    i.nav-icon{
      padding-right: 1rem;
    }
    i.right{
      float: right;
    }
    li.nav-item {
      width: 100%;
    }
    li.nav-item:hover {
      background-color: #7777778f;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".has-treeview").on('click', function(){
        if ( $(this).find('.nav-treeview').hasClass('d-block')) {
          $(this).find('.nav-treeview').toggleClass('d-none');
        } else {
          $(this).find('.nav-treeview').toggleClass('d-none');
          // $(this).fin('.right')
        }
      })
      function showMsg(title,contentMsg,type){
          $.alert({
            title:title,
            type:type,
            content:contentMsg
          });
      }
    })
  </script>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo $companyName; ?></a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              
            <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
            <li class="nav-item">
              <a href="console.php" class="nav-link <?php echo ($lastSlash == 'console.php') ? 'active':''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  Console
              </a>
            </li>
            <?php endif ?>
              <li class="nav-item">
                <a href="user.php" class="nav-link <?php echo ($lastSlash == 'user.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-users"></i>
                    Users
                </a>
              </li>
              <li class="nav-item">
                <a href="confirmacionclientes.php" class="nav-link <?php echo ($lastSlash == 'confirmacionclientes.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-users"></i>
                    Confirmación clientes
                </a>
              </li>
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link <?php echo ($lastSlash == 'lots.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-gavel"></i>
                    Lots
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview d-none pl-3">
                  <li class="nav-item">
                    <a href="lots.php?type=manage" class="nav-link">
                      <i class="far fa-circle"></i>
                      Manage Lots
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="lots.php?type=completed" class="nav-link">
                      <i class="far fa-circle"></i>
                      Completed Lots
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="correolotesganados.php" class="nav-link">
                      <i class="far fa-circle"></i>
                      Enviar correo
                    </a>
                  </li>
                </ul>
              </li>
              <?php endif ?>
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              <li class="nav-item">
                <a href="events.php" class="nav-link <?php echo ($lastSlash == 'events.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                    Events
                </a>
              </li>
              <?php endif ?>
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              <li class="nav-item">
                <a href="pages.php" class="nav-link <?php echo ($lastSlash == 'pages.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-copy"></i>
                    Pages
                </a>
              </li>
              <?php endif ?>
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
			  <li class="nav-item">
                <a href="stream.php" class="nav-link <?php echo ($lastSlash == 'stream.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-play"></i>
                    Stream 
                </a>
              </li>
              <?php endif ?>
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              <li class="nav-item">
                <a href="password.php" class="nav-link <?php echo ($lastSlash == 'changePassword.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-lock"></i>
                    Change Password
                </a>
              </li>
              <?php endif ?>
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              <li class="nav-item has-treeview">
			  <a href="#" class="nav-link <?php echo ($lastSlash == 'setting.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-gavel"></i>
                    Settings
                  <i class="right fas fa-angle-left"></i>
                </a>
			  
               
				<ul class="nav nav-treeview d-none pl-3">
                  <li class="nav-item">
                    <a href="setting.php" class="nav-link">
                      <i class="far fa-circle"></i>
                      Front-end
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="payment.php" class="nav-link">
                      <i class="far fa-circle"></i>
                      Payment gateway
                    </a>
                  </li>
                </ul>
                <?php endif ?>
                <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              </li>
              <li class="nav-item">
                <a href="help.php" class="nav-link <?php echo ($lastSlash == 'help.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-question-circle"></i>
                    Help
                </a>
              </li>
              <?php endif ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-download"></i>
                    Export
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview d-none pl-3">
                  <li class="nav-item">
                    <a href="export.php?ex=1" class="nav-link">
                      <i class="fas fa-user"></i>
                      User
                    </a>
                  </li>
                  <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
                  <li class="nav-item">
                    <a href="export.php?ex=2" class="nav-link">
                      <i class="fas fa-check"></i>
                      Lots Closed
                    </a>
                  </li>
                  <?php endif ?>
                  <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
                  <li class="nav-item">
                    <a href="export.php?ex=3" class="nav-link">
                      <i class="fas fa-gavel"></i>
                      Bid
                    </a>
                  </li>
                  <?php endif ?>
                  <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
                  <li class="nav-item">
                    <a href="export.php?ex=4" class="nav-link">
                      <i class="fas fa-gavel"></i>
                      Historial por lote
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="export.php?ex=5" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      Clientes nuevos
                    </a>
                  </li>
                  <?php endif ?>
                </ul>
              </li>
     
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-upload"></i>
                    Bulk Uploader
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview d-none pl-3">
                  <li class="nav-item">
                    <a href="fileUpload.php" class="nav-link">
                      <i class="fas fa-user"></i>
                      File Upload
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="imageUpload.php" class="nav-link">
                      <i class="fas fa-check"></i>
                      Image Uploader
                    </a>
                  </li>
                </ul>
              </li>
              <?php endif ?>
              <?php if($_SESSION['auctiobroad']['user_id']== '1') :?>
              <li class="nav-item">
                <a href="endevent.php" class="nav-link <?php echo ($lastSlash == 'endevent.php') ? 'active':''; ?>">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                    Finalizar Evento
                </a>
              </li>
              <?php endif ?>
              <li class="nav-item">
                <hr>
              </li>
            </ul>

          </div>
        </nav>
      </div>
    </div>
    