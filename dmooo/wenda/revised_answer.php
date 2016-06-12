<?php
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 

if ($_POST['content'])
{
	
	$times=$_POST['times'];
	$content=$_POST['content'];
    $name=$_POST['name'];
    $id=$_GET['update_id'];
	$sql="update gplat_wenda_answer set times='$times',content='$content', name='$name' where id=".$id;
    $result=mysql_query($sql) or die(mysql_error());
    echo'<meta http-equiv="refresh" content="4; url=answer.php?fid='.$_GET['fid'].'"/>';
   
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
$sql="select * from gplat_wenda_answer where id=".$_GET['update_id'];
$fid=$_GET['fid'];
$result=mysql_query($sql);

while($date=mysql_fetch_assoc($result)){

	$times=$date['times'];
	$content=$date['content'];
    $name=$date['name'];
	$id=$date['id'];
?><br>
<br>
<?php
}
?>
<form name="form1" method="post" action="revised_answer.php?update_id=<?=$id?>&fid=<?=$_GET['fid']?>" onSubmit="return checkform();">
<table width="80%" height="71" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#333333" class="tableCss3">

  <tr>
    <td width="11%" class="tdBorder1">回复内容:</td>
    <td width="89%" class="tdBorder1" align="center">
   <textarea id="content" name="content" style="display:none;"><?=$content?></textarea>
		<script language="javascript">
		gFrame = 1;//1-在框架中使用编辑器
		gContentId = "content";//要载入内容的content ID
		OutputEditorLoading();
		</script>
		<iframe id="HtmlEditor" class="editor_frame" frameborder="0" marginheight="0" marginwidth="0" style="width:90%;height:200px;overflow:visible;" hideFocus></iframe>
      </td>
  </tr>
  <tr>
  <td width="11%" height="30" class="tdBorder1">&nbsp;回复人:    </td>
  <td width="89%" height="30" class="tdBorder1">&nbsp;<input type="text" name="name" value="
<?=$name?>"></td>
</tr>

<tr>
  <td height="30" class="tdBorder1">&nbsp;时间 :</td>
  <td height="30" class="tdBorder1">&nbsp;<input type="text" name="times" value="
   <?=$times?>"></td>
</tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">
    <input type="submit" name="submit" class="button1" value="提交" /></td>
  </tr>
</table>
</form>
</body></html>