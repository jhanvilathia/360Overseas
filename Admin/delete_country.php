<?php require_once('session.php'); ?>
<?php require_once('connect.php'); ?>
<?php 
	$id=trim($_GET['id']);

	if(isset($_GET['id']))
	{
		$link->where('country_id_pk',$id);
		 $sql=$link->update('country_tb',Array('status'=>0));

		if($sql)
		{
			header('location: view_country.php');
		}
	}


?>