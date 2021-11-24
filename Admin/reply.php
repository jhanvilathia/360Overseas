<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>
<?php

	if(isset($_POST['send']))
	{
		$reply=$_POST['reply'];
		$email=$_POST['emailid'];
		$id=$_POST['id'];
		
		$link->where("contact_id_pk",$id);
		$link->update("contact_us_tb",Array("status"=>1));
		
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
		$reply</body></html>";
		
		$mail->SetFrom("pheonixfawkes2@gmail.com","360 Overseas");
		$mail->Subject = "Reply to your query";
		$mail->MsgHTML($var);
		$mail->AddAddress($email);
		$mail->Send();	

		header("location: view_contact.php");
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

    <title>360 Overseas Admin - Reply</title>
    
	<!-- Bootstrap v4.1.3.stable -->
	<link rel="stylesheet" href="css/bootstrap.css">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="css/bootstrap-extend.css">
	
	<!-- font awesome -->
	<link rel="stylesheet" href="css/font-awesome.css">
	
	<!-- ionicons -->
	<link rel="stylesheet" href="css/ionicons.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/master_style.css">
	
	<!-- fox_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/_all-skins.css">
	
	<!-- weather weather -->
	<link rel="stylesheet" href="css/weather-icons.css">
	
	<!-- jvectormap -->
	<link rel="stylesheet" href="css/jquery-jvectormap.css">
		
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="css/bootstrap3-wysihtml5.css">
	
  <link rel="stylesheet" href="css/daterangepicker.css">
  
  <!-- bootstrap datepicker --> 
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<script>
	function check()
	{
		var reply=document.getElementById("reply").value;
		var s=true;
		if(reply == "")
		{
			document.getElementById("err_reply").innerHTML="Please Enter Reply.";
			s=false;
		}
		else
		{
			document.getElementById("err_reply").innerHTML="";
		}
		return s;
	}
	</script>

  </head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'header.php';?>
  <!-- Control Sidebar Toggle Button -->
  	
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Reply to this Query</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <form method="post" action="#" enctype="multipart/form-data" onsubmit="return check()">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
			<form action="reply.php" method="post"> 
			<div class="form-group row">
			
                <label for="example-text-input" class="col-sm-2 col-form-label">Question</label>
                <div class="col-sm-10">
				<?php
	
					$id=$_GET['id'];
					
					$sql=$link->rawQueryOne("select * from contact_us_tb where contact_id_pk=?",Array($id));

				?>
					<p><?php echo $sql['message']; ?></p>
					<input type="hidden" id="emailid" name="emailid" value="<?php echo $sql['email']; ?>">
					<input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                </div>
              </div>
			  
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Answer</label>
                <div class="col-sm-10">
                <textarea id="reply" name="reply" style="width:100%" id="reply"></textarea>
				<span id="err_reply" style="color:red;"></span>
                </div>
              </div> 
			  
             <div>

                <center>
                <input type="submit" class="btn btn-info pull-right" value="Send" name="send" style="align:center">
               </center>
              </div>
              </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </form>
        <!-- /.box-body -->
      </div>
    </section>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php';?>

	  
	<!-- jQuery 3 -->
	<script src="js/jquery-3.3.1.js"></script>
	
	<!-- jQuery UI 1.11.4 -->
	<script src="js/jquery-ui.js"></script>
	
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  //$.widget.bridge('uibutton', $.ui.button);
	</script>
	
	<!-- popper -->
	<script src="js/popper.min.js"></script>
	
	<!-- Bootstrap v4.1.3.stable -->
	<script src="js/bootstrap.js"></script>	
	
	<!-- ChartJS -->
	<script src="js/chart.js"></script>
	
	<!-- Sparkline -->
	<script src="js/jquery.sparkline.js"></script>
	
	<!-- jvectormap -->
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>	
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	
	<!-- jQuery Knob Chart -->
	<script src="js/jquery.knob.js"></script>
		
	<!-- Bootstrap WYSIHTML5 -->
	<script src="js/bootstrap3-wysihtml5.all.js"></script>
	
	<!-- Slimscroll -->
	<script src="js/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="js/fastclick.js"></script>
	
	<!-- fox_admin App -->
	<script src="js/template.js"></script>
	
	<!-- fox_admin dashboard demo (This is only for demo purposes) -->
	<script src="js/dashboard.js"></script>
	
	<!-- fox_admin for demo purposes -->
	<script src="js/demo.js"></script>
	
	<!-- weather for demo purposes -->
	<script src="js/WeatherIcon.js"></script>
	
	<script type="text/javascript">
	
		WeatherIcon.add('icon1'	, WeatherIcon.SLEET , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon2'	, WeatherIcon.SNOW , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon3'	, WeatherIcon.LIGHTRAINTHUNDER , {stroke:false , shadow:false , animated:true } );

	</script>

	
</body>


</html>
