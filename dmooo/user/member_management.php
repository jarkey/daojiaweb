<?php
include('../inc/config.inc.php');
permissions('user_2_sel');
if ($_POST['username']) {    //�ж��Ƿ���л�Ա��ѯ
	$username_search=$_POST['username'];
}

if ($_GET['delId']) {
	permissions('user_2_del');
	$delId=$_GET['delId'];
	$sql_del="delete from gplat_member where userid='$delId'";
	$result_del=mysql_query($sql_del);
	$sql_del1="delete from gplat_member_detail where userid='$delId'";
	$result_del=mysql_query($sql_del1);
	$sql_del2="delete from gplat_member_info where userid='$delId'";
	$result_del=mysql_query($sql_del2);
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

if ($_GET['disId']) {
	permissions('user_2_up');
	$disId=$_GET['disId'];
	$disNum=$_GET['disNum'];
	$sql_dis="update gplat_member SET disabled='$disNum' where userid='$disId'";
	$result_dis=mysql_query($sql_dis);
	$url_str=$_SESSION['url'];
	echo'<meta http-equiv="refresh" content="0; url='.$url_str.'"/>';
	exit;
}
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "ȷ��Ҫɾ��������¼�𣿣�";
function myConfirm(id){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{ȷ��:true, ȡ��:false},
		callback: function(v,m){
			if(v){
				window.location.href="member_management.php?delId=" + id;
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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<body>

<form action="<?=$filename?>?<?=$_SERVER['QUERY_STRING']?>"  method="POST" name="aa">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4" >
  <tr>
    <td colspan="8" class="tdBorder1 titleBg1">
    <div style="width:100%;">
      <div style="float:left; padding-top:3px;">��Ա����</div>
      <div style="float:right;"><a href="excel.php">����EXCEL��</a></div>      
    </div>    
    </td>
    </tr>
  <tr align="center">
<td class="tdBorder1 tdBg1">ѡ��</td>
<td class="tdBorder1 tdBg1">�û���</td>
<td class="tdBorder1 tdBg1">��Ա��</td>
<td class="tdBorder1 tdBg1" style="display:none;">��Աģ��</td>
<td class="tdBorder1 tdBg1">�ʽ�</td>
<td class="tdBorder1 tdBg1">����</td>
<td class="tdBorder1 tdBg1" >�����¼</td>
<td class="tdBorder1 tdBg1">����</td>

</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=11; //ÿҳ��ʾ20?
$sql_num="select userid from gplat_member";
//�ж��Ƿ���л�Ա��ѯ
if($username_search) $sql_num=$sql_num." where username LIKE '%$username_search%'";
//echo $sql_num."<br>";
$result_num=mysql_query($sql_num);
$num_all=mysql_num_rows($result_num); //��ѯ��?�ļ�¼?
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?

$sql="select * from gplat_member";
//�ж��Ƿ���л�Ա��ѯ
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
	  	$disabled='<a href='.$filename.'?disId='.$id.'&disNum=1 title="����"><img src="../images/Disable.gif" border="0"></a>';
	  	}else
	  	{
	  	$disabled='<a href='.$filename.'?disId='.$id.'&disNum=0 title="����"><img src="../images/Enabled.gif" border="0"></a>';	
	  	}
   	   $del='<img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0px" onClick="myConfirm('.$id.')">';
   	   
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
  <td class="tdBorder1"><input type="checkbox" name="check[]" value="<?=$id?>"></td>
  <td class="tdBorder1"><?=$user?></td>
  <td class="tdBorder1"><?=$groupName?></td>
  <td class="tdBorder1" style="display:none;"><?=$time_up?>&nbsp;</td>
  <td class="tdBorder1"><?=$amount?></td>
  <td class="tdBorder1"><?=$point?>&nbsp;</td>
  <td class="tdBorder1"><?=$lastlogintime?></td>
  <td class="tdBorder1">
  <a href="register_user.php?userId=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="��Ա���� / <?=$user?>�������޸�" class="thickbox"><img src="../images/xiug.gif" border="0"></a>&nbsp;
  <?=$del?>&nbsp;
  <?=$disabled?>&nbsp;
  <a href="note.php?userId=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="��Ա���� / <?=$user?>�ı�ע" class="thickbox"><img src="../images/Remarks.gif" border="0"></a>&nbsp;
  <a href="../orders/orders.php?userId=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="��Ա���� / <?=$user?>�Ķ���" class="thickbox"><img src="../images/order.gif" border="0"></a>&nbsp; 
  <a href="../point/point.php?userId=<?=$id?>&userName=<?=$user?>&email=<?=$email?>&keepThis=true&TB_iframe=true&height=400&width=700" title="��Ա���� / <?=$user?>�Ļ��ֹ���" class="thickbox"><img src="../images/memberPoint.gif" border="0"></a>&nbsp;  
  <a href="../amount/amount.php?userId=<?=$id?>&userName=<?=$user?>&email=<?=$email?>&keepThis=true&TB_iframe=true&height=400&width=700" title="��Ա���� / <?=$user?>���ʻ�����" class="thickbox"><img src="../images/memberAccount.gif" border="0"></a>&nbsp;  
  <a href="../service/service.php?userId=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="��Ա���� / <?=$user?>�ķ���" class="thickbox"><img src="../images/service.gif" border="0"></a>&nbsp;
  <a href="../tousu/service.php?userId=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="��Ա���� / <?=$user?>��Ͷ��" class="thickbox"><img src="../images/tousu.gif" border="0"></a>&nbsp;         
  </td>
</tr>
<?php
 }
?>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4" >
  <tr>
    <td class="tdBorder1">
    <input type=button class="btn" onclick=selectAll(document.aa) value="ȫѡ">
    <input type=button class="btn" onClick=selectOther(document.aa) value="����">
    <input type="submit" class="btn" value="ɾ��ѡ��"onclick="return window.confirm('ȷ������ɾ����Ա?')"></td>
    <td align="right" class="tdBorder1">
    <link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?>
    </td>
  </tr>
</table>
<script>
function selectAll(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox")
obj.elements[i].checked = true;
}
function selectOther(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox" )
{
if(!obj.elements[i].checked)
obj.elements[i].checked = true;
else
obj.elements[i].checked = false;

}
}
</script>
</form>
</body>
</html>