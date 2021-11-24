<?php require_once 'connection.php';?> 
<?php 
	session_start();
	if(isset($_SESSION['member_id']))
	{
		header("location:index.php");
	}

?>
<?php

	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < 6; $i++) 
	{
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	$rc = implode($pass);
?>


<?php
	if(isset($_POST['register']))
	{
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
		$dob=$_POST['dob'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$photo=$_FILES['photo']['name'];
		$telephone=$_POST['telephone'];
		$rc=$_POST['rc'];
		$erc=$_POST['erc'];
		$signupcredit=$_POST['signupcredit'];
		
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

		$var ="<html><body>Thanks for signing up!
		Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
		<br><br>
		Please click this link to activate your account:<br>
		<a href='http://localhost/360 overseas/client_new/verify.php?email=$email'>Click me</a></body></html>";
					$mail->SetFrom("pheonixfawkes2@gmail.com","360 Overseas");
					$mail->Subject = "Verify Yourself";
					$mail->MsgHTML($var);
					$mail->AddAddress($email);
					$mail->Send();
		$sql=$link->insert("member_tb",Array('firstname'=>$fname,'lastname'=>$lname,'email'=>$email,'password'=>$password,'referral_code'=>$rc,'dob'=>$dob,'contact_number'=>$telephone,'email_verified'=>0,'status'=>1));
		$ext=pathinfo($photo,PATHINFO_EXTENSION);
		$path="images/users/".$sql.".".$ext;
		
		if(move_uploaded_file($_FILES['photo']['tmp_name'],$path))
		{
			$link->where('member_id_pk',$sql);
			$link->update('member_tb',Array('photo'=>$path,'signUp_credit'=>$signupcredit));
			$link->insert('wallet_tb',Array('member_id_fk'=>$sql,'amount'=>$signupcredit));
		}			
		
		
		if(!empty($erc))
		{
			$new_wallet=$link->rawQueryOne("select * from wallet_tb where member_id_fk=?",Array($sql));
			$new_w=$new_wallet['amount']+150;
			
			$link->where("member_id_fk",$sql);
			$link->update("wallet_tb",Array("amount"=>$new_w));
			
			$old_id=$link->rawQueryOne("select * from member_tb where referral_code=?",Array($erc));
			$old=$old_id['member_id_pk'];
			
			if(!empty($old))
			{
				$refc=$link->insert("member_referral_tb",Array('old_member'=>$old,'new_member'=>$sql,'referral_code'=>$erc,'new_member_credit'=>150));
				$link->where("member_id_pk",$sql);
				$link->update("member_tb",Array("parent_referral_code"=>$erc));
			}
			else
			{
				header("location:login.php?err2=2");
			}
		}
		
	}
?>
<?php 
	if(isset($_POST['login']))
	{
		session_start();
		require_once 'connection.php';
		$email=$_POST['email2'];
		$password=$_POST['pass2'];
		$sql=$link->rawqueryOne("select * from member_tb where email=? and password=?",Array($email,$password));
		if($link->count > 0)
        {
              //session_start();
              $_SESSION['email']=$email;
              $_SESSION['password']=$password;
			  $sql=$link->rawQuery("select * from member_tb where email=?",Array($email));
			  foreach($sql as $s)
			  {
				$_SESSION['firstname']=$s['firstname'];
				$_SESSION['member_id']=$s['member_id_pk'];
				
			  }
              header("location: index.php");
        }
		else
		{
			header("location: login.php?err1=1");
		}
	}
	


?>
<?php 
	//$err1=$_GET['err1'];
	//$err2=$_GET['err2'];
	if(isset($_GET['err1']))
	{		
		$err1="Invalid User";		
	}
	else
	{
		$err1="";
	}
	if(isset($_GET['err2']))
	{
		$err2="Due To Invalid Referral code Entered,no credits Has Given.";
	}
	else
	{
		$err2="";
	}
	
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Login and Register</title>
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

        function check_login()
        {
			var s = true;
			
			var patt=/^[a-z A-Z]*$/;
			var firstname=document.getElementById("firstname").value;
			var lastname=document.getElementById("lastname").value;
			var email=document.getElementById("email").value;
			var epatt=/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(firstname=="")
            {
                document.getElementById("fname").innerHTML="Please Enter Your Firstname";
				s= false;
            }
			else if(patt.test(firstname)==false)
			{
				
				document.getElementById("fname").innerHTML="Characters Only!";
				s=false;
			}
			else
			{
				document.getElementById("fname").innerHTML="";
			}
			
			if(lastname=="")
			{
				document.getElementById("lname").innerHTML="Please Enter Your Lastname";
				s= false;
			}
			else if(patt.test(lastname)==false)
			{
				document.getElementById("lname").innerHTML="Characters Only!";
				s= false;
			}
			else
			{
				document.getElementById("lname").innerHTML="";
			}
			
			if(email=="")
			{
				document.getElementById("semail").innerHTML="Please Enter Your Email";
				s= false;
			}
			else if(epatt.test(email)==false)
			{
				document.getElementById("semail").innerHTML="Enter proper email";
				s= false;
			}
			else
			{
				document.getElementById("semail").innerHTML="";
			}
			var pass=document.getElementById("password").value;
			if(pass.length < 8)
			{
				document.getElementById("pass").innerHTML="Password must be greater than 8.";
				s= false;
			}
			else
			{
				document.getElementById("pass").innerHTML="";
			}
			var repass=document.getElementById("confirm").value;
			if(repass.length < 8)
			{
				if(repass != pass)
				{
					document.getElementById("repass").innerHTML="Password must match";
					
				}
				s=false;
			}
			else
			{
				document.getElementById("repass").innerHTML="";
			}
			var tphone=document.getElementById("telephone").value;
			var tpatt=/^[0-9]{10}$/;
			if(tpatt.test(tphone)==false)
			{
				document.getElementById("telep").innerHTML="Contact number must be of 10 digits.";
				s=false;
			}
			else
			{
				document.getElementById("telep").innerHTML="";
			}
			var dob=document.getElementById("datepickerdob").value;
			
			if(dob=="")
			{
				document.getElementById("doberr").innerHTML="Select Your Birthdate";
				s= false;
			}
			else
			{
				document.getElementById("doberr").innerHTML="";
			}
			return s;
        }
        
    </script>
	<script>
	function check()
	{
		var email2=document.getElementById("email2").value;
		var s=true;
		if(email2=="")
		{
			document.getElementById("semail2").innerHTML="Please enter Email";
			s=false;
		}
		else
		{
			document.getElementById("semail2").innerHTML="";
		}
		var pass2=document.getElementById("pass2").value;
		
		if(pass2=="")
		{
			document.getElementById("spass2").innerHTML="Please enter Password";
			s=false;
		}
		else
		{
			document.getElementById("spass2").innerHTML="";
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
                            <li> Authentication </li>
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
                            <h3> Authentication </h3>
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
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="account-creation">
                        <div class="lp-title">
                            <h3>Create an account</h3>
                        </div>
                        <div class="lp-left-text">
                            <p>Please enter your Information to create an account.</p>
							<span style="color:red"><?php echo $err2;?></span>
                        </div>
                        <form action="#" method="post" onsubmit="return check_login()" enctype="multipart/form-data">
                            <div class="lp-input">
                                <label for="">First Name</label>
                                <input type="text" id="firstname" name="firstname" class="" />
								<span id="fname" style="color:#ff0000;"></span>
                            </div>
                            <div class="lp-input">
                                <label for="">Last Name</label>
                                <input type="text" id="lastname" name="lastname" class="" />
								<span id="lname" style="color:#ff0000;"></span>
                            </div>
							<div class="lp-input">
                                <label for="">Date Of Birth</label>
                                <p><input type="date" id="datepickerdob" name="dob" class=""></p>
								<span id="doberr" style="color:#ff0000;"></span>
                            </div>
							<input type="hidden" name="signupcredit" value="200" />
							<div class="lp-input">
                                <label for="">Email</label>
                                <input type="text" id="email" name="email" class="" />
								<span id="semail" style="color:#ff0000;"></span>
                            </div>
							<div class="lp-input">
                                <label for="">Password</label>
                                <input type="password" id="password" name="password" class="" />
								<span id="pass" style="color:#ff0000;"></span>
                            </div>
							<div class="lp-input">
                                <label for="">Retype Password</label>
                                <input type="password" id="confirm" name="confirm" class=""/>
								<span id="repass" style="color:#ff0000;"></span>
                            </div>
							<div class="lp-input">
                                <label for="">Photo</label>
                                <input type="file" id="photo" name="photo" class="" />
								<span id="photos" style="color:#ff0000;"></span>
                            </div>
							<div class="lp-input">
                                <label for="">Contact Number</label>
                                <input type="text" id="telephone" name="telephone" class="" />
								<span id="telep" style="color:#ff0000;"></span>
                            </div>
							<div class="lp-input">
                                <label for="">Referral Code</label>
                                <input type="text" id="rc" name="rc" value="<?php echo $rc;?>" class="form-control" readonly />
                            </div>
							<div class="lp-input">
                                <label for="">Do you Have Any Referral Code?</label>
                                <input type="text" id="erc" name="erc" class=""/>
                            </div>
							
							
							
                        <br/>                  
						
						
                            <input type="submit" value="Create an account" class="button-my" name="register"/>
                        
						</form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="account-creation">
                        <div class="lp-title">
                            <h3>Already registered?</h3>
                        </div>
                        <div class="lp-left-text">
                            <p>Please put your email address that was used at the time of registration.</p>
							<span style="color:red"><?php echo $err1;?></span>
                        </div>
                        <form action="#" onsubmit="return check()" method="post">
                            <div class="lp-input">
                                <label>Email address</label>
                                <input type="text" id="email2" name="email2" class=""/>
								<span id="semail2" style="color:red"></span>
                            </div>
                            <div class="lp-input">
                                <label>Password</label>
                                <input type="password" id="pass2" name="pass2" class="" />
								<span id="spass2" style="color:red"></span>
                            </div>
							<br/>
							<a href="forget_password.php">Forget Password?</a>
							<br/>
							<br/>
							<input type="submit" value="Login" class="button-my" name="login"/>
                        </form>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>

    
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