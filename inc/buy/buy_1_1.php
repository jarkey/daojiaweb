<?php 

//include_once('inc/provisional.php'); 

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

/*****修改数量*****/
/*if ($_POST['re_id']) {
	$re_id=$_POST['re_id'];
	$re_num=count($re_id);
	$re_count=$_POST['re_count'];
for ($i=0;$i<$re_num;$i++)
{
$pr_id=$re_id[$i];
$re_count_num=$re_count[$i];
$a->modify($pr_id,$re_count_num);
}
//echo'<meta http-equiv="refresh" content="0; url=buy_1.php"/>';
	// exit;
}*/

/*****将套餐添加到购物车****/
/*if ($_POST['productid']) {
	$p_productstr=$_POST['productid'];
	$p_arr_num=count($p_productstr);
	for ($i=0;$i<$p_arr_num;$i++ ){
	list($p_productid,$p_num)=split('-',$p_productstr[$i]);	
	$sql="select * from gplat_product where id=".$p_productid;
 		$result=mysql_query($sql);
 		$data=mysql_fetch_assoc($result);
 			if ($data['sale']=='') {$price=$data['memberPrice'];}else { $price=$data['sale'];}
 		
 		$arr=array('id'=>$data['productid']);
        $arr['name']=$data['productName'];
        $arr['price']=$price;
        $arr['product_color']=$data['product_color'];
		$arr['specifications']=$data['specifications'];
        $arr['count']=$p_num;
        $a->add($arr); 
  }
	echo'<meta http-equiv="refresh" content="0; url=buy_1.php"/>';
	 exit;
}*/




/*****删除购物车中一个商品****/
if ($_GET['del_id']) {
	$productid=$_GET['del_id'];
	$a->delete($productid); 
	echo'<meta http-equiv="refresh" content="0; url=buy_1.php"/>';
	exit;
}
/*****删除购物车中多个商品****/
if($_POST['delid'])
{
	
	foreach ($_POST['delid'] as $productid)
	{
	$a->delete($productid); 
		
	}
	
	}
/*****清空购物车****/
if ($_GET['del_all']==1) {
	$a->delete_all();  
	echo'<meta http-equiv="refresh" content="0; url=buy_1.php"/>';
	exit;
}

$total=$a->get_total();
$cart=$a->get_cart();
$view_cart=$a->view_cart();
$view_cart2=$a->view_cart2();
$m_view_cart2=$a->m_view_cart2();
$view_cart_m=$a->view_cart_m();


?>