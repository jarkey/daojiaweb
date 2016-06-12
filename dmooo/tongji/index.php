<?php
include('../inc/config.inc.php');
permissions('user_2_sel');
if ($_POST['username']) {    //判断是否进行会员查询
	$username_search=$_POST['username'];
}

if($_POST['check'])
{
	permissions('user_2_del');
	foreach ($_POST['check'] as $delId)
	{ 
		if ($delId!=1) {
		$sql="delete from gplat_member where userid=$delId";
		$result=mysql_query($sql);
		$sql_del1="delete from gplat_member_detail where userid='$delId'";
	$result_del=mysql_query($sql_del1);
	$sql_del2="delete from gplat_member_info where userid='$delId'";
	$result_del=mysql_query($sql_del2);
	}
		
	}
	 
}
?>
<html>
<head>
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<body>

<form action="<?=$filename?>?<?=$_SERVER['../user/QUERY_STRING']?>"  method="POST" name="aa">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4" >
  <tr>
    <td colspan="6" class="tdBorder1 titleBg1">统计信息</td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">用户名</td>
<td class="tdBorder1 tdBg1">会员组</td>
<td class="tdBorder1 tdBg1" style="display:none;">会员模型</td>
<td class="tdBorder1 tdBg1">资金</td>
<td class="tdBorder1 tdBg1">积分</td>
<td class="tdBorder1 tdBg1" >最近登录</td>
</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=11; //每页显示20?
$sql_num="select userid from gplat_member";
//判断是否进行会员查询
if($username_search) $sql_num=$sql_num." where username LIKE '%$username_search%'";
//echo $sql_num."<br>";
$result_num=mysql_query($sql_num);
$num_all=mysql_num_rows($result_num); //查询出?的记录?
$page_all=ceil($num_all/$num); //计算出?的页数
$page_one=($page_id-1)*$num; // 取出的开始行?

$sql="select * from gplat_member";
//判断是否进行会员查询
if($username_search) $sql=$sql." where username like '%$username_search%'";
$sql=$sql." order by userid asc limit $page_one,$num";
//echo $sql;
$result=mysql_query($sql);
$_SESSION['url']=$url.'?'.$_SERVER['QUERY_STRING'];

while($date=mysql_fetch_assoc($result))
 {
   $user=$date['username'];
   $id=$date['userid'];
   $email=$date['email'];    
   $amount=$date['amount'];   
   $point=$date['point'];
   $groupid=$date['groupid'];
   if ($groupid!=1) {
   	
   	   if ($date['disabled']==0)
	  	{
	  	$disabled='<a href='.$filename.'?disId='.$id.'&disNum=1 title="禁用"><img src="../images/Disable.gif" border="0"></a>';
	  	}else
	  	{
	  	$disabled='<a href='.$filename.'?disId='.$id.'&disNum=0 title="启用"><img src="../images/Enabled.gif" border="0"></a>';	
	  	}
   	   $del='<img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" onClick="myConfirm('.$id.')">';
   	   
   }else 
   {
   	$disabled='';
   	$del='';
   }

   
   $groupid=$date['groupid'];
   $sql_roup="select name from gplat_member_group where groupid='$groupid'";
   $result_roup=mysql_query($sql_roup);
   $date_roup=mysql_fetch_assoc($result_roup);
   $groupName=$date_roup['name'];
   
   $sql_info="select lastlogintime from gplat_member_info where userid='$id'";
   $result_info=mysql_query($sql_info);
   $date_info=mysql_fetch_assoc($result_info);
   $lastlogintime=$date_info['lastlogintime'];
   
?>

<tr align="center">
  <td class="tdBorder1"><?=$user?></td>
  <td class="tdBorder1"><?=$groupName?></td>
  <td class="tdBorder1" style="display:none;"><?=$time_up?>&nbsp;</td>
  <td class="tdBorder1"><?=$amount?></td>
  <td class="tdBorder1"><?=$point?>&nbsp;</td>
  <td class="tdBorder1"><?=$lastlogintime?></td>
  </tr>
<?php
 }
?>
</table>

</form>
</body>
</html>