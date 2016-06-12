<?php 

//include_once('inc/provisional.php'); 
echo"$count";
if ($_SERVER['HTTP_REFERER']==$web_html_url.'buy_1.php' or $_SERVER['HTTP_REFERER']=='') {
}else{
	$_SESSION['previous']=$_SERVER['HTTP_REFERER'];
}
$previous=$_SESSION['previous'];

//情况临时表
if($_SESSION['user_num']!=''){
	$provisional=new provisional();
	$provisional->provisional_del($_SESSION['user_num']);
	} 
	
/**应用**/
$a=new cart();

/*****根据商品的id号，添加商品到购物车*******/
if ($productid){

	    //$price_num=$_GET['price_num'];
		
}

?>