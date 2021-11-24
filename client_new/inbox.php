<?php session_start()?>
<?php include 'connection.php'; ?>
<?php 
	if(!isset($_SESSION['firstname']))
	{
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Inbox </title>
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
    <!--breacrumb start-->

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
                            <li>Inbox</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breacrumb end-->

    <!--Cart top heading start-->

    <div class="cart-top-heading">
        <div class="container">
            <div class="summery-top">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="cart-sumttl">
                            <h3>Requests You Can Offer To Help</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cart top heading end-->

    <div class="wishlist-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="wishlist-area-wrap">
                        <form action="#" method="POST">
                            <div class="table-responsive">
                                <table class="main-table-wishlist">
                                    <thead>
                                        <tr class="tr1 wishlist-tr1" style="background-color:#0f365dff;color:white">
                                            
                                            <th class="wishlist-th2"> PRODUCT NAME </th>
                                            <th class="wishlist-th1"> PRICE </th>
                                            <th class="wishlist-th1"> QUANTITY </th>
                                            <th class="wishlist-th1"> STATUS </th>
                                            <th class="wishlist-th5"> PROCESS </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody style="font-weight:bold;">
									<?php 
										$tid=$link->rawQuery("select * from trip_tb where traveller_id=?",Array($_SESSION['member_id']));
											foreach($tid as $t)
											{
												$country_id=$t['country_id'];
												$product=$link->rawQuery("select * from request_tb where country_id_fk=? and status=? and requester_id_fk!=?",Array($country_id,"open",$_SESSION['member_id']));
											
											foreach($product as $p)
											{ ?>
                                        <tr class="tr2 wishlist-tr1">
                                           
                                            </td>
                                            <td class="wishlist-td2"><span><?php echo $p['item_name'];?></span>
                                            </td>
                                            <td class="wishlist-td1">&#8377;<?php echo $p['base_total_price'];?></td>
                                            <td class="wishlist-td1"><?php echo $p['item_qty'];?></td>
                                            <td class="wishlist-td1 item-qty"><?php echo $p['status'];?></td>
                                            <td class="wishlist-td5"><a href="all_products.php?id=<?php echo $p['request_id_pk'];?>" class="wishlist-btn">Show Product</a>
                                            </td>
                                        </tr>
										<?php } }  ?> 
                                        
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br/>
    

    <!--Bottom indicator end-->

    <!--Brand slider area css start-->

    

    <!--Brand slider area css end-->

    <!--Main shop area end-->

    <!--Hair top banner end-->

    <!-- Main footer area start-->

    <?php include 'footer.php';?>

    <!-- Main footer area end-->

    

    
    <div class="to-top posr">
        <a href="#"><i class="zmdi zmdi-arrow-merge"></i></a>
    </div>

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