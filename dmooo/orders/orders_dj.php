<?php
include_once('../inc/config.inc.php');
permissions('order_1_sel');
if ($_GET['del'])
{
	permissions('order_1_del');
	$sql="delete from gplat_order_cart where orderid=".$_GET['del'];
	
	$result=mysql_query($sql);		
}
if($_POST['orderNo']!=''){
	$orderNo=$_POST['orderNo'];
	$sql_str=" and (orderNo='$orderNo' or consignee='$orderNo') ";}

$orderSearchType=$_GET['orderSearchType'];
$i=orderTongji($orderSearchType).$sql_str;

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
var txt = "ȷ��Ҫɾ��������¼�𣿣�";
function myConfirm(id,userIdIf){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{ȷ��:true, ȡ��:false},
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
    <td height="30" align="right"><a href="add_orders.php?userId=<?=$_GET['userId']?>" class="red1Href" style=" font-weight:bold; font-size:14px;">+��Ӷ���</a></td>
  </tr>
</table>
<?php 
}
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  class="tableCss4">
  <tr>
    <td height="30" align="left"><form action="orders_dj.php?orderSearchType=<?=$_GET['orderSearchType']?>&djtitle=<?=$_GET['djtitle']?>" method="post">������ �ջ���<input type="text" name="orderNo" size="20"> <input type="submit" value="�ύ"></form></td>
  </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="9" class="tdBorder1 titleBg1">�����б� -&gt; <?=($_GET['djtitle'])?></td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">������</td>
<td class="tdBorder1 tdBg1">�µ�ʱ��</td>
<td class="tdBorder1 tdBg1">�ջ���</td>
<td class="tdBorder1 tdBg1">�ܽ��</td>
<td class="tdBorder1 tdBg1">�˷�</td>
<td class="tdBorder1 tdBg1">����״̬</td>
<td class="tdBorder1 tdBg1">����״̬</td>
<td class="tdBorder1 tdBg1">����</td>
</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;

$sql="select orderid from gplat_order_cart";
$sql.=$i;
$result=mysql_query($sql);
//echo $sql;
$num_all=mysql_num_rows($result);

$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}

$sql="select * from gplat_order_cart";
$sql.=$i;
$sql.=" order by orderid desc limit $page_one,$num";
$result=mysql_query($sql);
//echo $sql;
while ($date=mysql_fetch_assoc($result))
{  
    $orderid=$date['orderid'];
	$money=money_all($orderid);	
   
	?>
	<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1"><?=$date['orderNo']?></td>
	<td class="tdBorder1"><?=$date['dates']?>&nbsp;<?=$date['times']?></td>
    <td class="tdBorder1"><?=$date['consignee']?>&nbsp;</td>
    <td class="tdBorder1"><?=$date['price_all']?></td>
    <td class="tdBorder1"><?=$date['logistics']?></td>
    <td class="tdBorder1" style="color:<?=status_color($date['payment'])?>"><?=payStatus($date['payment'])?></td>
    <td class="tdBorder1" style="color:<?=status_color($date['status'])?>"><?=orderStatus($date['status'])?></td>
    <td class="tdBorder1">
    <?php
	if($_GET['userId']){
		echo '<a href=orders_admin.php?orderid='.$date['orderid'].'>';
	}else{
		echo '<a href="orders_admin.php?orderid='.$date['orderid'].'&keepThis=true&TB_iframe=true&height=430&width=800" title="��������ϵͳ / �鿴��ϸ" class="thickbox"> ';
	}
	?>
    <img src="../images/inco_modify.gif" border="0px" alt="�޸Ķ���"></a>&nbsp;&nbsp;
    <a href="orders_logistics.php?orderid=<?=$date['orderid'] ?>&keepThis=true&TB_iframe=true&height=480&width=700" class="thickbox"><img src="../images/icon_logistics.gif" border="0px" alt="����"></a>&nbsp;&nbsp;    
    <img src="../images/del.gif" border="0px" alt="ɾ��" onClick="myConfirm(<?=$date['orderid']?>,<?=$userIdIf?>)"></td>
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