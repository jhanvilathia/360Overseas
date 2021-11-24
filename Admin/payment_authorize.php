<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>

<?php

if(isset($_POST['authorize']))
	{
		$hid=$_POST['hid'];
		$rid=$_POST['rid'];
		$link->where("accepted_id_pk",$hid);
		$link->update("offer_accepted_tb",Array("traveller_payment_status"=>1,"traveller_payment_date"=>date("d/M/Y")));
		
		 $sql=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($rid));
		$link->where("request_id_pk",$sql['request_id_pk']);
		$link->update("request_tb",Array("status"=>"completed","release_payment_date"=>date("d/M/Y"),"collection_date"=>date("d/M/Y")));
		
		$msg="Order received at the 360Overseas headquarters. Kindly collect on .".date("d-M-Y")."";
		$link->insert("notification_tb",Array('request_id_fk'=>$rid,'notif_to'=>$sql['requester_id_fk'],'message'=>$msg,'status'=>0,'request_status'=>'completed'));
		
		$link->rawQuery("select * from offer_accepted_tb,request_tb where request_id_pk=request_id_fk and requester_id_fk=?",Array($sql['requester_id_fk']));
		$count=$link->count;
		if($count == 1)
		{
			$q4=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($rid));
			
			$q5=$link->rawQueryOne("select old_member from member_referral_tb where new_member=?",Array($q4['requester_id_fk']));
			$q6=$link->rawQueryOne("select * from member_tb where member_id_pk=?",Array($q5['old_member']));
			$mid=$q6['member_id_pk'];
			$q=$link->rawQueryOne("select * from wallet_tb where member_id_fk=?",Array($q6['member_id_pk']));
			$wallet_amt=$q['amount']+150;
			
			$query=$link->rawQueryOne("select traveller_id_fk from offer_accepted_tb where request_id_fk=?",Array($rid));
			$link->where("member_id_fk",$query['traveller_id_fk']);
			 $link->update("wallet_tb",Array("amount"=>$wallet_amt,"modify_date"=>date("d/m/y")));
			
			 $link->where("old_member",$mid);
			 $link->update("member_referral_tb",Array("newMemberFirstOrderDate"=>date("d/m/y")));
			
			 $msg2="Credit received Rs.150 on transaction completion of member using your referral code.";
			 $j=$link->insert("notification_tb",Array('request_id_fk'=>$rid,'notif_to'=>$mid,'message'=>$msg2,'status'=>0));
			 echo $rid."<br>".$mid;
		}
		
		
		$amt=$_POST['amt'];
	}
?>
<!DOCTYPE html>
<html>
<head>
<script>
	window.onload=function()
	{
		document.forms["payment"].submit();
	}
		
</script>
</head>
<body>
<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' name="payment">
	<input type='hidden' value="<?php echo $amt;?>" name='amount'/>
	<input type='hidden' name='business' value='juhidesai2410@gmail.com'>
	<input type='hidden' name='cmd' value='_xclick'>
	<input type='hidden' name='item_name' value='It Solution Stuff'>
	<input type='hidden' name='item_number' value='2'>
	<input type='hidden' name='no_shipping' value='1'>
	<input type='hidden' name='currency_code' value='INR'>
	<input type='hidden' name='cancel_return' value='http://demo.itsolutionstuff.com/paypal/cancel.php'>
	<input type='hidden' name='return' value='http://demo.itsolutionstuff.com/paypal/success.php'>
	</form>
</body>
</html>