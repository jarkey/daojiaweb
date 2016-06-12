<?php
include_once('../inc/config.inc.php');
if ($_POST['tb_carte']) {
	$tb_carte=$_POST['tb_carte'];
	$sql="insert into tb_carte (name) values ('".$tb_carte."')";
	$result=mysql_query($sql);
}
if($_POST['update_name'])
{
	$name=$_POST['update_name'];
	$sql="update tb_carte set name='$name' where id=".$_GET['update'];
	$result=mysql_query($sql);
	
}
if ($_GET['carte_del']) {
	$sql="delete from tb_carte where id=".$_GET['carte_del'];
	$result=mysql_query($sql);
	
}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td background="../images/topBackground.gif">　 -&gt;省份管理</td>
  </tr>
</table>
<p><a href="tb_carte.php">地区管理</a></p>
<table width="80%" border="0" align="center" cellspacing="1" bgcolor="#CCCCCC">
<tr align="center" bgcolor="#FFFFFF"><td height="30">省份</td>
<td height="30">修改</td>
<td height="30">删除</td>
</tr>
<?php
$sql="select * from tb_carte order by id asc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
?>
<tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="30">
<a href="tb_carte1.php?pid=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="地级市 / 县级市" class="thickbox">
<?=$date[name]?></a>
</td>
 <td><form action="tb_carte.php?update=<?=$id?>" method="POST"><input type="text" name="update_name" maxlength="20"><input type="submit" value="修改"></form></td> 
 <td><a href="tb_carte.php?carte_del=<?=$id?>"><img src="../images/del.gif" alt="删除" width="13" height="13" border="0" /></a></td>
</tr>
<?php
}
?>
<tr align="left" bgcolor="#FFFFFF"><td colspan="3"><form action="tb_carte.php" method="POST">
&nbsp;&nbsp;&nbsp;(点击地区名，管理子类)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input  type="text" name="tb_carte" maxlength="20"><input type="submit" value="添加">
</form></td></tr>
</table>

</body>
</html>