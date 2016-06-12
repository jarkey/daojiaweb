<?php
/*****************************/
/*{发送时间}  时间
 {收件人姓名}   发给谁
 {点击退订}    点击退订

*/
//$host_name='http://192.168.1.108:88/cms';    //域名，退订邮件和判断打开
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); //下载的文件必须放在该文件所在目录

$mail_title=$_POST['mail_title'];   //邮件标题

date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d H:i:s');     //获取当前时间

$mail_content0 = stripslashes( $_POST['FCKeditor1'] ) ; //邮件内容
$mail_content0 = str_replace("{发送时间}",$times,$mail_content0);  //替换时间


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

/***********************/

$sql4="insert into gplat_mailLog (times,mail_title,mail_content) values ('".$times."','".$mail_title."','".$mail_content."')";
$result4=mysql_query($sql4);   // 把邮件内容写进数据库
$mail_id=mysql_insert_id();  //取得mail ID

if ($_SESSION['mail_class_check']) //传递数组
{
	$mail_class_check=$_SESSION['mail_class_check'];
        unset($_SESSION['mail_class_check']);
    
	for ($i=0;$i<count($mail_class_check);$i++)
	{
	$fid.=' fid='.$mail_class_check[$i].' or';
}
   
	$num=strlen($fid)-2;

	$fid=substr($fid,0,$num);
	
		$sql="select * from gplat_mail_add where $fid and mail_exit=0";
		
		$result=mysql_query($sql);
		while ($mail_add=mysql_fetch_assoc($result))
		{
			$mailsto=$mail_add['mail'];
			$mail_user=$mail_add['user'];
			$mail_content2 = str_replace("{收件人姓名}",$mail_user,$mail_content0);    // 替换收件人姓名
			$mail_exit='<a href='.$host_name.'/mail_exit.php?mail_name='.$mailsto.' target=_biank>点击退订</a>';
$mail_content2 = str_replace("{点击退订}",$mail_exit,$mail_content2);  //替换 点击退订
			
$ifopen='<img width=0 height=0 src='.$host_name.'/ifopen.php?mail_id='."$mail_id".'&mail_name='."$mailsto".'>';
$mail_content =$mail_content2.$ifopen;
		include('../../inc/mail.inc.php');  //应用类配置
			
if(!$mail->Send())
{
	 $success=0;
 echo "邮件发送失败. <p>";
 echo "错误原因: " . $mail->ErrorInfo;
 exit;

}else {
	 $success=1;
	 echo '<meta http-equiv="refresh" content="4; url=mail_ok.php"/>';
}
//将接受邮件的用户资料写进数据库
$ifopen=0;
$sql1="insert into gplat_mailToLog (mail_id,success,ifopen,user,mail_add) values ('".$mail_id."','".$success."','".$ifopen."','".$mail_user."','".$mailsto."')";
$result1=mysql_query($sql1);
		}	
			 
}

?>

<?php   //如果是复选用户就跑下面
if ($_SESSION['user_check'])
{
	$mails=$_SESSION['user_check'];
unset($_SESSION['user_check']);
$num=count($mails);
for ($i=0;$i<$num;$i++)
{
	//echo $mails[$i];
list($mail_user,$mailsto)=split('[:]',$mails[$i]);	
$mail_content1 = str_replace("{收件人姓名}",$mail_user,$mail_content0);    // 替换收件人姓名

$mail_exit='<a href='.$host_name.'/mail_exit.php?mail_name='.$mailsto.' target=_biank>点击退订</a>';
//echo"$mail_exit";

$mail_content1 = str_replace("{点击退订}",$mail_exit,$mail_content1);  //替换 点击退订

$ifopen='<img width=0 height=0 src='.$host_name.'/ifopen.php?mail_id='."$mail_id".'&mail_name='."$mailsto".'>';
$mail_content =$mail_content1.$ifopen;
include('../../inc/mail.inc.php');  //应用类配置
if(!$mail->Send())
{
 echo "邮件发送失败. <p>";
 echo "错误原因: " . $mail->ErrorInfo;
 exit;
}
echo '<meta http-equiv="refresh" content="4; url=mail_ok.php"/>';

$success=1;   //将接受邮件的用户资料写进数据库
$ifopen=0;
$sql2="insert into gplat_mailToLog (mail_id,success,ifopen,user,mail_add) values ('".$mail_id."','".$success."','".$ifopen."','".$mail_user."','".$mailsto."')";
$result2=mysql_query($sql2);
}
}
?>


