<?php
include_once('../inc/config.inc.php');

if ($_GET['del'])
{
	permissions('order_1_up');
	$sql="delete from gplat_order_product where id=".$_GET['del'];

	$result=mysql_query($sql);	
	
}

?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "确定要删除这条记录吗？？";
function myConfirm(id){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="orders.php?del=" + id ;  
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
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td background="../images/topBackground.gif">&nbsp;订单管理系统 -&gt; 订单列表</td>
  </tr>
</table>
<br>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="right">
    <a href="orders_admin.php?orderid=<?=$_GET['orderid']?>" class="red1Href" style=" font-weight:bold; font-size:14px;">返回</a>
    </td>
  </tr>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=90% align=center border=0>
  <TBODY>
    <TR>
      <TD width="1%" background="../images/titlebar_left.gif">&nbsp;</TD>
      <TD width="100%" 
    background=../images/windowbar_background.gif><img src="../images/nofollow.gif" width="15" height="11">&equiv;&equiv;&equiv;<strong><font color="#0066FF"> 订单对应商品列表 </font></strong>&equiv;&equiv;&equiv;&nbsp;</TD>
      <TD><IMG src="../images/titlebar_right.gif" width="35" height="22" 
  border=0></TD>
    </TR>
  </TBODY>
</TABLE>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4" width="90%">
<tr align="center">
<td class="tdBorder1 tdBg1">商品名称</td>
<td class="tdBorder1 tdBg1">商品数量</td>
<td class="tdBorder1 tdBg1">单价</td>
<td class="tdBorder1 tdBg1">小计</td>
<td class="tdBorder1 tdBg1">操作</td>
</tr>
<?php

$sql="select * from gplat_order_product where orderid=".$_GET['orderid'];
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{  
	if ($date['class']==1) {
		$table_name='gplat_package';
		$package='套餐-';
	}else { $table_name='dmooo_product';}
  $price_all=$date['num']*$date['price'];
  if($date['productNum']==''){
   $sql_p="select productNum from $table_name where productid=".$date['productid'];
   $result_p=mysql_query($sql_p);
   $data_p=mysql_fetch_assoc($result_p);
   $productNum=$data_p['productNum'];
   }else{
	   $productNum=$date['productNum'];
	   }
	?>
	<tr align="center" bgcolor="#FFFFFF">
	<td class="tdBorder1"><?=$package?><?=$date['productname']?></td>
    <td class="tdBorder1"><?=$date['num']?>&nbsp;</td>
    <td class="tdBorder1"><?=$date['price']?></td>
    <td class="tdBorder1"><?=$price_all?>&nbsp;</td>
    <td class="tdBorder1">&nbsp;&nbsp;<img src="../images/del.gif" border="0px" alt="删除" onClick="myConfirm(<?=$date['id']?>)"></td>
</tr>
<?php
}
?>
<tr align="center" bgcolor="#FFFFFF">
	  <td height="30" colspan="6" align="left" class="tdBorder1"><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  </tr>

</table>
<TABLE height=20 cellSpacing=0 cellPadding=0 width=90% align=center border=0>
  <TBODY>
    <TR>
      <TD><IMG src="../images/windowbar_reversed_left.gif" width="9" height="22" 
border=0></TD>
      <TD width="100%" 
    background=../images/windowbar_reversed_background.gif></TD>
      <TD><IMG src="../images/windowbar_reversed_right.gif" width="9" height="22" 
    border=0></TD>
    </TR>
  </TBODY>
</TABLE>
</body>
</html>