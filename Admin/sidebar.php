<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="<?php echo $siteroot . $i ?>" class="rounded" alt="User Image">
        </div>
        <div class="info float-left">
          <p><?php echo $_SESSION['admin_username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
		  <!-- search form -->
      
      <!-- /.search form -->
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">        
        
        <li class="active">
          <a href="index.php">
           <span>Dashboard</span>
           
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_cat.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="view_cat.php"><i class="fa fa-circle-o"></i> View</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Country</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_country.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="view_country.php"><i class="fa fa-circle-o"></i> View</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Bank</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_bank.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="view_bank.php"><i class="fa fa-circle-o"></i> View</a></li>
            
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Cancellation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_reason.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="view_reasons.php"><i class="fa fa-circle-o"></i> View</a></li>
            
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Contact Us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
            <li><a href="view_contact.php"><i class="fa fa-circle-o"></i> View</a></li>
            
          </ul>
        </li> 
		<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>FAQ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="add_que.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="view_que.php"><i class="fa fa-circle-o"></i> View</a></li>
            
          </ul>
        </li> 
		<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Voucher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="add_voucher.php"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="view_voucher.php"><i class="fa fa-circle-o"></i> View</a></li>
            
          </ul>
        </li>  
		<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="payment.php"><i class="fa fa-circle-o"></i> Authorize</a></li>
          </ul>
        </li>  		
      </ul>
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
		<!-- item-->
		
	</div>
  </aside>