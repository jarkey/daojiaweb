<?php


$mail = new PHPMailer(); //建立邮件发送类

$mail->IsSMTP(); // 使用SMTP方式发送
$mail->Host = "$host"; // 您的企业邮局域名
$mail->SMTPAuth = true; // 启用SMTP验证功能
$mail->Username = "$username"; // 邮局用户名(请填写完整的email地址)
$mail->Password = "$pass"; // 邮局密码

$mail->From = "$email"; //邮件发送者email地址
$mail->FromName = "$fromname";  // 发送者公司名称
$mail->AddAddress("$mailsto","$mail_user"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//$mail->AddReplyTo("284115757qq.com", "phper"); 回复地址

//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
$mail->Subject = $mail_title; //邮件标题
$mail->Body = $mail_content; //邮件内容
$mail->AltBody = "<meta http-equiv=Content-Type content=text/html; charset=GB2312>"; //附加信息，可以省略
?>