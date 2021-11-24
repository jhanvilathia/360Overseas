<?php session_start(); 
	if(!isset($_SESSION['member_id']))
	{
		header("location:login.php");
	}
?>
<?php include 'connection.php';?>
<?php 
	$link->where("notif_to",$_SESSION['member_id']);
	$link->update("notification_tb",Array("status"=>1));

?> 
<?php
	if(isset($_POST['decline']))
	{
		$message="Your Offer is Declined By ".$_SESSION['firstname'];
		$link->insert("notification_tb",Array("request_id_fk"=>$_POST['request_id'],"notif_to"=>$_POST['notif_from'],"notif_from"=>$_SESSION['member_id'],"message"=>$message,"status"=>0,"request_status"=>"decline"));
		
		$link->where("notif_id_pk",$_POST['notif_id']);
		$link->update("notification_tb",Array("request_status"=>"decline"));
		
		$link->where("request_id_pk",$_POST['request_id']);
		$link->update("request_tb",Array("status"=>"open"));
	}
?>
<?php
	if(isset($_POST['accept']))
	{
		$q2=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($_POST['request_id']));
		$expiry=$q2['offer_expiry'];
		$d=$q2['offered_date'];
		
		$date = strtotime($d);
		$date = strtotime("+".$expiry." day", $date);
		$date1 = date('m/d/Y', $date);
		if($date1 > date("m/d/y"))
		{
			$message="Your Offer is Accepted By ".$_SESSION['firstname'];
			$link->insert("notification_tb",Array("request_id_fk"=>$_POST['request_id'],"notif_to"=>$_POST['notif_from'],"notif_from"=>$_SESSION['member_id'],"message"=>$message,"status"=>0,"request_status"=>"accept"));
			
			$link->where("request_id_pk",$_POST['request_id']);
			$link->update("request_tb",Array("status"=>"accepted"));
			
			$link->where("notif_id_pk",$_POST['notif_id']);
			$link->update("notification_tb",Array("request_status"=>"accept"));
			
			$traveller_id=$link->rawQueryOne("select notif_from from notification_tb where request_id_fk=?",Array($_POST['request_id']));
			$link->insert("offer_accepted_tb",Array("request_id_fk"=>$_POST['request_id'],"traveller_id_fk"=>$traveller_id['notif_from']));
			
			header("location:checkout.php?id=".$_POST['request_id']);
		}
		else
		{
			echo "<script> alert('Offer has expired. Cannot accept now.'); </script>";
			$link->where("notif_id_pk",$_POST['notif_id']);
			$link->update("notification_tb",Array("request_status"=>"expired"));       
			$link->where("request_id_pk",$_POST['request_id']);
			$link->update("request_tb",Array("status"=>"open"));
		}
	}
?>
<?php
	if(isset($_POST['review']))
	{	
		$req_id=$_POST['request_id'];
		$t_id=$_POST['notif_from'];
		
		header("location:review.php?id=".$req_id."&t_id=".$t_id."");
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Notifications</title>
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
                            <li> Your Notifications </li>
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
                            <h3 > See Your Notifications Here. </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<hr>
	<?php 
	$noti=$link->rawQuery("select * from notification_tb where notif_to=? and request_status!='expired' order by notif_id_pk desc",Array($_SESSION['member_id']));
	
	?>
	
    <div class="single-content-wrap">
	<form action="#" method="post">	
		<div class="blog-single-content">
			<?php 
			foreach($noti as $n)
			{ 
				$request=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($n['request_id_fk']))
				
			?>
			 <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
			<blockquote class="blockstyle">
			<span style="color: #0f365d;
    font-weight: 900;
    font-size: 20px;">Request #<?php echo $request['request_id_pk'];?>&nbsp;<?php echo $request['item_name'];?></span>
			<br>
			<?php
			if($n['notif_from']=="")
			{
				echo "<p style='font-size:18px'>".$n['message']."</p>";
			}
			else
			{ ?>
			<a href="profile.php?member=<?php echo $n['notif_from'];?>"><?php echo $n['message']; ?></a>
			<?php } ?>
			</blockquote>
			</div>
			<?php if($n['request_status']=="no action")
			{ ?>


		 <div class="col-md-6 col-sm-6 col-xs-12">
			<blockquote class="blockstyle"  style="text-align:center;">
			 <input type="submit" class="btn btn-default" style="width:30%;background-color: #0f365dff;color: #fff;font-size: 20px;" onclick="get_id(<?php echo $request['request_id_pk'].",".$n['notif_from'].",".$n['notif_id_pk']; ?>);" name="accept" value="Accept">
			 <input type="submit" class="btn btn-default" style="width:30%;background-color: #0f365dff;color: #fff;font-size: 20px;" onclick="get_id(<?php echo $request['request_id_pk'].",".$n['notif_from'].",".$n['notif_id_pk']; ?>);" name="decline" value="Decline">
			 </blockquote>
		</div>

			<?php } ?>
			 <?php if($n['request_status']=="completed")
			 { ?>
		 <div class="col-md-6 col-sm-6 col-xs-12">
			<blockquote class="blockstyle"  style="text-align:center;">
				<input type="submit" class="btn btn-default" style="width:30%;background-color: #0f365dff;color: #fff;font-size: 20px;" <?php
				$q5=$link->rawQuery("select * from review_tb where feedback_to=? and feedback_from=?",Array($n['notif_from'],$_SESSION['member_id']));
				$cnt=$link->count;
				if($cnt==1)
				{ echo "disabled"; }
			?>
				onclick="get_id_r(<?php echo $request['request_id_pk'].",".$n['notif_from']; ?>);" name="review" value="Review Traveller">
			</blockquote>
		</div>
				
			 <?php } ?>

			</div>
			</div>
			<?php } ?>
			<input type="hidden" name="request_id" id="request_id" />
			 <input type="hidden" name="notif_from" id="notif_from" />
			 <input type="hidden" name="notif_id" id="notif_id" />
		</div>
	</form>
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
	<script>
		function get_id(id,nf,npk)
		{
			document.getElementById("request_id").value=id;
			document.getElementById("notif_from").value=nf;
			document.getElementById("notif_id").value=npk;
		}
		function get_id_r(id,nf)
		{
			document.getElementById("request_id").value=id;
			document.getElementById("notif_from").value=nf;
		}
		
	</script>
</body>
</html>