<?php session_start();?>
<?php include 'connection.php';?>
<?php  
	
	if(!isset($_SESSION['firstname']))
	{
		header("location:login.php");
	}
?>
<?php 
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$product=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($id));

	}
	else
	{
		header("location:index.php");
	}
?>
<?php 
	
	if(isset($_POST['want']))
	{
		header("location:post_request.php?id=".$product['request_id_pk']);
	}
?>
<?php 
	function request_accepted()
	{
		header("location:offer_accepted.php?id=".$product['request_id_pk']);
	}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Requests</title>
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
	<script>
	
		function help_offer()
		{
			window.location.assign("offer_accepted.php?request_id=<?php echo $product['request_id_pk'];?>");
		}
		
	</script>
</head>

<body>
    

    <?php include 'header.php';?>

    <!--Breadcrumb start-->
    <div class="subpage-main-wrapper about-full">
        <div class="breadcrumbs-wrapper breadcumbs-bg1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs breadcrumbs-style1 sep1 posr">
                            <ul>
                                <li>
                                    <div class="breadcrumbs-icon1">
                                        <a href="index.php" target="" title="Return to home"><i class="fa fa-home"></i></a>
                                    </div>
                                </li>
                                <li>Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb end-->
		<input type="hidden" value="<?php echo $id;?>" id="req_id" />
        <div class="compare-area compare-single-productt">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="single-thumbnail-wrapper">
                            <div class="single-product-tab">
                                <ul class="single-tab-control" role="tablist">

                                </ul>
                            </div>
                            <div class="single-cat-main">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="">
                                        <div class="tab-single-image">
                                            <a href="#" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $siteroot2 . $product['item_photo'];?>" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                 
                                    
                                </div>
                            </div>
							
							
                        </div>
                    </div>
					<hr>
                    <div class="col-md-6 col-sm-12 col-xs-12">
					<form action="#" method="post">
                        <div class="compare-content-wrap">
                            <div class="cmain-heading text-uppercase">
                                <h3><?php echo $product['item_name'];?></h3>
								<hr>
                            </div>
                            <div class="compare-conpart compare-single-mgr">
                                <div class="compare-social">
                                    
                                </div>
                                <?php 
									$category_id=$link->rawQueryOne("select * from category_tb where category_id_pk=?",Array($product['category_id_fk']));
									$country=$link->rawQueryOne("select * from country_tb where country_id_pk=?",Array($product['country_id_fk']));
								?>
								<br/>
                                <div class="old-new-price">
                                    <p> <b>Category</b> : <?php echo $category_id['category_name'];?> </p>
                                    <p> <b>Buy From</b> : <?php echo $country['country_name'];?> </p>
                                    <p> <b>Quantity</b> : <?php echo $product['item_qty'];?> </p>
									<p> <b>Description</b> : <?php echo $product['item_desc'];?></p>
									<p>	<b> Shop in </b>: <?php echo $product['item_shop'];?></p>
									<p> <b> Expected Date</b> : <?php echo $product['expected_date'];?></p>
								   <p> <b>Offered Price </b> : <?php echo $product['base_total_price'];?> &#8377;  </p>
                                </div>
                            </div>
                            
                            <div class="compare-conpart-pm compare-bottom">
                                <div class="old-new-price">
                                   
                                </div>
								<div>
								<?php $member=$link->rawQueryOne("select * from member_tb where member_id_pk=? ",Array($product['requester_id_fk']));?>
								<img src="<?php echo $siteroot2 . $member['photo'];?>" style="height:50px;width:50px;border-radius:100px">
								&nbsp;<b>Posted By</b> : <a href="profile.php?member=<?php echo $member['member_id_pk']; ?>"><?php echo $member['firstname']." ".$member['lastname'];?></a>	
								
								
								</div>
                                
                                
                                
                            </div>
							<br/>
							<?php
								$flag="false";
								$country_id=$link->rawQuery("select * from trip_tb where traveller_id=?",Array($_SESSION['member_id']));
								foreach($country_id as $c)
								{
									if($c['country_id']==$product['country_id_fk'])
									{
										$flag="true";
										$return=$c['return_date'];
										
										$date = strtotime($return);
										$date1 = date('m/d/Y', $date);
										if($date1 < date("m/d/y"))
										{
												$flag="false";
										}
									}
									else
									{
										$flag="false";
									}
								}
							
							
							?>
							<button type="button" class="button-my" <?php if($flag=="false") {echo "data-toggle='modal' data-target='#myModal' ";} else { echo "data-toggle='modal' data-target='#offer' "; } ?>  <?php if($member['member_id_pk']==$_SESSION['member_id']) echo "hidden";?> <?php if($product['status']!='open'){ echo "hidden";} ?> name="help">Offer To Help</button>
                            <input type="submit" class="button-my" Value="I Want This Too" style="margin-left:10px;" <?php if($member['member_id_pk']==$_SESSION['member_id']) echo "hidden" ;?> name="want"/>
                            

                        </div>
						</form>
						<br/>
						<div class="">
								 <div class="old-new-price">
									<b>Self Collection</b> : At 360 Overseas HeadQuarters
								</div>
						</div>
						<div class="clearfix"></div>
			<?php 
			$comment=$link->rawQuery("select * from comment_tb where request_id_fk=?",Array($id));
			?>
		<div class="comment-title-wrap posr">
			<h3>Comments</h3>
		</div>
		<div class="comment-reply-wrap" id="mydiv">
		<ul>
			<?php foreach($comment as $c)
			{
			$member_c=$link->rawQueryOne("select * from member_tb where member_id_pk=?",Array($c['member_id_fk']));
			?>
			<input type="hidden" value="<?php echo $id;?>" id="req_id" name="req_id"/>
			<li class="public-reply-area">
				<div class="public-comment">
					<div class="comment-image">
						<img src="<?php echo $siteroot2.$member_c['photo'];?>" alt="360 Overseas" />
					</div>
					<div class="public-text-wrapper single-comment-admin">
						<div class="single-comment-text">
							<div class="single-comm-top">
								<p><span class="color-bold2"><?php echo $member_c['firstname']. " " .$member_c['lastname'];?></span>
									
								</p>
							</div>
							<div class="single-comm-btm">
								<p> <?php echo $c['comment'];?></p>
							</div>
						</div>
					</div>
				</div>
				<br/>
			</li>
			<?php } ?>
			
		</ul>
		
	</div>
									<div class="clearfix"></div>
                                    <div class="comment-title-wrap posr">
                                        <h3>Leave a comment </h3>
                                    </div>
                                    <div class="comment-input">
                                        
                                        <div class="comment-input-textarea">
                                           
                                            <textarea name="comment" id="comment" placeholder="Write your comment here"></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="single-comment-btn">
                                        <div class="single-post-comment">
                                            <button type="button" onClick="add_comment()" class="btn btn-default">Post Comment</button>
                                        </div>
                                    </div>
                    </div>
					
                </div>
            </div>
        </div>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Oops !</h4>
				</div>
				<div class="modal-body">
				  <p>You Have No Trips To <?php echo $country['country_name'];?>. So You cannot offer to help.</p>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div>
      
			</div>
		</div>
		
		<div class="modal fade" id="offer" role="dialog">
			<div class="modal-dialog">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Accept Offer</h4>
				</div>
				<form action="offer_accepted.php?request_id=<?php echo $product['request_id_pk'];?>" method="post">
				<div class="modal-body">
				  <p><b>Offer Expires In</b></p>
				  1 Day <input type="radio" name="days" value="1" selected>
				  &nbsp;&nbsp;&nbsp;3 Days <input type="radio" name="days" value="3" >
				  &nbsp;&nbsp;&nbsp;5 Days <input type="radio" name="days" value="5">
				</div>
				<div class="modal-footer">
				  <input type="submit" class="btn btn-default" value="OK" name="offer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</form>  
				</div>
			  </div>
			</div>
		</div>
       

        

        <!--related product area start-->
        <div class="featured-product-area single-related-product">
            <div class="container">
                <div class="row">
                    <div class="featured-wrapper">
                        <div class="col-xs-12">
                            <div class="home-featured-head text-center">
                                <div class="section-title title-head">
                                    <h3>Related Products</h3>
                                    <img src="images/icons/icon-title.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
						<?php $products=$link->rawQuery("select * from request_tb where category_id_fk=?",Array($category_id['category_id_pk']));?>                        
						<div class="featured-product-wrapper">
                            <div class="active-featured-owl def-owl">
							<?php foreach($products as $p) 
							{ ?>
                                <div class="col-md-3">
                                    <div class="single-product single-featured-product">
                                        <div class="product-wrapper posr">
                                            <div class="product-label">
                                                <div class="label-sale"><?php echo $p['status'];?></div>
                                            </div>
                                            <div class="priduct-img-wrapper posr">
                                                <div class="product-img">
                                                    <a href="all_products.php?id=<?php echo $p['request_id_pk'];?>"><img src="<?php echo $siteroot2. $p['item_photo'];?>" alt="" style="height:311px;width:270px;" />
                                                    </a>
                                                </div>
                                                <div class="product-inner-text">
                                                                
													<div class="product-btn">
														<div class="product-qview-search">
															<a class="btn-def btn-product-qview q-view" data-toggle="modal" data-target=".modal" href="all_products.php?catid=<?php echo $p['category_id_fk'];?>"><i class=" product-search fa fa-search" ></i>View</a>
														</div>

													</div>
												</div>
                                            </div>
                                            
                                            <div class="product-bottom-text posr">
                                                <div class="product-bottom-title deft-underline2">
                                                    <a href="all_products.php?id=<?php echo $p['request_id_pk']; ?>" title="Mirum est notare"><h4><?php echo $p['item_name'];?></h4></a>
                                                </div>
                                                <div class="product-bottom-price">
                                                    <span>&#8377;<?php echo $p['base_total_price'];?></span> 
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

        <!--related product area end-->

        <!--Brand slider area css start-->
        

        <!--Brand slider area css end-->

    </div>

    <!-- Main footer area start-->

    <?php include 'footer.php';?>

    <!-- Main footer area end-->

    <!--Footer bottom area start-->

    
    <div class="to-top posr">
        <a href="#"><i class="zmdi zmdi-arrow-merge"></i></a>
    </div>

    <!--Footer bottom area end-->
    <!-- QUICKVIEW PRODUCT -->
    
    <!-- END QUICKVIEW PRODUCT -->

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
    <!-- mixit up js -->
    <script src="js/mixitup.min.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
	<script>
	function add_comment()
	{
		var comment=$("#comment").val();
		
		var req_id=$("#req_id").val();
		$.ajax({
			   method: "POST",
			   url: "add_comment.php",
			   data: {comment:comment,req_id:req_id},
			   success: function(data)
			   {
					 $('#mydiv').html(data);
					 $("#comment").val("");
			   }
			});
	}
</script>
</body>

</html>