<?php

	include_once 'connection.php';
	
	$arr1 = array();
	$arr2 = array();
	$status=array();
	$st="";
	
	$val1=$_REQUEST['val1'];
	$val2=$_REQUEST['val2'];
	if(isset($_REQUEST['status']))
	{
		$status=$_REQUEST['status'];
		$status1 = implode("','",$status);
	}
	else
	{
		$status=array("open","offered","completed","accepted");
		$status1 = implode("','",$status);
	}
	
	if(isset($_REQUEST['sort_order']))
	{
		$sort_order=$_REQUEST['sort_order'];
		
		if($sort_order==0)
		{
			$sort_query="";
		}
		if($sort_order==1)
		{
			$sort_query=" order by item_name";
		}
		if($sort_order==2)
		{
			$sort_query=" order by base_total_price";
		}
		if($sort_order==3)
		{
			$sort_query=" order by base_total_price desc";
		}
	}
	else
	{
		$sort_query="";
	}
	
	if($_REQUEST['arr2'] == '' && $_REQUEST['arr1']=='')
	{
		$st="select * from request_tb where status in ('$status1') and base_total_price between $val1 and $val2".$sort_query;

		$sql = $link->rawQuery($st);
		
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
	if($_REQUEST['arr1']!='' && $_REQUEST['arr2']!='')
	{
		$s1=$_REQUEST['arr1'];
		$s2=$_REQUEST['arr2'];
		
		$s1 = implode("','",$s1);
		
		$s2 = implode("','",$s2);
		
		$st="select * from request_tb where category_id_fk in('$s1') and country_id_fk in ('$s2') and status in ('$status1') and base_total_price between $val1 and $val2".$sort_query;
		$result1=$link->rawQuery($st);

		foreach($result1 as $r)
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
	else if($_REQUEST['arr2']!='')
	{
		$s2=$_REQUEST['arr2'];

		$s2 = implode("','",$s2);

		$st="select * from request_tb where country_id_fk in ('$s2') and status in ('$status1') and base_total_price between $val1 and $val2".$sort_query;
		$result2=$link->rawQuery($st);
		
		foreach($result2 as $r)
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
	else if($_REQUEST['arr1']!='')
	{
		$s1=$_REQUEST['arr1'];
		$s1 = implode("','",$s1);
		
		$st="select * from request_tb where category_id_fk in('$s1') and status in ('$status1') and base_total_price between $val1 and $val2".$sort_query;
		$result1=$link->rawQuery($st);
		
		foreach($result1 as $r)
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