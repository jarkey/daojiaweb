<?php
include_once('../inc/config.inc.php');
permissions('user_1_pe');
$groupid=$_GET['groupid'];	
if($_POST['pe']=='pe'){
	$permissions_arr=$_POST['permissions'];
	foreach ($permissions_arr as $link => $content ) {
	$permissions.=$content.',';
	}
$sql_p="update gplat_member_group set permissions='$permissions' where  groupid='$groupid' ";
$result_p=mysql_query($sql_p);
	}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></head>
<body>
<?php
$sql="select * from gplat_member_group where groupid='$groupid'";
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$permissions='a'.$data['permissions'];
function checked_per($permissions_arr='',$value=''){
	if (strpos("$permissions_arr","$value")>0) {
		$checked='checked';
	}else{
		$checked='';
	}
	return $checked;
}


?>
<form method="post" name="myform" action="memberGroup_permissions.php?groupid=<?=$groupid?>">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">��Ա��Ȩ������</td>
    </tr>
  <tr>
		<td width="20%" class="tdBorder1"><strong> ���ƣ�</strong></td>
		<td class="tdBorder1">
   	  &nbsp;
   	  <?=$data['name']?> </td>
	</tr>
	<tr>
    <td class="tdBorder1"><strong><A onClick="expandIt('KB1'); return false" href="#">���ŷ���ϵͳ</A>��</strong></td>
		<td class="tdBorder1">
	  <input type="checkbox" name="permissions[]" value="news_1_sel" checked>Ƶ���鿴
      <input type="checkbox" name="permissions[]" value="news_1_up" <?=checked_per($permissions,'news_1_up')?>> Ƶ���޸�
      <input type="checkbox" name="permissions[]" value="news_1_in" <?=checked_per($permissions,'news_1_in')?>> Ƶ�����
      <input type="checkbox" name="permissions[]" value="news_1_del" <?=checked_per($permissions,'news_1_del')?>> Ƶ��ɾ��<br>
      <input type="checkbox" name="permissions[]" value="news_2_sel" <?=checked_per($permissions,'news_2_sel')?>>���Ų鿴
      <input type="checkbox" name="permissions[]" value="news_2_up" <?=checked_per($permissions,'news_2_up')?>> �����޸�
      <input type="checkbox" name="permissions[]" value="news_2_in" <?=checked_per($permissions,'news_2_in')?>> �������
      <input type="checkbox" name="permissions[]" value="news_2_del" <?=checked_per($permissions,'news_2_del')?>> ����ɾ��
     </td>
	</tr>
    <tr>
    	<td class="tdBorder1"><strong><A onClick="expandIt('KB7'); return false" href="#">��Ʒ����ϵͳ</A>��</strong></td>
        <td class="tdBorder1">
      <input type="checkbox" name="permissions[]" value="product_1_sel" <?=checked_per($permissions,'product_1_sel')?>>Ƶ���鿴
      <input type="checkbox" name="permissions[]" value="product_1_up" <?=checked_per($permissions,'product_1_up')?>> Ƶ���޸�
      <input type="checkbox" name="permissions[]" value="product_1_in" <?=checked_per($permissions,'product_1_in')?>> Ƶ�����
      <input type="checkbox" name="permissions[]" value="product_1_del" <?=checked_per($permissions,'product_1_del')?>> Ƶ��ɾ��<br>
      <input type="checkbox" name="permissions[]" value="product_2_sel" <?=checked_per($permissions,'product_2_sel')?>>��Ʒ�鿴
      <input type="checkbox" name="permissions[]" value="product_2_up" <?=checked_per($permissions,'product_2_up')?>> ��Ʒ�޸�
      <input type="checkbox" name="permissions[]" value="product_2_in" <?=checked_per($permissions,'product_2_in')?>> ��Ʒ���
      <input type="checkbox" name="permissions[]" value="product_2_del" <?=checked_per($permissions,'product_2_del')?>> ��Ʒɾ��
     </td>
    </tr>
	<tr>
		<td class="tdBorder1"><strong><A onClick="expandIt('KB9'); return false" href="#">�ײ͹���ϵͳ</A>��</strong></td>
		<td class="tdBorder1">
	  <input type="checkbox" name="permissions[]" value="package_1_sel" <?=checked_per($permissions,'package_1_sel')?>>Ƶ���鿴
      <input type="checkbox" name="permissions[]" value="package_1_up" <?=checked_per($permissions,'package_1_up')?>> Ƶ���޸�
      <input type="checkbox" name="permissions[]" value="package_1_in" <?=checked_per($permissions,'package_1_in')?>> Ƶ�����
      <input type="checkbox" name="permissions[]" value="package_1_del" <?=checked_per($permissions,'package_1_del')?>> Ƶ��ɾ��<br>
      <input type="checkbox" name="permissions[]" value="package_2_sel" <?=checked_per($permissions,'package_2_sel')?>>�ײͲ鿴
      <input type="checkbox" name="permissions[]" value="package_2_up" <?=checked_per($permissions,'package_2_up')?>> �ײ��޸�
      <input type="checkbox" name="permissions[]" value="package_2_in" <?=checked_per($permissions,'package_2_in')?>> �ײ����
      <input type="checkbox" name="permissions[]" value="package_2_del" <?=checked_per($permissions,'package_2_del')?>> �ײ�ɾ��
     </td>
	</tr>
	<tr>
		<td class="tdBorder1"><strong><A onClick="expandIt('KB2'); return false" href="#">��Ա����ϵͳ</A>��</strong></td>
		<td class="tdBorder1">
        <input type="checkbox" name="permissions[]" value="user_1_sel" <?=checked_per($permissions,'user_1_sel')?>>��Ա��鿴
      <input type="checkbox" name="permissions[]" value="user_1_up" <?=checked_per($permissions,'user_1_up')?>> ��Ա���޸�
      <input type="checkbox" name="permissions[]" value="user_1_in" <?=checked_per($permissions,'user_1_in')?>> ��Ա�����
      <input type="checkbox" name="permissions[]" value="user_1_del" <?=checked_per($permissions,'user_1_del')?>> ��Ա��ɾ��
      <input type="checkbox" name="permissions[]" value="user_1_pe" <?=checked_per($permissions,'user_1_pe')?>> ��Ա��Ȩ��<br>
      <input type="checkbox" name="permissions[]" value="user_2_sel" <?=checked_per($permissions,'user_2_sel')?>>��Ա�鿴
      <input type="checkbox" name="permissions[]" value="user_2_up" <?=checked_per($permissions,'user_2_up')?>> ��Ա�޸�
      <input type="checkbox" name="permissions[]" value="user_2_in" <?=checked_per($permissions,'user_2_in')?>> ��Ա���
      <input type="checkbox" name="permissions[]" value="user_2_del" <?=checked_per($permissions,'user_2_del')?>> ��Աɾ��
      </td>
	</tr>
	<tr>
	  <td class="tdBorder1"><strong><A onClick="expandIt('KB2'); return false" href="#">��������ϵͳ</A>��</strong></td>
	  <td class="tdBorder1">
	    <input type="checkbox" name="permissions[]" value="order_1_sel" <?=checked_per($permissions,'order_1_sel')?>>
	    �����鿴
	    <input type="checkbox" name="permissions[]" value="order_1_up" <?=checked_per($permissions,'order_1_up')?>>
	    �����޸�
	    <input type="checkbox" name="permissions[]" value="order_1_in" <?=checked_per($permissions,'order_1_in')?>>
	    �������
	    <input type="checkbox" name="permissions[]" value="order_1_del" <?=checked_per($permissions,'order_1_del')?>>
      ����ɾ��
      <input type="checkbox" name="permissions[]" value="order_1_logistics" <?=checked_per($permissions,'order_1_logistics')?>>
     ������������ </td>
    </tr>
    
	<tr>
		<td class="tdBorder1">&nbsp;<input type="hidden" name="pe" value="pe"></td>
	  <td class="tdBorder1"><input name="dosubmit" type="submit" class="button1" value=" ȷ�� ">&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" class="button1" value=" ��� "></td>
	</tr>
	</table>
</form>
</body>
</html>