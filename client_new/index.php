<?php session_start();?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Home</title>
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

    <div class="clearfix"></div>
    <!--slider area are start-->
    <div class="slider-container">
        <!-- Slider Image -->
        <div id="mainSlider" class="nivoSlider slider-image">
            <img src="images/banner/banner1.jpg" alt="main slider" title="#htmlcaption1" />
            <img src="images/banner/banner2.jpg" alt="main slider" title="#htmlcaption2" />
            <img src="images/banner/banner3.jpg" alt="main slider" title="#htmlcaption3" />
        </div>
        <!-- Slider Caption 1 -->
        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slider3-cap-wrapper3 slide-text">
                    <div class="slide-one-text slide-def hp1-cap1">
                        <div class="slide-one-dec wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                            <h4></h4>
                        </div>
                        <div class="slide-one-title wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                            <h2> </h2>
                        </div>
                        <div class="slide-one-title wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                            <h1><span class="slide-text-big"></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Caption 2 -->
        <div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slider3-cap-wrapper3 slide-two-cap slide-text text-center">
                    <div class="slide-two-text slide-def hp1-cap2">
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--slider area are end-->

    <div class="free-offer ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="free-offer-wrapper free-border">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-free-offer text-center">
                                    <div class="title-head">
                                        <h4>WANT SOMETHING FROM OVERSEAS?</h4>
                                    </div>
                                    <div class="free-offer-text">
                                        <p>We connects you to global personal shopper
										to get your favourite products from overseas.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-free-offer def-virticle-line posr text-center">
                                    <div class="title-head">
                                        <h4>WHY USE 360 Overseas?</h4>
                                    </div>
                                    <div class="free-offer-text">
                                        <p>Get paid when you travel by helping requester purchase their request.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-free-offer def-virticle-line posr text-center">
                                    <div class="title-head">
                                        <h4>Verified Users</h4>
                                    </div>
                                    <div class="free-offer-text">
                                        <p>Trustable Requesters And Travelers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<!--Category area start-->
    <div class="homeone-blog-area hp1-indicator">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="blog-left">
                        <div class="blog-small-text">
                            <p></p>
                        </div>
                        <div class="blog-small-headline">
                            <div class="section-title section-title-blog title-head">
                                <a href="category.php"><h3>Categories</h3></a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <p>Choose Category Of Your Product You Want To Buy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="homeone-blog-wrapper">
                            <div class="active-blog-owl def-owl">
							<?php require_once 'connection.php';
							$cat_block=$link->rawquery("select * from category_tb where status=1");
							foreach($cat_block as $c1) 
							{ ?>
                                <div class="col-md-4">
                                    <div class="single-blog">
                                        <div class="blog-image-wrapper overlay-margin-10 posr">
                                            <div class="blog-image blog-img-stlye1">
                                                <a href="shop.php?catid=<?php echo $c1['category_id_pk'];?>"><img src="<?php echo $siteroot . $c1['category_image'];?>" alt="360overseas" style="height:247px;width:370px" />
                                                </a>
                                            </div>
                                            <div class="blog-hover-text def-hovereff">
                                                <div class="text-top deft-underline3 posr">
                                                    <a href="shop.php?catid=<?php echo $c1['category_id_pk'];?>"><h4><?php echo $c1['category_name'];?></h4></a>
                                                </div>
                                                <div class="text-bottom">    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php } ?>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Category area end-->
	
    <!--Requests area start-->
    <div class="new-arrival-product-area hp1-napa pt-60">
        <div class="container">
            <div class="row">
                <div class="product-tab-category-wrapper">
                    <div class="col-xs-12">
                        <div class="home-product-tab-category text-center">
                            <div class="section-title title-head">
                                <h3>Requests</h3>
                                <img src="images/icons/icon-title.png" alt="" />
                            </div>
                            <!--<div class="product-tab-cat">
                                <ul class="nav-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#newArrival" aria-controls="newArrival" role="tab" data-toggle="tab">New Arrival</a>
                                    </li>
                                    <li role="presentation"><a href="#onSale" aria-controls="onSale" role="tab" data-toggle="tab">Onsale</a>
                                    </li>
                                    <li role="presentation"><a href="#featured" aria-controls="featured" role="tab" data-toggle="tab">Featured Products</a>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="product-conttab-wrapper">
                        <div class="tab-content">
						
                            <div role="tabpanel" class="tab-pane active" id="newArrival">
							
                                <div class="active-owl-product def-owl">
								<?php
								require_once 'connection.php';
								$product=$link->rawquery("select * from request_tb");
								foreach ($product as $p)
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
                                                        <!--<div class="product-social-icon social-icon">
                                                            <ul>
                                                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                                </li>
                                                                <li><a href="index.html"><i class="fa fa-heart-o"></i></a>
                                                                </li>
                                                                <li><a href="single-product.html"><i class="fa fa-refresh"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>-->
                                                        
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
                                                    <div class="product-bottom-title">
                                                        <a href="#" title="Soluta Dress"><h4><?php echo $p['item_name'];?></h4></a>
                                                    </div>
                                                    <div class="product-bottom-price">
                                                        <span><?php echo $p['base_total_price'];?> &#8377</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
   
                                </div>
								
                            </div>
							
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Requests area end-->

    <!--contact us area start-->
    <div class="center-banner-area hp1-center-banner">
        <div class="center-banner">
            <div class="banner-left-wrapper">
                
                <div class="banner-image">
                    <div class="collection-single-box-img">
                        <div class="collection-right-img">
                            <a href="#"><img src="images/contact us/1.jpg" alt="domino" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-right-wrapper">
                
                <div class="banner-text-wrapper bottom-bg">
                    <div class="banner-text-bottom text-center">
                        <div class="collection-title title-bottom title-head">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="content-bottom content-area-comm">
                            <p>Ask Us If You Have Any Query.</p>
                        </div>
                        <div class="collection-btn btn-area-comm">
                            <a class="btn-def btn-def-white" href="contact.php">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
    <!--contact us area end-->

    <!--country area start-->
    <div class="featured-product-area pt-90">
        <div class="container">
            <div class="row">
                <div class="featured-wrapper">
                    <div class="col-xs-12">
                        <div class="home-featured-head text-center">
                            <div class="section-title title-head">
                                <h3>Country</h3>
                                <img src="images/icons/icon-title.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="featured-product-wrapper">
					
                        <div class="active-featured-owl def-owl">
						<?php $country1=$link->rawquery("select * from country_tb where status=1");
							foreach ($country1 as $c1)
							{ ?>
                            <div class="col-md-3">
                                <div class="single-product single-featured-product">
                                    <div class="product-wrapper posr">
                                        
                                        <div class="priduct-img-wrapper posr">
                                            <div class="product-img">
                                                <a href="country.php"><img src="<?php echo $siteroot . $c1['country_image'];?>" style="height:180px;width:270px;" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-inner-text">
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="product-bottom-text posr">
                                            <div class="product-bottom-title deft-underline2">
                                                <a href="#" title="Fiant sollemnes"><h4><?php echo $c1['country_name'];?></h4></a>
                                            </div>
                                            <div class="product-bottom-price">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
					
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--country area end-->
	
	


    <!-- Google map area start-->

    <!--<div class="map-area">
        <div id="googleMap"></div>
    </div>-->

    <!-- Google map area end-->

    <!-- Main footer area start-->

    <?php require_once 'footer.php';?>


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
    <!-- Nivo slider pack js -->
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <!-- fancybox js -->
    <script src="js/jquery.fancybox.js"></script>
    <!-- Nivo active js -->
    <script src="js/nivo-active.js"></script>
    <!-- counter up js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Treeview js -->
    <script src="js/jquery.treeview.js"></script>
    <!-- Google Map API js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-IIoucJ-70FQg6xZsORjQCUPHCVj9GV4"></script>
    <!-- Google Map js -->
    <script src="js/google-map.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>


</body>


<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/domino/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2019 09:52:47 GMT -->
</html>