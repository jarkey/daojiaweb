<?php
include_once('../inc/config.inc.php');
if ($_GET['del'])
{
	if ($_GET['del']==1)
	{
		echo("<script language=javascript>alert('这类别是基本类别，不能删除');window.history.go(-1)</script>"); 
	}else{
	$sql="delete from gplat_mail_class where id=".$_GET['del'];
	$result=mysql_query($sql);
	$sql2="delete from gplat_mail_add where fid=".$_GET['del'];
	$result2=mysql_query($sql2);
	}
}
if ($_POST['up_name'])
{
	$up_name=$_POST['up_name'];
	$sql="update gplat_mail_class set name='$up_name' where id=".$_GET['id'];
	$result=mysql_query($sql);
}
if ($_POST['name'])
{
	$name=$_POST['name'];
	$sql="insert into gplat_mail_class (name) values ('".$name."')";
	$result=mysql_query($sql);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "确定要删除这条记录吗？？";
function myConfirm(id){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="mail_class.php?del=" + id;
			}else{
				notOpen();
			}				
		},
		 prefix:'cleanblue'
	});
}	

function open(){
	
	
}

function notOpen(){
	
}
</script>
</head>
<body>

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="3" class="tdBorder1 titleBg1">邮件分组</td>
    </tr> 
  <?php
$sql="select * from gplat_mail_class order by sortby desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	$sortby=$date[sortby];
	?>
<tr valign="middle">
	  <td valign="middle" class="tdBorder1">
	  &nbsp;
	  <?=$name?></td>
	  <td width="65%" class="tdBorder1"><form action="mail_class.php?id=<?=$id?>" method="POST">
	&nbsp;
	<input type="text" name="up_name" size="20">
	<input type="submit" class="button1" value="修改">
	</form></td>
	<td width="5%" align="center" class="tdBorder1"><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" onClick="myConfirm(<?=$id?>)"></td>
  </tr>
<?php
}
?>
<tr><td height="35" colspan="3" class="tdBorder1"><form action="" method="POST">
  &nbsp;
  <input type="text" name="name">
  <input type="submit" class="button1" value="添加">
</form></td></tr>
</table>
</body></html>