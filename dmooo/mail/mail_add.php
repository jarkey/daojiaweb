<?php
include('../../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('mail_userPass.php');

include_once('../../inc/htmlEncode.php');  //�����û�����
if ($_POST['hidden']==2) {
	$fid=1;
	//$user=$_POST['user'];
	$mail=$_POST['mail'];
	
	if(ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9\-\.])+", $mail))    //��֤����
{ 
	
    $user=htmlEncode($user);
	$mail=htmlEncode($mail);
	$sql1="select id from gplat_mail_add where mail='$mail'";
	$result1=mysql_query($sql1);
	$date1=mysql_fetch_assoc($result1);
	if ($date1['id']!=0){   //�ж��ʼ���ַ�Ƿ�������ݿ�
		
	$mail_c="<script language=javascript>alert('������ʼ���ַ�Ѿ����ڣ�����Ҫ�ټ���');</script>";
	$mail_c=iconv('GBK','UTF-8',$mail_c);
	echo"$mail_c";
   }else{
	$sql="insert into gplat_mail_add (fid,mail) values ('$fid','$mail')";
	$result=mysql_query($sql) or die(mysql_error());
	
	/***************/
	$email=$mail;
	$mail_num=3;
	include('../../inc/mail_content.php');
	$mail_title=NOTICE_MAIL_NAME.'-�ʼ����ĳɹ�֪ͨ';
	$mail_content=NOTICE_MAIL_NAME.'��ϲ�����ʼ����ĳɹ�';
	$username='�𾴵Ŀͻ�';
	$success=mail_userPass($mail_title,$mail_content,$email,$username);
	
	
	/**************/
	$mail_s="<script language=javascript>alert('�����ʼ��ɹ�');</script>";
	$mail_s=iconv('GBK','UTF-8',$mail_s);
	ECHO"$mail_s";
	//exit;
   }
   } else {
   	$mail_m="<script language=javascript>alert('�ʼ���ʽ����');</script>";
	$mail_m=iconv('GBK','UTF-8',$mail_m);
	ECHO"$mail_m";
   	
   }
}
$content='<div style="margin-top:42px; margin-left:20px;"><input type="hidden" name="mail_hidden" value="2">
<input type="text" name="mail_mail"><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="mail_submit" value="����">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="mail_submit" value="ȡ��"></div>';
$content=iconv('GBK','UTF-8',$content); 
echo"$content";
?>
<script type="text/javascript">
     $('input[@name=mail_submit]').click(function (){
       //	alert('�����ʼ��ɹ�aaa'),
      $.ajax(
		{
		type:"POST",
		url:"../admin/mail/mail_add.php",
		dataType:"html",
		data:"user="+$('input[@name=mail_user]').val()+"&mail="+$('input[@name=mail_mail]').val()+"&hidden="+$('input[@name=mail_hidden]').val(), 
			success:function(msg)
			 {
			 	//alert(msg);
				$('#mail_add').html(msg);
			}
			});
 });
</script>