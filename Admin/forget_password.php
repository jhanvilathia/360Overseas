<?php
	$err="";
	if(isset($_POST['forget_password']))
	{
		include 'connect.php';
		$email=$_POST['username'];
		$sql=$link->rawQuery("select * from admin_tb where email=?",Array("email"=>$email));
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
		<a href='http://localhost/360 Overseas/Admin/update_password.php?email=$email'>Click me</a></body></html>";
		$mail->SetFrom("pheonixfawkes2@gmail.com","360 Overseas");
		$mail->Subject = "Change Password";
		$mail->MsgHTML($var);
		$mail->AddAddress($email);
		$mail->Send();	

		header("location: login_admin.php");
		}
		else
		{
			$err="Invalid User";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>360 Overseas - Forget Password </title>
  
	<!-- Bootstrap v4.1.3.stable -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<link rel="stylesheet" href="css/_all-skins.css">	

	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<script>
	function check()
	{
		var email=document.getElementById("email").value;
		var s=true;
		var pattern=/^([a-zA-Z0-9._-]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$)/;
		if(email=="")
		{
			document.getElementById("semail").innerHTML="Please Enter Email";
			s=false;
		}
		else if(!pattern.test(email))
		{
			document.getElementById("semail").innerHTML="Please Enter Proper Email";
			s=false;
		}
		return s;
	}
	
	</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>360 Overseas</b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Forgot Password?</p>

    <form action="#" method="post" class="form-element" onsubmit="return check()">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter User Email" name="username" id="email" />
		<span id="semail" style="color:red;" ><?php echo $err;?></span>
      </div>

      <div class="row">

        <div class="col-12 text-center">
          <input type="submit" name="forget_password" value="SEND RESET EMAIL" class="btn btn-info btn-block btn-flat margin-top-10"/>
        </div>
        <!-- /.col -->
      </div>
    </form><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


	<!-- jQuery 3 -->
	<script src="js/jquery-3.3.1.min.js"></script>
	
	<!-- popper -->
	<script src="js/popper.min.js"></script>
	
	<!-- Bootstrap v4.1.3.stable -->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>