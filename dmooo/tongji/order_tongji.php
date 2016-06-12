<?php
include('../inc/config.inc.php');

$sql="select count(orderid) as order_dfh from gplat_order_cart where payment=1 and delivery=0";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_dfh=$date['order_dfh'];   //待发货订单

$sql="select count(orderid) as order_ysk from gplat_order_cart where payment=1";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_ysk=$date['order_ysk'];   //已收款的订单

$sql="select count(orderid) as order_fhz from gplat_order_cart where delivery=1";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_fhz=$date['order_fhz'];   //发货中的订单

$sql="select count(orderid) as order_qrsh from gplat_order_cart where delivery=1";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_qrsh=$date['order_qrsh'];   //确认收货订单

$sql="select count(orderid) as order_ywx from gplat_order_cart where status=4";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_ywx=$date['order_ywx'];   //已无效的订单

$sql="select count(orderid) as order_ytk from gplat_order_cart where status=3";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_ytk=$date['order_ytk'];   //已退货的订单

$sql="select count(orderid) as order_wfk from gplat_order_cart where payment=0";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_wfk=$date['order_wfk'];   //未付款的订单

$sql="select count(orderid) as order_all from gplat_order_cart";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_all=$date['order_all'];   //全部订单
?>
<html>
<head>
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<body>

  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4" >
  <tr>
    <td colspan="4" class="tdBorder1 titleBg1">订单统计信息</td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">待发货订单</td>
<td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=1&djtitle=待发货的订单" target="_blank">
  <?=$order_dfh?>
  笔</a></td>
<td class="tdBorder1 tdBg1">已收款的订单</td>
<td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=2&djtitle=已付款的订单" target="_blank">
  <?=$order_ysk?>
  笔</a></td>
</tr>

<tr align="center">
  <td class="tdBorder1 tdBg1">发货中订单</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=3&djtitle=发货中的订单" target="_blank">
    <?=$order_fhz?>
    笔</a></td>
  <td class="tdBorder1 tdBg1">确认收货订单</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=4&djtitle=确认收货订单" target="_blank">
    <?=$order_qrsh?>
    笔</a></td>
  </tr>
<tr align="center">
  <td class="tdBorder1 tdBg1">已无效订单</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=5&djtitle=已无效的订单" target="_blank">
    <?=$order_ywx?>
    笔</a></td>
  <td class="tdBorder1 tdBg1">已退货订单</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=6&djtitle=已退货的订单" target="_blank">
    <?=$order_ytk?>
    笔</a></td>
</tr>
<tr align="center">
  <td class="tdBorder1 tdBg1">未付款订单</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=7&djtitle=未付款的订单" target="_blank">
    <?=$order_wfk?>
    笔</a></td>
  <td class="tdBorder1 tdBg1">全部订单</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders.php" target="_blank">
    <?=$order_all?>
    笔</a></td>
</tr>
</table>

</form>
</body>
</html>