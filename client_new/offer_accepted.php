<?php session_start(); 
	
	if(isset($_SESSION['member_id']))
	{
		header("location:login.php");
	}


?>
<?php include 'connection.php'; ?>
<?php 
	if(isset($_GET['request_id']))
	{
		$request_id=$_GET['request_id'];
		$days=$_POST['days'];
		$link->where("request_id_pk",$request_id);
		$link->update("request_tb",Array("offer_expiry"=>$days,"offered_date"=>date('m/d/y'),"status"=>"offered"));
	
		$link->insert("offered_requests_tb",Array("request_id_fk"=>$request_id,"traveller_id_fk"=>$_SESSION['member_id']));
		
		$message="Your Requested is Offered By ".$_SESSION['firstname'];
		
		$notif_to=$link->rawQueryOne("select requester_id_fk from request_tb where request_id_pk=?",Array($request_id));
		
		$link->insert("notification_tb",Array("request_id_fk"=>$request_id,"notif_to"=>$notif_to['requester_id_fk'],"notif_from"=>$_SESSION['member_id'],"message"=>$message,"status"=>0,"request_status"=>"no action"));
		
		header("location:offers_activity.php");
	}
	
?>

