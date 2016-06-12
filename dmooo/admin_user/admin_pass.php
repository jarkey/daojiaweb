<?php
include_once('../inc/config.inc.php');
?>
<?php
if(!empty($_POST['pass1'])){
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
if(!$pass1||!$pass2)
{
	ExitAgree('输入不完整');
}
if($pass1!=$pass2){
	
	ExitAgree('两次输入一致');
}
$pass1=sha1($pass1);
$id=$_SESSION['adminid'];
$sql="update gplat_member  set password='$pass1' where userid='$id'";
$result=mysql_query($sql)or die('Could not connect: ' . mysql_error());
  if(!$result){
	echo'<script language=javascript>alert("数据库错误，修改失败，请重试")</script>';
	echo'<meta http-equiv="refresh" content="0; url=admin_pass.php"/>';
	exit;		
  }else {
	echo'<script language=javascript>alert("密码修改成功")</script>';
	echo'<meta http-equiv="refresh" content="0; url=admin_pass.php"/>';
	exit;	
  }
}
?>
<HTML>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<div align="center">
  
  <form method="post" action="">
    <table border="0" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr valign="middle">
    <td colspan="2" class="tdBorder1 titleBg1">管理员密码修改</td>
    </tr>
  <tr valign="middle"><td width="100" class="tdBorder1">&nbsp;请输入新密码:
  </td>
  <td valign="middle" class="tdBorder1"><input type= "password" name="pass1" maxlength="20" /></td>
</tr>
<tr bgcolor="#FFFFFF"><td class="tdBorder1">&nbsp;重新输入密码:
  </td>
  <td class="tdBorder1"><input type="password" name="pass2" maxlength="20" /></td>
</tr>
<tr bgcolor="#FFFFFF"><td colspan="2" class="tdBorder1">&nbsp;
  <input type="submit" class="button1" value="修改" /></td></tr>
</table>
  </form>
</div>
</body>
</html>
