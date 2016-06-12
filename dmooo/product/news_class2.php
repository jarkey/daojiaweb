<?php
include_once('../inc/config.inc.php');
permissions('product_1_sel');
$pid=$_GET['fid'];
if ($_POST['tb_carte']) {
	permissions('product_1_in');
	$sql_is="select * from dmooo_productclass1 where id=".$pid;
	$result_is=mysql_query($sql_is);
	$data_is=mysql_fetch_assoc($result_is);
	$classIndex=$data_is['classIndex'];
    $tb_carte=$_POST['tb_carte'];
    $orderbySN=$_POST['orderbySN'];	
    $sql="insert into dmooo_productclass2 (name,fid,classIndex,orderbySN) values ('".$tb_carte."','".$pid."','".$classIndex."',".$orderbySN.")";
	$result=mysql_query($sql)or die(mysql_error());
}
if($_POST['update_name'])
{
	permissions('product_1_up');
	$name=$_POST['update_name'];
	$orderbySN=$_POST['update_orderbySN'];	
	$s_class=$_POST['s_class'];
	$sql="update dmooo_productclass2 set name='$name',orderbySN=$orderbySN,s_class='$s_class' where id=".$_GET['update'];
	$result=mysql_query($sql);
	
}
if ($_GET['del']) {
	permissions('product_1_del');
	$sql_news="delete from from dmooo_product where class=".$_GET['del'];
	$result_news=mysql_query($sql_news);
	$sql="delete from dmooo_productClass2 where id=".$_GET['del'];
	$result=mysql_query($sql);
	}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>

<table border="0" cellspacing="0" cellpadding="0" align="center" class="tableCss4">
  <tr>
    <td class="tdBorder1">
上级列表：<?=product_class1_name($pid)?>  <a href="news_class1.php?fid=<?=product_class1_id($pid)?>">返回</a>
    </td>
  </tr>
</table>

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
<tr>
  <td class="tdBorder1">名称</td>
  <td align="center" class="tdBorder1">&nbsp;修改名称</td>
  <td align="center" class="tdBorder1">排序</td>

  <td align="center" class="tdBorder1">修改</td>
  <td align="center" class="tdBorder1">删除</td>
</tr>
  <?php
$sql="select * from dmooo_productclass2 where fid='$pid' order by orderbySN desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date['id'];
?>
  <tr>
<td class="tdBorder1"><?=$date['name']?></td>
<form action="news_class2.php?update=<?=$id?>&fid=<?=$pid?>" method="POST">
 <td align="center" class="tdBorder1">
 <input type="hidden" value="<?=$pid?>">
 <input type="text" name="update_name" value="<?=$date['name']?>">&nbsp; &nbsp;</td>
 <td align="center" class="tdBorder1"><input name="update_orderbySN" type="text" size="4" value="<?=$date['orderbySN']?>"></td>

 <td align="center" class="tdBorder1"><input type="image" src="../images/inco_modify.gif" class="button1" value="修改"></td> 
 </form>
 <td align="center" class="tdBorder1"><a href="news_class2.php?del=<?=$id?>&fid=<?=$pid?>" onClick="return window.confirm('删除将会删除该栏目下的所有记录，确定删除吗?')"><img src="../images/del.gif" alt="删除" border="0" /></a></td>
</tr>
<?php
}
?>
</table>

<table border="0" cellspacing="0" cellpadding="0" align="center" class="tableCss4">
  <tr>
    <td class="tdBorder1">
<form action="news_class2.php?fid=<?=$pid?>" method="POST" style="margin-left:30px;">
      &nbsp;&nbsp;添加三级分类
名称：<input type="hidden" value="<?=$pid?>"><input  type="text" name="tb_carte">
      &nbsp;
  <input name="orderbySN" type="text" id="orderbySN" value="1" size="4">
  <input type="submit" class="button1" value="添加"></form>    
    </td>
  </tr>
</table>

</body></html> 