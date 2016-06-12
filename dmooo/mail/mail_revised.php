<?php
include_once('../inc/config.inc.php');
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if ($_POST['company'])
{
	$company=$_POST['company'];
	$user=$_POST['user'];
	$mail=$_POST['mail'];
	$mail_exit=$_POST['mail_exit'];
	$sql1="select id from gplat_mail_add where mail='$mail'";
	$result1=mysql_query($sql1);
	$date1=mysql_fetch_assoc($result1);
	
	$sql="update gplat_mail_add set company='$company',user='$user',mail='$mail',mail_exit='$mail_exit' where id=".$_GET['id'];
    $result=mysql_query($sql) or die(mysql_error());
    //echo("<script language=javascript>alert('恭喜您，修改成功');</script>");
	echo '<script>alert("恭喜您，修改成功!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	  
   
}
?>
<?php
$sql="select * from gplat_mail_add where id=".$_GET['id'];
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$company=$date['company'];
	$user=$date['user'];
	$mail=$date['mail'];
	$mail_exit=$date['mail_exit'];
	$id=$_GET['id'];
?><br>

<form action="mail_revised.php?id=<?=$id?>" method="POST">
<table width="80%" align="center" cellspacing="1" bgcolor="#999999">
  <tr bgcolor="#FFFFFF"><td width="11%" height="30">&nbsp;公司名称:
    </td>
    <td width="89%">&nbsp;
      <input type="text" name="company" value="<?=$company?>"></td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;联 系 人:    </td>
  <td height="30">&nbsp;
    <input type="text" name="user" value="<?=$user?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;邮件地址:    </td>
  <td height="30">&nbsp;
    <input type="text" name="mail" value="<?=$mail?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;邮件状态:</td>
  <td height="30">&nbsp;
    <input type="radio" name="mail_exit"  value="1" <?php checked('1',$mail_exit); ?>/>
无效(邮件退订)&nbsp;
<input type="radio" name="mail_exit"  value="0" <?php checked('0',$mail_exit); ?> />
有效(取消退订)</td>
</tr>
<tr bgcolor="#FFFFFF"><td height="30" colspan="2">&nbsp;
  <input type="submit" class="button1" value="修改"></td></tr>
</table>
</form>

</body></html>