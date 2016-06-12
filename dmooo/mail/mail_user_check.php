<?php
include_once('../inc/config.inc.php');
if ($_POST['check'])
{
	$_SESSION['user_check']=$_POST['check'];
	echo"选择会员完成,请关闭弹出框";
	exit;
}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head><body>
<br>
<table width="90%" align="center" cellspacing="1">
  <tr bgcolor="#FFFFFF"><td height="30"><form action="" method="post">
&nbsp;类别：
<select name="sous_fid">
<option value="">--不限--</option>
<?php
$sql="select * from gplat_mail_class order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	?>
	<option value="<?=$id?>"><?=$name?></option>
	<?php
    }
?>
</select>
&nbsp;
<input type="submit" value="搜索">
</form></td></tr></table>


<p>&nbsp;</p>
<form action="" method="POST" name="aa">
<table width="90%" border="0" align="center" cellspacing="1" bgcolor="#999999">
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="30">--</td>
	<td>公司名</td>
	<td>联系人</td>
	<td>email</td>
	</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
if($_POST['sous_fid'])
{
$sql="select id from gplat_mail_add where fid=".$_POST['sous_fid'];
}else{
$sql="select id from gplat_mail_add ";
}
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //总记录数
$page_all=ceil($num_all/$num); //计算出?的页数
$page_one=($page_id-1)*$num; // 取出的开始行?
if($page_id<0||$page_id > $page_all)
{
 ExitMessage('访问的页面出错');
}
if($_POST['sous_fid'])
{
$sous_fid=$_POST['sous_fid'];
$sql="select * from  gplat_mail_add where fid='$sous_fid' order by id desc limit $page_one,$num";
}else{
$sql="select * from  gplat_mail_add order by id desc limit $page_one,$num";
}
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$company=$date[company];
	$user=$date[user];
	$mail=$date[mail];
	$id=$date[id];
	$mail_exit=$date[mail_exit];
	
	
	?>
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="25"><input type="checkbox" name="check[]" value="<?=$user?>:<?=$mail?>"> </td>
	<td><?=$company?></td>
	<td><?=$user?></td>
	<td><font color="<?php if($mail_exit==1){echo'red';}?>"><?=$mail?></font></td>
</tr>
	<?php
}
?>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="30" colspan="4" align="left"><?php
include ( "../../inc/lib/BluePage.class.php" ) ;
$pBP = new BluePage ;
$intCount    = $num_all ; // 假设记录总数为1000
$intShowNum  = $num ;   // 每页显示条数
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;
$strHtml   = $pBP->getHTML( $aPDatas ) ; 
echo"$strHtml";
?></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="30" colspan="4"><input type=button class="button1" onclick=selectAll(document.aa) value="全选">  &nbsp;
      <input type=button class="button1" onclick=selectOther(document.aa) value="反选">
      &nbsp;  
      <input type=reset class="button1" value="取消">
      &nbsp;
  <script>
function selectAll(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox")
obj.elements[i].checked = true;
}
function selectOther(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox" )
{
if(!obj.elements[i].checked)
obj.elements[i].checked = true;
else
obj.elements[i].checked = false;

}
}
  </script>
  <input type="submit" class="button1" value="提交"></td>
	</tr>
</table>
<p>&nbsp;</p>
</form>
