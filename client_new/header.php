<div class="header-area">
        <div class="header-topbar-area-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="header-login posr">
                            <ul>
								<?php
								if(!isset($_SESSION['firstname']))
								{ ?>
								<li>
                               <a href="login.php">Login</a></li>
                                <li><a href="login.php">Register</a></li>
								<?php } else { ?>
								<div class="dropdown">
								<a href="account.php" class="dropbtn">Welcome <?php echo $_SESSION['firstname'];?></a>
									  <div class="dropdown-content">
										<a href="account.php">My Account</a>
										<a href="activity.php">My Activities</a>
										<a href="change_password.php">Change Password</a>
										<a href="wallet.php">My Wallet</a>
									  </div>
								</div>
								<li>
								<a href="logout.php">Logout</a></li>
                                
								<?php } ?>
								
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="header-currency-area">
                            <ul>
                                <li>
                                    
                                </li>
                                <li>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <ul class="header-social-icon text-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
							<?php if(isset($_SESSION['member_id']))
							{ ?>
                            <li><a href="notifications.php"><i class="fa fa-envelope"><span class="label label-danger count" style="border-radius:10px;"></i></a>
                            </li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!--header main menu start-->

        <div id="sticky-header" class="main-menu-wrapper hp1-menu">
            <div class="container">
                <div class="row">
				 <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="header-logo">
                            <a href="index.php"><img src="images/logo/360o.png" style="height:90px;" alt="360 Overseas" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 hidden-xs">
                        <nav>
                            <ul class="main-menu" style="float:right;">
                                <li class="mega-parent"><a href="index.php">Home</a>   
                                </li>
                                <li class="dropdown2"><a href="category.php">Category <i class="zmdi zmdi-chevron-down"></i></a>
								<ul class="main-drop firstli">
								<?php require_once 'connection.php' ;?>
								<?php $sql=$link->rawquery("select * from category_tb where status=1");
								foreach ($sql as $s)
								{?>
                                    
                                        <li><a href="shop.php?catid=<?php echo $s['category_id_pk'];?>"><?php echo $s['category_name'];?></a>
                                        </li>
								<?php } ?>
										<li><a href="category.php">View All</a></li>
                                    </ul>
                                </li>
								<li class="mega-parent"><a href="country.php">Country</a> </li>
                                <li><a href="post_request.php">Post Request</a></li>
                                <li class="mega-parent"><a href="post_trip.php">Post Trip </a></li>
                                <li class="mega-parent"><a href="about.php">About us</a></li>
								<li class="mega-parent"><a href="contact.php">Contact Us</a></li>
								<li class="mega-parent"><a href="faq.php">FAQ</a></li>
								<?php 
									if(isset($_SESSION['firstname']))
									{
										echo "<li class='mega-parent'><a href='inbox.php'>Inbox</a></li>";
									}
								?>
                            </ul>
                        </nav>
                    </div>

                   
                </div>
            </div>
            <div class="mobile-menu-area hp1-mobile-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <nav class="active-mobile-menu">
                                <ul>
                                    <li><a href="index.php">Home</a>
                                        
                                    </li>
                                    <li><a href="category.php">Category</a>
                                       <ul>
									   <?php foreach ($sql as $s)
									   { ?>
									  <li><a href="category.php?id=<?php echo $s['category_id_pk'];?>"><?php echo $s['category_name'];?></a>
                                        </li>
									<?php } ?>
										<li><a href="category.php">View All</a></li>
									   </ul>
									   
                                    </li>
                                    <li><a href="about.php">About Us</a>
                                    </li>
                                    <li><a href="post_request.php">Post Request</a>
                                    </li>

                                    <li><a href="post_trip.php">Post Trip</a>
                                        
                                    </li>
                                    <li><a href="country.php">Country</a>
                                        
                                    </li>
                                    <li><a href="contact.php">Contact Us</a>
                                    </li>
									<li><a href="faq.php">FAQ</a>
                                    </li>
									<?php 
										if(isset($_SESSION['firstname']))
										{
											echo "<li class='mega-parent'><a href='inbox.php'>Inbox</a></li>";
										}
									?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--header main menu end-->
    </div>