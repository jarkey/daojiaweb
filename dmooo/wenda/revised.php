<?php
include_once('../inc/config.inc.php');
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if ($_POST['title'])
{
	$title=$_POST['title'];
	$times=$_POST['times'];
	$content=$_POST['content'];
	$ip=$_POST['ip'];
	$name=$_POST['name'];
	$status=$_POST['status'];   //是否解决
	$mp=$_POST['mp']; 
	$email=$_POST['email']; 
	//$uptime=$date['uptime'];  // 最后回复时间
	$id=$_GET['id'];
	$notice=$_POST['notice'];
	$clickNum=$_POST['clickNum'];
	$sql="update gplat_wenda set title='$title',times='$times',content='$content',ip='$ip', name='$name',status='$status', mp='$mp',email='$email',clickNum='$clickNum',notice='$notice' where id=".$_GET['id'];
    $result=mysql_query($sql) or die(mysql_error());
    //echo'<centent>'."恭喜您，修改成功".'</centent>';
	echo '<script>alert("恭喜您，修改成功!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	
   
}
?>
<?php
$sql="select * from gplat_wenda where id=".$_GET['id'];
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
    $title=$date['title'];
	$times=$date['times'];
	$content=$date['content'];
	$ip=$date['ip'];
	$name=$date['name'];
	$status=$date['status'];   //是否解决
	$uptime=$date['uptime'];  // 最后回复时间
	$id=$_GET['id'];
	$mp=$date['mp'];
	$email=$date['email'];
?><br>

<form action="revised.php?id=<?=$id?>" method="POST">
<table width="90%" align="center" cellspacing="1" bgcolor="#999999">
  <tr bgcolor="#FFFFFF"><td width="13%" height="30">&nbsp;标题:
    </td>
    <td width="87%">&nbsp;
      <input name="title" type="text" value="<?=$title?>" size="50"></td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;用户名:    </td>
  <td height="30">&nbsp;
    <input type="text" name="name" value="<?=$name?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;内容    </td>
  <td height="30">&nbsp;
    <textarea name="content" cols="70" rows="4" ><?=$content?></textarea></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;时间：    </td>
  <td height="30">&nbsp;
    <input type="text" name="times" value="<?=$times?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;用户ip：    </td>
  <td height="30">&nbsp;
    <input type="text" name="ip" value="<?=$ip?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;电话：    </td>
  <td height="30">&nbsp;
    <input type="text" name="mp" value="<?=$mp?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;email：    </td>
  <td height="30">&nbsp;
    <input type="text" name="email" value="<?=$email?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;点击数：    </td>
  <td height="30">&nbsp;
    <input type="text" name="clickNum" value="<?=$date['clickNum']?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;问题状态:</td>
  <td height="30">&nbsp;
    <input type="radio" name="status" value="1" <?php if ($status==1) {
		echo'CHECKED';
	} ?>>待处理
    <input type="radio" name="status" value="2" <?php if ($status==2) {
		echo'CHECKED';
	} ?>>处理中
	<input type="radio" name="status" value="3" <?php if ($status==3) {
		echo'CHECKED';
	} ?>>已处理
    </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;是否公告:</td>
  <td height="30">&nbsp;
    <input type="radio" name="notice" value="1" <?php if ($date['notice']==1) {
		echo'CHECKED';
	} ?>>
    是
    <input type="radio" name="notice" value="0" <?php if ($date['notice']==0) {
		echo'CHECKED';
	} ?>>
    否</td>
</tr>
<tr bgcolor="#FFFFFF"><td height="30" colspan="2">&nbsp;
  <input type="submit" class="button1" value="修改"></td></tr>
</table>
</form>

</body></html>