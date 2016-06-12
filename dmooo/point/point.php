<?php
include_once('../inc/config.inc.php');


if ($_GET['userId']){
	$_SESSION[userId]=$_GET['userId'];
	$userIdIf=1;      //来源包含userId信息	
}else{
	unset($_SESSION['userId']);
	$userIdIf=0;	  //来源不包含userId信息	
}

?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">


<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></head><body>
<br>
<?php 
if ($userIdIf==1){
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="right"><a href="add_point.php?userId=<?=$_GET['userId']?>&userName=<?=$_GET['userName']?>&email=<?=$_GET['email']?>" class="red1Href" style=" font-weight:bold; font-size:14px;">+添加积分</a></td>
  </tr>
</table>
<?php 
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr align="center">
<td class="tdBorder1 tdBg1">数目</td>
<td class="tdBorder1 tdBg1">事由</td>
<td class="tdBorder1 tdBg1">时间</td>

</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
$sql="select logId from gplat_member_log";
if ($userIdIf==1) $sql=$sql." where  logIndex=1 and userid=".$_GET['userId'] ;
$result=mysql_query($sql);
$num_all=mysql_num_rows($result);
$page_all=ceil($num_all/$num); //计算出?的页数
$page_one=($page_id-1)*$num; // 取出的开始行?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('访问的页面出错');
}

$sql="select * from gplat_member_log";
if ($userIdIf==1) $sql=$sql." where logIndex=1 and userid=".$_GET['userId'];
$sql=$sql." order by logId desc limit $page_one,$num";
//echo"$sql";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	
   
	?>
	<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1"><?=$date['logNum']?></td>
	
    <td class="tdBorder1"><?=$date['logNote']?></td>
 <td class="tdBorder1"><?=$date['times']?></td>
  
</tr>
	<?php
}
?>  
	<tr align="center" bgcolor="#FFFFFF">
	  <td height="30" colspan="7" align="left" class="tdBorder1"><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  </tr>

</table>
</body>
</html>