<?php
include('../inc/config.inc.php');

$sql="select count(orderid) as order_dfh from gplat_order_cart where payment=1 and delivery=0";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_dfh=$date['order_dfh'];   //����������

$sql="select count(orderid) as order_ysk from gplat_order_cart where payment=1";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_ysk=$date['order_ysk'];   //���տ�Ķ���

$sql="select count(orderid) as order_fhz from gplat_order_cart where delivery=1";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_fhz=$date['order_fhz'];   //�����еĶ���

$sql="select count(orderid) as order_qrsh from gplat_order_cart where delivery=1";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_qrsh=$date['order_qrsh'];   //ȷ���ջ�����

$sql="select count(orderid) as order_ywx from gplat_order_cart where status=4";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_ywx=$date['order_ywx'];   //����Ч�Ķ���

$sql="select count(orderid) as order_ytk from gplat_order_cart where status=3";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_ytk=$date['order_ytk'];   //���˻��Ķ���

$sql="select count(orderid) as order_wfk from gplat_order_cart where payment=0";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_wfk=$date['order_wfk'];   //δ����Ķ���

$sql="select count(orderid) as order_all from gplat_order_cart";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$order_all=$date['order_all'];   //ȫ������
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
    <td colspan="4" class="tdBorder1 titleBg1">����ͳ����Ϣ</td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">����������</td>
<td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=1&djtitle=�������Ķ���" target="_blank">
  <?=$order_dfh?>
  ��</a></td>
<td class="tdBorder1 tdBg1">���տ�Ķ���</td>
<td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=2&djtitle=�Ѹ���Ķ���" target="_blank">
  <?=$order_ysk?>
  ��</a></td>
</tr>

<tr align="center">
  <td class="tdBorder1 tdBg1">�����ж���</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=3&djtitle=�����еĶ���" target="_blank">
    <?=$order_fhz?>
    ��</a></td>
  <td class="tdBorder1 tdBg1">ȷ���ջ�����</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=4&djtitle=ȷ���ջ�����" target="_blank">
    <?=$order_qrsh?>
    ��</a></td>
  </tr>
<tr align="center">
  <td class="tdBorder1 tdBg1">����Ч����</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=5&djtitle=����Ч�Ķ���" target="_blank">
    <?=$order_ywx?>
    ��</a></td>
  <td class="tdBorder1 tdBg1">���˻�����</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=6&djtitle=���˻��Ķ���" target="_blank">
    <?=$order_ytk?>
    ��</a></td>
</tr>
<tr align="center">
  <td class="tdBorder1 tdBg1">δ�����</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders_dj.php?orderSearchType=7&djtitle=δ����Ķ���" target="_blank">
    <?=$order_wfk?>
    ��</a></td>
  <td class="tdBorder1 tdBg1">ȫ������</td>
  <td class="tdBorder1">&nbsp;<a href="../orders/orders.php" target="_blank">
    <?=$order_all?>
    ��</a></td>
</tr>
</table>

</form>
</body>
</html>