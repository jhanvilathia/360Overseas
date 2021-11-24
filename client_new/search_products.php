<?php
	
	include_once 'connection.php';
	
	if(isset($_REQUEST['search']))
	{
		$search=$_REQUEST['search'];
		
		$st="select * from request_tb where item_name like '%$search%'";
		$sql=$link->rawQuery($st);
		
		foreach($sql as $r)
		{
			echo "<div class='col-md-4 col-sm-6 col-xs-12'>
			<div class='single-product'>
				<div class='product-wrapper posr'>
					<div class='product-label'>
						<div class='label-sale'>".$r['status']."</div>
					</div>
					<div class='priduct-img-wrapper posr'>
						<div class='product-img'>
							<a href='all_products.php?id=".$r['request_id_pk']."'><img src='". $siteroot2 . $r['item_photo']."' alt='' style='height:311px;width:270px;' />
							</a>
						</div>
					</div>
					
					<div class='product-bottom-text posr'>
						<div class='product-bottom-title deft-underline2'>
							<a href='single-product.php' title='Fiant sollemnes'><h4>". $r['item_name']."</h4></a>
						</div>
						<div class='product-bottom-price'>
							<span>&#8377;". $r['base_total_price']."</span>
						</div>
					</div>
				</div>
				</div>
			</div>";
		}
	}
?>