<?php session_start(); ?>
<?php include 'connection.php';?>
<?php 
	
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Change Password</title>
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
		var old_passoword=document.getElementById("old_password").value;
		var s = true;
		if(old_passoword == "")
		{
			document.getElementById("err_old").innerHTML="Please Enter Old Password.";
			s=false;
		}
		else
		{
			document.getElementById("err_old").innerHTML="";	
		}
		
		var new_passoword=document.getElementById("new_password").value;
		
		if(new_passoword == "")
		{
			document.getElementById("err_new").innerHTML="Please Enter New Password.";
			s=false;
		}
		else if(new_passoword.length < 9)
		{
			document.getElementById("err_new").innerHTML="Password Must Contains 8 Characters.";
			s=false;
		}
		else
		{
			document.getElementById("err_new").innerHTML="";	
		}
		var re_new=document.getElementById("re_new").value;
		
		if(re_new == "")
		{
			document.getElementById("err_re").innerHTML="Please Retype Your New Password.";
			s=false;
		}
		else if(re_new.length < 9)
		{
			document.getElementById("err_re").innerHTML="Password Must Contains 8 Characters.";
			s=false;
		}
		else if(new_passoword != re_new)
		{
			document.getElementById("err_re").innerHTML="Password Must Match.";
			s=false;
		}
		else
		{
			document.getElementById("err_re").innerHTML="";	
		}
		return s;
	}
	
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
                                <li>Change Password</li>
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
                            <h3> Change Password </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br/>
        <!--Contact email start-->
        <div class="contact-email-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <form class="contact-form" action="change_password.php" method="post" enctype="multipart/form-data" onsubmit="return check()" id="change_password">
                                <div class="address-wrapper">
                                    <div class="col-md-12">
                                        <div class="address-fname">
										<p id="rerror"></p>
										<label class="lp-input">Old Password</label>
                                            <input type="password" name="old_password" id="old_password" />
											<span id="err_old" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="address-email">
										<label class="lp-input">New Password</label>
                                            <input type="password" name="new_password" id="new_password" />
											<span id="err_new" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="address-web">
										<label class="lp-input">Retype New Password</label>
                                            <input type="password" name="re_new" id="re_new" />
											<span id="err_re" style="color:red;"></span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<center>
										<input type="submit" name="change_pass" value="Change Password" class="button-my" />
									</center>
								</div>
							
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<br/>
		<br/>
        <!--Contact email end-->

        
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
	
	<script>
	$("#change_password").submit(function(e) {
		$.ajax({
		   type: "POST",
		   url: "change_pass.php",
		   data: $("#change_password").serialize(), // serializes the form's elements.
		   success: function(data)
		   {
				$("#rerror").html(data);
				if(data == 'Password is successfully changed.')
				{
					$("#rerror").css("color","green");
					$("#old_passoword").val("");
					$("#new_password").val("");
					$("#re_new").val("");
				}
				else
				{
					$("#rerror").css("color","red");
				}
		   }
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	
	
	</script>
</body>
</html>