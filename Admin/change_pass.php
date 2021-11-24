<?php
include('connect.php');
session_start();
$cpassword = $_REQUEST['cp'];
$npassword = $_REQUEST['np'];
$rpassword = $_REQUEST['cfp'];


$admin_name = $_SESSION['admin_username'];

$pass = $link->rawQueryOne("select * from admin_tb where username = ?",Array($admin_name));
$old_password = $pass['password'];
if($npassword == $rpassword)
{
	if($old_password == $cpassword)
	{
		$link->where("username",$admin_name);
		$link->update("admin_tb",Array("password"=>$npassword));
		$_SESSION['admin_password']=$npassword;
		echo "Password is successfully changed.";
	}
	else
	{
		echo "Your old password is incorrect!";
	}
}
else
{
	echo "New password and confirm password must match!";
}

?>