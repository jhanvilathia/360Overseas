<?php session_start(); ?>
<?php 
	if(isset($_POST['contact_us']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$telephone=$_POST['telephone'];
		$sub=$_POST['sub'];
		$message=$_POST['message'];
		
		require_once 'connection.php';
		$sql=$link->insert("contact_us_tb",Array("name"=>$name,"email"=>$email,"contact_no"=>$telephone,"subject"=>$sub,"message"=>$message));
		if($sql)
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
			$email1="salonisaraiya@yahoo.in";
			$var ="<html><body>
			 $message</body></html>";
			$mail->SetFrom("pheonixfawkes2@gmail.com","360 Overseas");
			$mail->Subject = "Contact Us";
			$mail->MsgHTML($var);
			$mail->AddAddress($email1);
			if($mail->Send())
			{
				header("location:contact.php?err=1");
			}
			
		}
		else
		{
			header("location:contact.php?err2=2");
		}
	}
?>
<?php 
	if(isset($_GET['err']))
	{
		$err="We will contact You soon.";
	}
	else
	{
		$err="";
	}
	if(isset($_GET['err2']))
	{
		$err2="Oops,Some Error Occured.Please Try Again.";
	}
	else
	{
		$err2="";
	}

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Contact Us </title>
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
                                <li>Contact Us</li>
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
                            <h3> Contact Us </h3>
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
                            <form class="contact-form" action="#" method="post">
                                <div class="address-wrapper">
								
                                    <div class="col-md-12">
                                        <div class="address-fname">
										<span style="color:green;"><?php echo $err;?></span>
										<span style="color:red;"><?php echo $err2;?></span>
                                            <input type="text" name="name" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="address-email">
                                            <input type="email" name="email" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="address-web">
                                            <input type="text" name="telephone" placeholder="Contact Number" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="address-subject">
                                            <input type="text" name="sub" placeholder="Subject" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="address-textarea">
                                            <textarea name="message" placeholder="Write your message"></textarea>
                                        </div>
										<span style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<center>
										<input type="submit" name="contact_us" value="Contact" class="button-my" />
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

</body>
</html>