<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>
<?php
	$id=$_GET['id'];
	$link->where("faq_id_pk",$id);
	$sql=$link->update("faq_tb",Array("status"=>0));
	if($sql)
	{
		header("location:view_que.php");
	}



?>
