<?php
/*****************************/
/*{����ʱ��}  ʱ��
 {�ռ�������}   ����˭
 {����˶�}    ����˶�

*/
//$host_name='http://192.168.1.108:88/cms';    //�������˶��ʼ����жϴ�
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); //���ص��ļ�������ڸ��ļ�����Ŀ¼

$mail_title=$_POST['mail_title'];   //�ʼ�����

date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d H:i:s');     //��ȡ��ǰʱ��

$mail_content0 = stripslashes( $_POST['FCKeditor1'] ) ; //�ʼ�����
$mail_content0 = str_replace("{����ʱ��}",$times,$mail_content0);  //�滻ʱ��


/***********�����ݿ���ȡ����������************/
$id=1;
$sql5="select * from gplat_mail_admin where id=".$id;
$result5=mysql_query($sql5);
$date5=mysql_fetch_assoc($result5);
$host=$date5['host'];
$username=$date5['username'];
$pass=$date5['pass'];
$email=$date5['email'];
$fromname=$date5['fromname'];
$host_name=$date5['host_name'];  //�������˶��ʼ����жϴ�

/***********************/

$sql4="insert into gplat_mailLog (times,mail_title,mail_content) values ('".$times."','".$mail_title."','".$mail_content."')";
$result4=mysql_query($sql4);   // ���ʼ�����д�����ݿ�
$mail_id=mysql_insert_id();  //ȡ��mail ID

if ($_SESSION['mail_class_check']) //��������
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
			$mail_content2 = str_replace("{�ռ�������}",$mail_user,$mail_content0);    // �滻�ռ�������
			$mail_exit='<a href='.$host_name.'/mail_exit.php?mail_name='.$mailsto.' target=_biank>����˶�</a>';
$mail_content2 = str_replace("{����˶�}",$mail_exit,$mail_content2);  //�滻 ����˶�
			
$ifopen='<img width=0 height=0 src='.$host_name.'/ifopen.php?mail_id='."$mail_id".'&mail_name='."$mailsto".'>';
$mail_content =$mail_content2.$ifopen;
		include('../../inc/mail.inc.php');  //Ӧ��������
			
if(!$mail->Send())
{
	 $success=0;
 echo "�ʼ�����ʧ��. <p>";
 echo "����ԭ��: " . $mail->ErrorInfo;
 exit;

}else {
	 $success=1;
	 echo '<meta http-equiv="refresh" content="4; url=mail_ok.php"/>';
}
//�������ʼ����û�����д�����ݿ�
$ifopen=0;
$sql1="insert into gplat_mailToLog (mail_id,success,ifopen,user,mail_add) values ('".$mail_id."','".$success."','".$ifopen."','".$mail_user."','".$mailsto."')";
$result1=mysql_query($sql1);
		}	
			 
}

?>

<?php   //����Ǹ�ѡ�û���������
if ($_SESSION['user_check'])
{
	$mails=$_SESSION['user_check'];
unset($_SESSION['user_check']);
$num=count($mails);
for ($i=0;$i<$num;$i++)
{
	//echo $mails[$i];
list($mail_user,$mailsto)=split('[:]',$mails[$i]);	
$mail_content1 = str_replace("{�ռ�������}",$mail_user,$mail_content0);    // �滻�ռ�������

$mail_exit='<a href='.$host_name.'/mail_exit.php?mail_name='.$mailsto.' target=_biank>����˶�</a>';
//echo"$mail_exit";

$mail_content1 = str_replace("{����˶�}",$mail_exit,$mail_content1);  //�滻 ����˶�

$ifopen='<img width=0 height=0 src='.$host_name.'/ifopen.php?mail_id='."$mail_id".'&mail_name='."$mailsto".'>';
$mail_content =$mail_content1.$ifopen;
include('../../inc/mail.inc.php');  //Ӧ��������
if(!$mail->Send())
{
 echo "�ʼ�����ʧ��. <p>";
 echo "����ԭ��: " . $mail->ErrorInfo;
 exit;
}
echo '<meta http-equiv="refresh" content="4; url=mail_ok.php"/>';

$success=1;   //�������ʼ����û�����д�����ݿ�
$ifopen=0;
$sql2="insert into gplat_mailToLog (mail_id,success,ifopen,user,mail_add) values ('".$mail_id."','".$success."','".$ifopen."','".$mail_user."','".$mailsto."')";
$result2=mysql_query($sql2);
}
}
?>


