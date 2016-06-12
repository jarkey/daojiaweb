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
    <td colspan="2" class="tdBorder1 titleBg1">会员组权限设置</td>
    </tr>
  <tr>
		<td width="20%" class="tdBorder1"><strong> 名称：</strong></td>
		<td class="tdBorder1">
   	  &nbsp;
   	  <?=$data['name']?> </td>
	</tr>
	<tr>
    <td class="tdBorder1"><strong><A onClick="expandIt('KB1'); return false" href="#">新闻发布系统</A>：</strong></td>
		<td class="tdBorder1">
	  <input type="checkbox" name="permissions[]" value="news_1_sel" checked>频道查看
      <input type="checkbox" name="permissions[]" value="news_1_up" <?=checked_per($permissions,'news_1_up')?>> 频道修改
      <input type="checkbox" name="permissions[]" value="news_1_in" <?=checked_per($permissions,'news_1_in')?>> 频道添加
      <input type="checkbox" name="permissions[]" value="news_1_del" <?=checked_per($permissions,'news_1_del')?>> 频道删除<br>
      <input type="checkbox" name="permissions[]" value="news_2_sel" <?=checked_per($permissions,'news_2_sel')?>>新闻查看
      <input type="checkbox" name="permissions[]" value="news_2_up" <?=checked_per($permissions,'news_2_up')?>> 新闻修改
      <input type="checkbox" name="permissions[]" value="news_2_in" <?=checked_per($permissions,'news_2_in')?>> 新闻添加
      <input type="checkbox" name="permissions[]" value="news_2_del" <?=checked_per($permissions,'news_2_del')?>> 新闻删除
     </td>
	</tr>
    <tr>
    	<td class="tdBorder1"><strong><A onClick="expandIt('KB7'); return false" href="#">商品发布系统</A>：</strong></td>
        <td class="tdBorder1">
      <input type="checkbox" name="permissions[]" value="product_1_sel" <?=checked_per($permissions,'product_1_sel')?>>频道查看
      <input type="checkbox" name="permissions[]" value="product_1_up" <?=checked_per($permissions,'product_1_up')?>> 频道修改
      <input type="checkbox" name="permissions[]" value="product_1_in" <?=checked_per($permissions,'product_1_in')?>> 频道添加
      <input type="checkbox" name="permissions[]" value="product_1_del" <?=checked_per($permissions,'product_1_del')?>> 频道删除<br>
      <input type="checkbox" name="permissions[]" value="product_2_sel" <?=checked_per($permissions,'product_2_sel')?>>商品查看
      <input type="checkbox" name="permissions[]" value="product_2_up" <?=checked_per($permissions,'product_2_up')?>> 商品修改
      <input type="checkbox" name="permissions[]" value="product_2_in" <?=checked_per($permissions,'product_2_in')?>> 商品添加
      <input type="checkbox" name="permissions[]" value="product_2_del" <?=checked_per($permissions,'product_2_del')?>> 商品删除
     </td>
    </tr>
	<tr>
		<td class="tdBorder1"><strong><A onClick="expandIt('KB9'); return false" href="#">套餐管理系统</A>：</strong></td>
		<td class="tdBorder1">
	  <input type="checkbox" name="permissions[]" value="package_1_sel" <?=checked_per($permissions,'package_1_sel')?>>频道查看
      <input type="checkbox" name="permissions[]" value="package_1_up" <?=checked_per($permissions,'package_1_up')?>> 频道修改
      <input type="checkbox" name="permissions[]" value="package_1_in" <?=checked_per($permissions,'package_1_in')?>> 频道添加
      <input type="checkbox" name="permissions[]" value="package_1_del" <?=checked_per($permissions,'package_1_del')?>> 频道删除<br>
      <input type="checkbox" name="permissions[]" value="package_2_sel" <?=checked_per($permissions,'package_2_sel')?>>套餐查看
      <input type="checkbox" name="permissions[]" value="package_2_up" <?=checked_per($permissions,'package_2_up')?>> 套餐修改
      <input type="checkbox" name="permissions[]" value="package_2_in" <?=checked_per($permissions,'package_2_in')?>> 套餐添加
      <input type="checkbox" name="permissions[]" value="package_2_del" <?=checked_per($permissions,'package_2_del')?>> 套餐删除
     </td>
	</tr>
	<tr>
		<td class="tdBorder1"><strong><A onClick="expandIt('KB2'); return false" href="#">会员管理系统</A>：</strong></td>
		<td class="tdBorder1">
        <input type="checkbox" name="permissions[]" value="user_1_sel" <?=checked_per($permissions,'user_1_sel')?>>会员组查看
      <input type="checkbox" name="permissions[]" value="user_1_up" <?=checked_per($permissions,'user_1_up')?>> 会员组修改
      <input type="checkbox" name="permissions[]" value="user_1_in" <?=checked_per($permissions,'user_1_in')?>> 会员组添加
      <input type="checkbox" name="permissions[]" value="user_1_del" <?=checked_per($permissions,'user_1_del')?>> 会员组删除
      <input type="checkbox" name="permissions[]" value="user_1_pe" <?=checked_per($permissions,'user_1_pe')?>> 会员组权限<br>
      <input type="checkbox" name="permissions[]" value="user_2_sel" <?=checked_per($permissions,'user_2_sel')?>>会员查看
      <input type="checkbox" name="permissions[]" value="user_2_up" <?=checked_per($permissions,'user_2_up')?>> 会员修改
      <input type="checkbox" name="permissions[]" value="user_2_in" <?=checked_per($permissions,'user_2_in')?>> 会员添加
      <input type="checkbox" name="permissions[]" value="user_2_del" <?=checked_per($permissions,'user_2_del')?>> 会员删除
      </td>
	</tr>
	<tr>
	  <td class="tdBorder1"><strong><A onClick="expandIt('KB2'); return false" href="#">订单管理系统</A>：</strong></td>
	  <td class="tdBorder1">
	    <input type="checkbox" name="permissions[]" value="order_1_sel" <?=checked_per($permissions,'order_1_sel')?>>
	    订单查看
	    <input type="checkbox" name="permissions[]" value="order_1_up" <?=checked_per($permissions,'order_1_up')?>>
	    订单修改
	    <input type="checkbox" name="permissions[]" value="order_1_in" <?=checked_per($permissions,'order_1_in')?>>
	    订单添加
	    <input type="checkbox" name="permissions[]" value="order_1_del" <?=checked_per($permissions,'order_1_del')?>>
      订单删除
      <input type="checkbox" name="permissions[]" value="order_1_logistics" <?=checked_per($permissions,'order_1_logistics')?>>
     订单物流管理 </td>
    </tr>
    
	<tr>
		<td class="tdBorder1">&nbsp;<input type="hidden" name="pe" value="pe"></td>
	  <td class="tdBorder1"><input name="dosubmit" type="submit" class="button1" value=" 确定 ">&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" class="button1" value=" 清除 "></td>
	</tr>
	</table>
</form>
</body>
</html>