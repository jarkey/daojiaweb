<?php
if($_SESSION['adminLogin']=='ok')
{	

    echo '<script>window.location.href="main.php";</script>';
}
?>
<?php
include('../inc/config.inc.php'); 
include('../inc/softInfo.php'); 
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
			 $_SESSION['groupname']=$data_g['name'];  //�û�������
			 $_SESSION['adminLogin']='ok';
				date_default_timezone_set('Asia/Shanghai');// �������ͺ��ˣ������˺ü���
				$time=date('Y:m:d H:i:s');
				$sql_time="update gplat_member_info set lastlogintime='$time' where userid=".$data['userid'];
				$result_time=mysql_query($sql_time);
		
		}else {
			ExitAgree('�����ǹ���Ա����');
	}
	
   
    
   //$agree=$_SESSION['name'].'��ӭ��';
   //ExitAgree('�ɹ���½��̨','admin_loginOk.php');
   /*echo'<script>window.parent.frames.lower_left.location.reload();</script>';*/
   echo '<script>window.location.href="main.php";</script>';
   exit;
}else {
	
	ExitAgree('�����ǹ���Ա');
}
}else { ExitAgree('�û��������벻��Ϊ�գ���'); }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?=GPLAT_NAME?>�����̵�ϵͳ</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="css/StyleSheet1.css" type=text/css rel=stylesheet>
</HEAD>
<BODY class=bg_color scroll=no>

<DIV class=login_bg_div>
<DIV class=login_bg_div2>
<DIV style="FLOAT: left">
<MARQUEE onmouseover=this.stop() onmouseout=this.start() scrollAmount=5 scrollDelay=100 width="80%">��ܰ��ʾ����̨ʹ�ã���֤��ȫ��</MARQUEE></DIV>
<DIV class=loginlink><A onFocus="this.blur();" href="http://www.dmooo.com" target="_blank">�ٷ���վ</A> 
</DIV></DIV>

<form action="" method="POST" style="margin:0px;">
  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
    <TR height=50>
      <TD class=version vAlign=bottom align=right width=470><SPAN id=lblVersion><?=GPLAT_VERSION?></SPAN> </TD></TR>
    <TR>
      <TD>
        <TABLE cellSpacing=0 cellPadding=3 width=500 align=right border=0>
          <TR>
            <TD align=left width=100 colSpan=3 height=10>&nbsp;</TD></TR>
          <TR class=paragraph1>
            <TD align=right width=100 height=40>�û�����</TD>
            <TD class=input_link align=middle width=180>&nbsp;<INPUT id=name class="input_bg_style" maxLength=22 name=name>
              <span class="tdBorder1">
              <input type="hidden" name="admin_login" value="1">
              </span></TD>
            <TD vAlign=top align=left width=100></TD></TR>
          <TR class=paragraph1>
            <TD align=right width=100 height=40>��&nbsp; �룺</TD>
            <TD class=input_link align=middle width=180>&nbsp;<INPUT id=pass class="input_bg_style" type=password maxLength=22 name=pass> </TD>
            <TD vAlign=top align=left></TD></TR>
          <TR class=paragraph1>
            <TD vAlign=center align=right width=100 height=40>��֤�룺</TD>
            <TD class=input_link align=middle width=180>&nbsp;<INPUT id=authimg class="input_bg_style"  name=authimg autocomplete="off"> </TD>
            <TD align=left>  </TD></TR>
          <TR class=paragraph1>
            <TD vAlign=center align=right height=30>&nbsp;</TD>
            <TD align=middle>
               <script language="JavaScript">
  function reloadcode(){
  var verify=document.getElementById('safecode');
  verify.setAttribute('src','../inc/authimg.php?'+Math.random());
  }
  </script>
  <img src="../inc/authimg.php" alt="���ˢ����֤��" name="safecode" width="150" height="42" border="0" id="safecode" onClick="reloadcode()" />
            </TD>
            <TD align=left>&nbsp;</TD>
          </TR>
          <TR>
            <TD width=100 colSpan=3 height=10></TD></TR>
          <TR>
            <TD vAlign=top align=left width=100>&nbsp;</TD>
            <TD align=right width=180><INPUT name=btnLogin type=submit class=login id=btnLogin style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" value=" "> 
            </TD>
            <TD vAlign=top align=left width=230>&nbsp;</TD></TR>
          <TR>
            <TD vAlign=top align=left>&nbsp;</TD>
            <TD align=left colSpan=2 height=20><SPAN id=lblMsg style="COLOR: red; BACKGROUND-COLOR: transparent"></SPAN></TD></TR>
          <TR>
            <TD class=hg03 vAlign=top align=center colSpan=3 height=16>Ϊ�������õ�ʹ�ã�����ʹ��IE6���ϡ��ֱ���Ϊ1024*768�������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</TD></TR>
          <TR>
        <TD class=copyju align=left colSpan=3 height=30>��Ȩ����<SPAN class=copyhao> &copy; </SPAN>2016 <a href="http://www.dmooo.com" target="_blank"><font style="color:#333">�Ͼ���ī����Ƽ����޹�˾</font></a></TD></TR></TABLE></TD></TR></TABLE>
</form>   
      
</DIV>

</BODY></HTML>
