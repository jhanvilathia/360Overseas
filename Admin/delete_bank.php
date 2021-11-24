<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>
<?php 
	$id=trim($_GET['id']);

	if(isset($_GET['id']))
	{
		$link->where('bank_id_pk',$id);
		 $sql=$link->update('bank_tb',Array('status'=>0));

		if($sql)
		{
			header('location: view_bank.php');
		}
	}


?>