<?php
/********ϵͳ�Զ������ʼ����ݹ���******************/

//�������ʻظ��������ʼ�����
if($mail_num==1){
  $mail_title=NOTICE_MAIL_NAME.'-����ظ�֪ͨ';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;��������:'.$title.'�ѻظ����뼰ʱ�鿴<a href='.NOTICE_MAIL_URL.'wenwen_view.php?id='.$_GET['fid'].' target="_blank">�������鿴</a>';
}
		
//�����һص������ʼ�����
if($mail_num==2){
  //��Ա��¼��ַ
  $userLoginUrl="<a href=".NOTICE_MAIL_URL."user_login.php".">".NOTICE_MAIL_URL."user_login.php"."</a>";
  $mail_title=NOTICE_MAIL_NAME.'-�����һ�';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;������������:'.$texe."����ֱ�ӵ����ַ��¼:".$userLoginUrl."��<br>&nbsp;&nbsp;&nbsp;&nbsp;��¼�ɹ���Ϊ�˷�����䣬��������޸ĳ�����Ϥ�����룺��";
}
		
		
//�ʼ����ĳɹ��������ʼ�����
if($mail_num==3){
  $mail_title=NOTICE_MAIL_NAME.'-�ʼ����ĳɹ�֪ͨ';
  $mail_content=NOTICE_MAIL_NAME.'��ϲ�����ʼ����ĳɹ�';
}

//���������ʼ�����
if($mail_num==4){
  $mail_title=NOTICE_MAIL_NAME.'-��������֪ͨ';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>���Ķ���<b>��'.$data['goodsname'].'��'.$status_str.'</b>���뼰ʱ�鿴��&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_order_admin.php?orderid='.$_GET['orderid'].' target="_blank">�������鿴>></a>'; 
}

//��̨��Աע��������ʼ�����
if($mail_num==5){
  $mail_title=NOTICE_MAIL_NAME.'-��������������Ϊ����ͨ�����Ա';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;ȫ�µ�<a href='.NOTICE_MAIL_URL.' target="_blank">���߷���ƽ̨</a>�Ѿ���ʽ���ߣ�Ϊ���ṩ����ݡ���רҵ������������߷���<br>';
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;�������ǵ��Ͽͻ�����Ϊ����ͨ�����Ա��<a href='.NOTICE_MAIL_URL.'user_login.php target="_blank">������¼�鿴>></a><br>'; 
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;���ĳ�ʼ�ʻ���Ϣ��<br>&nbsp;&nbsp;&nbsp;&nbsp;�û�����'.$username."<br>&nbsp;&nbsp;&nbsp;&nbsp;���룺".$password_temp;
}

//ǰ̨��Աע��������ʼ�����
if($mail_num==6){
  $mail_title=NOTICE_MAIL_NAME.'-��ϲ�������ѳɹ�ע���Ա,��ѻ���'.$num.'���֣�';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;ȫ�µ�<a href='.NOTICE_MAIL_URL.' target="_blank">���߷���ƽ̨</a>�Ѿ���ʽ���ߣ�Ϊ���ṩ����ݡ���רҵ������������߷���<br>';
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;���ǻ���������ÿһ�ݶ��������������ÿһ�η��񣬻�ظ�����ÿһ�����ʡ�<a href='.NOTICE_MAIL_URL.'user_login.php target="_blank">��Ա��¼����>></a><br>'; 
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;�����ʻ���Ϣ��<br>&nbsp;&nbsp;&nbsp;&nbsp;�û�����'.$username."<br>&nbsp;&nbsp;&nbsp;&nbsp;���룺".$password_temp;
}

//���߷��������ʼ�����
if($mail_num==7){
  $mail_title=NOTICE_MAIL_NAME.'-�ۺ������֪ͨ';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;���ύ�ķ���<b>��'.$data['submitTitle'].'��'.$status_str.'</b>���뼰ʱ�鿴��&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_service.php target="_blank">�������鿴>></a>'; 
}

//����Ͷ�������ʼ�����
if($mail_num==8){
  $mail_title=NOTICE_MAIL_NAME.'-����Ͷ�ߴ���֪ͨ';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;���ύ��Ͷ��<b>��'.$data['submitTitle'].'��'.$status_str.'</b>���뼰ʱ�鿴��&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_tousu.php target="_blank">�������鿴>></a>'; 
}

//��Ա���ָ��������ʼ�����
if($mail_num==9){
  $mail_title=NOTICE_MAIL_NAME.'-��Ա���ֱ䶯֪ͨ';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;���Ļ�������<b style="color:red;">'.$num.'</b>�㣬�뼰ʱ�鿴��&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_point.php target="_blank">�������鿴>></a>'; 
}

//��Ա�ʻ����������ʼ�����
if($mail_num==10){
  $mail_title=NOTICE_MAIL_NAME.'-��Ա�ʽ��ʻ��䶯֪ͨ';
  $mail_content=NOTICE_MAIL_NAME.'��ܰ����:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;�����ʽ��ʻ�����<b style="color:red;">'.$num.'</b>Ԫ���뼰ʱ�鿴��&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_amount.php target="_blank">�������鿴>></a>'; 
}

//�û��ػ����ʼ������������һػ�Ա�ʻ���ʾ
  $mail_content=$mail_content.'<br><br>&nbsp;&nbsp;&nbsp;&nbsp;��������ǵû�Ա�ʻ�����ͨ���������� <a href="'.NOTICE_MAIL_URL.'email_userPass.php" target="_blank">�һ�����>></a><br>&nbsp;&nbsp;&nbsp;&nbsp;�û�����'.$username.'&nbsp;&nbsp;&nbsp;&nbsp;���䣺'.$email;
  $mail_content=$mail_content.'<br><br>��ϵ����<br>��ַ��<a href="http://www.cd-make.com" target="_blank">http://www.cd-make.com</a><br>�绰��025-86473972 84679481<br>��ַ���Ͼ�����ɽ��·198����̨���ʴ���1801';  

//��ʽ
  $mail_content='<style type="text/css">
<!--
body {
	font-size: 12px;
	line-height: 20px;
}
-->
</style>'.$mail_content;


?>