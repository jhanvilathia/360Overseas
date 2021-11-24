<?php session_start();?>
<?php include 'connection.php'; ?>
<?php 
	if(isset($_SESSION['member_id']))
	{
		$member_id=$_SESSION['member_id'];
		$base_price=$_POST['base_price'];
		$amount=$_POST['amount'];
		$req_id=$_POST['req_id'];
		
		if(isset($_POST['voucher_id']))
		{
			$voucher_id=$_POST['voucher_id'];
		}
		else
		{
			$voucher_id=0;
		}
		$link->where("request_id_fk",$req_id);
		$link->update("offer_accepted_tb",Array('final_total_price'=>$base_price,'voucher_id_fk'=>$voucher_id,'grand_total'=>$amount));
		
		$wallet_amount=$link->rawQueryOne("select * from wallet_tb where member_id_fk=?",Array($_SESSION['member_id']));
		
		$msg="Rs.".$wallet_amount['amount']." deducted from wallet.";
		$link->insert("notification_tb",Array("request_id_fk"=>$req_id,"notif_to"=>$_SESSION['member_id'],"message"=>$msg,"status"=>1));
		
		$link->where("wallet_id_pk",$wallet_amount['wallet_id_pk']);
		$link->update("wallet_tb",Array("amount"=>$_POST['wallet_amount']));
		
		
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
	<input type='hidden' value="<?php echo $amount;?>" name='amount'/>
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