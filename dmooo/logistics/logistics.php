<?php
include_once('../inc/config.inc.php');

if ($_GET['del'])
{
    $sql="delete from  gplat_logistics  where  logisticsid=".$_GET['del'];
	$result=mysql_query($sql);	
	
}
if ($_POST['up_name'])
{
	$note=$_POST['note'];
	$up_name=$_POST['up_name'];
	$sql="update gplat_logistics set logistics_name='$up_name',note='$note' where logisticsid=".$_GET['id'];
	
	$result=mysql_query($sql);
}
if ($_POST['name'])
{
	
	$note=$_POST['note'];
	$name=$_POST['name'];
	$issystem=0;
	$sql="insert into gplat_logistics (logistics_name,note) values ('$name','$note')";
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
<body background="../images/bg.gif">

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="3" class="tdBorder1 titleBg1">物流商家管理</td>
    </tr> 
	<tr valign="middle">
	  <td valign="top" class="tdBorder1 tdBg1">名称</td>
	  <td valign="top" class="tdBorder1 tdBg1">说明</td>
	  <td width="100" align="center" class="tdBorder1 tdBg1">删除</td>
	  </tr>
<?php
$sql4="select * from gplat_logistics order by logisticsid desc";
$result4=mysql_query($sql4);
while ($data=mysql_fetch_assoc($result4))
{
	
	$id=$data['logisticsid'];
	$name=$data['logistics_name'];	  //带html的name
	?>
    <form action="<?=$filename?>?id=<?=$id?>" method="POST">

	<tr valign="middle">
	  <td valign="middle" class="tdBorder1"><input type="text" name="up_name" size="20" value="<?=$name?>"></td>
	  <td valign="top" class="tdBorder1"><textarea name="note2" cols="70" rows="3"><?=$data['note']?>
        </textarea>
      <input type="submit" value="修改" class="button1"></td>
	  <td align="center" valign="middle" class="tdBorder1">
	<a href="<?=$filename?>?del=<?=$id?>" onClick="return window.confirm('确定删除?')"><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px"></a></td>
  </tr>
  </form>
<?php
}
?>
<form action="" method="POST">
<tr><td class="tdBorder1"><input type="text" name="name"></td>
  <td height="35" class="tdBorder1"><textarea name="note" cols="70" rows="3"></textarea>
    <input type="submit" class="button1" value="添加"></td>
  <td height="35" class="tdBorder1">&nbsp;</td>
</tr>
</form>
</table>
</body></html>