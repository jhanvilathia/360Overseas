<!doctype html>
<?php session_start();?>
<?php include 'connection.php';?>
<?php  
	
	if(!isset($_SESSION['firstname']))
	{
		header("location:login.php");
	}
?>
<?php 
	if(isset($_REQUEST["cpage"]))
	{
		$nowpage=$_REQUEST["cpage"];
	}
	else
	{
		$nowpage=1;
	}
	$size=($nowpage-1)*3;
	
	if(isset($_GET['catid']))
	{
		$id="";
		$count=0;
		$catid=$_GET['catid'];
		
		$product=$link->rawQuery("select * from request_tb where category_id_fk=? LIMIT $size,3",Array($catid));
		
		foreach($product as $p)
		{
			$count++;
		}
	}
	else if(isset($_GET['id']))
	{
		$catid="";
		$count=0;
		$id=$_GET['id'];
		$product=$link->rawQuery("select * from request_tb where country_id_fk=? LIMIT $size,3",Array($id));
		
		foreach($product as $p)
		{
			$count++;
		}
	}
	else
	{
		header("location:index.php");
	}

?>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Products</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.html" />
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
    <!--Hair top banner start-->

    <div class="hair-main-wrapper">
        
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
                                <li>Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Main shop area start-->

        <div class="main-shop-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="sidebar-fullwprapper">
                            <aside class="sidebar-main-ttl jstest plus posr">
                                <h3>Catalog</h3>
                            </aside>

                            <div class="shop-sidebar">
                                <div class="sidebar-area sidebar1">
                                    <div class="sidebar-full-content-wrapper sfcr-close">
                                        <aside class="sidebar-content">
                                            <div class="sidebar-small-ttle">
                                                <div class="sidebar-st">
                                                    <p>Category</p>
                                                </div>
                                                <div class="sidebar-cbox">
                                                    <form action="#" method="post">
													<?php
													
														$cat=$link->rawQuery("select * from category_tb where status=1");
														
														foreach($cat as $c)
														{
													?>
                                                        <input type="checkbox" onclick="check();" id="<?php echo $c['category_id_pk']; ?>" name="ch" value="<?php echo $c['category_id_pk']; ?>" <?php if($catid==$c['category_id_pk']) { echo "checked"; } ?> />
                                                        <label for="cstock"><?php echo $c['category_name']; ?></label><br/>
														<?php } ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </aside>
                                        <aside class="sidebar-content">
                                            <div class="sidebar-small-ttle">
                                                <div class="sidebar-st">
                                                    <p>Country</p>
                                                </div>
                                                <div class="sidebar-cbox">
                                                    <form action="#">
													<?php
													
														$con=$link->rawQuery("select * from country_tb where status=1");
														foreach($con as $co)
														{
															?>
                                                        <input type="checkbox" onclick="check();" id="<?php echo $co['country_id']; ?>" name="chc" value="<?php echo $co['country_id_pk']; ?>" <?php if($id==$co['country_id_pk']) { echo "checked"; } ?> />
                                                        <label for="cstock2"><?php echo $co['country_name']; ?></label><br/>
														<?php } ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </aside>
                                        <aside class="sidebar-content">
                                            <div class="sidebar-small-ttle">
                                                <div class="sidebar-st">
                                                    <p>Price</p>
                                                </div>
                                                <div class="sidebar-cbox">
                                                    <p>
                                                        <label for="amount">Range:</label>
                                                        <input type="text" id="amount" readonly style="border:0; color:#444444; font-weight:bold;">
                                                    </p>
                                                    <div id="slider-range"></div>
                                                </div>
                                            </div>
                                        </aside><br>
                                        <aside class="sidebar-content">
                                            <div class="sidebar-small-ttle">
                                                <div class="sidebar-st">
                                                    <p>Status</p>
                                                </div>
                                                <div class="sidebar-cbox">
                                                    <form action="#">
													<?php
														
														$status=$link->rawQuery("select distinct status from request_tb");
														
														foreach($status as $s)
														{
													?>
                                                        <input class="sbar-beige clr-1" type="checkbox" id="<?php echo $s['status']; ?>" name="check_status" onclick="check();" value="<?php echo $s['status']; ?>" />
                                                        <label for="cstock7"><?php echo $s['status']; ?></label><br/>
														<?php } ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </aside>
                                        
                                        
                                    </div>
                                    <aside class="sidebar-content">
                                        <div class="sidebar-small-ttle">
                                            <div class="sidebar-st">
                                                <div class="sidebar-img hover-cross">
                                                    <a href="#"><img src="images/banner/advertising-s1.jpg" alt="360Overseas" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="top-full-tarea">
                            <div class="full-ttlleft">
                                <p>Shop</p>
                            </div>
							<input type="hidden" value="0" id="val1" />
							<input type="hidden" value="200000" id="val2" />

                            <!--<div class="full-ttlright" id="mycount">
                                <div class="selected-items">
                                    <p>There are <span id="cnt"><?php echo $count; ?></span> products.</p>
                                </div>
                            </div>-->
                        </div>
                        <div class="clearfix"></div>
                        <div class="mainshop-area">
                            <div class="mainshop-top" >
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="category-short">
                                            
                                            <div class="sproduct-short">
                                                <div class="top-product-short">
                                                    <label for="viewby">Sort By</label>
                                                    <select name="sort_order" onchange="sort();" id="sort_order">
														<option value="0">Default</option>
                                                        <option value="1">Name: A-Z</option>
                                                        <option value="2">Price: Low to High</option>
                                                        <option value="3">Price: High to Low</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-md-7 col-sm-5 col-xs-12">
                                        <div class="category-short" style="float:right">
                                            
                                            <div class="sproduct-short">
                                                <div class="top-product-short">
													<label for="viewby">Search Products </label>
													<input type="text" onkeyup="search_products();" id="search" />
												</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="compare-items">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="shop-mega-category">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="productWidgets">
                                    <div class="tab-content-wrapper">
                                        <div class="row" id="mydiv">
										<?php foreach($product as $p) { ?>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="single-product">
                                                    <div class="product-wrapper posr">
                                                        <div class="product-label">
                                                            <div class="label-sale"><?php echo $p['status'];?></div>
                                                        </div>
                                                        <div class="priduct-img-wrapper posr">
                                                            <div class="product-img">
                                                                <a href="all_products.php?id=<?php echo $p['request_id_pk'];?>"><img src="<?php echo $siteroot2 . $p['item_photo'];?>" alt="" style="height:311px;width:270px;" />
                                                                </a>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="product-bottom-text posr">
                                                            <div class="product-bottom-title deft-underline2">
                                                                <a href="all_products.php?id=<?php echo $p['request_id_pk'];?>" title="Fiant sollemnes"><h4><?php echo $p['item_name'];?></h4></a>
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
                        <!--Pagination-->
                        <div class="pagination-wrapper">
                            <div class="row">
                                <!--<div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="pagi-itemshow">
                                        <p>Showing 1 - 12 of 13 items</p>
                                    </div>
                                </div>-->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="shop-pagination pagi-style1">
                                        <ul>
                                            <?php 
													if(isset($_GET['catid']))
													{
														$catid=$_GET['catid'];
														$size=$link->rawQueryOne("select count(*) as cnttot from request_tb where category_id_fk=?",Array($catid));
														$querystring="&catid=$catid";
												
												}
													if(isset($_GET['id']))
													{
														$id=$_GET['id'];
														$size=$link->rawQueryOne("select count(*) as cnttot from request_tb where country_id_fk=?",Array($id));
														$querystring="&id=$id";
													}
													$limitrow=ceil($size["cnttot"]/3);	            
													 for($i=1;$i<=$limitrow;$i++)
													 {
														?>
															<li><a href="shop.php?cpage=<?php echo $i;?><?php echo $querystring; ?>" class="active"><?php echo $i; ?></a></li>    
														<?php
													 }
											?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Brand slider area css start-->

        

        <!--Brand slider area css end-->
    </div>

    <!--Main shop area end-->

    <!--Hair top banner end-->

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
	 $("#slider-range").slider({
        range: true,
        min: 0,
        max: 200000,
        values: [50, 200000],
        slide: function(event, ui) {
            $("#amount").val("Rs." + ui.values[0] + " - Rs." + ui.values[1]);
			
			$('#val1').val(ui.values[0]);
			$('#val2').val(ui.values[1]);
			
			check();
        }
    });
    $("#amount").val("Rs." + $("#slider-range").slider("values", 0) +
        " - Rs." + $("#slider-range").slider("values", 1));

	function sort()
	{
		check();
	}
	
	function search_products()
	{
		var search = $("#search").val();
		
		$.ajax({
			   method: "POST",
			   url: "search_products.php",
			   data: {search:search},
			   success: function(data)
			   {
					 $('#mydiv').html(data);
			   }
			});
	}
	
	function check()
	{
		var cat_array = new Array();
		var con_array = new Array();
		var status_array = new Array();
		var val1 = $('#val1').val();
        var val2 = $('#val2').val();
		var sort_order = $('#sort_order').val();
		
		$("input:checkbox[name=ch]:checked").each(function(){
			cat_array.push($(this).val());
		});
		
		$("input:checkbox[name=chc]:checked").each(function(){
			con_array.push($(this).val());
		});
		
		$("input:checkbox[name=check_status]:checked").each(function(){
			status_array.push($(this).val());
		});
		
		if(cat_array != '' && con_array != '')
		{
			 $.ajax({
			   method: "POST",
			   url: "filter_products.php",
			   data: {arr1:cat_array,arr2:con_array,val1:val1,val2:val2,status:status_array,sort_order:sort_order}, 
			   success: function(data)
			   {
					 $('#mydiv').html(data);

			   }
			});
		}
		else if(cat_array != '')
		{
			 $.ajax({
			   method: "POST",
			   url: "filter_products.php",
			   data: {arr1:cat_array,arr2:"",val1:val1,val2:val2,status:status_array,sort_order:sort_order}, 
			   success: function(data)
			   {
					 $('#mydiv').html(data);
			   }
			});
		}
		else if(con_array!='')
		{
			 $.ajax({
			   method: "POST",
			   url: "filter_products.php",
			   data: {arr1:"",arr2:con_array,val1:val1,val2:val2,status:status_array,sort_order:sort_order}, 
			   success: function(data)
			   {
					 $('#mydiv').html(data);
			   }
			});
		}
		else if(cat_array == '' && con_array=='')
		{
			 $.ajax({
			   method: "POST",
			   url: "filter_products.php",
			   data: {arr1:"",arr2:"",val1:val1,val2:val2,status:status_array,sort_order:sort_order}, 
			   success: function(data)
			   {
					 $('#mydiv').html(data);
			   }
			});
		}
	}
	</script>
</body>

</html>