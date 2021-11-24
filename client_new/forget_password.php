<?php session_start(); 
?>
<?php include 'connection.php';?>
<?php 
	if(isset($_POST['cp']))
	{
		$email=$_POST['email'];
		$link->rawQuery("select * from member_tb where email=?",Array($email));
		if($link->count > 0)
		{
			require_once ('PHPMailerAutoload.php');
			$mail = new PHPMailer();
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "pheonixfawkes2@gmail.com";
			$mail->Password = "saloni1316";

			$var ="<html><body>
			Please click this link to set new password:<br>
			<a href='http://localhost/360 Overseas/client_new/update_password.php?email=$email'>Click me</a></body></html>";
			$mail->SetFrom("pheonixfawkes2@gmail.com","360 Overseas");
			$mail->Subject = "Change Password";
			$mail->MsgHTML($var);
			$mail->AddAddress($email);
			$mail->Send();	
			header("location:forget_password.php?succ=1");
		}
		else
		{
			header("location:forget_password.php?err=1");
		}
	}



?>
<?php
	$err="";
	if(isset($_GET['err']))
	{
		$err="Invalid Email";
	}
	$succ="";
	if(isset($_GET['succ']))
	{
		$succ="Check Your Mail to Update Your Password.";
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Forget Password</title>
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
	function check()
	{
		var email=document.getElementById("email").value;
		var s= true;
		if(email == "")
		{
			document.getElementById("err_email").innerHTML="Please Enter Email.";
			s=false;
		}
		else
		{
			document.getElementById("err_email").innerHTML="";
			
		}
		return s;
	}
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
                            <li> Forget Password </li>
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
                            <h3 > Update Password using Your Email </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="lp-email-area" style="padding-top:0px">
	<div class="container">
		<div class="row">
			<form action="#" method="post" onsubmit="return check()">
			<div class="lp-input">
				<label for="">Email</label>
				<input type="text" id="email" name="email" />
				<span id="err_email" style="color:#ff0000;"></span>
				<span value="" style="color:red;"><?php echo $err;?></span>
				<span value="" style="color:green"><?php echo $succ;?></span>
            </div>
			<br>
			<input type="submit" class="btn btn-default" name="cp" value="Send Mail">
			</form>
		</div>
	</div>
	</div>
	<br>
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