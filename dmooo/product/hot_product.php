<?php
include_once('../inc/config.inc.php');
permissions('product_1_sel');
if ($_GET['del'])
{
	$sql="delete from gplat_hot_product where id=".$_GET['del'];
	        $result=mysql_query($sql);	
	
	}
	
if ($_POST['up_name'])
{
	
	$up_name=$_POST['up_name'];
	$sql="update  gplat_hot_product set title='$up_name' where id=".$_GET['id'];
	$result=mysql_query($sql);
}
if ($_POST['name'])
{
	$name=$_POST['name'];
	
	$sql="insert into gplat_hot_product (title) values ('$name')";
	$result=mysql_query($sql);
}
?>
<html><head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="3" class="tdBorder1 titleBg1">热门关键字</td>
    </tr>
  <?php
$sql4="select * from gplat_hot_product order by id asc";
$result4=mysql_query($sql4);
while ($date=mysql_fetch_assoc($result4))
{
	
	$id=$date['id'];
	$title=$date['title'];	 
 ?>
<tr valign="middle">
	  <td class="tdBorder1">
	 <?=$title?></td>
	 <td width="65%" class="tdBorder1"><form action="hot_product.php?id=<?=$id?>" method="POST">
	&nbsp;
	<input type="text" name="up_name" size="20">
	<input type="submit" value="修改" class="button1">
	</form></td>
	<td width="5%" align="center" class="tdBorder1">
	<a href="hot_product.php?del=<?=$id?>" onClick="return window.confirm('确定删除?')"><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px"></a></td>
  </tr>
<?php
}
?>
<tr><td height="35" colspan="3" class="tdBorder1"><form action="" method="POST">
  &nbsp;
  <input type="text" name="name">
  <input type="submit" class="button1" value="添加">
</form></td></tr>
</table>
</body></html>