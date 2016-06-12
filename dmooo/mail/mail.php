<?php
include('../inc/config.inc.php');
if ($_GET['mail_to_id'])
{
	$mail_to_id=$_GET['mail_to_id'];
	$sql="select * from gplat_mailLog where id=".$mail_to_id;
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
//$times=$date[times];
$mail_title=$date[mail_title];
$mail_content=$date[mail_content];
}
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">发送邮件</td>
    </tr> 
  <form action="phpmail.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <tr><td width="100" height="30" class="tdBorder1"> <label>&nbsp;邮件标题:
       </label></td>
   <td class="tdBorder1"><label>
     &nbsp;
     <input type="text" name="mail_title" id="mail_title" value="<?=$mail_title?>"/>
   </label>
     <a href="mail_class_check.php?keepThis=true&TB_iframe=true&height=300&width=500" title="邮件类别 / 类别选择" class="thickbox red1Href">选择组</a> &nbsp;<a href="mail_user_check.php?keepThis=true&TB_iframe=true&height=400&width=700" title="邮件类别 / 类别选择" class="thickbox red1Href">选择用户</a> &nbsp;&nbsp;&nbsp;<span class="huiTxt1">(先选择用户，组和用户可以结合使用)</span></td>
 </tr>
  <tr><td height="30" valign="top" class="tdBorder1"><p><br>    
    &nbsp;邮件内容:</p>
      <p>&nbsp;</p>
      <p style=" margin-top:30px; line-height:22px;">{发送时间}  <br>
{收件人姓名}<br>
{点击退订}    </p></td>
    <td class="tdBorder1"><?php
include_once("../fckeditor/fckeditor_php5.php") ;
$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath = '../fckeditor/' ;
$oFCKeditor->Value = "$mail_content" ;

        //设置它的宽度
$FCKeditor->Width='100%';
        //设置它的高度
$oFCKeditor->Height='500px';
$oFCkeditor->ToolbarSet='Default';
$oFCKeditor->Create() ;
?></td>
  </tr>
  
  
<tr><td height="30" colspan="2" class="tdBorder1">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="button" type="submit" class="button1" id="button" value="提交" />
   </td></tr>
</form>
</table>
</body></html>