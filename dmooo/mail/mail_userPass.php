<?php
//���ص��ļ�������ڸ��ļ�����Ŀ¼


//date_default_timezone_set('Asia/Shanghai'); 
//$times=date('Y-m-d H:i:s'); //��ȡ��ǰʱ��



/****���ͺ����� ���⣬���ݣ��ʼ���ַ������������*******************/
function mail_userPass($mail_title='�����һ�',$mail_content,$mailsto,$mail_user){

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

/********���ݿ���ȡ����������***************/

include('../../inc/mail.inc.php');  //Ӧ��������
			
if(!$mail->Send())
{
	 $success=0;
 //echo "�ʼ�����ʧ��. <p>";
 //echo "����ԭ��: " . $mail->ErrorInfo;
 
 //exit;

}else {
	 $success=1;
	// echo "�ʼ����ͳɹ�";
}
return $success;
}
/******�����ʼ���������***********/
?>