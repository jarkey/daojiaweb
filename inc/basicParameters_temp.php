<?php
include('softInfo.php');                //����汾����

//������������
define("GUEST_CLOTHING","{GUEST_CLOTHING}");   //��վ�ͷ�
define("NOTICE_MAIL_NAME","{NOTICE_MAIL_NAME}");   //�����ʼ�������
define("NOTICE_MAIL_URL","{NOTICE_MAIL_URL}");   //�����ʼ��Ĳ鿴������ַ
define("WEB_TITLE","{WEB_TITLE}");   //��վ����
define("WENDA_VIEW_NUM","{WENDA_VIEW_NUM}");   // �����ʴ�ÿҳ��ʾ�ļ�¼��
define("NEWS_VIEW_NUM","{NEWS_VIEW_NUM}");  //��������ÿҳ����ʵ��Ŀ
define("TEMPLATES","{TEMPLATES}");  //ģ��Ŀ¼
define("MEMBERNOLOGINPIC",'<a href="user_login.php"><img src="../templates/'.TEMPLATES.'images/userNotice.gif" style="margin-left:200px; margin-top:100px;" border="0" alt="�����¼" /></a>');  //��Աδ��¼ʱ������ͼƬ
define("DOWNLOADLOGINPIC",'<a href="user_login.php"><img src="../templates/'.TEMPLATES.'images/downloadNotice.gif" style="margin-left:200px; margin-top:100px;" border="0" alt="�����¼" /></a>');  //��������ʱ����Աδ��¼ʱ������ͼƬ
define("CURRENCY","Ԫ");  //���ҵ�λ

//������������
$faq_fid={faq_fid};   //���������fid
$faq_classid={faq_classid};   //�����������Ĭ����ʾ��id
$faq_name='{faq_name}';   //�����������Ĭ����ʾ����
$faq_timeView={faq_timeView};   //��������ʱ����ʾ,1-��ʾ

//��Ա����
$memberNews_timeView={memberNews_timeView};   //��Ա��̬ʱ����ʾ,1-��ʾ
$memberPointFree={memberPointFree};   //��Աע�����͵Ļ���
$royaltyPercentage={royaltyPercentage};   //�Ƽ�����ɱ���

//SEO�Ż�
$head_keywords='{keywords}';   //keywords
$head_description='{description}';   //description
$head_copyright='{copyright}';   //copyright
$shopx8UrlRewite={shopx8UrlRewite};  //�Ƿ�α��̬��0-��,1-��

//�������
$index_product_num={noticeWindowView};    //��ҳ��ʾ��Ʒ����


//��λ
$currency="Ԫ";    //���ҵ�λ
$productUnits="��";    //��Ʒ��λ
?>