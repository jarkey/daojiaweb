<?php
include('softInfo.php');                //����汾����

//������������
define("GUEST_CLOTHING","�ٷ��ظ�");   //��վ�ͷ�
define("NOTICE_MAIL_NAME","������������Ƽ����޹�˾");   //�����ʼ�������
define("NOTICE_MAIL_URL","http://www.getitohome.com");   //�����ʼ��Ĳ鿴������ַ
define("WEB_TITLE","������������Ƽ����޹�˾");   //��վ����
define("WENDA_VIEW_NUM","7");   // �����ʴ�ÿҳ��ʾ�ļ�¼��
define("NEWS_VIEW_NUM","10");  //��������ÿҳ����ʵ��Ŀ
define("TEMPLATES","default/");  //ģ��Ŀ¼
define("MEMBERNOLOGINPIC",'<a href="user_login.php"><img src="../templates/'.TEMPLATES.'images/userNotice.gif" style="margin-left:200px; margin-top:100px;" border="0" alt="�����¼" /></a>');  //��Աδ��¼ʱ������ͼƬ
define("DOWNLOADLOGINPIC",'<a href="user_login.php"><img src="../templates/'.TEMPLATES.'images/downloadNotice.gif" style="margin-left:200px; margin-top:100px;" border="0" alt="�����¼" /></a>');  //��������ʱ����Աδ��¼ʱ������ͼƬ
define("CURRENCY","Ԫ");  //���ҵ�λ

//������������
$faq_fid=9;   //���������fid
$faq_classid=19;   //�����������Ĭ����ʾ��id
$faq_name='����ӡˢ��¼����';   //�����������Ĭ����ʾ����
$faq_timeView=0;   //��������ʱ����ʾ,1-��ʾ

//��Ա����
$memberNews_timeView=1;   //��Ա��̬ʱ����ʾ,1-��ʾ
$memberPointFree=50;   //��Աע�����͵Ļ���
$royaltyPercentage=0.1;   //�Ƽ�����ɱ���

//SEO�Ż�
$head_keywords='������������Ƽ����޹�˾';   //keywords
$head_description='������������Ƽ����޹�˾';   //description
$head_copyright='������������Ƽ����޹�˾';   //copyright
$shopx8UrlRewite=0;  //�Ƿ�α��̬��0-��,1-��

//�������
$index_product_num=12;    //��ҳ��ʾ��Ʒ����


//��λ
$currency="Ԫ";    //���ҵ�λ
$productUnits="��";    //��Ʒ��λ
?>