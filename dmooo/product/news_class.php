<?php
include_once('../inc/config.inc.php');
permissions('product_1_sel');
if ($_GET['del'])
{
	permissions('product_1_del');
	$sql_is="select * from dmooo_productclass where id=".$_GET['del'];
	$result_is=mysql_query($sql_is);
	$data_is=mysql_fetch_assoc($result_is);
	if ($data_is['issystem']==1)
	{
		echo("<script language=javascript>alert('这类别是基本类别，不能删除')</script>"); 
	}else{
		$sql_2="select id from dmooo_productclass2 where fid=".$_GET['del'];
		$result_2=mysql_query($sql_2);
		$num_2=mysql_num_rows($result_2);
		if ($num_2==0) {
			$sql="delete from dmooo_productclass where issystem<>1 and id=".$_GET['del'];
	        $result=mysql_query($sql);	
		}else {
			echo("<script language=javascript>alert('请先删除该栏目下的子栏目。')</script>"); 
		}
	
	}
	
}
if ($_POST['up_name'])
{
	permissions('product_1_up');
	$up_name=$_POST['up_name'];
	$sort=$_POST['sort'];
	$sql="update dmooo_productclass set name='$up_name',sort='$sort' where id=".$_GET['id'];
	echo"$sql";
	$result=mysql_query($sql);
}
if ($_POST['name'])
{
	permissions('product_1_in');
	$name=$_POST['name'];
	$classIndex=$_POST['classIndex'];
	$sort=$_POST['sort'];
	$issystem=0;
	$sql="insert into dmooo_productclass (name,classIndex,issystem,sort) values ('".$name."','$classIndex','$issystem','$sort')";
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
    <td colspan="3" class="tdBorder1 titleBg1">商品类别</td>
    </tr>
  <?php
$sql4="select * from dmooo_productclass order by issystem desc, id asc";
$result4=mysql_query($sql4);
while ($date=mysql_fetch_assoc($result4))
{
	
	$id=$date['id'];
	$name=$date['name'];	  //带html的name
	$name1=$date['name'];     //简写的name
	$sort=$date['sort'];
	if ($date['issystem']==1)
	{
		$name='<font color=red>'.$name.'</font>';
	}
	?>
<tr valign="middle">
	  <td class="tdBorder1">
	 <a href="news_class1.php?fid=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="<?=$name1?> / 二级频道管理" class="thickbox"><?=$name?></a> &nbsp;<?=$date['classIndex']?> </td>
	 <td width="65%" class="tdBorder1"><form action="news_class.php?id=<?=$id?>" method="POST">
	&nbsp;
	<input type="text" name="up_name" size="20" value="<?=$name?>">&nbsp;<input type="text" name="sort" value="<?=$sort?>"  size="3">
	<input type="submit" value="修改" class="button1">
	</form></td>
	<td width="5%" align="center" class="tdBorder1">
	<a href="news_class.php?del=<?=$id?>" onClick="return window.confirm('确定删除?')"><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px"></a></td>
  </tr>
<?php
}
?>
<tr><td height="35" colspan="3" class="tdBorder1"><form action="" method="POST">
  &nbsp;
  名称：<input type="text" name="name">
  关键词<input type="text" name="classIndex" size="5">
    排序<input type="text" name="sort" size="3" value="1">
  <input type="submit" class="button1" value="添加">
</form></td></tr>
</table>
</body></html>