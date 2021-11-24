<?php require_once 'connection.php';?>
<?php 
	session_start();
	if(!isset($_SESSION['firstname']))
	{
		header("location:login.php");
	}
?>
<?php
		
		if(isset($_POST['trip']))
		{
		
			$country=$_POST['con'];
			$arrive=$_POST['arrive'];
			$depart=$_POST['depart'];
			$email=$_SESSION['email'];
			
			$sql=$link->rawQuery("select * from member_tb where email=?",Array($email));
			
			foreach($sql as $s)
			{
				$tid=$s['member_id_pk'];
			}
			
			$link->insert("trip_tb",Array("country_id"=>$country,"depart_date"=>$depart,"return_date"=>$arrive,"traveller_id"=>$tid));
			header("location:index.php");
		}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Post Trip || 360 Overseas</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- Bootstrap v3.3.6 css -->
	<link rel="stylesheet" href="css/jquery-ui.css">
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
	 function check()
	 {
		 var datepickerd=document.getElementById("datepickerd").value;
		 var s=true;
		 if(datepickerd=="")
		 {
			 document.getElementById("sdatepickerd").innerHTML="Please select date";
			 s=false;
		 }
		 else
		 {
			 document.getElementById("sdatepickerd").innerHTML="";
		 }
		 var datepickera=document.getElementById("datepickera").value;
		
		 if(datepickera=="")
		 {
			 document.getElementById("sdatepickera").innerHTML="Please select date";
			 s=false;
		 }
		 else
		 {
			 document.getElementById("sdatepickera").innerHTML="";
		 }
		 var select_country=document.getElementById("select_country").value;
		 if(select_country== -1 )
		 {
			 document.getElementById("scon").innerHTML="Please Select Country";
		 }
		 else
		 {
			 document.getElementById("scon").innerHTML="";
		 }
		 return s;
	 }
	 </script>
	 <script>
			var maxDate = year + '-' + month + '-' + day;
			alert(maxDate);
			$('#txtDate').attr('min', maxDate);
			$(function(){
			var dtToday = new Date();
			
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if(month < 10)
				month = '0' + month.toString();
			if(day < 10)
				day = '0' + day.toString();
			
			var maxDate = year + '-' + month + '-' + day;
			alert(maxDate);
			$('#datepickera').attr('min', maxDate);
		});
	 </script>
	 </head>

<body>
   

    <?php include 'header.php';?>
    <!--breadcrumb start-->

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
                            <li> Post Trip </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb end-->

    <!--login top heading start-->

    <div class="cart-top-heading">
        <div class="container">
            <div class="summery-top">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="cart-sumttl">
                            <h3> Post Trip </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login top heading end-->

    <!--login start-->
    <!--<div class="cart-sum-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="progress-summery text-center">
                        <ul class="progress-steps">
                            <li class="steps-item  litext is-active"><a href="cart.html">01. Cart</a>
                            </li>
                            <li class="steps-item is-active"><a href="login.html">02. Sign in</a>
                            </li>
                            <li class="steps-item"><a href="address.html">03. Address</a>
                            </li>
                            <li class="steps-item"><a href="shipping.html">04. Shipping</a>
                            </li>
                            <li class="steps-item"><a href="payment.html">05. Payment</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <!--Cart start end-->
    <div class="lp-email-area">
        <div class="container">
            <div class="row">
			<form action="#" method="post" onsubmit="return check()" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-4 col-sm-12 col-xs-12">
					<div class="lp-input">
						<label for="">Departure Date</label>
						<p><input type="date" id="datepickerd" name="depart" class=""></p>
						<span id="sdatepickerd" style="color:#ff0000;"></span>
                    </div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="lp-input">
						<label for="">Arrival Date</label>
						<p><input type="date" id="datepickera" name="arrive" class=""></p>
						<span id="sdatepickera" style="color:#ff0000;"></span>
                    </div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="lp-input">
						<label for="">Select Country</label>
						<p><select id="select_country" name="con" class="selectpicker tab2-select">
						<option value="-1">Select Country</option>
						<?php $country=$link->rawquery("select * from country_tb where status=1");
						foreach($country as $c)
						{ ?> 
						<option value="<?php echo $c['country_id_pk'];?>"><?php echo $c['country_name'];?></option>
						<?php } ?>
						</select></p>
						<span id="scon" style="color:#ff0000;"></span>
					</div>
					</div>
					 
                </div>
				<div class="col-md-4 col-sm-12 col-xs-12">
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
				<center>
				<input type="submit" value="Post" class="button-my" name="trip"/></div></center>
                </form>
            </div>
        </div>
    </div>
<br/>

    <!--Main shop area end-->

    <!--Hair top banner end-->

    <!-- Main footer area start-->

    <?php require_once 'footer.php';?>

    <!-- Main footer area end-->

    <!--Footer bottom area start-->



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