<?php


$mail = new PHPMailer(); //�����ʼ�������

$mail->IsSMTP(); // ʹ��SMTP��ʽ����
$mail->Host = "$host"; // ������ҵ�ʾ�����
$mail->SMTPAuth = true; // ����SMTP��֤����
$mail->Username = "$username"; // �ʾ��û���(����д������email��ַ)
$mail->Password = "$pass"; // �ʾ�����

$mail->From = "$email"; //�ʼ�������email��ַ
$mail->FromName = "$fromname";  // �����߹�˾����
$mail->AddAddress("$mailsto","$mail_user"); //�ռ��˵�ַ�������滻���κ���Ҫ�����ʼ���email����,��ʽ��AddAddress("�ռ���email","�ռ�������")
//$mail->AddReplyTo("284115757qq.com", "phper"); �ظ���ַ

//$mail->AddAttachment("/var/tmp/file.tar.gz"); // ��Ӹ���
$mail->IsHTML(true); // set email format to HTML //�Ƿ�ʹ��HTML��ʽ
$mail->Subject = $mail_title; //�ʼ�����
$mail->Body = $mail_content; //�ʼ�����
$mail->AltBody = "<meta http-equiv=Content-Type content=text/html; charset=GB2312>"; //������Ϣ������ʡ��
?>