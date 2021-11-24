<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>360 Overseas </b>Admin</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">     
          <!-- Messages-->
          
          <!-- Notifications -->
          
          <!-- Tasks -->
          
		  <?php require_once 'connect.php';
			$sql2=$link->rawQuery("select photo from admin_tb where username=?",Array($_SESSION['admin_username']));
			foreach($sql2 as $s2)
			{
				$i=$s2['photo'];
			}
		  ?>
          <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $siteroot . $i ?>" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $siteroot . $i ?>" class="rounded float-left" alt="User Image">
        
                <p>
                  <?php echo $_SESSION['admin_username']; ?>
                  <small></small>
                </p>
				<p>
				<a href="change_password.php">Change Password</a>
				</p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-block btn-danger">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      
    </nav>
  </header>