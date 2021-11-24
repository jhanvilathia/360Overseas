<?php

	include_once 'connection.php';
	
	$req_id=$_REQUEST['req_id'];
	$request=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($req_id));
	
	$voucher=$_REQUEST['voucher'];
	
	if($voucher=="")
	{
		echo "Voucher is invalid.";
	}
	else
	{
		$voucher_code=$link->rawQueryOne("select * from voucher_tb where voucher_code=?",Array($voucher));
		
		if($voucher_code['voucher_code']==$voucher)
		{
			$va=$voucher_code['voucher_amount'];
			$price=$request['base_total_price']-$va;
			echo "Voucher Applied. Amount deducted:<b>&#8377;$va</b>";
			
			$link->where("request_id_pk",$req_id);
			$link->update("request_tb",Array("final_after_discount"=>$price));
		}
		else
		{
			echo "Voucher is invalid.";
		}
	}
		
	
?>