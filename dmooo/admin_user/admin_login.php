<?php
include('../../inc/config.inc.php'); 
include('../../inc/softInfo.php'); 
?>

<?php
if ($_POST['admin_login']==1) {
	

if(!empty($_POST['name']) and !empty($_POST['pass'])){
	
if(!$_POST['pass'] ||!$_POST['authimg'])
{
	ExitAgree('��д������');
	
}
if($_POST['authimg']!=$_SESSION['authimg'])
{
	ExitAgree('��֤�벻��ȷ');
}
$name=$_POST['name'];
$pass=$_POST['pass'];
$pass=trim($pass);
$name=trim($name);
$pass=sha1($pass);
//echo"$pass";
$sql="select * from gplat_member where username='$name' and password='$pass' and groupid =1";
$result=mysql_query($sql);

$result_num=mysql_num_rows($result);
$data=mysql_fetch_assoc($result);
if($result_num==1)
{
	$groupid=$data['groupid'];
	$sql_g="select * from gplat_member_group where allowadmin=1 and groupid='$groupid'";
	
	$result_g=mysql_query($sql_g);
	$result_g_num=mysql_num_rows($result_g);
	$data_g=mysql_fetch_assoc($result_g);
	if ($result_g_num==1) {
		 $_SESSION['permissions']='a'.$data_g['permissions'];  //Ȩ��
	     $_SESSION['adminid']=$data['userid'];
         $_SESSION['adminName']=$data['username'];
	     $_SESSION['groupid']=$data['groupid'];
         $_SESSION['adminLogin']='ok';
		 	date_default_timezone_set('Asia/Shanghai');
            $time=date('Y:m:d H:i:s');
	        $sql_time="update gplat_member_info set lastlogintime='$time' where userid=".$data['userid'];
	        $result_time=mysql_query($sql_time);
	
	}else {
		ExitAgree('�����ǹ���Ա����');
	}
	
   
    
   //$agree=$_SESSION['name'].'��ӭ��';
   //ExitAgree('�ɹ���½��̨','admin_loginOk.php');
   echo'<script>window.parent.frames.lower_left.location.reload();</script>';
   echo'<meta http-equiv="refresh" content="0 url=admin_loginOk.php">';
   exit;
}else {
	
	ExitAgree('�����ǹ���Ա');
}
}else { ExitAgree('�û��������벻��Ϊ�գ���'); }
}
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="" method="POST">
  <table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss4">
  <tr bgcolor="#FFFFFF">
  <td width="100" class="tdBorder1">&nbsp;�û���</td>
  <td class="tdBorder1"><input type="text" name="name">
  <input type="hidden" name="admin_login" value="1">  </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td class="tdBorder1">&nbsp;�� &nbsp;��</td>
  <td class="tdBorder1"><input type="password" name="pass"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td valign="top" class="tdBorder1" style="padding-top:15px;">&nbsp;��֤��</td><td class="tdBorder1"><input type="text" name="authimg">
    <br>
    <br>

   <script language="JavaScript">
function reloadcode(){
var verify=document.getElementById('safecode');
verify.setAttribute('src','../inc/authimg.php?'+Math.random());
}
</script>
<img src="../inc/authimg.php" alt="���ˢ����֤��" name="safecode" width="150" height="42" border="0" id="safecode" onClick="reloadcode()" />&nbsp;&nbsp;&nbsp;���������������ͼ�ػ�һ����֤��</td></tr>

<tr bgcolor="#FFFFFF"><td colspan="2" class="tdBorder1">&nbsp;
  <input type="submit" class="button1" value="��¼"></td></tr>
</table>
</form>
<?php include('../copyright.php'); ?>
</body></html>