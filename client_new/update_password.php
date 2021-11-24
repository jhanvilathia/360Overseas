<?php session_start(); 
?>
<?php include 'connection.php';?>
<?php 


?>

<?php 
	if(isset($_POST['update_pass']))
	{
		if(isset($_POST['email']))
		{
			if($_POST['np']==$_POST['cp'])
			{
				$password=$_POST['cp'];
				$email=$_POST['email'];
				
				$link->where("email",$email);
				$link->update("member_tb",Array("password"=>$password));
				
				header("location: update_password.php?succ=1");
			}
		}
		else
		{
			header("location:index.php");
		}
	}
?>
<?php 
	$succ="";
	if(isset($_GET['succ']))
	{
		$succ="Password changed Succesfully.";
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Update Password</title>
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
		np=document.getElementById("np").value;
		s=true;
		if(np.length < 8)
		{
			document.getElementById("err_np").innerHTML="Please Enter Password.(length must be greater than 8)";
			s=false;
		}
		else
		{
			document.getElementById("err_np").innerHTML="";
		}
		
		cp=document.getElementById("cp").value;
		
		if(cp.length < 8)
		{
			document.getElementById("err_cp").innerHTML="Please Enter Password.(length must be greater than 8)";
			s=false;
		}
		else if(cp != np)
		{
			document.getElementById("err_cp").innerHTML="Password Must Match.";
			s=false;
		}
		else
		{
			document.getElementById("err_cp").innerHTML="";
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
                            <li> Update Password </li>
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
                            <h3 > Update Password </h3>
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
				<label for=""> New Password</label>
				<input type="password" id="np" name="np" />
				<span id="err_np" style="color:#ff0000;"></span>
            </div>
			<div class="lp-input">
				<label for=""> Confirm Password</label>
				<input type="password" id="cp" name="cp" />
				<span id="err_cp" style="color:#ff0000;"></span>
            </div>
			<span style="color:green;"><?php echo $succ;?></span>
			<input type="hidden" value="<?php echo $_GET['email']; ?>" name="email"/>
			<br>
			<input type="submit" class="btn btn-default" name="update_pass" value="Change Password">
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