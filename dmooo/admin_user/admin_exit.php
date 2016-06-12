<?php
include('../inc/config.inc.php');
include_once('../../inc/softInfo.php');
unset($_SESSION['adminLogin']);
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['permissions']);
//ExitAgree('成功退出');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td background="../images/topBackground.gif">　<?=GPLAT_NAME?> -> 管理员退出</td>
  </tr>
</table><br />
<table cellspacing="0" cellpadding="0" width="90%" align="center" border="0">
  <tr>
    <td width="1%" background="../images/titlebar_left.gif">&nbsp;</td>
    <td width="100%" 
    background="../images/windowbar_background.gif"><img src="../images/nofollow.gif" width="15" height="11" />&equiv;&equiv;&equiv; <font color="#0066FF"><strong>管理员离开</strong></font> &equiv;&equiv;&equiv;&nbsp;</td>
    <td><img src="../images/titlebar_right.gif" width="35" height="22" 
  border="0" /></td>
  </tr>
  <tr>
    <td></tbody></td>
  </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td align="center" class="tdBorder1">
    <div style="margin-left:300px;">
    <div style="float:left;"><img src="../images/AdminExit.jpg" width="128" height="128" /></div>
    <div style="float:left; margin-top:50px;"><font color="#964B4B">您现在可以安全离开或关闭浏览器了！</font><br />
      <br />
　　　<font color="#AD5C5C">忙碌了这么久，去喝杯咖啡轻松一下吧:) </font></div>
    </div>
    　</td>
  </tr>
</table>
<table height="20" cellspacing="0" cellpadding="0" width="90%" align="center" border="0">
  <tbody>
    <tr>
      <td><img src="../images/windowbar_reversed_left.gif" width="9" height="22" 
border="0" /></td>
      <td width="100%" 
    background="../images/windowbar_reversed_background.gif"></td>
      <td><img src="../images/windowbar_reversed_right.gif" width="9" height="22" 
    border="0" /></td>
    </tr>
  </tbody>
</table><br />
<?php include('../copyright.php'); ?>
</body>
</html>