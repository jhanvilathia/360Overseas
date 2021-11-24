<?php session_start(); 
?>
<?php include 'connection.php';?>
<?php 
	if(isset($_GET['member']))
	{
		$member=$_GET['member'];
		$member_info=$link->rawQueryOne("select * from member_tb where member_id_pk=?",Array($member));
	}
	else
		header("location:index.php");
		


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Profile</title>
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
                            <li> Profile </li>
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
                            <h3 > Profile </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="abt-team-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="team-image-total team-img br-eff text-center">
                            <div class="team-img-wrap posr">
                                <div class="team-img posr">
                                    <img src="<?php echo $siteroot2. $member_info['photo'];?>" style="height:373px;width:300px" alt="" />
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
					<div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
						<span style="font-size: 20px;font-weight: 600;color: #0f365dff;"> Name : </span><span style="font-size: 20px;"><?php echo $member_info['firstname']. " " .$member_info['lastname'];?></span>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
						<span style="font-size: 20px;font-weight: 600;color: #0f365dff;"> Email : </span><span style="font-size: 20px;"><?php echo $member_info['email'];?></span>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
						<span  style="font-size: 20px;font-weight: 600;color: #0f365dff;"> Contact Number : </span><span style="font-size: 20px;"><?php echo $member_info['contact_number'];?></span>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
						<?php if($member_info['email_verified']==1) echo "<i class='fa fa-check'>Verified User</i>"; ?>
						</div>
						<div class="comment-title-wrap posr">
			<h3>Reviews</h3>
		</div>
		<?php 
			$reviews=$link->rawQuery("select * from review_tb where feedback_to=?",Array($member));
			?>
		<div class="comment-reply-wrap" id="mydiv">
		<ul>
			<?php foreach($reviews as $r)
			{
			$member_r=$link->rawQueryOne("select * from member_tb where member_id_pk=?",Array($r['feedback_from']));
			?>
			<li class="public-reply-area">
				<div class="public-comment">
					<div class="comment-image">
						<img src="<?php echo $siteroot2.$member_r['photo'];?>" alt="360 Overseas" />
					</div>
					<div class="public-text-wrapper single-comment-admin">
						<div class="single-comment-text">
							<div class="single-comm-top">
								<p><span class="color-bold2"><?php echo $member_r['firstname']. " " .$member_r['lastname'];?></span>
									
								</p>
							</div>
							<div class="single-comm-btm">
								<p> <?php echo $r['feedback'];?></p>
							</div>
						</div>
					</div>
				</div>
				<br/>
			</li>
			<?php } ?>
			
		</ul>
		
	</div>
                    </div>
				</div>
			</div>
		</div>
		<br>
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