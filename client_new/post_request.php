<?php require_once 'connection.php';?>
<?php 
	session_start();
	if(!isset($_SESSION['firstname']))
	{
		header("location:login.php");
	}
?>
<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$request=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($id));
	}
	else
	{
		$request['item_name']="";
		$request['category_id_fk']="";
		$request['item_desc']="";
		$request['item_shop']="";
		$request['item_photo']="";
		$request['item_qty']="";
		$request['expected_date']="";
		$request['item_url']="";
		$request['fragile']="";
		$request['perishable']="";
		$request['receiver_name']="";
		$request['contact_no']="";
		$request['base_price']="";
		$request['base_total_price']="";
		$request['country_id_fk']="";
		
	}
?>
<?php

	if(isset($_POST['post_request']))
	{
		//item details
		$perishable="";
		$fragile="";
		$itemname=$_POST['itemname'];
		$category=$_POST['category'];
		$desc=$_POST['desc'];
		$wtb=$_POST['wtb'];
		$pic=$_FILES['pic']['name'];
		$qty=$_POST['qty'];
		$depart=$_POST['depart'];
		$url=$_POST['url'];
		$perishable=$_POST['perishable'];
		$fragile=$_POST['fragile'];
		
		if(!isset($url))
		{
			$url="none";
		}
		if(!isset($perishable))
		{
			$perishable="false";
		}
		if(!isset($fragile))
		{
			$fragile="false";
		}
		//collection details
		if($perishable=="true")
		{
			$perishable="true";	
		}
		else
		{
			$perishable="false";
		}
		if($fragile=="true")
		{
			$fragile="true";
		}
		else
		{
			$fragile="false";
		}
		$receiver=$_POST['receiver'];
		$contact=$_POST['contact'];
		
		//item price
		$ip=$_POST['ip'];
		$service=60;
		$gst=$_POST['gst'];
		$tot_price=$_POST['tot_price'];
		
		//country
		$country=$_POST['country'];
		$firstname=$_SESSION['firstname'];
		$bank=$_POST['bankn'];
		$accno=$_POST['accno'];

		//bank
		if(!isset($bank))
		{
			$bank="";
		}
		if(!isset($accno))
		{
			$accno="none";
		}
		$sql=$link->rawQuery("select * from member_tb where firstname=?",Array($firstname));
			
		foreach($sql as $s)
		{
			$rid=$s['member_id_pk'];
		}
		$sql=$link->insert("request_tb",Array("requester_id_fk"=>$rid,"item_name"=>$itemname,"item_desc"=>$desc,"item_qty"=>$qty,"item_shop"=>$wtb,"item_url"=>$url,"category_id_fk"=>$category,"country_id_fk"=>$country,"expected_date"=>$depart,"perishable"=>$perishable,"fragile"=>$fragile,"receiver_name"=>$receiver,"contact_no"=>$contact,"base_price"=>$ip,"base_service_fee"=>$service,"base_gst_fee"=>$gst,"base_total_price"=>$tot_price,"status"=>"open"));
		
		if($sql)
		{
			if($sql)
			{
			  $ext=pathinfo($pic,PATHINFO_EXTENSION);
			  $path="images/request/".$sql.".".$ext;
			  $link->where('request_id_pk',$sql);
			  $link->update('request_tb',Array('item_photo'=>$path));
			  if(move_uploaded_file($_FILES['pic']['tmp_name'],$path))
			  {
				header("location: index.php");
			  }
			}
		}
		$memberid=$_SESSION['member_id'];
		$link->where("member_id_pk",$memberid);
		$link->update("member_tb",Array("bank_id_fk"=>$bank,"ac_number"=>$accno));
	}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || Post Request</title>
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
	<script>
	function print()
	{
		var qty=parseInt(document.getElementById("qty").value);
		if(qty>0)
		{
			document.getElementById("tqty").innerHTML=qty;
		}
		else
		{
			alert("quantity must be greater than 0");
		}
	}
	function calc()
	{
		var cp=parseInt(document.getElementById("cp").value);
		
		if(cp>0)
		{
		var tip=(cp*10)/100;
		document.getElementById("tip").innerHTML=tip;
		document.getElementById("tp").innerHTML=(tip+cp);
		}
		else
		{
			alert("quantity must be greater than 0");
		}
	}
	function cal_total()
	{
		var qty=parseInt(document.getElementById("qty").value);
		var ip=parseInt(document.getElementById("ip").value);
		if(ip>0)
		{
			gst=(ip*18*qty)/100;
			var total_price=((ip*qty)+60)+gst;
			document.getElementById("sgst").innerHTML=gst;
			document.getElementById("gst").value=gst;
			document.getElementById("total_price").innerHTML=total_price;
			document.getElementById("tot_price").value=total_price;
		}
		
		
	}
	</script>
	<script>
	
		function check()
		{
			var s=true;
			
			var itemname=document.getElementById("itemname").value;
			if(itemname=="")
			{
				document.getElementById("itemnames").innerHTML="Please Enter Item Name.";
				s=false;
			}
			else
			{
				document.getElementById("itemnames").innerHTML="";
			}
			
			var itemcat=document.getElementById("category").value;
			if(itemcat==-1)
			{
				document.getElementById("itemcats").innerHTML="Please Select Category.";
				s=false;
			}
			else
			{
				document.getElementById("itemcats").innerHTML="";
			}
			
			var desc=document.getElementById("desc").value;
			if(desc=="")
			{
				document.getElementById("descs").innerHTML="Please Enter Item Description.";
				s=false;
			}
			else
			{
				document.getElementById("descs").innerHTML="";
			}
			
			var wtb=document.getElementById("wtb").value;
			if(wtb=="")
			{
				document.getElementById("wtbs").innerHTML="Please Enter Item Information.";
				s=false;
			}
			else
			{
				document.getElementById("wtbs").innerHTML="";
			}
			
			var pic=document.getElementById("pic").value;
			var ext=pic.substring(pic.lastIndexOf('.')+1);
			if(pic=="")
			{
				document.getElementById("pics").innerHTML="Please Select Item Image.";
				s=false;
			}
			else if(ext!="png" && ext!="jpg" && ext!="jpeg" && ext!="PNG" && ext!="JPEG" && ext!="JPG")
			{
				document.getElementById("pics").innerHTML="jpg or png Files Only!";
				s=false;
			}
			else
			{
				document.getElementById("pics").innerHTML="";
			}
			
			var qty=document.getElementById("qty").value;
			if(qty=="")
			{
				document.getElementById("qtys").innerHTML="Select Quantity.";
				s=false;
			}
			else
			{
				document.getElementById("qtys").innerHTML="";
			}
			
			var datep=document.getElementById("datepickerd").value;
			if(datep=="")
			{
				document.getElementById("wyes").innerHTML="Select Expected Date. ";
				s=false;
			}
			else
			{
				document.getElementById("wyes").innerHTML="";
			}
			
			var r=document.getElementById("receiver").value;
			if(r=="")
			{
				document.getElementById("receivers").innerHTML="Enter Receiver's Name.";
				s=false;
			}
			else
			{
				document.getElementById("receivers").innerHTML="";
			}
			
			var contact=document.getElementById("contact").value;
			if(contact=="")
			{
				document.getElementById("contacts").innerHTML="Enter Receiver's Contact.";
				s=false;
			}
			else
			{
				document.getElementById("contacts").innerHTML="";
			}
			
			var ip=document.getElementById("ip").value;
			if(ip=="")
			{
				document.getElementById("ips").innerHTML="Enter Item Price.";
				s=false;
			}
			else
			{
				document.getElementById("ips").innerHTML="";
			}
			
			var country=document.getElementById("country").value;
			if(country==-1)
			{
				document.getElementById("countrys").innerHTML="Select Country.";
				s=false;
			}
			else
			{
				document.getElementById("countrys").innerHTML="";
			}
			
			var bank=document.getElementById("bankn").value;
			var accno=document.getElementById("accno").value;
			
			if(bank==-1)
			{
				document.getElementById("banks").innerHTML="Select Bank.";
				s=false;
			}
			else
			{
				document.getElementById("banks").innerHTML="";
			}
			if(accno.length>12 || accno.length<10)
			{
				document.getElementById("accnos").innerHTML="Enter valid account number.";
				s=false;
			}
			else
			{
				document.getElementById("accnos").innerHTML="";
			}
			
			return s;
		}
	
	</script>
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
                            <li> Post Trip </li>
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
                            <h3> Post Request </h3>
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
		<form action="#" method="post" onsubmit="return check()" enctype="multipart/form-data">
            <div class="row">
					<div class="col-sm-12">
						<ul class="yt-accordion">
							<li class="accordion-group">
								<h3 class="accordion-heading"><span>Item Details</span></h3><hr>
								<div class="accordion-inner">
									<fieldset id="account">
							  <div class="form-group required">
								<label for="input-payment-firstname" class="control-label" style="float:left;font-size:16px">Item Name</label>
								<input type="text" class="form-control" id="itemname" placeholder="Item Name"  name="itemname" value="<?php echo $request['item_name'];?>">
								<span id="itemnames" style="float:left;color:red;"></span>
								<br/>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-lastname" class="control-label"  style="float:left;font-size:16px">Choose Category</label>
								<Select class="form-control" id="category"  name="category">
								<option value="-1">Select Category</option>
								<?php
									require_once 'connection.php'; 
									$sql=$link->rawQuery("select * from category_tb where status=1");
									foreach($sql as $s)
									{?>
									<option value="<?php echo $s['category_id_pk']; ?>"
									<?php
									if($request['category_id_fk']==$s['category_id_pk'])
										echo "selected";?> >
										<?php echo $s['category_name']; ?>
										
									</option>
								
								
									<?php } ?>
								</select>
								<span id="itemcats" style="float:left;color:red;"></span>
								<br/>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-email" class="control-label"  style="float:left;font-size:16px">Description</label>
								<textarea class="form-control" id="desc" placeholder="Description" name="desc"><?php echo $request['item_desc'];?></textarea>
								<span id="descs" style="float:left;color:red;"></span>
								<br/>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-telephone" class="control-label"  style="float:left;font-size:16px">Where To Buy</label>
								<input type="text" class="form-control" id="wtb" placeholder="City,Shop Name,Address etc." value="<?php echo $request['item_shop'];?>" name="wtb">
								<span id="wtbs" style="float:left;color:red;"></span>
								<br/>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-fax" class="control-label"  style="float:left;font-size:16px">Upload Picture</label>
								<input type="file" class="form-control" id="pic" placeholder="Fax" value="<?php echo $request['item_photo'];?>" name="pic">
								<span id="pics" style="float:left;color:red;"></span>
								<br/>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-fax" class="control-label"  style="float:left;font-size:16px">Quantity</label>
								<input type="number" min="0" class="form-control" id="qty" placeholder="Quantity" value="<?php echo $request['item_qty'];?>" name="qty" multiple="true" onBlur="print()">
								<span id="qtys" style="float:left;color:red;"></span>
								<br/>
							  </div>
							<div class="form-group required">
								<label for="input-payment-fax" class="control-label"  style="float:left;font-size:16px">When You Expect</label>
								<input type="date" name="depart" class="form-control" id="datepickerd" value="<?php echo $request['expected_date'];?>">
							<span id="wyes" style="float:left;color:red;"></span>
							<br/>
							</div>
							<div class="form-group">
								<label for="input-payment-fax" class="control-label"  style="float:left;font-size:16px">URL</label>
								<input type="text" class="form-control" id="url" placeholder="(Optional)" value="<?php echo $request['item_url'];?>" name="url" multiple="true">
							
							</div>
							</fieldset>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><span>Collection Details</span></h3><hr>
								<div class="accordion-inner">
									<fieldset id="account">
							  <div class="form-group">
								<label for="input-payment-firstname" class="control-label" style="float:left;font-size:16px">Perishable&nbsp;</label>
								<label class="">
								<input type="checkbox" id="perishable" name="perishable" value="true" <?php 
								if($request['perishable']=="true") echo "checked";?>></label>
							  </div>
							  <div class="form-group">
								<label for="input-payment-lastname" class="control-label"  style="float:left;font-size:16px">Fragile  &nbsp;&nbsp; &nbsp;&nbsp;</label>
								<label class=""><input type="checkbox" id="fragile" name="fragile" value="true"<?php 
								if($request['fragile']=="true") echo "checked";?> ></label>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-email" class="control-label"  style="float:left;font-size:16px">Receiver's Name</label>
								<input type="text" class="form-control" id="receiver" placeholder="Receiver's Name" value="<?php echo $request['receiver_name'];?>" name="receiver">
								<span id="receivers" style="float:left;color:red;"></span>
								<br/>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-telephone" class="control-label"  style="float:left;font-size:16px">Contact</label>
								<input type="text" class="form-control" id="contact" placeholder="Contact" value="<?php echo $request['contact_no'];?>" name="contact">
								<span id="contacts" style="float:left;color:red;"></span>
								<br/> 
							  </div>
							  
							
							</fieldset>
								</div>
							</li>
							<li class="accordion-group">
							
								<h3 class="accordion-heading"><span>Price</span></h3><hr>
								<div class="accordion-inner" >
								<div class="row">
								<div class="col-md-6">
								<fieldset id="account">
									<div class="form-group">
										<label for="" class="control-label"  style="float:left;font-size:16px">Total Quantity</label>
										&nbsp;<span id="tqty"><?php echo $request['item_qty'];?></span>
										<br/>
									</div>
									<br/>
									<div class="form-group required">
										<label for="" class="control-label"  style="float:left;font-size:16px">Item Price + Tip For Traveller</label>
										<input type="text" class="form-control" id="ip" placeholder="Item Cost Price" name="ip" onBlur="cal_total()" value="<?php echo $request['base_price'];?>" >
										<span id="ips" style="float:left;color:red;"></span>
										<br/>
									</div>
									<div class="form-group"  style="text-align:left;">
										<label for="" class="control-label"  style="font-size:16px">Service Fee : </label>
										<span id="service" style="text-align:center" name="service" value="60">60</span>
										<br/>
									</div>
									<div class="form-group"  style="text-align:left;">
										<label for="" class="control-label"  style="font-size:16px">GST : </label>
										<input type="hidden" id="gst" name="gst"/>
										<span id="sgst" style="color:blue;text-align:center" name="sgst"></span>
										<br/>
									</div>
									
									<div class="form-group"  style="text-align:left;">
										<label for="" class="control-label"  style="font-size:16px">Total Price : </label>
										<input type="hidden" id="tot_price" name="tot_price">
										<span id="total_price" style="color:blue;text-align:center" name="total_price" value="<?php echo $request['base_total_price'];?>"></span>
										<br/>
									</div>
								</fieldset>
								</div>
								
								<div class="col-md-6">
								<fieldset id="account">
									
									<div class="form-group"><p style="color:blue;font-size:16px"><b>Calculate recommended price for suggestion:</b></p><br>
										<label for="" class="control-label"  style="color:blue;float:left;font-size:16px">Item Cost Price</label>
										<input type="text" class="form-control" id="cp" placeholder="Item Cost Price" value="" name="cp" onBlur="calc()">
										
									</div>
									<div class="form-group"  style="text-align:left;">
										<label for="" class="control-label"  style="color:blue;font-size:16px">Traveller's Tip : </label>
										<span id="tip" style="text-align:center"></span>
										<br/>
									</div>
									
									<div class="form-group"  style="text-align:left;">
										<label for="" class="control-label"  style="color:blue;font-size:16px">Recommended Price+Tip : </label>
										<span id="tp" style="text-align:center"></span>
										<br/>
									</div>
								</fieldset>
								
								</div>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><span>Country</span></h3><hr>
								<div class="accordion-inner">
								<label for="" class="control-label"  style="font-size:16px">Country To Buy From</label>
								<select class="form-control" id="country"  name="country">
								<option value="-1">Select Country</option>
								<?php
									require_once 'connection.php'; 
									$sql=$link->rawQuery("select * from country_tb where status=1");
									foreach($sql as $s)
									{?>
									<option value="<?php echo $s['country_id_pk']; ?>"
									<?php if($request['country_id_fk']==$s['country_id_pk'])
										echo "selected";?>>
										<?php echo $s['country_name']; ?>
									</option>
									<?php } ?>
									</select>
								<span id="countrys" style="float:left;color:red;"></span>
								<br/>
								</div>
							</li>
							<li class="accordion-group">
								<h3 class="accordion-heading"><span>Bank Details</span></h3><hr>
								<div class="accordion-inner">
								<label for="" class="control-label"  style="font-size:16px">Bank Name</label>
								<select class="form-control" id="bankn" name="bankn">
								<option value="-1">Select Bank</option>
								<?php
									require_once 'connection.php'; 
									$sql1=$link->rawQuery("select * from bank_tb where status=1");
									foreach($sql1 as $s)
									{?>
									<option value="<?php echo $s['bank_id_pk']; ?>">
										<?php echo $s['bank_name']; ?>
									</option>
									<?php } ?>
									</select>
								<span id="banks" style="float:left;color:red;"></span>
								<br/>
								</div>
								<div class="form-group required">
									<label for="input-payment-email" class="control-label"  style="float:left;font-size:16px">Account Number</label>
									<input type="text" class="form-control" id="accno" placeholder="Bank Account Number" name="accno">
									<span id="accnos" style="float:left;color:red;"></span>
									<br/>
								</div>
							</li>
							
						</ul>
					</div>
				</div>
				
				<br/>
			<center>
		<input type="submit" value="Post" name="post_request" class="button-my">		
        </form></div></center>
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