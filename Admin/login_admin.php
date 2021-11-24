<?php
  session_start();
  $err="";
  if(isset($_SESSION['admin_username']) && isset($_SESSION['admin_password']))
  {
    header("location: index.php");
  }
?>
<?php

  require_once("connect.php");

    if(isset($_POST['login']))
    {

      $username=$_POST['username'];
      $password=$_POST['password'];

      if(isset($username) && isset($password))
      {
          $sql=$link->rawqueryOne("select * from admin_tb where username=? and password=?",Array($username,$password));

          if($link->count > 0)
          {
              session_start();
              $_SESSION['admin_username']=$username;
              $_SESSION['admin_password']=$password;
              header("location: index.php");
          }
		  else
		  {
			  $err="Invalid User";
		  }
      }     
      if(isset($_POST['remember_me']))
      {
          setcookie("admin_username",$username,time()+(24*3600));
          setcookie("admin_password",$password,time()+(24*3600));

      } 
      else
      {
        setcookie("admin_username");
        setcookie("admin_password");
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

    <title>360 Overseas - Log in </title>
  
	<!-- Bootstrap v4.1.3.stable -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- foxadmin Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/_all-skins.css">	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<script>
	function check()
	{
		var username=document.getElementById("username").value;
		var s=true;
		
		if(username=="")
		{
			document.getElementById("susername").innerHTML="Please Enter Username";
			s=false;
		}
		else
		{
			document.getElementById("susername").innerHTML="";
		}
		var password=document.getElementById("password").value;
		if(password=="")
		{
			document.getElementById("spassword").innerHTML="Please Enter Password";
			s=false;
		}
		else
		{
			document.getElementById("spassword").innerHTML="";
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
    <p class="login-box-msg">Log in</p>
	<center><span style="color:red;"><?php echo $err;?></span></center>
    <form action="#" method="post" class="form-element" onsubmit="return check()">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" id="username"
        value="<?php if(isset($_COOKIE['admin_username'])) echo $_COOKIE['admin_username']; ?>" />
		<span id="susername" style="color:red;"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password"
        value="<?php if(isset($_COOKIE['admin_password'])) echo $_COOKIE['admin_password']; ?>"/>
		<span id="spassword" style="color:red;"></span>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="checkbox">
            <input type="checkbox" id="basic_checkbox_1" name="remember_me" checked="true" />
			<label for="basic_checkbox_1"><b>Remember Me?</b></label><br><br>
          </div>
        </div>
		<div class="col-12">
          <div class="checkbox">
            
			<label for="basic_checkbox_1"><a href="forget_password.php" style="color:blue;">Forget Password?</a></label><br><br>
          </div>
        </div>
        <div class="col-12 text-center">
          <input type="submit" name="login" value="LOG IN" class="btn btn-info btn-block btn-flat margin-top-10" />
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
