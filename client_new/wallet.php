<?php include 'connection.php';?>
<?php session_start();?>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || My Wallet</title>
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
                                <li>My Wallet</li>
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
                            <a href="#"><img src="<?php echo $siteroot2.'images/wallet/wallet.jpg'; ?>" alt="360overseas" />
                            </a>
                        </div>
                    </div><br/><br/>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="abt-content-wrapper">
                            <div class="abt-title title-head-normal">
                                <h3><span class="color-black-def">360Overseas</span> Credit</h3>
                            </div>                            
							<div class="abt-title title-head-normal">
                                <h2><span class="color-black-def">&#8377;</span><?php 
									
									$member_id=$_SESSION['member_id'];
									$query=$link->rawQueryOne("select * from wallet_tb where member_id_fk=?",Array($member_id));
									if($query['amount']==0)
									{
										echo "0";
									}
									else
									{
										echo $query['amount'];
									}
								
								?></h2>
                            </div>
                            <div class="about-feature">
                                <ul>
                                    <li><i></i>  <p style="font-size:18"><b>Refer To Your Friends</b></p>
								Give each of your friends &#8377; 150 credits by sharing your referral code with them. For every friend that completed the first transaction, you will also receive &#8377; 150 credits.</li><br>
									<li><i></i>  <p style="font-size:18"><b>Your Referral Code</b></p>
									<?php 
									
										$q=$link->rawQueryOne("select * from member_tb where member_id_pk=?",Array($member_id));
										
										echo $q['referral_code'];
										
									?></li><br>
								</ul><br><br>
								
								
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<br/>

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