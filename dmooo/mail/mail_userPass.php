<?php
//下载的文件必须放在该文件所在目录


//date_default_timezone_set('Asia/Shanghai'); 
//$times=date('Y-m-d H:i:s'); //获取当前时间



/****发送函数： 标题，内容，邮件地址，收信人姓名*******************/
function mail_userPass($mail_title='密码找回',$mail_content,$mailsto,$mail_user){

/***********从数据库中取出基本参数************/
$id=1;
$sql5="select * from gplat_mail_admin where id=".$id;
$result5=mysql_query($sql5);
$date5=mysql_fetch_assoc($result5);
$host=$date5['host'];
$username=$date5['username'];
$pass=$date5['pass'];
$email=$date5['email'];
$fromname=$date5['fromname'];
$host_name=$date5['host_name'];  //域名，退订邮件和判断打开

/********数据库中取出参数结束***************/

include('../../inc/mail.inc.php');  //应用类配置
			
if(!$mail->Send())
{
	 $success=0;
 //echo "邮件发送失败. <p>";
 //echo "错误原因: " . $mail->ErrorInfo;
 
 //exit;

}else {
	 $success=1;
	// echo "邮件发送成功";
}
return $success;
}
/******发送邮件函数结束***********/
?>