<?php
include_once('../inc/config.inc.php');
permissions('order_1_sel');
if ($_GET['del'])
{
	$sql="delete from dmooo_enterprise_order where orderid=".$_GET['del'];
    $result=mysql_query($sql);			
}
if($_GET['id']!=''){
	$id=$_GET['id'];
	if($_GET['index_view']==1){$index_view=0;}else{$index_view=1;}
	$sql="update dmooo_enterprise_order set index_view='$index_view' where id=$id";
	$result=mysql_query($sql);
	
	}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "ȷ��Ҫɾ��������¼�𣿣�";
function myConfirm(id,userIdIf){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{ȷ��:true, ȡ��:false},
		callback: function(v,m){
			if(v){
				window.location.href="orders.php?del=" + id + "&userIdIf=" + userIdIf;  
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
<body>
<br>
<?php 
if ($userIdIf==1){
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="right"><a href="add_orders.php?userId=<?=$_GET['userId']?>" class="red1Href" style=" font-weight:bold; font-size:14px;">+��Ӷ���</a></td>
  </tr>
</table>
<?php 
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="9" class="tdBorder1 titleBg1">
    <div style="width:100%;">
      <div style="float:left; padding-top:3px;">�����б�</div>
      <div style="float:right;"><a href="excel.php">����EXCEL��</a></div>      
    </div>       
    </td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">����</td>
<td class="tdBorder1 tdBg1">����</td>
<td class="tdBorder1 tdBg1">�绰</td>
<td class="tdBorder1 tdBg1">��˾</td>
<td class="tdBorder1 tdBg1">����</td>
<td class="tdBorder1 tdBg1">ʱ��</td>
<td class="tdBorder1 tdBg1">״̬</td>
<td class="tdBorder1 tdBg1">����</td>
</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
$sql="select id from dmooo_enterprise_order ";
if ($userIdIf==1) $sql=$sql." where userid=".$_GET['userId'];
$result=mysql_query($sql);
$num_all=mysql_num_rows($result);
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}

$sql="select * from dmooo_enterprise_order";
if ($userIdIf==1) $sql=$sql." where userid=".$_GET['userId'];
$sql=$sql." order by id desc limit $page_one,$num";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{  
 
   
	?>
	<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1"><?=$date['content']?></td>
	<td class="tdBorder1"><?=$date['name']?></td>
    <td class="tdBorder1"><?=$date['phone']?></td>
    <td class="tdBorder1"><?=$date['company']?></td>
    <td class="tdBorder1"><?=$date['num']?></td>
    <td class="tdBorder1"><?=$date['times']?></td>
    <td class="tdBorder1"><a href="orders1.php?id=<?=$date['id']?>&index_view=<?=$date['index_view']?>"><?php if($date['index_view']==1){echo'�ѽ���';}else{ echo'δ����';}?></a></td>
    <td class="tdBorder1">
    <img src="../images/del.gif" border="0px" alt="ɾ��" onClick="myConfirm(<?=$date['orderid']?>,<?=$userIdIf?>)"></td>
</tr>
<?php } ?>
	<tr align="center" bgcolor="#FFFFFF">
	  <td height="30" colspan="9" align="left" class="tdBorder1"><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  </tr>
</table>
</body>
</html>