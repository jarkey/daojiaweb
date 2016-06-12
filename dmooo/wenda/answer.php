<?php
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('../../inc/mail_send.php');
if($_GET['del'])
{
	$sql="delete from gplat_wenda_answer where id=".$_GET['del'];
	$result=mysql_query($sql);
	echo'<centent>'."恭喜您，删除成功".'</centent>';
	}
if ($_POST['content'])
{
    date_default_timezone_set('Asia/Shanghai');
    $times=date('Y:m:d H:i:s');
	$content=$_POST['content'];
	$content=stripslashes($_POST['content']);
    $name='管理员';
	$fid=$_GET['fid'];
  
	$sql="insert into gplat_wenda_answer (times,content,name,fid) values ('$times','$content','$name','$fid')";
	$result=mysql_query($sql)or die(mysql_error());
	$sql_wenda="update gplat_wenda set answer=1 where id=".$_GET['fid'];
	$result_wenda=mysql_query($sql_wenda);
	
	
	$sql_email="select email,name,title from gplat_wenda where id=".$_GET['fid'];
	$result_email=mysql_query($sql_email);
	$data_email=mysql_fetch_assoc($result_email);
	$email=$data_email['email'];
	$title=$data_email['title'];
	$mail_num=1;
	include('../../inc/mail_content.php');
	/*$mail_title=NOTICE_MAIL_NAME.'-问题回复通知';
	$mail_content=NOTICE_MAIL_NAME.'提醒您，您的问题:'.$title.'已回复，请及时查看<a href='.NOTICE_MAIL_URL.'wenwen_view.php?id='.$_GET['fid'].'" target="_blank">点击这里查看</a>';*/
	$username=$data_email['name'];
	/******邮件发送********/
	$success=mail_userPass($mail_title,$mail_content,$email,$username);
	/********************/
	
	
	
	echo'<centent>'."恭喜您，添加回复成功".'</centent>';
}
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../editor/comm.css" />
<script language="javascript" src="../../editor/all.js"></script>
<script language="javascript" src="../../editor/editor.js"></script>
<script language="javascript" src="../../editor/editor_toolbar.js"></script>
<script language="javascript">
function checkform(){
		
    if(document.form1.content.value ==""){
	    alert("请输入内容");
		document.form1.content.focus();
		return false;
	}
	var v = DoProcess();
	if(v != true){
	    alert("请输入内容");
		return false;
	}	
}  
</script>
</head>
<body>
<?php
if ($_POST['up_content'])
{
	
	$times=$_POST['times'];
	$content=$_POST['up_content'];
    $name=$_POST['name'];
    $id=$_GET['id'];
	
	$sql="update gplat_wenda_answer set times='$times',content='$content', name='$name' where id=".$_GET['id'];
    $result=mysql_query($sql) or die(mysql_error());
    echo'<centent>'."恭喜您，修改成功".'</centent>';
   
}
?>
<?php
$sql="select * from gplat_wenda_answer where fid=".$_GET['fid'];
$fid=$_GET['fid'];
$result=mysql_query($sql);

while($date=mysql_fetch_assoc($result)){

	$times=$date['times'];
	$content=$date['content'];
    $name=$date['name'];
	$id=$date['id'];
?><br>
<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss3">
<tr>
  <td width="11%" height="30" class="tdBorder1">&nbsp;回复人:    </td>
  <td width="89%" height="30" class="tdBorder1">&nbsp;
<?=$name?></td>
</tr>
<tr>
  <td height="30" class="tdBorder1">&nbsp;内容 :   </td>
  <td height="30" class="tdBorder1">&nbsp;
<?=$content?>
 </td>
</tr>
<tr>
  <td height="30" class="tdBorder1">&nbsp;时间 :</td>
  <td height="30" class="tdBorder1">&nbsp;
   <?=$times?></td>
</tr>
<tr><td height="30" colspan="2" class="tdBorder1">&nbsp;
 &nbsp;&nbsp;&nbsp;<a href="answer.php?del=<?=$id?>&fid=<?=$fid?>" onClick="return window.confirm('确定删除?')">删除</a>&nbsp;&nbsp;<a href="revised_answer.php?update_id=<?=$id?>&fid=<?=$fid?>">修改</a></td></tr>
</table>

<?php
}
?>
<form name="form1" method="post" action="answer.php?fid=<?=$fid?>" onSubmit="return checkform();">
<table width="80%" height="71" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#333333" class="tableCss3">
  <tr>
    <td width="11%" class="tdBorder1">回复内容:</td>
    <td width="89%" class="tdBorder1">
   <textarea id="content" name="content" style="display:none;">回复问题</textarea>
		<script language="javascript">
		gFrame = 1;//1-在框架中使用编辑器
		gContentId = "content";//要载入内容的content ID
		OutputEditorLoading();
		</script>
		<iframe id="HtmlEditor" class="editor_frame" frameborder="0" marginheight="0" marginwidth="0" style="width:90%;height:200px;overflow:visible;" hideFocus></iframe>
      </td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">
    <input type="submit" name="submit" class="button1" value="提交" /></td>
  </tr>
</table>
</form>
</body></html>