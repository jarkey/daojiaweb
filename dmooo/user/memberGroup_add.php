<?php
include_once('../inc/config.inc.php');
permissions('user_1_in');
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
	$issystem=0;
	$listorder=0;
	$sql="insert into gplat_member_group (name,description,allowvisit,allowsearch,allowpost,allowupgrade,price_y,price_m,price_d
	,allowmessage,disabled,issystem,listorder,allowadmin) values ('$name','$description','$allowvisit','$allowsearch','$allowpost','$allowupgrade','$price_y','$price_m','$price_d',
	'$allowmessage','$disabled','$issystem','$listorder','$allowadmin')";
	$result=mysql_query($sql)or die(mysql_error());
	if ($result!=0){
		echo'<meta http-equiv="refresh" content="0; url=memberGroup_management.php"/>';
	}else 
	{
		echo("<script language=javascript>alert('删除失败');</script>");
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
<BODY class=right_bg>
<form method="post" name="myform" action="">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">添加会员组</td>
    </tr>
  <tr>
		<td width="20%" class="tdBorder1">名称：</td>
		<td class="tdBorder1">
   	  &nbsp;
   	  <input type="text" name="name"  size="30" class=""  maxlength="20" min="3" max="20" />         </td>
	</tr>
	<tr>
    <td class="tdBorder1">服务介绍：</td>
		<td class="tdBorder1">
			&nbsp;
			<textarea name="description" rows="10" cols="50" ></textarea></span></div>				</span>&nbsp;</div></td>
	</tr>
    <tr>
    	<td class="tdBorder1">允许访问：</td>
        <td class="tdBorder1">
            <span style="width:100px"><input type="radio" name="allowvisit" id="allowvisit" value="1" style="border:0px"   checked/> 是</span> <span style="width:100px"><input type="radio" name="allowvisit" id="allowvisit" value="0" style="border:0px"   /> 否</span>        </td>
    </tr>
	<tr>
		<td class="tdBorder1">允许搜索：</td>
		<td class="tdBorder1">
			<span style="width:100px"><input type="radio" name="allowsearch" id="allowsearch" value="1" style="border:0px"   checked/> 是</span> <span style="width:100px"><input type="radio" name="allowsearch" id="allowsearch" value="0" style="border:0px"   /> 否</span> 		</td>
	</tr>
	<tr>
		<td class="tdBorder1">允许发布：</td>
		<td class="tdBorder1">
            <span style="width:100px"><input type="radio" name="allowpost" id="allowpost" value="1" style="border:0px"   checked/> 是</span> <span style="width:100px"><input type="radio" name="allowpost" id="allowpost" value="0" style="border:0px"   /> 否</span> 		</td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">允许会员自助升级：</td>
		<td class="tdBorder1">
            <span style="width:100px"><input type="radio" name="allowupgrade" id="allowupgrade" value="1" style="border:0px"   checked/> 是</span> <span style="width:100px"><input type="radio" name="allowupgrade" id="allowupgrade" value="0" style="border:0px"   /> 否</span> 		</td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">包年价格：</td>
		<td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="price_y" id="price_y" value="0.00" size="8" manxlength="50"/>         </td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">包月价格：</td>
		<td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="price_m" id="price_m" value="0.00" size="8"  manxlength="50"/>         </td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">包日价格：</td>
		<td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="price_d" id="price_d" value="0.00" size="8" manxlength="50"/>         </td>
	</tr>
	<tr style="display:none;">
    	<td class="tdBorder1">最大短消息数：</td>
        <td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="allowmessage" id="allowmessage" value="1000" size="6" manxlength="50"/>         条</td>
    </tr>
	<tr>
		<td class="tdBorder1">是否禁用：</td>
		<td class="tdBorder1"><span style="width:100px"><input type="radio" name="disabled" id="disabled" value="1" style="border:0px"   /> 是</span> <span style="width:100px"><input type="radio" name="disabled" id="disabled" value="0" style="border:0px"   checked/> 否</span> </td>
	</tr>
	<tr>
		<td class="tdBorder1">是否容许后台登陆：</td>
		<td class="tdBorder1"><span style="width:100px"><input type="radio" name="allowadmin"  value="1" style="border:0px"   /> 是</span> <span style="width:100px"><input type="radio" name="disabled" id="disabled" value="0" style="border:0px"   checked/> 否</span> </td>
	</tr>
	<tr>
		<td class="tdBorder1">&nbsp;</td>
		<td class="tdBorder1"><input name="dosubmit" type="submit" class="btn" value=" 确定 ">&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" class="btn" value=" 清除 "></td>
	</tr>
	</table>
</form>
</body>
</html>