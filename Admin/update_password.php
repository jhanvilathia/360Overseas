<?php
	
	require_once("connect.php");
	$err="";
	if(isset($_POST['update']))
	{
		if(isset($_POST['email']))
		{
			if($_POST['password']==$_POST['confirmpassword'])
			{
				$password=$_POST['password'];
				$email=$_POST['email'];
				
				$link->where("email",$email);
				$link->update("admin_tb",Array("password"=>$password));
				
				header("location: login_admin.php");
			}
			else
			{
				$err="Passwords must match";
			}
		}
		else
		{
			header("location:login_admin.php");
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

    <title>360 Overseas - Update password </title>
  
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
		np=document.getElementById("np").value;
		s=true;
		if(np=="")
		{
			document.getElementById("snp").innerHTML="Please Enter Password";
			s=false;
		}
		else
		{
			document.getElementById("snp").innerHTML="";
		}
		cp=document.getElementById("cp").value;
		
		if(cp=="")
		{
			document.getElementById("scp").innerHTML="Please Enter Password";
			s=false;
		}
		else if( cp != np)
		{
			document.getElementById("scp").innerHTML="Password Must Match.";
			s=false;
		}
		else
		{
			document.getElementById("scp").innerHTML="";
		}
		return s;
		
			
	}
	</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>360 Overseas </b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Update Password</p>

    <form action="#" method="post" class="form-element" onsubmit="return check()">
	<input type="hidden" value="<?php echo $_GET['email']; ?>" name="email"/>
      <div class="form-group has-feedback">
	  <span style="color:red"><?php echo $err; ?></span>
        <input type="password" class="form-control" placeholder="Password" name="password" id="np"
         />
		 <span id="snp" style="color:red;"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="cp"/>
		<span id="scp" style="color:red;"></span>
		
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <input type="submit" name="update" value="SET PASSWORD" class="btn btn-info btn-block btn-flat margin-top-10" />
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