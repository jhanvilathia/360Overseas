<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>
<?php 
  $id=$_GET['id'];
  
  if(isset($id))
  {
    $sql=$link->rawQueryone("select * from voucher_tb where voucher_id_pk=?",Array('voucher_id_pk'=>$id));
  }
?>
<?php 
  if(isset($_POST['update_v']))
  {
		$id=$_POST['id'];
		$nv=$_POST['nv'];
		$vc=$_POST['vc'];
		$va=$_POST['va'];
		$exdate=$_POST['exdate'];
		$link->where("voucher_id_pk",$id);
		$sql=$link->update("voucher_tb",Array("voucher_life"=>$nv,"voucher_code"=>$vc,"voucher_amount"=>$va,"voucher_expiry_date"=>$exdate));
		if($sql)
		{
			header("location:view_voucher.php");
			
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

    <title>360 Overseas Admin - Update Voucher</title>
    
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
		var nv=document.getElementById("nv").value;
		var s=true;
		if(nv==0)
		{
			document.getElementById("snv").innerHTML="It Should Be Greater Than zero.";
			s=false;
		}
		else
		{
			document.getElementById("snv").innerHTML="";
		}
		var vc=document.getElementById("vc").value;
		
		if(vc=="")
		{
			document.getElementById("svc").innerHTML="Please Enter Voucher Code.";
			s=false;
		}
		else
		{
			document.getElementById("svc").innerHTML="";
		}
		var va=document.getElementById("va").value;
		
		if(va==0)
		{
			document.getElementById("sva").innerHTML="It Should Be Greater Than zero.";
			s=false;
		}
		else
		{
			document.getElementById("sva").innerHTML="";
		}
		var datepicker=document.getElementById("datepicker").value;
		
		if(datepicker=="")
		{
			document.getElementById("sdatepicker").innerHTML="Please Select Expiry Date.";
			s=false;
		}
		else
		{
			document.getElementById("sdatepicker").innerHTML="";
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
          <h3 class="box-title">Update Voucher</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <form method="post" action="#" enctype="multipart/form-data" onsubmit="return check()">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">No of Voucher</label>
                <div class="col-sm-10">
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input class="form-control" type="number" min="0" id="nv" name="nv" value="<?php echo $sql['voucher_life']; ?>">
				<span id="snv" style="color:red;"></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Voucher Code</label>
                <div class="col-sm-10">
                <input class="form-control" type="text" id="vc" name="vc"value="<?php echo $sql['voucher_code']; ?>">
				<span id="svc" style="color:red;"></span>
                </div>
              </div>
             <div>
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Voucher Amount</label>
                <div class="col-sm-10">
                <input class="form-control" type="number" min="0" name="va" value="<?php echo $sql['voucher_amount']; ?>" id="va">
				<span id="sva" style="color:red;"></span>
                </div>
              </div>
			 <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Expiry Date</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="exdate" value="<?php echo $sql['voucher_expiry_date'];?>"/>
				  
                </div>
				<span id="sdatepicker" style="color:red;"></span>
                </div>
              </div>

                <center>
                <input type="submit" class="btn btn-info pull-right" value="Update" name="update_v" style="align:center">
               </center>
              </div>
              
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
  <?php include 'footer.php'?>
 
  	
	 
	  
	<!-- jQuery 3 -->
	<script src="js/jquery-3.3.1.min.js"></script>
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
	
	<script src="js/select2.full.js"></script>
	<!-- ChartJS -->
	<script src="js/chart.js"></script>
	<script src="js/jquery.inputmask.js"></script>
	<script src="js/jquery.inputmask.date.extensions.js"></script>
	<script src="js/jquery.inputmask.extensions.js"></script>
	
	<script src="js/moment.min.js"></script>
	<script src="js/daterangepicker.js"></script>
	
	<!-- bootstrap datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	
	<!-- bootstrap color picker -->
	<script src="js/bootstrap-colorpicker.min.js"></script>
	
	<!-- bootstrap time picker -->
	<script src="js/bootstrap-timepicker.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="js/jquery.slimscroll.min.js"></script>
	
	<script src="js/icheck.min.js"></script>
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
	
	<script src="js/advanced-form-element.js"></script>
	
	<script type="text/javascript">
	
		WeatherIcon.add('icon1'	, WeatherIcon.SLEET , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon2'	, WeatherIcon.SNOW , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon3'	, WeatherIcon.LIGHTRAINTHUNDER , {stroke:false , shadow:false , animated:true } );

	</script>

	
</body>

</html>
