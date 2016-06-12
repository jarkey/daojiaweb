<?php
include_once('../inc/config.inc.php');

if ($_GET['del'])
{
	
   $sql="delete from gplat_service where serviceId=".$_GET['del'];
   //echo $sql."<br>";   
   $result=mysql_query($sql);

   if ($_GET['userIdIf']==1)        //判断来源是否带有userId信息
   {
   echo'<meta http-equiv="refresh" content="0; url=service.php?userId='.$_SESSION[userId].'"/>';
   exit;	   
   }
   	
}

/*
此页面在会员管理和投诉管理两个地方调用，但用途不同
会员管理那，是列出此会员的对应信息
投诉管理那，是列出所有的信息
所以通过判断来源的方式，结合$_SESSION[userId]来判断显示方式
*/

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
<script type="text/javascript">
var txt = "确定要删除这条记录吗？？";
function myConfirm(id,userIdIf){
	//userIdIf,删除后返回列表页时,是否需要带会员id;0-不带;1-带
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="service.php?del=" + id + "&userIdIf=" + userIdIf;  
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

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></head><body>
<br>
<?php 
if ($userIdIf==1){
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="right"><a href="add_service.php?userId=<?=$_GET['userId']?>" class="red1Href" style=" font-weight:bold; font-size:14px;">+添加投诉</a></td>
  </tr>
</table>
<?php 
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="7" class="tdBorder1 titleBg1">在线投诉</td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">投诉编号</td>
<td class="tdBorder1 tdBg1">提交时间</td>
<td class="tdBorder1 tdBg1">处理时间</td>
<td class="tdBorder1 tdBg1">主题</td>
<td class="tdBorder1 tdBg1">受理专员</td>
<td class="tdBorder1 tdBg1">状态</td>
<td class="tdBorder1 tdBg1">操作</td>
</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
$sql="select serviceId from gplat_service where serviceIndex=2";
if ($userIdIf==1) $sql=$sql." and userid=".$_GET['userId'];
$result=mysql_query($sql);
$num_all=mysql_num_rows($result);
$page_all=ceil($num_all/$num); //计算出?的页数
$page_one=($page_id-1)*$num; // 取出的开始行?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('访问的页面出错');
}

$sql="select * from gplat_service where serviceIndex=2";
if ($userIdIf==1) $sql=$sql." and userid=".$_GET['userId'];
$sql=$sql." order by serviceId desc limit $page_one,$num";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$status=$date['processStatus'];
	$i=serviceStatus($status);                //判断投诉状态
   
	?>
	<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1"><?=$date['serviceNo']?></td>
	<td class="tdBorder1"><?=$date['submitTime']?>&nbsp;</td>
    <td class="tdBorder1"><?=$date['processTime']?>&nbsp;</td>    
    <td class="tdBorder1"><?=$date['submitTitle']?></td>
    <td class="tdBorder1"><?=$date['processMan']?>&nbsp;</td>
    <td class="tdBorder1"><?=$i?></td>
    <td class="tdBorder1">
      <?php
	if($_SESSION[userId]){
		echo '<a href=service_admin.php?serviceId='.$date['serviceId'].'>';
	}else{
		echo '<a href="service_admin.php?serviceId='.$date['serviceId'].'&keepThis=true&TB_iframe=true&height=340&width=700" title="订单管理系统 / 查看详细" class="thickbox"> ';
	}
	?>
      <img src="../images/inco_modify.gif" border="0px" alt="编辑转发"></a>&nbsp;&nbsp;<img src="../images/del.gif" border="0px" alt="删除" onClick="myConfirm(<?=$date['serviceId']?>,<?=$userIdIf?>)"></td>
</tr>
	<?php
}
?>  
	<tr align="center" bgcolor="#FFFFFF">
	  <td height="30" colspan="8" align="left" class="tdBorder1"><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  </tr>

</table>
</body>
</html>