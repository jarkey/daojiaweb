<?php
include_once('../inc/config.inc.php');
permissions('user_1_up');
$groupid=$_GET['groupid'];	
if($_POST['dosubmit'])
{
	$name=$_POST['name'];
	$description=$_POST['description'];
	$allowvisit=$_POST['allowvisit'];
	$allowsearch=$_POST['allowsearch'];
	$allowpost=$_POST['allowpost'];
	$allowupgrade=$_POST['allowupgrade'];
	$price_y=$_POST['price_y'];
	$price_m=$_POST['price_m'];
	$price_d=$_POST['price_d'];
	$allowmessage=$_POST['allowmessage'];
	$disabled=$_POST['disabled'];
	$allowadmin=$_POST['allowadmin'];
	//$issystem=0;
	$listorder=$_POST['listorder'];
	$sql="update gplat_member_group set name='$name',description='$description',allowvisit='$allowvisit',allowsearch='$allowsearch',
	allowpost='$allowpost',allowupgrade='$allowupgrade',price_y='$price_y',price_m='$price_m',price_d='$price_d'
	,allowmessage='$allowmessage',disabled='$disabled',listorder='$listorder',allowadmin='$allowadmin' where groupid='$groupid'";
	//var_dump($sql);
	$result=mysql_query($sql)or die(mysql_error());
	if ($result!=0){
		echo("<script language=javascript>alert('修改成功')</script>");
		echo'<meta http-equiv="refresh" content="0; url=memberGroup_management.php"/>';
		exit;
	}else 
	{
		echo("<script language=javascript>alert('修改失败');");
	}
}
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>

<body>
<?php
$sql="select * from gplat_member_group where groupid='$groupid'";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);

?>
<form method="post" name="myform" action="memberGroup_modify.php?groupid=<?=$groupid?>">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">会员组修改</td>
    </tr>
  <tr>
		<td width="20%" class="tdBorder1">名称：</td>
		<td class="tdBorder1">
   	  &nbsp;
   	  <input type="text" name="name"  size="30"   maxlength="20" min="3" max="20" value="<?=$date['name']?>" />         </td>
	</tr>
	<tr>
    <td class="tdBorder1">服务介绍：</td>
		<td class="tdBorder1">
			&nbsp;
	  <textarea name="description" rows="10" cols="50" ><?=$date['description']?></textarea></span></div>				</span>&nbsp;</div></td>
	</tr>
    <tr>
    	<td class="tdBorder1">允许访问：</td>
        <td class="tdBorder1">
          <span style="width:100px"><input type="radio" name="allowvisit" id="allowvisit" value="1" style="border:0px" 
<?php
checked ($date['allowvisit'],1);
?>  /> 是</span>
      <span style="width:100px"><input type="radio" name="allowvisit" id="allowvisit" value="0" style="border:0px" 
<?php
checked ($date['allowvisit'],0);
?>
/> 否</span>        </td>
    </tr>
	<tr>
		<td class="tdBorder1">允许搜索：</td>
		<td class="tdBorder1">
	  <span style="width:100px"><input type="radio" name="allowsearch" id="allowsearch" value="1" style="border:0px" 
<?php
checked ($date['allowsearch'],1);
?>
/> 是</span> <span style="width:100px"><input type="radio" name="allowsearch" id="allowsearch" value="0" style="border:0px" 
<?php
checked ($date['allowsearch'],0);
?>  
/> 否</span> 		</td>
	</tr>
	<tr>
		<td class="tdBorder1">允许发布：</td>
		<td class="tdBorder1">
      <span style="width:100px"><input type="radio" name="allowpost" id="allowpost" value="1" style="border:0px" 
<?php
checked ($date['allowpost'],1);
?>
/> 是</span> <span style="width:100px"><input type="radio" name="allowpost" id="allowpost" value="0" style="border:0px"
<?php
checked ($date['allowpost'],0);
?>
/> 否</span> 		</td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">允许会员自助升级：</td>
		<td class="tdBorder1">
      <span style="width:100px"><input type="radio" name="allowupgrade" id="allowupgrade" value="1" style="border:0px"  
<?php
checked ($date['allowupgrade'],1);
?>
/> 是</span> <span style="width:100px"><input type="radio" name="allowupgrade" id="allowupgrade" value="0" style="border:0px" 
<?php
checked ($date['allowupgrade'],0);
?>
/> 否</span> 		</td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">包年价格：</td>
		<td class="tdBorder1">
        	&nbsp;
   	  <input type="text" name="price_y" id="price_y" size="8" manxlength="50" value="<?=$date['price_y']?>"/>         </td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">包月价格：</td>
		<td class="tdBorder1">
        	&nbsp;
   	  <input type="text" name="price_m" id="price_m" size="8"  manxlength="50" value="<?=$date['price_m']?>"/>         </td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">包日价格：</td>
		<td class="tdBorder1">
        	&nbsp;
   	  <input type="text" name="price_d" id="price_d" size="8" manxlength="50" value="<?=$date['price_d']?>"/>         </td>
	</tr>
	<tr style="display:none;">
    	<td class="tdBorder1">最大短消息数：</td>
        <td class="tdBorder1">
        	&nbsp;
   	  <input type="text" name="allowmessage" id="allowmessage" value="<?=$date['allowmessage']?>" size="6" manxlength="50"/>         条</td>
    </tr>
    
    <tr>
    	<td class="tdBorder1">排序：</td>
        <td class="tdBorder1">
        	&nbsp;
   	  <input type="text" name="listorder"  value="<?=$date['listorder']?>" size="6" manxlength="50"/></td>
    </tr>
	<tr>
		<td class="tdBorder1">是否禁用：</td>
		<td class="tdBorder1"><span style="width:100px"><input type="radio" name="disabled" id="disabled" value="1" style="border:0px" 
<?php
checked ($date['disabled'],1);
?>
/> 是</span>
	  <span style="width:100px"><input type="radio" name="disabled" id="disabled" value="0" style="border:0px" 
<?php
checked ($date['disabled'],0);
?>
/> 否</span> </td>
	</tr>
	
	<tr>
		<td class="tdBorder1">是否容许后台登陆：</td>
		<td class="tdBorder1"><span style="width:100px"><input type="radio" name="allowadmin" value="1" style="border:0px" 
<?php
checked ($date['allowadmin'],1);
?>
/> 是</span>
	  <span style="width:100px"><input type="radio" name="allowadmin"  value="0" style="border:0px" 
<?php
checked ($date['allowadmin'],0);
?>
/> 否</span> </td>
	</tr>
	<tr>
		<td class="tdBorder1">&nbsp;</td>
	  <td class="tdBorder1"><input name="dosubmit" type="submit" class="button1" value=" 确定 ">&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" class="button1" value=" 清除 "></td>
	</tr>
	</table>
</form>
</body>
</html>