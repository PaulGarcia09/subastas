<?php /*
$url = $_SERVER['SCRIPT_NAME'];
$lastSlash = substr(strrchr(rtrim($url, '/\\'), '/'), 1);
?> 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Auction Broadcaster</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="console.php" class="nav-link <?php echo ($lastSlash == 'console.php') ? 'active':''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Console
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link <?php echo ($lastSlash == 'user.php') ? 'active':''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="lots.php" class="nav-link <?php echo ($lastSlash == 'lots.php') ? 'active':''; ?>">
              <i class="nav-icon fas fa-gavel"></i>
              <p>
                Lots
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lots.php?type=manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Lots</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="lots.php?type=completed" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Lots</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="events.php" class="nav-link <?php echo ($lastSlash == 'events.php') ? 'active':''; ?>">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages.php" class="nav-link <?php echo ($lastSlash == 'pages.php') ? 'active':''; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="changePassword.php" class="nav-link <?php echo ($lastSlash == 'changePassword.php') ? 'active':''; ?>">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="setting.php" class="nav-link <?php echo ($lastSlash == 'setting.php') ? 'active':''; ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Export
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="export.php?ex=1" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="export.php?ex=2" class="nav-link">
                  <i class="fas fa-check"></i>
                  <p>Lots Closed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="export.php?ex=3" class="nav-link">
                  <i class="fas fa-gavel"></i>
                  <p>Bid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <hr>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside> */