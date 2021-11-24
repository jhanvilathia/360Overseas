<?php 
	session_start();
	include 'connection.php';
	$notif=$link->rawQuery("select * from notification_tb where status=? and notif_to=?",Array(0,$_SESSION['member_id']));
	$count=$link->count;
	$data = array(
		'unseen_notification'  => $count
	);
	echo json_encode($data);
?>