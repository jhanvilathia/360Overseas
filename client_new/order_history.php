<?php session_start(); ?>
<?php include 'connection.php';?>
<?php
	if(!isset($_SESSION['firstname']))
	{
		header("location:login.php");
	}
	else
	{
		$req_count=0;
		$trip_count=0;
		$offered_count=0;
		$id=$_SESSION['member_id'];
		$request=$link->rawQuery("select * from request_tb where requester_id_fk=?",Array($id));
		foreach($request as $r)
		$req_count++;
		$trip=$link->rawQuery("select * from trip_tb where traveller_id=?",Array($id));
		foreach($trip as $t)
		$trip_count++;
		$offered=$link->rawQuery("select * from request_tb where requester_id_fk=? and status=?",Array($id,"offered"));
		foreach($offered as $o)
		$offered_count++;
		
	}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Order History</title>
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
	<script>
	
	</script>
</head>

<body>
   

    <?php include 'header.php';?>

    <!--Breadcrumb start-->
    <div class="subpage-main-wrapper about-full">
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
                                <li>Order History</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb end-->

        
	<div class="cart-top-heading">
        <div class="container">
            <div class="summery-top">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="cart-sumttl">
                            <h3> Order History </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br/>
    <div class="container">
	<p><b>No Of Trips</b> : <?php echo $trip_count;?></p>
	<p><b>No Of Requests</b> : <?php echo $req_count;?></p>
	<p><b>Offerd</b> : <?php echo $offered_count;?> </p>
	<p><b>Inbox </b> : </p>
	</div>

        
    <!-- Main footer area start-->

    <?php include 'footer.php';?>

    <!-- Main footer area end-->

 

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
    <!-- Nivo active js -->
    <script src="js/nivo-active.js"></script>
    <!-- Cloudflare js -->
    <script src="js/waypoints.min.js"></script>
    <!-- Google map API js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-IIoucJ-70FQg6xZsORjQCUPHCVj9GV4"></script>
    <!-- Google map js -->
    <script src="js/google-map.js"></script>
    <!-- counter up js -->
    <script src="js/jquery.counterup.min.js"></script>
	<!-- ajax-mail js -->
	<script src="js/ajax-mail.js"></script>
    <!-- Main js -->
    <script src="js/main.js"></script>
	
	
</body>
</html>