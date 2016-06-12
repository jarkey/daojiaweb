<?php
include('../inc/config.inc.php'); 
include('../inc/softInfo.php'); 
?>

<html>
<head>
<link href="css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">授权信息</td>
  </tr>
<tr valign="middle">
	  <td width="150" class="tdBorder1">授权域名：</td>
	  <td class="tdBorder1"><?=$web_html_url?></td>
  </tr>
<tr valign="middle">
  <td class="tdBorder1">服务时间：</td>
  <td class="tdBorder1">2016-01-01 至 不限期</td>
</tr>
<tr>
  <td height="35" colspan="2" class="tdBorder1">&nbsp;</td></tr>
</table>
<?php include('copyright.php'); ?>
</body></html>