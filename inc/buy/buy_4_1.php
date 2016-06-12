<?php 
//$_SESSION['b_pay']=$_POST['pay'];
function pay_name($payid){
	$sql="select payname from gplat_pay  where payid='$payid'";
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$pay_name=$data['payname'];
	return $pay_name;
	}
	
if($_POST['pay']>0){
  $pay_name=pay_name($_POST['pay']);
  $payid=$_POST['pay'];
}else{ 
  $pay_name='货到付款';
  $payid=0;
}

$sql_l="select * from gplat_logistics where logisticsid=".$_POST['logisticsid'];
$result_l=mysql_query($sql_l);
$data_l=mysql_fetch_assoc($result_l);
$_SESSION['b_delivery']=$data_l['logistics_name'];
$_SESSION['b_note']=$_POST['note'];
$_SESSION['b_pay']=$payid;//支付方式
/***运费计算***/
$Provinceid=$_SESSION['Province'];
//$sql="select * from gplat_freight where areaid in ($Provinceid) and logisticsid=".$_POST['logisticsid'];
$sql="select * from gplat_freight where areaid like '%$Provinceid%' and logisticsid=".$_POST['logisticsid'];
//echo $sql;
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$s_price=$data['s_price'];
$s_weight=$data['s_weight'];
$s_money=$data['s_money'];
$all_weight=$a->get_weight();
if ($all_weight <= $s_weight) {
	$weight_price=$s_price;
}else{
	$weight_price=$s_price + ($all_weight-$s_weight)*$s_money;	
}
$weight_price=round($weight_price,2);
$_SESSION['logistics']=$weight_price;

$cart_content=$a->view_cart4('1');
?>