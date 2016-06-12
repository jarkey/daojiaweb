<?php
include_once('../inc/config.inc.php');
permissions('package_2_up');
$packageId=$_GET['packageId'];

if ($_GET['del'])
{
	
	$sql="delete from gplat_package_product where id=".$_GET['del'];
	$result=mysql_query($sql);
	}
if($_POST['num']){
	$mum=$_POST['num'];
	$sql="update gplat_package_product set num='$mum' where id=".$_GET['id'];
	$result=mysql_query($sql);
	}
	package_price($packageId);  //修改套餐的价格
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
function myConfirm(id,class1){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="package_product.php?del=" + id+"&packageId="+class1;
			}else{
				notOpen();
			}				
		},
		 prefix:'cleanblue'
	});
}	
</script>
</head><body>
<br>
<table width="90%" align="center" cellspacing="1" bgcolor="#999999">
  <tr bgcolor="#FFFFFF"><td height="30"><a href="product_check.php?packageId=<?=$packageId?>">添加产品</a></td></tr></table>


<p>&nbsp;</p>

<table width="90%" border="0" align="center" cellspacing="1" bgcolor="#999999">
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="30">--</td>
	<td>产品名称</td>
	<td>产品编号</td>
    <td>颜色</td>
	<td>数量</td>
	<td>删除</td>
	</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
$sql="select a.productid,b.productid from gplat_package_product a,gplat_product b where a.packageId='$packageId' and a.productId=b.productId";
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //总记录数
$page_all=ceil($num_all/$num); //计算出?的页数
$page_one=($page_id-1)*$num; // 取出的开始行?
$sql="select a.*,b.* from gplat_package_product a,gplat_product b where a.packageId='$packageId' and a.productId=b.productId  limit $page_one,$num";
$result=mysql_query($sql);
while ($data_product=mysql_fetch_assoc($result))
{
	$id=$data_product['id'];
	$productName=$data_product['productName'];
	$productNum=$data_product['productNum'];
	$product_color=$data_product['product_color'];
	$times=$data_product['times'];
	$num=$data_product['num'];
	$times=substr($times,0,10);
	$productid=$data_product['productid'];
	?>
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="25"></td>
	<td><?=$productName?></td>
    
	<td><?=$productNum?></td>
    <td><?=$product_color?></td>
	<td><form action="package_product.php?id=<?=$id?>&packageId=<?=$packageId?>" method="POST">
	&nbsp;
	<input type="text" name="num" size="20" value="<?=$num?>">
	<input type="submit" value="修改" class="button1">
	</form></td>
	<td><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" onClick="myConfirm(<?=$id?>,<?=$packageId?>)"></td>
</tr>
	<?php
}
?>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="30" colspan="6" align="left"></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="30" colspan="6"></td>
	</tr>
</table>