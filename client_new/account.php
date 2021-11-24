<?php session_start(); ?>
<?php include 'connection.php';?>
<?php  
	
	if(!isset($_SESSION['member_id']))
	{
		header("location:login.php");
	}
	
?>
<?php 
	$member=$link->rawQueryOne("select * from member_tb where member_id_pk=?",Array($_SESSION['member_id']));
?>
<?php 
	if(isset($_POST['my_acc']))
	{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$contact=$_POST['contact'];
		$dob=$_POST['dob'];
		$accno=$_POST['accno'];
		$bankn=$_POST['bankn'];
		
		$link->where("member_id_pk",$_SESSION['member_id']);
		$sql=$link->update("member_tb",Array("firstname"=>$firstname,"lastname"=>$lastname,"contact_number"=>$contact,"dob"=>$dob,"bank_id_fk"=>$bankn,"ac_number"=>$accno));
		if($sql)
		{
			$_SESSION['firstname']=$firstname;
			header("location:index.php");
		}
	}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360 Overseas || My Account</title>
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
<script>
	function check()
	{
		var firstname=document.getElementById("firstname").value;
		var pattern = /^[a-z A-Z]*$/;
		var s = true;
		if(firstname == "")
		{
			document.getElementById("err_fname").innerHTML="Please Enter First Name.";
			s=false;
		}
		else if(pattern.test(firstname)==false)
		{
			document.getElementById("err_fname").innerHTML="Characters Only.";
			s=false;
		}
		else
		{
			document.getElementById("err_fname").innerHTML="";
		}
		var lastname=document.getElementById("lastname").value;
		if(lastname == "")
		{
			document.getElementById("err_lname").innerHTML="Please Enter Last Name.";
			s=false;
		}
		else if(pattern.test(lastname)==false)
		{
			document.getElementById("err_lname").innerHTML="Characters Only.";
			s=false;
		}
		else
		{
			document.getElementById("err_lname").innerHTML="";
		}
		
		contact=document.getElementById("contact").value;
		pattern2=/^[0-9]{10}$/;
		if(contact == "")
		{
			document.getElementById("err_contact").innerHTML="Please Enter Contact Number.";
			s=false;
		}
		else if(pattern2.test(contact)==false)
		{
			document.getElementById("err_contact").innerHTML="There Must Be 10 Digits.";
			s=false;
		}
		else
		{
			document.getElementById("err_contact").innerHTML="";
		}
		dob=document.getElementById("dob").value;
		if(dob=="")
		{
			document.getElementById("err_dob").innerHTML="Please Select Date Of Birth.";
			s=false;
		}
		else
		{
			document.getElementById("err_dob").innerHTML="";
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
                                        <a href="index.php" title="Return to home"><i class="fa fa-home"></i></a>
                                    </div>
                                </li>
                                <li>My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb end-->

        
	<div class="cart-top-heading">
        <div class="container">
            <div class="summery-top">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="cart-sumttl">
                            <h3> My Account  </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br/>
        <!--Contact email start-->
        <div class="contact-email-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <form class="contact-form" action="account.php" method="post" onSubmit="return check()">
                                <div class="address-wrapper">
                                    <div class="col-md-12" style="margin-bottom:30px;">
                                        <div class="address-fname">
											<label class="lp-input" style="font-size:18px;">First Name </label>
                                            <input type="text" name="firstname" id="firstname" style="margin-bottom:0px;" value="<?php echo $member['firstname'];?>"/>
											                                    
									   </div>
										<span id="err_fname" style="color:red;"></span>   
                                    </div>
									
                                    <div class="col-md-12" style="margin-bottom:30px;">
                                        <div class="address-email">
										<label class="lp-input" style="font-size:18px;">Last Name </label>
                                            <input type="text" name="lastname" id="lastname" style="margin-bottom:0px;" value="<?php echo $member['lastname'];?>"/>
										                                    
									   </div>
										<span id="err_lname" style="color:red;"></span>   
                                    </div>
									
                                    <div class="col-md-12" style="margin-bottom:30px;">
                                        <div class="address-web">
										<label class="lp-input" style="font-size:18px;">Contact Number </label>
                                            <input type="text" name="contact" id="contact" style="margin-bottom:0px;" value="<?php echo $member['contact_number'];?>" />
											
                                        </div>
										<span id="err_contact" style="color:red;"></span>
                                    </div>
																		
                                    <div class="col-xs-12" style="margin-bottom:30px;">
                                        <div class="address-subject">
										<label class="lp-input" style="font-size:18px;">Date Of Birth</label>
                                            <input type="date" name="dob" id="dob" style="margin-bottom:0px;" value="<?php echo $member['dob'];?>"/>
											
                                        </div>
										<span id="err_dob" style="color:red;"></span>
                                    </div>
									<div class="col-md-12" style="margin-bottom:30px;">
                                        <div class="address-web">
										<label class="lp-input" style="font-size:18px;">Bank Name</label>
                                            <select class="form-control" id="bankn" name="bankn">
								<option value="-1">Select Bank</option>
								<?php
									require_once 'connection.php'; 
									$sql1=$link->rawQuery("select * from bank_tb where status=1");
									foreach($sql1 as $s)
									{?>
									<option value="<?php echo $s['bank_id_pk']; ?>"  <?php if($s['bank_id_pk']==$member['bank_id_fk']) echo "selected"; ?>>
										<?php echo $s['bank_name']; ?>
									</option>
									<?php } ?>
									</select>	
									
                                        </div>
										<span id="banks" style="float:left;color:red;"></span>
                                    </div>
																		
                                    <div class="col-xs-12" style="margin-bottom:30px;">
                                        <div class="address-fname">
										<label class="lp-input" style="font-size:18px;">Account Number</label>
                                            <input type="text" class="form-control" id="accno" style="margin-bottom:0px;" placeholder="Bank Account Number" name="accno" value="<?php echo $member['ac_number']; ?>">
											
                                        </div>
										<span id="accnos" style="float:left;color:red;"></span>
                                    </div>
								

                                    									
                                </div>
								
								<div class="col-md-12 col-sm-12 col-xs-12">
									<center>
										<input type="submit" name="my_acc" value="Update Info" class="button-my" />
									</center>
								</div>
							
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<br/>
		<br/>
        <!--Contact email end-->

        
    <!-- Main footer area start-->

    <?php include 'footer.php';?>

    <!-- Main footer area end-->

 

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
    <!-- Nivo active js -->
    <script src="js/nivo-active.js"></script>
    <!-- Cloudflare js -->
    <script src="js/waypoints.min.js"></script>
    <!-- Google map API js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-IIoucJ-70FQg6xZsORjQCUPHCVj9GV4"></script>
    <!-- Google map js -->
    <script src="js/google-map.js"></script>
    <!-- counter up js -->
    <script src="js/jquery.counterup.min.js"></script>
	<!-- ajax-mail js -->
	<script src="js/ajax-mail.js"></script>
    <!-- Main js -->
    <script src="js/main.js"></script>

</body>
</html>