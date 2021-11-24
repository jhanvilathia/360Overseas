// <?php
 // include 'connection.php';
 
		// $notif=$link->rawQuery("select * from notification_tb where notif_to=28 order by notif_id_pk");
		
		// foreach($notif as $nf)
		// { 
			// $q2=$link->rawQueryOne("select * from request_tb where request_id_pk=?",Array($nf['request_id_fk']));
			// $expiry=$q2['offer_expiry'];
			// $d=$q2['offered_date'];
			
			// $date = date('d/m/y')."</br>";
			// echo $date = strtotime($d)."</br>";
			// // echo $date = strtotime("+".$expiry." day", $date)."</br>";
			// // echo $date = strtotime($date);
			// // if($date > date("d/m/y"))
			// // {
				// // //echo $date;
				// // echo "expired.";
				// // // $link->where("notif_id_pk",$nf['notif_id_pk']);
				 // $link->update("notification_tb",Array("request_status"=>"expired"));
			// // }
			// // echo $date;
		// }
// ?>

<?php
$date = date('d/m/Y');
echo $date = strtotime($date);
echo $date = strtotime("+1 day", $date);
echo date('d/m/Y', $date);
?>
