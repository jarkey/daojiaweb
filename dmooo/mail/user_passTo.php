<?php
include('../../inc/config.inc.php');
include('../../inc/mail_content.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('mail_userPass.php');


$username=$_POST['username'];
$email=$_POST['email'];
$sql="select userid from gplat_member where username='$username' and email='$email'";
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$userid=$data['userid'];
if ($userid==0) {
	$msg="<script language=javascript>alert('��������û�����email��ƥ�䣬����������')</script>"; 
	$msg=iconv('GBK','UTF-8',$msg); 
	echo"$msg"; 
	exit;
}

//���������
$text_array=array(1,2,3,4,5,6,7,8,9,0,a,b,c,d,e,f,g,e,h,y,g,y,m,q,w,r,t,u,i,o,p,s,j,k,l,z,x,v,n);
shuffle($text_array);
for($i=0;$i<6;$i++)
{
	$texe.=$text_array[$i];   //������
}
mailContent(2);
/*$mail_content=$texe;

$mail_title='�����һ�';*/


$success=mail_userPass($mail_title,$mail_content,$email,$username);


if ($success==0) {
$msg="<script language=javascript>alert('�����һ�ʧ�ܣ�����ϵ����Ա:)')</script>";
$msg=iconv('GBK','UTF-8',$msg); 
	echo"$msg"; 
	exit;
}
if ($success==1) {
	$mail_content=sha1($texe);
	$sql_pass="update gplat_member set password='$mail_content' where userid='$userid'";
$result_pass=mysql_query($sql_pass);
if ($result_pass!=0)
{
	$msg="<script language=javascript>alert('�������Ѿ����͵��������䣬�����:)')</script>";
	$msg=iconv('GBK','UTF-8',$msg); 
	echo"$msg"; 
}
}

?>
