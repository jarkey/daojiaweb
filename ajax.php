<?php
require('inc/config.inc.php');





/*****ÐÞ¸ÄÊýÁ¿*****/
if ($_POST['number']) {
	$re_id=$_POST['productid'];
	$re_count=$_POST['number'];
	$priceid=$_POST['priceid'];
	
$a->modify($re_id,$re_count,$priceid);
echo $a->one_price($re_id,$priceid);
}
if ($_POST['total']==1) {
	$total=$a->get_total();
	echo $total;
	}
	if ($_POST['pr_num_all']==1) {
	$pr_num_all=$a->get_num();
	echo $pr_num_all;
	}




?>