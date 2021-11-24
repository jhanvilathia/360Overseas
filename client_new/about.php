<?php include 'connection.php';?>
<?php session_start();?>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || About Us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- Bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- jQuery-ui.min css -->
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- Font-awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Material design iconic css -->
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <!-- Nivo Slider css -->
    <link rel="stylesheet" href="css/nivo-slider.css" />
    <!--Slider css -->
    <link rel="stylesheet" href="css/slider.css" />
    <!-- Default css -->
    <link rel="stylesheet" href="css/default.css">
    <!-- Mean menu css -->
    <link rel="stylesheet" href="css/meanmenu.css">
    <!-- Main style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr css -->
    <script src="js/modernizr-2.8.3.min.js"></script>
</head>

<body>
   

    <?php include 'header.php';?>

    <div class="subpage-main-wrapper about-full">

        <!--Breadcrumb start-->
        <div class="breadcrumbs-wrapper breadcumbs-bg1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs breadcrumbs-style1 sep1 posr">
                            <ul>
                                <li>
                                    <div class="breadcrumbs-icon1">
                                        <a href="index.html" target="_blank" title="Return to home"><i class="fa fa-home"></i></a>
                                    </div>
                                </li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb end-->

        <!--about us main area start-->

        <div class="about-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="abt-image">
                            <a href="#"><img src="images/about/about_us.jpg" alt="360overseas" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="abt-content-wrapper">
                            <div class="abt-title title-head-normal">
                                <h3><span class="color-black-def">Why</span> We are?</h3>
                            </div>
                            <div class="about-feature">
                                <ul>
                                    <li><i class="fa fa-check-circle"></i>   Provide a reliable and efficient space for purchasing oversea products, so that users can buy anything from anywhere.</li><br>
									<li><i class="fa fa-check-circle"></i>   Provide an all-inclusive platform, so that travellers can have a hassle free and profitable experience.</li><br>
									<li><i class="fa fa-check-circle"></i>   Provide a platform with powerful database for businesses that increase their exposure and conversion.</li>
								</ul><br><br>
								
								<p style="font-size:18"><b>BORDERLESS. BOUNDLESS. HAPPINESS.</b></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="abt-middle-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="abt-title title-head-normal">
                            <h3><span class="color-black-def">Why</span> We do?</h3>
                        </div>
						<div class="about-feature">
                                <ul>
                                    <li><i class="fa fa-check-circle"></i>   We believe in grabbing opportunities.</li><br>
									<li><i class="fa fa-check-circle"></i>   To give opportunities and exposures to people, so that the world become borderless.</li>
								</ul>
                            </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="abt-title title-head-normal">
                            <h3><span class="color-black-def">Our</span> Mission</h3>
                        </div>
						<div class="about-feature">
                                <ul>
                                    <li><i class="fa fa-check-circle"></i>   This website lets users post request of something they want from another country. Other users can make offer to that particular request.</li><br>
									<li><i class="fa fa-check-circle"></i>   The user who posted the request can accept the offer. They can also post their trips to other countries. And according to that other users can ask for request from them.</li>
								</ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="abt-title title-head-normal">
                            <h3><span class="color-black-def">Our</span> Vision</h3>
                        </div>
						<div class="about-feature">
                                <ul>
                                    <li><i class="fa fa-check-circle"></i>   To be the largest listing platform for travel, retail and service requests.</li><br>
									<li><i class="fa fa-check-circle"></i>   To be a platform that provide borderless experience for users to get anything from anywhere.</li><br>
									<li><i class="fa fa-check-circle"></i>   To reach a number of 100,000 users and achieve the most effective value chain system.</li>
								</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Counter up start-->
        <div class="abt-counter-up ptb-85">
            <div class="container">
                <div class="row">
                    <div class="counterup-wrapper text-center">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="single-counter">
							<?php 
							$count=0;
									$requests=$link->rawQuery("select * from request_tb");
									foreach($requests as $r)
									$count++;
								?>
                                <h3><span class="counter"><?php echo $count; ?>
								</span></h3>
                                <p>Current Requests</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="single-counter">
							<?php 
									$crcount=0;
									$crequests=$link->rawQuery("select * from request_tb where status='completed'");
									foreach($crequests as $cr)
									$crcount++;
							?>
                                <h3><span class="counter"><?php echo $crcount; ?></span></h3>
                                <p>Completed Requests</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="single-counter">
							<?php 
								$clients=0;
									$cclients=$link->rawQuery("select * from member_tb");
									foreach($cclients as $cc)
									$clients++;
							?>
                                <h3><span class="counter"><?php echo $clients; ?></span></h3>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="single-counter single-counter-res">
							<?php 
									$con=0;
									$ccon=$link->rawQuery("select * from country_tb");
									foreach($ccon as $cc)
									$con++;
								?>
                                <h3><span class="counter"><?php echo $con; ?></span></h3>
                                <p>Countries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Counter up start-->

        <!--about us main area end-->

        <!--Brand slider area css start-->
        

        <!--Brand slider area css end-->

    </div>

    <!-- Main footer area start-->

    <?php include 'footer.php';?>

    <!-- Main footer area end-->

    <!--Footer bottom area start-->

		
    <div class="to-top posr">
        <a href="#"><i class="zmdi zmdi-arrow-merge"></i></a>
    </div>

    <!--Footer bottom area end-->
    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- jquery-ui js -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- fancybox js -->
    <script src="js/jquery.fancybox.js"></script>
    <!-- Treeview js -->
    <script src="js/jquery.treeview.js"></script>
    <!-- Nivo slider pack js -->
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <!-- Nivo slider active js -->
    <script src="js/nivo-active.js"></script>
    <!-- Cloudflare js -->
    <script src="js/waypoints.min.js"></script>
    <!-- counter up js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/domino/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2019 09:53:27 GMT -->
</html>