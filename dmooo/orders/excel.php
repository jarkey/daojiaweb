<?php 
include('../inc/config.inc.php');

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=订单列表.xls");

$tx='订单列表';   
echo   $tx."\n\n";   
//输出内容如下：   
echo   "订单号"."\t"; 
echo   "下单时间"."\t"; 
echo   "收货人"."\t"; 
echo   "地址"."\t"; 
echo   "电话"."\t"; 
echo   "时段"."\t"; 
echo   "总金额"."\t"; 
echo   "运费"."\t"; 
echo   "商品"."\t";
echo   "付款状态"."\t"; 
echo   "订单状态"."\t"; 
echo   "支付方式"."\t";
echo   "\n";

$sql="select * from gplat_order_cart order by orderid desc";
$result=mysql_query($sql);
while($date=mysql_fetch_assoc($result))
 {
   $orderid=$date['orderid'];   		 
   $orderNo=(string)$date['orderNo'].' .';                            //订单号
   $orderTime=$date['dates'].$date['times'];             //下单时间
   $consignee=$date['consignee'];                        //收货人
   $money=money_all($orderid);                           //总金额
   $logistics=$date['logistics'];                        //运费
   $payment=payStatus($date['payment']);                 //付款状态
   $delivery=logisticsStatus($date['delivery']);         //发货状态
   $status=orderStatus($date['status']);                 //订单状态 
   $pay='';
   if($date['pay']==1){$pay='支付宝';}
   if($date['pay']==2){$pay='微信';}
   $sql1="select * from gplat_order_product where orderid=".$orderid;
$result1=mysql_query($sql1);
while ($data=mysql_fetch_assoc($result1))
{  
	
  $product.=$data['productname'].'-数量'.$data['num'].',';
  
}
  
/*   
   $sql_detail="select * from gplat_member_detail where userid='$id'";
   $result_detail=mysql_query($sql_detail);
   $date_detail=mysql_fetch_assoc($result_detail);
   $truename=$date_detail['truename'];    //真实姓名
   $gender=$date_detail['gender'];        //性别
   $msn=$date_detail['msn'];              //msn
   $qq=$date_detail['qq'];                //qq
   $mobile=$date_detail['mobile'];        //手机
   $telephone=$date_detail['telephone'];  //固定电话
   $address=$date_detail['address'];      //地址   
   $birthday=$date_detail['birthday'];    //生日   
*/
    
	echo   $orderNo."\t";
	echo   $orderTime."\t";
	echo   $consignee."\t";
	echo   $date['address']."\t";
	echo   $date['mobile']."\t";
	echo   $date['times1'].$date['times2']."\t";
	echo   $money."\t";
	echo   $logistics."\t";	
	echo   $product."\t";
	echo   $payment."\t";		
	echo   $status."\t";
	echo   $pay."\t";
	echo   "\n";
	$product='';
 }
?>
