<?php
include_once('../inc/config.inc.php');
permissions('package_1_sel');
$pid=$_GET['fid'];
if ($_POST['tb_carte']) {
	permissions('package_1_in');
	$sql_is="select * from gplat_packageclass where id=".$pid;
	$result_is=mysql_query($sql_is);
	$data_is=mysql_fetch_assoc($result_is);
	$issystem=$data_is['issystem'];
    $tb_carte=$_POST['tb_carte'];
    $orderbySN=$_POST['orderbySN'];	
	$sql="insert into gplat_packageclass2 (name,fid,issystem,orderbySN) values ('".$tb_carte."','".$pid."',".$issystem.",".$orderbySN.")";
	//echo $sql;
	//exit;
	$result=mysql_query($sql)or die(mysql_error());
}
if($_POST['update_name'])
{
	permissions('package_1_up');
	$name=$_POST['update_name'];
	$orderbySN=$_POST['update_orderbySN'];	
	$sql="update gplat_packageclass2 set name='$name',orderbySN=$orderbySN where id=".$_GET['update'];
	$result=mysql_query($sql);
	
}
if ($_GET['del']) {
	permissions('package_1_del');
	$sql_is_del="select * from gplat_packageclass2 where id=".$_GET['del'];
	$result_is_del=mysql_query($sql_is_del);
	$data_is_del=mysql_fetch_assoc($result_is_del);
	if ($data_is_del['issystem']==1)
	{
		echo("<script language=javascript>alert('这类别是基本类别，不能删除')</script>"); 
	}else {
		$sql_news="delete from from gplat_package where class=".$_GET['del'];
		$result_news=mysql_query($sql_news);
		$sql="delete from gplat_packageClass2 where id=".$_GET['del'];
	$result=mysql_query($sql);
	}
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

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <?php
$sql="select * from gplat_packageclass2 where fid='$pid' order by orderbySN asc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
?>
  <tr>
<td class="tdBorder1"><?=$date['name']?></td>
<form action="news_class2.php?update=<?=$id?>&fid=<?=$pid?>" method="POST">
 <td class="tdBorder1">
 <input type="hidden" value="<?=$pid?>">
 <input type="text" name="update_name" value="<?=$date['name']?>">&nbsp;<input name="update_orderbySN" type="text" size="4" value="<?=$date[orderbySN]?>">
 <input type="submit" class="button1" value="修改"></td> 
 </form>
 <td class="tdBorder1"><a href="news_class2.php?del=<?=$id?>&fid=<?=$pid?>" onClick="return window.confirm('删除将会删除该栏目下的所有记录，确定删除吗?')"><img src="../images/del.gif" alt="删除" border="0" /></a></td>
</tr>
<?php
}
?>
</table>

<form action="news_class2.php?fid=<?=$pid?>" method="POST" style="margin-left:30px;">
      &nbsp;&nbsp;添加二级频道:
      <input type="hidden" value="<?=$pid?>"><input  type="text" name="tb_carte">
      &nbsp;
      <label>
        <input name="orderbySN" type="text" id="orderbySN" value="0" size="4">
      </label>
<input type="submit" class="button1" value="添加"></form>

</body></html>