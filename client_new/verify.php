<?php require_once 'connection.php'; ?>
<?php 

	$email=urldecode($_GET['email']);
	$link->where('email',$email);
	$sql=$link->update("member_tb",Array("email_verified"=>1));
	if($sql)
	{
		echo "Email Verified";
	}
?>