<?php session_start()?>
<?php include 'connection.php'; ?>
<?php 
	if(!isset($_SESSION['firstname']))
	{
		header("location:login.php");
	}
?>
<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		
	}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Chat </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.html" />
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
    <!--breacrumb start-->

    <div class="breadcrumbs-wrapper breadcumbs-bg1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs breadcrumbs-style1 sep1 posr">
                        <ul>
                            <li>
                                <div class="breadcrumbs-icon1">
                                    <a href="index.php" title="Return to home"><i class="fa fa-home"></i></a>
                                </div>
                            </li>
                            <li>Chat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breacrumb end-->

    <!--Cart top heading start-->

    <div class="cart-top-heading">
        <div class="container">
            <div class="summery-top">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="cart-sumttl">
                            <h3>Chat</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cart top heading end-->

    <div class="container">
		<div class="row">
			
			<br/>
			<div class="col-md-12">
				<label class="lp-input" style="padding:10px;font-size:30px"><b>Your Messages</b></label>
			</div>
			<div class="col-md-6" style="padding:10px">
			From:
			</div>
			<div class="col-md-6">
			To:
			</div>
				
				
			
			<div class="col-md-12 address-textarea">
				<textarea placeholder="Type Your Message." style="height:100px;"></textarea>
				<br/>
				<form action="#" method="post" id="chatting">
				<input type="submit" class="button-my" value="Send" >
				</form>
			</div>
		</div>
	</div>
	
	<br/>
    

    

    

   

    <!-- Main footer area start-->

    <?php include 'footer.php';?>

    <!-- Main footer area end-->

    

    
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
    <!-- nivo slider pack js -->
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <!-- counter up js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Nivo active js -->
    <script src="js/nivo-active.js"></script>
    <!-- Treeview js -->
    <script src="js/jquery.treeview.js"></script>
    <!-- mixit up js -->
    <script src="js/mixitup.min.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
</body>

</html>