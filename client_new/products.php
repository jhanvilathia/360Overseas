<?php require_once 'connection.php';?>
<?php session_start();?>
<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	else
	{
		header("location:all_products.php");
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Products || 360 Overseas</title>
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
                            <li> Products </li>
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
                            <h3> Products </h3>
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
			<?php $product=$link->rawquery("select * from request_tb where category_id_fk=".$id);
			foreach($product as $p)
			{ ?>
               <div class="col-md-3">
		<div class="single-product">
			<div class="product-wrapper posr">
				<div class="product-label">
					<div class="label-sale"><?php echo $p['status'];?></div>
				</div>
				<div class="priduct-img-wrapper posr">
					<div class="product-img">
						<a href="all_products.php?id=<?php echo $p['request_id_pk'];?>"><img src="<?php echo $siteroot2. $p['item_photo'];?>" style="height:311px;width:270px;" alt="" />
						</a>
					</div>
					<div class="product-inner-text">
						
						<div class="product-btn">
							<div class="product-qview-search">
								<a class="btn-def btn-product-qview q-view" data-toggle="modal" data-target=".modal" href="#"><i class=" product-search fa fa-search" ></i> quick View</a>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="product-review">
					<ul class="light-color">
						<li><a href="#"><i class="fa fa-star-o"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-star-o"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-star-o"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-star-o"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-star-o"></i></a>
						</li>
					</ul>
				</div>-->
				<div class="product-bottom-text posr">
					<div class="product-bottom-title deft-underline2">
						<a href="all_products.php?id=<?php echo $p['request_id_pk'];?>" title="Soluta Dress"><h4><?php echo $p['item_name'];?></h4></a>
					</div>
					<div class="product-bottom-price">
						<span><?php echo $p['base_total_price'];?></span>
					</div>
				</div>
			</div>
		</div>
                                    </div> 
			<?php } ?>
				
				
                </div>
            </div>
        </div>
    

    <!--Brand slider area css start-->

    

    <!--Brand slider area css end-->

    <!--Main shop area end-->

    <!--Hair top banner end-->

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