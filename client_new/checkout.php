<?php session_start(); 
	if(!isset($_SESSION['member_id']))
	{
		header("location:login.php");
	}
?>
<?php include 'connection.php';?>
<?php 
	if(isset($_GET['id']))
	{
		$request_id=$_GET['id'];
		$request=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($request_id));
	}
	else
	{
		header("location:index.php");
	}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Payment</title>
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
                            <li> Payment </li>
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
                            <h3 > Pay Here. </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<hr>
    <div class="cart-table-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="shopping-cart-table">
                        <form action="#" method="POST">
                            <div class="table-responsive">
                                <table class="main-table">
                                    <thead>
                                        <tr class="tr1">
                                            <th class="th1">Request</th>
                                            <th class="th2">Shop</th>
                                            <th class="th4">Base Price</th>
                                            <th class="th5">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr2">
                                            <td class="td1">
                                                <img src="<?php echo $siteroot2.$request['item_photo'];?>" />
                                              
                                            </td>
                                            <td class="td2">
                                                <h5><?php echo $request['item_name'];?></h5>
                                                <p><?php echo $request['item_desc'];?></p>
                                                <p><?php 
													
												echo $request['item_shop'];?></p>
                                            </td>
                                         
                                            <td class="td4"><?php echo $request['base_total_price'];?> &#8377;</td>
                                            <td class="td5 item-qty">
                                               <p><?php echo $request['item_qty'];?></p>
                                            </td>
											
                                        </tr>
							
                                        
                                    </tbody>
                                </table>
								<br>
								<p>
								<span>(Amount in the 360 Overseas wallet will automatically be deducted.)</span>
								<input type="hidden" value="<?php echo $request_id; ?>" id="req_id">

								<h5><b>DO YOU HAVE A VOUCHER CODE?</b></h5>
								<input type="text" placeholder="Enter Voucher Code" style="padding:15px 27px" id="voucher" name="voucher" />
								<button type="button" onclick="check_voucher();" class="button-my" data-toggle='modal' data-target='#myModal' >Apply</button>

								<button type="button" onclick="calculate();" id="pay" class="button-my"style="float:right" <?php
									
									$r=$link->rawQueryOne("select requester_payment_status from request_tb where request_id_pk=?",Array($request_id));
									if($r['requester_payment_status']==1)
									{
										echo "data-toggle='modal' data-target='#myModal3'";
									}
									else
									{
										echo "data-toggle='modal' data-target='#myModal2'";
									}
								?>>Pay</button>
								<br/>
								<div id="mydiv">
								</div>
								<br/>
                            </div>
                        </form>
			<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Voucher</h4>
				</div>
				<div class="modal-body">
				  <span id="myspan" style="color:black"></span>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				</div>
			  </div>
      
			</div>
		</div>
		<div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Payment</h4>
				</div>
				<div class="modal-body">
				<form action='final_payment.php' method='post'>
				  <span id="myspan2"></span>
				</div>
				<div class="modal-footer">
				  <input type="submit" class="btn btn-default" value="Proceed to pay">
				 </form>
				</div>
			  </div>
      
			</div>
		</div>
		<div class="modal fade" id="myModal3" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Oops !</h4>
				</div>
				<div class="modal-body">
				  <span>Payment already done.</span>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				</div>
			  </div>
      
			</div>
		</div>
		<div id="mydiv">
		</div>
		
                    </div>
                </div>
            </div>
        </div>
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
	function calculate()
	{
		var req_id=$("#req_id").val();
		
		var voucher=$("#voucher").val();
		$.ajax({
			   method: "POST",
			   url: "calculate.php",
			   data: {req_id:req_id,voucher:voucher},
			   success: function(data)
			   {
					 $('#myspan2').html(data);
			   }
			});
	}
	function check_voucher()
	{	
		var req_id=$("#req_id").val();
		var voucher=$("#voucher").val();
		$.ajax({
			   method: "POST",
			   url: "check_voucher.php",
			   data: {req_id:req_id,voucher:voucher},
			   success: function(data)
			   {
					 $('#myspan').html(data);
			   }
			});
	}	
	</script>
</body>
</html>