<?php session_start(); ?>
<?php include_once 'connection.php'; ?>
<?php  
	if(!isset($_SESSION['member_id']))
	{
		header("location:login.php");
	}
	if(isset($_POST['cancelbtn']))
	{
		$request_id=$_POST['hid'];
		$r_id=$_POST['cancel'];
		
		$link->insert("cancel_post_tb",Array($_SESSION['member_id'],$r_id,date("d/m/y")));
		$link->where("request_id_pk",$request_id);
		$link->delete("request_tb");
		
		header("location:activity.php");
	}
?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Request Activity</title>
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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <!--header main menu start-->
		
		<?php include_once 'header.php'; ?>
		
        <!--header main menu end-->

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
                            <li>Your Activities</li>
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
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="cart-sumttl">
                            <h3>Activities Summary</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="cart-product-desc">
						<?php 
		
						$sql=$link->rawQuery("select * from request_tb where requester_id_fk=?",Array($_SESSION['member_id']));
						$count=$link->count;
						?>
                            <p>You have <?php echo $count; ?> requests.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cart top heading end-->

    <!--Cart start-->

    <div class="cart-sum-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="progress-summery text-center">
                        <ul class="progress-steps">
                            <li class="steps-item  litext is-active" style="width:30%;"><a href="activity.php">Your Requests</a>
                            </li>
                            <li class="steps-item" style="width:30%;"><a href="trips_activity.php">Your Trips</a>
                            </li>
							<li class="steps-item" style="width:30%;"><a href="offers_activity.php">Your Offers</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Cart end-->
	
    <div class="cart-table-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="shopping-cart-table">
                       
                            <div class="table-responsive">
                                <table class="main-table">
                                    <thead>
                                        <tr class="tr1">
                                            <th class="th1">Item</th>
                                            <th class="th2">Description</th>
                                            <th class="th3">Status</th>
                                            <th class="th4">Country</th>
                                            <th class="th5">Quantity</th>
                                            <th class="th7">Total Price</th>
											<th class="th8">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										
										foreach($sql as $s)
										{
										
									?>
                                        <tr class="tr2">
										
                                            <td class="td1">
                                                <a href="all_products.php?id=<?php echo $s['request_id_pk']; ?>"><img src="<?php echo $siteroot2.$s['item_photo']; ?>" alt="360Overseas" />
                                                </a>
                                            </td>
                                            <td class="td2">
                                                <h5><?php echo $s['item_name']; ?></h5>
                                                <p><?php echo $s['item_desc']; ?></p>
                                                <p>
												<?php 
												if($s['perishable']=="true")
												{
													echo "perishable";
												}
												else
												{
													echo "";
												}
												if($s['fragile']=="true")
												{
													echo "fragile";
												}
												else
												{
													echo "";
												}
												?>
												</p>
                                            </td>
											<?php 
												if($s['status']=="offered")
												{
													$color="style='background:#64ccc8'";
												}
												else if($s['status']=="accepted")
												{
													$color="style='background:#156cac'";
												}
												else if($s['status']=="completed")
												{
													$color="style='background:#55c65e'";
												}
												else
												{
													$color="style='background:#e93b3b'";
												}
											?>
                                            <td class="td3"><span <?php echo $color; ?>><?php echo $s['status']; ?></span>
                                            </td>
                                            <td class="td4"><span><?php $con=$link->rawQueryOne("select * from country_tb where country_id_pk=?",Array($s['country_id_fk'])); echo $con['country_name']; ?></span></td>
                                            <td class="td5 item-qty">
											<span><?php echo $s['item_qty']; ?></span>
                                            <td class="td7">&#8377; <?php echo $s['base_total_price']; ?></td>
											<td class="td6"><a href="#" onclick="get_id(<?php echo $s['request_id_pk']; ?>);" class="button" 
											<?php 
											 if($s['status']=="offered" || $s['status']=="open"){
												 echo "data-toggle='modal' data-target='#myModal'";
											 }
											 else{
												 echo "data-toggle='modal' data-target='#cannotdelete'"; 
											 }
											?>>
											<i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        
										<?php } ?>	
                                    </tbody>
                                </table>
			<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Delete Request</h4>
				</div>
				<div class="modal-body">
				  <p>Select a reason to cancel the request : </p>
				  <form method="post" action="#" onsubmit="return check_reason();">
					  <select name="cancel" id="cancel">
					  <option value="-1">Select a reason</option>
					  <?php
						$sql2=$link->rawQuery("select * from cancel_tb where status=1 and type='posted'");
						foreach($sql2 as $s2)
						{
					  ?>
					  
					  <option value="<?php echo $s2['reason_id_pk']; ?>"><?php echo $s2['reason']; ?></option>
						<?php } ?>
					  </select>
				  <input type="hidden" id="hid" name="hid" />
				  <span id="reasonerr" style="color:red;"></span>
				</div>
				<div class="modal-footer">
				  <input type="submit" class="btn btn-default" value="OK" name="cancelbtn">
				  </form>	
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			  </div>
      
			</div>
		</div>
		
		<div class="modal fade" id="cannotdelete" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Oops !</h4>
				</div>
				<div class="modal-body">
				  <p>Cannot delete a request which is already <b>accepted</b> or <b>completed</b>.</p>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			  </div>
      
			</div>
		</div>
        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div><br/>


    <!--Footer bottom area start-->

    <?php include_once 'footer.php'; ?>

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
    <!-- Treeview js -->
    <script src="js/jquery.treeview.js"></script>
    <!-- Nivo slider pack js -->
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <!-- Nivo slider active js -->
    <script src="js/nivo-active.js"></script>
    <!-- Cloudflare js -->
    <script src="js/waypoints.min.js"></script>
    <!-- counter up js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
	<script>
		function check_reason()
		{
			var reason=document.getElementById('cancel').value;
			var s=true;
			
			if(reason==-1)
			{
				document.getElementById("reasonerr").innerHTML="Please select a reason to cancel.";
				s=false;
			}
			return s;
		}
		function get_id(id)
		{
			document.getElementById("hid").value=id;
		}
	</script>
</body>
</html>