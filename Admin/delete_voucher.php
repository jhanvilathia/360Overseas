<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>

<?php 
	$id=$_GET['id'];
	$link->where('voucher_id_pk',$id);
	$sql=$link->update('voucher_tb',Array('status'=>0));
	if($sql)
	{
		header("location:view_voucher.php");
	}



?>