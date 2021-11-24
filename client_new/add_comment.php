<?php include 'connection.php';?>
<?php session_start(); ?>
<?php 
	$req_id=$_REQUEST['req_id'];
	$comment_c=$_REQUEST['comment'];
	$sql=$link->insert("comment_tb",Array("request_id_fk"=>$req_id,"member_id_fk"=>$_SESSION['member_id'],"comment"=>$comment_c));
	
	if($sql)
	{
		$comment=$link->rawQuery("select * from comment_tb where request_id_fk=?",Array($req_id));
		foreach($comment as $c)
			{
				$member_c=$link->rawQueryOne('select * from member_tb where member_id_pk=?',Array($c['member_id_fk']));
		echo "<div class='comment-reply-wrap'>
		<ul>
			
			<li class='public-reply-area'>
				<div class='public-comment'>
					<div class='comment-image'>
						<img src='".$siteroot2.$member_c['photo']."' alt='360 Overseas' />
					</div>
					<div class='public-text-wrapper single-comment-admin'>
						<div class='single-comment-text'>
							<div class='single-comm-top'>
								<p><span class='color-bold2'>".$member_c['firstname']. ' ' .$member_c['lastname']."</span>
									
								</p>
							</div>
							<div class='single-comm-btm'>
								<p> ".$c['comment']."</p>
							</div>
						</div>
					</div>
				</div>
			</li>
			
			
		</ul>
		
	</div>";
			}
	}

?>