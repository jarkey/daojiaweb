<?php
include_once('../inc/config.inc.php');
if ($_POST['tb_carte']) {
	$pid=$_GET['pid'];
	$tb_carte=$_POST['tb_carte'];
	$sql="insert into tb_carte1 (name1,pid) values ('".$tb_carte."','".$pid."')";
	$result=mysql_query($sql);
}
if($_POST['update_name'])
{
	$name=$_POST['update_name'];
	$sql="update tb_carte1 set name1='$name' where id=".$_GET['update'];
	$result=mysql_query($sql);
	
}
if ($_GET['carte_del']) {
	$sql="delete from tb_carte1 where id=".$_GET['carte_del'];
	$result=mysql_query($sql);
	
}
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td background="../images/topBackground.gif">　 -&gt;地级市 / 县级市</td>
  </tr>
</table>
<table width="90%" cellspacing="1" bgcolor="#CCCCCC" align="center">
<?php
$pid=$_GET['pid'];
$sql="select * from tb_carte1 where pid='$pid' order by id asc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
?>
<tr align="center" valign="middle" bgcolor="#FFFFFF">
<td height="20"><a href="tb_carte2.php?cid=<?=$id?>&pid=<?=$pid?>"><?=$date[name1]?></a></td>
 <td height="25"><form action="tb_carte1.php?update=<?=$id?>&pid=<?=$pid?>" method="POST">
 <input type="hidden" value="<?=$pid?>">
 <input type="text" name="update_name">
 <input type="submit" value="修改"></form></td> 
 <td height="20"><a href="tb_carte1.php?carte_del=<?=$id?>&pid=<?=$pid?>"><img src="../images/del.gif" alt="删除" border="0" /></a></td>
</tr>
<?php
}
?>
<tr align="left" valign="middle" bgcolor="#FFFFFF"><td colspan="3"><form action="tb_carte1.php?pid=<?=$pid?>" method="POST">
      &nbsp;&nbsp;(点击地区名，管理子类)
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="hidden" value="<?=$pid?>"><input  type="text" name="tb_carte">
<input type="submit" value="添加"></form></td></tr>
</table>

</body></html>