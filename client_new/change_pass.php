<?php
include('connection.php');
session_start();
$cpassword = $_REQUEST['old_password'];
$npassword = $_REQUEST['new_password'];
$rpassword = $_REQUEST['re_new'];

$firstname=$_SESSION['firstname'];

$pass = $link->rawQueryOne("select * from member_tb where firstname = ?",Array($firstname));
$old_password = $pass['password'];
if($npassword == $rpassword)
{
	if($old_password == $cpassword)
	{
		$link->where("firstname",$firstname);
		$link->update("member_tb",Array("password"=>$npassword));
		echo "Password is successfully changed.";
	}
	else
	{
		echo "Your old password id incorrect!";
	}
}
else
{
	echo "New password and repeat password must be same!";
}

?>