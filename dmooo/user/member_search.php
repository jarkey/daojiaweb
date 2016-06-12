<?php
include('../inc/config.inc.php');
permissions('user_2_sel');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="member_management.php" method="POST">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">会员查询</td>
    </tr>  
    <tr>
    <td width="100" class="tdBorder1">用户名</td>
    <td class="tdBorder1"><span id="sprytextfield1">
      <label>
        <input type="text" name="username" id="username" />
      </label>
      <span class="textfieldRequiredMsg">*必填</span></span></td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1"><input type="submit" class="button1" value="会员查询" /></td>
  </tr>
</table>
<p>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
//-->
</script>
</body>
</html>