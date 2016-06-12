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
	$msg="<script language=javascript>alert('您输入的用户名和email不匹配，请重新输入')</script>"; 
	$msg=iconv('GBK','UTF-8',$msg); 
	echo"$msg"; 
	exit;
}

//生成随机数
$text_array=array(1,2,3,4,5,6,7,8,9,0,a,b,c,d,e,f,g,e,h,y,g,y,m,q,w,r,t,u,i,o,p,s,j,k,l,z,x,v,n);
shuffle($text_array);
for($i=0;$i<6;$i++)
{
	$texe.=$text_array[$i];   //新密码
}
mailContent(2);
/*$mail_content=$texe;

$mail_title='密码找回';*/


$success=mail_userPass($mail_title,$mail_content,$email,$username);


if ($success==0) {
$msg="<script language=javascript>alert('密码找回失败，请联系管理员:)')</script>";
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
	$msg="<script language=javascript>alert('新密码已经发送到您的邮箱，请查收:)')</script>";
	$msg=iconv('GBK','UTF-8',$msg); 
	echo"$msg"; 
}
}

?>
