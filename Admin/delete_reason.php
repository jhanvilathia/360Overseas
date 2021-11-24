<?php 
	include 'connect.php';
	$id=$_GET['id'];
	$link->where('reason_id_pk',$id);
	$sql=$link->update('cancel_tb',Array("status"=>0));
	if($sql)
	{
		header("location:view_reasons.php");
	}



?>