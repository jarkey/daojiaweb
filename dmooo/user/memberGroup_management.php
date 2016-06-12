<?php
include_once('../inc/config.inc.php');
permissions('user_1_sel');
if ($_GET['del']) {
	permissions('user_1_del');
	$delId=$_GET['del'];
	$sql_del="delete from gplat_member_group where groupid='$delId'";
	$result_del=mysql_query($sql_del);
}
if ($_GET['disId']) {
	permissions('user_1_up');
	$disId=$_GET['disId'];
	$disNum=$_GET['disNum'];
	$sql_dis="update gplat_member_group SET disabled='$disNum' where groupid='$disId'";
	$result_dis=mysql_query($sql_dis);
}
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<script type="text/javascript">
var txt = "确定要删除这条记录吗？？";
function myConfirm(id){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="memberGroup_management.php?del=" + id;
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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></head>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="9" class="tdBorder1 titleBg1">会员组管理</td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1 tdBg1">排序</td>
    <td align="center" class="tdBorder1 tdBg1">会员组</td>
    <td align="center" class="tdBorder1 tdBg1">服务</td>
    <td align="center" class="tdBorder1 tdBg1">会员数</td>
    <td align="center" class="tdBorder1 tdBg1">发布</td>
    <td align="center" class="tdBorder1 tdBg1">后台登陆</td>
    <td align="center" class="tdBorder1 tdBg1">系统组</td>
    <td align="center" class="tdBorder1 tdBg1">权限</td>
    <td align="center" class="tdBorder1 tdBg1">操作</td>
  </tr>
  <?php
  $sql="select * from gplat_member_group order by groupid asc";
  $result=mysql_query($sql)or die(mysql_error());
  while($date=mysql_fetch_assoc($result))
  {
	  $id=$date['groupid'];
	  if ($date['allowpost']==1)
	  {
	  	$allowpost='<font color=red>√</font>';
	  }else
	  {
	  	$allowpost=' ';
	  }

	  if ($date['allowadmin']==1) {
	  	$allowadmin='<font color=red>√</font>';
	  }else
	  {
	  	$allowadmin='×';
	  }
	  if ($date['issystem']==1) {
	  	$issystem='<font color=red>√</font>';
	  	$del='';
	  	$disabled='';
	  	
	  }else
	  {
	  	  $del='<img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" onClick="myConfirm('.$id.')">';
	  	if ($date['disabled']==0)
	  	{
	  	$disabled='<a href=memberGroup_management.php?disId='.$id.'&disNum=1 title="禁用"><img src="../images/Disable.gif" border="0"></a>';
	  	}else
	  	{
	  	$disabled='<a href=memberGroup_management.php?disId='.$id.'&disNum=0 title="启用"><img src="../images/Enabled.gif" border="0"></a>';	
	  	}
	  	$issystem='';
	  }
	  $update='<a href=memberGroup_modify.php?groupid='.$id.' title="修改"><img src="../images/xiug.gif" border="0"></a>';
	  $sql_num="select userid from gplat_member where groupid='$id'";
	  $result_num=mysql_query($sql_num);
	  $user_num=mysql_num_rows($result_num);
	  ?>
     <tr>
    <td align="center" class="tdBorder1"><?=$date['listorder']?></td>
    <td align="center" class="tdBorder1"><?=$date['name']?></td>
    <td align="center" class="tdBorder1"><?=$date['description']?>&nbsp;</td>
    <td align="center" class="tdBorder1"><?=$user_num?></td>
    <td align="center" class="tdBorder1"><?=$allowpost?></td>
    <td align="center" class="tdBorder1"><?=$allowadmin?></td>
    <td align="center" class="tdBorder1"><?=$issystem?>&nbsp;</td>
     <td align="center" class="tdBorder1"><a href="memberGroup_permissions.php?groupid=<?=$id?>" title="设定权限"><img src="../images/permissions.gif" width="17" height="20" border="0"></a></td>
    <td align="center" class="tdBorder1"><?=$update?>&nbsp;&nbsp;<?=$disabled?>&nbsp;&nbsp;<?=$del?></td>
</tr>
      <?php
	  }
  ?>


</table>
</body>
</html>