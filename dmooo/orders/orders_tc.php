<?php
include_once('../inc/config.inc.php');
permissions('order_1_sel');
if ($_GET['del'])
{
	permissions('order_1_del');
	$sql="delete from gplat_order_cart where orderid=".$_GET['del'];
	$result=mysql_query($sql);		
}

?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "确定要删除这条记录吗？？";
function myConfirm(id,userIdIf){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="orders.php?del=" + id + "&userIdIf=" + userIdIf;  
			}else{
				notOpen();
			}				
		},
		 prefix:'cleanblue'
	});
}	

function open(){
	
	
}

function notOpen(){
	
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></head>
<body>
<br>
<?php 
if ($userIdIf==1){
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="right"><a href="add_orders.php?userId=<?=$_GET['userId']?>" class="red1Href" style=" font-weight:bold; font-size:14px;">+添加订单</a></td>
  </tr>
</table>
<?php 
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="9" class="tdBorder1 titleBg1">提成订单</td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">订单号</td>
<td class="tdBorder1 tdBg1">下单时间</td>
<td class="tdBorder1 tdBg1">收货人</td>
<td class="tdBorder1 tdBg1">总金额</td>
<td class="tdBorder1 tdBg1">运费</td>
<td class="tdBorder1 tdBg1">提成金额</td>
<td class="tdBorder1 tdBg1">提成状态</td>
<td class="tdBorder1 tdBg1">订单状态</td>
<td class="tdBorder1 tdBg1">操作</td>
</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
$sql="select orderid from gplat_order_cart a,gplat_member b where a.userid=b.userid and recommended>0";
$result=mysql_query($sql);
$num_all=mysql_num_rows($result);
//echo $sql;
$page_all=ceil($num_all/$num); //计算出?的页数
$page_one=($page_id-1)*$num; // 取出的开始行?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('访问的页面出错');
}

$sql="select * from gplat_order_cart a,gplat_member b where a.userid=b.userid and recommended>0";
//echo $sql;
$sql=$sql." order by orderid desc limit $page_one,$num";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{  
    $orderid=$date['orderid'];
	$money=money_all($orderid);	
   
	?>
	<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1"><?=$date['orderNo']?></td>
	<td class="tdBorder1"><?=$date['dates']?>&nbsp;<?=$date['times']?></td>
    <td class="tdBorder1"><?=$date['consignee']?>&nbsp;</td>
    <td class="tdBorder1"><?=$money?></td>
    <td class="tdBorder1"><?=$date['logistics']?></td>
    <td class="tdBorder1""><?=($money*$royaltyPercentage)?></td>
    <td class="tdBorder1" style="color:<?=status_color($date['commission'])?>"><?=commissionStatus($date['commission'])?></td>
    <td class="tdBorder1" style="color:<?=status_color($date['status'])?>"><?=orderStatus($date['status'])?></td>
    <td class="tdBorder1">
    <?php
	if($_GET['userId']){
		echo '<a href=orders_admin.php?orderid='.$date['orderid'].'>';
	}else{
		echo '<a href="orders_admin.php?orderid='.$date['orderid'].'&keepThis=true&TB_iframe=true&height=430&width=800" title="订单管理系统 / 查看详细" class="thickbox"> ';
	}
	?>
    <img src="../images/inco_modify.gif" border="0px" alt="修改订单"></a></td>
</tr>
	<?php
}
?>  
	<tr align="center" bgcolor="#FFFFFF">
	  <td height="30" colspan="9" align="left" class="tdBorder1"><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  </tr>
</table>
</body>
</html>