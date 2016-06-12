<?php
include('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('../../inc/mail_send.php');

if($_POST['add_orders'])
{
  $num=$_POST['logNum'];
  $lognote=$_POST['logNote'];
  $userid=$_GET['userId'];
  $userName=$_GET['userName'];
  $email=$_GET['email'];   
  user_point($userid,$num,$lognote,1);
  /******邮件发送********/  
  $mail_num=9;
  include('../../inc/mail_content.php'); 
  $success=mail_userPass($mail_title,$mail_content,$email,$userName);
  /********************/  
  echo '<script>alert("操作成功!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';
}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
</head><body>
<br>
<form action="?userId=<?=$_GET['userId']?>&userName=<?=$_GET['userName']?>&email=<?=$_GET['email']?>" method="post">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">

  <tr>
    <td class="tdBorder1">数量：</td>
    
    <td class="tdBorder1">&nbsp;<span id="spry_logNum">
    <label>
      <input type="text" name="logNum" id="logNum">
    </label>
    <span class="textfieldRequiredMsg">*必填</span><span class="textfieldInvalidFormatMsg">*格式无效</span></span></td>
    </tr>
   <tr>
    <td class="tdBorder1">事由：</td>
    <td class="tdBorder1">&nbsp;<span id="spry_logNote">
      <label>
        <textarea name="logNote" id="logNote" cols="45" rows="5"></textarea>
      </label>
      <span class="textareaRequiredMsg">*必填</span></span></td>
  </tr>  
   <tr>
    <td class="tdBorder1">&nbsp;<input type="hidden" name="add_orders" value="add_orders"></td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="提交" />
    <input type="reset" value="重置" /></td>
  </tr>
</table>
</form>
<script type="text/javascript">
<!--
var spry_logNum = new Spry.Widget.ValidationTextField("spry_logNum", "currency", {validateOn:["blur"]});
var spry_logNote = new Spry.Widget.ValidationTextarea("spry_logNote", {validateOn:["blur"]});
//-->
</script>
</body></html>