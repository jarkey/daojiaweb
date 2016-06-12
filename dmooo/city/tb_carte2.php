<?php
include_once('../inc/config.inc.php');
if ($_POST['tb_carte']) {
	$cid=$_GET['cid'];
	$tb_carte=$_POST['tb_carte'];
	$sql="insert into tb_carte2 (name2,cid) values ('".$tb_carte."','".$cid."')";
	$result=mysql_query($sql);
}
if($_POST['update_name'])
{
	$name=$_POST['update_name'];
	$sql="update tb_carte2 set name2='$name' where id=".$_GET['update'];
	$result=mysql_query($sql);
	
}
if ($_GET['carte_del']) {
	$sql="delete from tb_carte2 where id=".$_GET['carte_del'];
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
<table width="100%" border="0" align="center" cellspacing="1" bgcolor="#999999">

<?php
$cid=$_GET['cid'];
$sql="select * from tb_carte2 where cid='$cid' order by id asc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
?>
<tr align="center" valign="middle" bgcolor="#FFFFFF">
<td><?=$date[name2]?></td>
 <td><form action="tb_carte2.php?update=<?=$id?>&cid=<?=$cid?>&pid=<?=$_GET['pid']?>" method="POST">
 <input type="hidden" value="<?=$cid?>">
 <input type="text" name="update_name" maxlength="20"><input type="submit" value="修改"></form></td> 
<td><a href="tb_carte2.php?carte_del=<?=$id?>&cid=<?=$cid?>&pid=<?=$_GET['pid']?>"><img src="../images/del.gif" alt="删除" border="0" /></a></td>
</tr>
<?php
}
?>
</table>
<form action="tb_carte2.php?cid=<?=$cid?>&pid=<?=$_GET['pid']?>" method="POST">
<input type="hidden" value="<?=$cid?>">
<input  type="text" name="tb_carte" maxlength="20" size="10">
<input type="submit" value="添加">
</form>   <a href="tb_carte1.php?pid=<?=$_GET['pid']?>"><img src="../images/backRed.jpg" width="115" height="44" border="0" /></a>

</body></html>