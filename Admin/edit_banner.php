<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>
<?php 
  $id=$_GET['id'];
  $img=$_GET['img'];
  if(isset($id))
  {
    $sql=$link->rawQueryone("select * from banner_tb where banner_id_pk=?",Array('banner_id_pk'=>$id));
  }
?>
<?php 
  if(isset($_POST['update_ban']))
  {
      $id=$_POST['id'];
      $img=$_POST['img'];
     
      $sortorder=$_POST['sortorder'];
	  $banimage=$_FILES['banimage']['name'];
      $link->where("banner_id_pk",$id);
      $sql1=$link->update("banner_tb",Array("sort_order"=>$sortorder));
      if($banimage)
      {
        $ext=pathinfo($banimage,PATHINFO_EXTENSION);
        $path="images/banner/".$id.".".$ext;
        if(move_uploaded_file($_FILES['banimage']['tmp_name'],$path))
        {
          $link->where("banner_id_pk",$id);
          $link->update("banner_tb",Array("banner_image"=>$path));
        }
      
      }
	  header("location: view_banner.php");
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

    <title>360 Overseas Admin - Update Banner</title>
    
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
		var sortorder=document.getElementById("sortorder").value;
		var s=true;
		if(sortorder=="")
		{
			document.getElementById("ssortorder").innerHTML="Please Enter Sort Order";
			s=false;
		}
		else
		{
			document.getElementById("ssortorder").innerHTML="";
		}
		var banimage=document.getElementById("banimage").value;
		var ext=banimage.substring(banimage.lastIndexOf('.')+1);
		
		if(banimage!="")
		{
			if(ext!="png" && ext!="jpg" && ext!="jpeg" && ext!="PNG" && ext!="JPEG" && ext!="JPG")
			{
				document.getElementById("sbanimage").innerHTML="jpg or png Files Only!";
				s=false;
			}
		}
		else
		{
			document.getElementById("sbanimage").innerHTML="";
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
          <h3 class="box-title">Update Banner</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <form method="post" action=# enctype="multipart/form-data" onsubmit="return check()">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
            
			  <input type="hidden" name="id" value="<?php echo $id; ?>" />
              <input type="hidden" name="img" value="<?php echo $img; ?>" />
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Sort Order</label>
                <div class="col-sm-10">
                <input class="form-control" type="number" min="0" id="sortorder" name="sortorder"value="<?php echo $sql['sort_order']; ?>">
				<span id="ssortorder" style="color:red;"></span>
                </div>
              </div>
             <div>
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Banner Image</label>
                <div class="col-sm-10">
                <input class="form-control" type="file" name="banimage" id="banimage"><br>
                <img src="<?php echo $sql['banner_image']; ?>" height=100 width=100 alt="image"/>
				<span id="sbanimage" style="color:red;"></span>
                </div>
              </div>

                <center>
                <input type="submit" class="btn btn-info pull-right" value="Update" name="update_ban" style="align:center">
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
