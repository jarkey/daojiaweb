<?php
include('../inc/config.inc.php');
if ($_POST['username']) {
	$_SESSION['username_search']=$_POST['username'];
}
if (empty($_SESSION['username_search'])) {
	echo("<script language=javascript>alert('������������Ϊ��');window.history.go(-1)</script>");
	exit;
}

if ($_GET['delId']) {
	$delId=$_GET['delId'];
	$sql_del="delete from gplat_member where userid='$delId'";
	$result_del=mysql_query($sql_del);
	$sql_del1="delete from gplat_member_detail where userid='$delId'";
	$result_del=mysql_query($sql_del1);
	$sql_del2="delete from gplat_member_info where userid='$delId'";
	$result_del=mysql_query($sql_del2);
	echo'<meta http-equiv="refresh" content="0; url='.$url_str.'"/>';
	exit;
}
if ($_GET['disId']) {
	$disId=$_GET['disId'];
	$disNum=$_GET['disNum'];
	$sql_dis="update gplat_member SET disabled='$disNum' where userid='$disId'";
	$result_dis=mysql_query($sql_dis);
	echo'<meta http-equiv="refresh" content="0; url='.$url_str.'"/>';
	exit;
}
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
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
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td background="../images/topBackground.gif">&nbsp;��Ա����ϵͳ -&gt; ��Ա����</td>
  </tr>
</table><br>

<form action="admin_user.php"  method="POST">
  <TABLE cellSpacing=0 cellPadding=0 width=90% align=center border=0>
    <TBODY>
      <TR>
        <TD width="1%" background="../images/titlebar_left.gif">&nbsp;</TD>
        <TD width="100%" 
    background=../images/windowbar_background.gif><img src="../images/nofollow.gif" width="15" height="11">&equiv;&equiv;&equiv; <font color="#0066FF"><strong>��Ա����</strong></font> &equiv;&equiv;&equiv;&nbsp;</TD>
        <TD><IMG src="../images/titlebar_right.gif" width="35" height="22" 
  border=0></TD>
      </TR>
    </TBODY>
  </TABLE>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4" >
<tr align="center">
<td class="tdBorder1 tdBg1">ѡ��</td>
<td class="tdBorder1 tdBg1">�û���</td>
<td class="tdBorder1 tdBg1">��Ա��</td>
<td class="tdBorder1 tdBg1">��Աģ��</td>
<td class="tdBorder1 tdBg1">�ʽ�</td>
<td class="tdBorder1 tdBg1">����</td>
<td class="tdBorder1 tdBg1" >�����¼</td>
<td class="tdBorder1 tdBg1">����</td>

</tr>
<?php
$username_search=$_SESSION['username_search'];
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=10; //ÿҳ��ʾ20?
$sql_num="select userid from gplat_member where username LIKE '%$username_search%'";
$result_num=mysql_query($sql_num);
$num_all=mysql_num_rows($result_num); //��ѯ��?�ļ�¼?
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
$_SESSION['url']=$url.'?'.$_SERVER['QUERY_STRING']; //��ȡ��ǰ��ҳ�漰��׺

$sql="select * from gplat_member where username like '%$username_search%' order by userid desc limit $page_one,$num";
$result=mysql_query($sql);

while($date=mysql_fetch_assoc($result))
 {
   $user=$date['username'];
   $id=$date['userid'];
   $point=$date['point'];
   $groupid=$date['groupid'];
   if ($groupid!=1) {
   	
   	   if ($date['disabled']==0)
	  	{
	  	$disabled='<a href='.$filename.'?disId='.$id.'&disNum=1 title="����"><img src="../img/Disable.gif" border="0"></a></a>';
	  	}else
	  	{
	  	$disabled='<a href='.$filename.'?disId='.$id.'&disNum=0 title="����"><img src="../img/Enabled.gif" border="0"></a></a>';	
	  	}
   	   $del='<img src="../img/del.gif" width="13" height="13" alt="ɾ��" border="0px" onClick="myConfirm('.$id.')">';
   	   
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
  <td class="tdBorder1"> <?=$groupName?></td>
  <td class="tdBorder1" ><?=$time_up?>
    &nbsp;</td>
  <td class="tdBorder1">&nbsp; </td>
  <td class="tdBorder1">  <?=$point?>
    &nbsp;</td>
  <td class="tdBorder1"><?=$lastlogintime?></td>
  <td class="tdBorder1"><a href="register_user.php?userId=<?=$id?>" title="�޸�"><img src="../images/xiug.gif" border="0"></a>&nbsp;&nbsp;<?=$del?>&nbsp;&nbsp;<?=$disabled?>&nbsp;&nbsp;<a href="note.php?userId=<?=$id?>" title="��ע"><img src="../images/Remarks.gif" border="0"></a></td>
</tr>
<?php
 }
?>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4" >
  <tr>
    <td class="tdBorder1"><input type="submit" class="button1" value="ɾ��ѡ��"></td>
    <td align="right" class="tdBorder1">
    <link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<?php
include ( "../../inc/lib/BluePage.class.php" ) ;
$pBP = new BluePage ;
$intCount    = $num_all ; // �����¼����Ϊ1000
$intShowNum  = $num ;   // ÿҳ��ʾ10
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;
$strHtml   = $pBP->getHTML( $aPDatas ) ; 
echo"$strHtml";
?>
    </td>
  </tr>
</table>
<TABLE height=20 cellSpacing=0 cellPadding=0 width=90% align=center border=0>
  <TBODY>
    <TR>
      <TD><IMG src="../images/windowbar_reversed_left.gif" width="9" height="22" 
border=0></TD>
      <TD width="100%" 
    background=../images/windowbar_reversed_background.gif></TD>
      <TD><IMG src="../images/windowbar_reversed_right.gif" width="9" height="22" 
    border=0></TD>
    </TR>
  </TBODY>
</TABLE>
</form>
</body>
</html>