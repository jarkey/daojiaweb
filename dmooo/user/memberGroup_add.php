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
		echo("<script language=javascript>alert('ɾ��ʧ��');</script>");
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
    <td colspan="2" class="tdBorder1 titleBg1">��ӻ�Ա��</td>
    </tr>
  <tr>
		<td width="20%" class="tdBorder1">���ƣ�</td>
		<td class="tdBorder1">
   	  &nbsp;
   	  <input type="text" name="name"  size="30" class=""  maxlength="20" min="3" max="20" />         </td>
	</tr>
	<tr>
    <td class="tdBorder1">������ܣ�</td>
		<td class="tdBorder1">
			&nbsp;
			<textarea name="description" rows="10" cols="50" ></textarea></span></div>				</span>&nbsp;</div></td>
	</tr>
    <tr>
    	<td class="tdBorder1">������ʣ�</td>
        <td class="tdBorder1">
            <span style="width:100px"><input type="radio" name="allowvisit" id="allowvisit" value="1" style="border:0px"   checked/> ��</span> <span style="width:100px"><input type="radio" name="allowvisit" id="allowvisit" value="0" style="border:0px"   /> ��</span>        </td>
    </tr>
	<tr>
		<td class="tdBorder1">����������</td>
		<td class="tdBorder1">
			<span style="width:100px"><input type="radio" name="allowsearch" id="allowsearch" value="1" style="border:0px"   checked/> ��</span> <span style="width:100px"><input type="radio" name="allowsearch" id="allowsearch" value="0" style="border:0px"   /> ��</span> 		</td>
	</tr>
	<tr>
		<td class="tdBorder1">��������</td>
		<td class="tdBorder1">
            <span style="width:100px"><input type="radio" name="allowpost" id="allowpost" value="1" style="border:0px"   checked/> ��</span> <span style="width:100px"><input type="radio" name="allowpost" id="allowpost" value="0" style="border:0px"   /> ��</span> 		</td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">�����Ա����������</td>
		<td class="tdBorder1">
            <span style="width:100px"><input type="radio" name="allowupgrade" id="allowupgrade" value="1" style="border:0px"   checked/> ��</span> <span style="width:100px"><input type="radio" name="allowupgrade" id="allowupgrade" value="0" style="border:0px"   /> ��</span> 		</td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">����۸�</td>
		<td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="price_y" id="price_y" value="0.00" size="8" manxlength="50"/>         </td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">���¼۸�</td>
		<td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="price_m" id="price_m" value="0.00" size="8"  manxlength="50"/>         </td>
	</tr>
	<tr style="display:none;">
		<td class="tdBorder1">���ռ۸�</td>
		<td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="price_d" id="price_d" value="0.00" size="8" manxlength="50"/>         </td>
	</tr>
	<tr style="display:none;">
    	<td class="tdBorder1">������Ϣ����</td>
        <td class="tdBorder1">
        	&nbsp;
        	<input type="text" name="allowmessage" id="allowmessage" value="1000" size="6" manxlength="50"/>         ��</td>
    </tr>
	<tr>
		<td class="tdBorder1">�Ƿ���ã�</td>
		<td class="tdBorder1"><span style="width:100px"><input type="radio" name="disabled" id="disabled" value="1" style="border:0px"   /> ��</span> <span style="width:100px"><input type="radio" name="disabled" id="disabled" value="0" style="border:0px"   checked/> ��</span> </td>
	</tr>
	<tr>
		<td class="tdBorder1">�Ƿ������̨��½��</td>
		<td class="tdBorder1"><span style="width:100px"><input type="radio" name="allowadmin"  value="1" style="border:0px"   /> ��</span> <span style="width:100px"><input type="radio" name="disabled" id="disabled" value="0" style="border:0px"   checked/> ��</span> </td>
	</tr>
	<tr>
		<td class="tdBorder1">&nbsp;</td>
		<td class="tdBorder1"><input name="dosubmit" type="submit" class="btn" value=" ȷ�� ">&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" class="btn" value=" ��� "></td>
	</tr>
	</table>
</form>
</body>
</html>