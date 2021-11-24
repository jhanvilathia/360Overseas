<?php session_start();?>
<?php include 'connection.php';?>
<?php
	$req_id=$_REQUEST['req_id'];
	$request=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($req_id));
	
	if(isset($_REQUEST['voucher']))
	{
		$voucher=$_REQUEST['voucher'];
		$v=$link->rawQueryOne("select * from voucher_tb where voucher_code=?",Array($voucher));
	}
	
	if($request['final_after_discount']!=0)
	{
		$price=$request['final_after_discount'];
	}
	else
	{
		$price=$request['base_total_price'];
	}
	
	$wallet_amount=$link->rawQueryOne("select * from wallet_tb where member_id_fk=?",Array($_SESSION['member_id']));

	if($price>$wallet_amount['amount'])
	{
		$final_price=$price-$wallet_amount['amount'];
		$final_wallet_amount=0;
	}
	else
	{
		$final_wallet_amount=$wallet_amount['amount']-$price;
		$final_price=0;
	}
	
	$link->where("request_id_fk",$req_id);
	$link->update("offer_accepted_tb",Array('final_total_price'=>$request['base_total_price'],'voucher_id_fk'=>$v['voucher_id_pk'],'grand_total'=>$final_price));
	
	$link->where("request_id_pk",$req_id);
	$link->update("request_tb",Array('requester_payment_status'=>1,'requester_payment_date'=>date("d/M/Y")));

	echo "Total amount to be paid after deduction from wallet and voucher application is : <b>&#8377;$final_price</b>
	<div>
	<input type='hidden' value=".$request['base_total_price']." name='base_price'/>
	<input type='hidden' value=".$final_price." name='amount'/>
	<input type='hidden' value=".$final_wallet_amount." name='wallet_amount'/>
	<input type='hidden' value=".$req_id." name='req_id'/>
	<input type='hidden' value=".$v['voucher_id_pk']." name='voucher_id'/>
	<input type='hidden' name='business' value='juhidesai2410@gmail.com'>
	<input type='hidden' name='cmd' value='_xclick'>
	<input type='hidden' name='item_name' value='It Solution Stuff'>
	<input type='hidden' name='item_number' value='2'>
	<input type='hidden' name='no_shipping' value='1'>
	<input type='hidden' name='currency_code' value='INR'>
	<input type='hidden' name='cancel_return' value='http://demo.itsolutionstuff.com/paypal/cancel.php'>
	<input type='hidden' name='return' value='http://demo.itsolutionstuff.com/paypal/success.php'>

	</div>";
	
?>