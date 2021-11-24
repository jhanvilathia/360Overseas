<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>360 Overseas Admin - Contact</title>
    
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
       <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Contact</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Contact Person</th>
              <th>Subject</th>
			  <th>Message</th>
			  <th>Email</th>
              <th>Reply</th>
              
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql = $link->rawQuery("select * from contact_us_tb where status=0");
            foreach ($sql as $s) 
            { ?>
             <tr>
              <td><?php echo $s['name']; ?></td>
              <td><?php echo $s['subject']; ?></td>
              <td><?php echo $s['message']; ?></td>
              <td><?php echo $s['email']; ?></td> 
            <td><a href="reply.php?id=<?php echo $s['contact_id_pk']; ?>" style="color:blue;">Reply</a></td>
            </tr>
           <?php }

            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
</div>

    </section>

    <!-- Main content -->
    </div>
    <!-- /.content -->
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
	<script src="js/jquery.dataTables.min.js"></script>
    
    <!-- start - This is for export functionality only -->
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.flash.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
  
    <!-- end - This is for export functionality only -->
  
  <!-- foxadmin for Data Table -->
  <script src="js/data-table.js"></script>
  
	<!-- weather for demo purposes -->
	<script src="js/WeatherIcon.js"></script>
	
	<script type="text/javascript">
	
		WeatherIcon.add('icon1'	, WeatherIcon.SLEET , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon2'	, WeatherIcon.SNOW , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon3'	, WeatherIcon.LIGHTRAINTHUNDER , {stroke:false , shadow:false , animated:true } );

	</script>

	
</body>

</html>
