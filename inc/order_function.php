<?php 

/*
付款状态：0-未付款  1-已付款
订单状态：0-未处理  1-处理中  2-交易成功  3-退货
物流状态：0-未发货  1-已发货
提成状态：0-未处理  1-已处理

功能：反映订单状态

*/
/**********付款状态函数************/
function payStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='未付款';break;		
	  case 1:
		$i='已付款';break;	
	  //default:
	  //$i='未处理';break;	  
	}
	return $i;	
}
/**********物流状态函数************/
function logisticsStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='未发货';break;		
	  case 1:
		$i='已发货';break;
	  case 2:
		$i='收货确认';break;		
	  //default:
	  //$i='未处理';break;	  
	}
	return $i;	
}
/**********订单状态函数************/
function orderStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='未处理';break;		
	  case 1:
		$i='出库';break;
	  case 2:
		$i='发货';break;
	  case 3:
		$i='交易完成';break;
	  case 4:
		$i='退货';break;
	  case 5:
		$i='无效';break;
		 case 6:
		$i='申请退款';break;
	  //default:
	  //$i='未处理';break;	  
	}
	return $i;	
}
/**********订单状态颜色************/
function status_color($content){
  if ($content==0) {
	  return 'blue';
  }
  if ($content==1) {
	  return 'green';
  }
  if ($content==2 or $content==3) {
	  return 'red';
  }
}

/*
函数：commissionStatus($status) 
功能：提成状态
使用：commissionStatus($status)  $status-0:未处理;1:已处理
*/
function commissionStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='未处理';break;		
	  case 1:
		$i='已处理';break;	
	  //default:
	  //$i='未处理';break;
	}
	return $i;	
}

/*
函数：orderTongji($orderSearchType) 
功能：订单统计查询
使用：orderTongji($orderSearchType)
*/
function orderTongji($status)
{
	switch($status)	
	{
	  case 1:   //待发货的订单
		$i=' where payment=1 and status=0';break;		
	  case 2:   //已付款的订单
		$i=' where payment=1';break;
	  case 3:   //发货中的订单
		$i=' where status=2';break;
	  case 4:   //确认收货订单
		$i=' where status=3';break;
	  case 5:   //已无效的订单
		$i=' where status=5';break;
	  case 6:   //已退货的订单
		$i=' where status=4';break;
	  case 7:   //未付款的订单
		$i=' where payment=0 and status<>4 and status<>5';break;		
	  //default:
	  //$i='未处理';break;
	}
	return $i;	
}


//商品详情评价列表
function product_book($productid,$num){

	$sql="select * from product_book where productid=$productid order by id desc limit 0,$num";
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
	$userid=$data['userid'];
	$orderid=$data['orderid'];
	$title=$data['title'];
	$xing=$data['xing'];
	
	if($data['img']!=''){
	$img_all=substr($data['img'],0,-1);
	$img_arr=explode(",",$img_all);
	$img_num=count($img_arr);
	foreach ($img_arr as $link => $content ) {
	$orders_content_str.='<a href="userfiles/'.$content.'" target="_blank"><img src="userfiles/'.$content.'" width="100" /></a>';
	}

	}
	
	if($xing==0){$xing=5;}
    $title= mysubstr($data['title'],0,60);	
    $sql="select img,username from gplat_member where userid=$userid ";
	$result=mysql_query($sql);
	$data_u=mysql_fetch_assoc($result);
	if($data_u['img']!=''){$img=$data_u['img'];}else{$img='null.gif';}
	$sql="select dates from gplat_order_cart where orderid=$orderid ";
	$result=mysql_query($sql);
	$data_o=mysql_fetch_assoc($result);
	
    $content.='
		<div class="plxq2">
                            <div class="pl_l">
                                <dl>
                                    <dt><img src="userfiles/'.$img.'" alt="" /></dt>
                                    <dd>'.$data_u['username'].'</dd>
                                </dl>
                            </div>
                            <div class="pl_r">
                                <div class="jt"></div>
                                <h3><span>'.$data['times'].'</span><img src="images/'.$xing.'.png" alt="" /></h3>
                                <p style="text-indent:2em">标签：<span>'.$title.'</span></p>
                                <p style="text-indent:2em">心得：'.$data['content'].'</p>
                                <p>购买日期：'.$data_o['dates'].'</p>
                            </div>
							'.$orders_content_str.'
                        </div>
		
		';
	}
	
	
return $content;
}

function order_status_num($userId,$status){
if($status==1){$sql_str=" and payment=0";}
if($status==2){$sql_str=" and payment=1 and status<3";}
if($status==3){$sql_str=" and isbook=0 and status=3";}

$sql="select orderid from gplat_order_cart where userid=$userId $sql_str";
$result=mysql_query($sql);
$content=mysql_num_rows($result);
return $content;
}
?>