<?php
include('softInfo.php');                //软件版本参数

//基本参数设置
define("GUEST_CLOTHING","{GUEST_CLOTHING}");   //网站客服
define("NOTICE_MAIL_NAME","{NOTICE_MAIL_NAME}");   //提醒邮件的名称
define("NOTICE_MAIL_URL","{NOTICE_MAIL_URL}");   //提醒邮件的查看连接网址
define("WEB_TITLE","{WEB_TITLE}");   //网站标题
define("WENDA_VIEW_NUM","{WENDA_VIEW_NUM}");   // 定义问答每页显示的记录数
define("NEWS_VIEW_NUM","{NEWS_VIEW_NUM}");  //定义新闻每页的现实数目
define("TEMPLATES","{TEMPLATES}");  //模板目录
define("MEMBERNOLOGINPIC",'<a href="user_login.php"><img src="../templates/'.TEMPLATES.'images/userNotice.gif" style="margin-left:200px; margin-top:100px;" border="0" alt="点击登录" /></a>');  //会员未登录时的提醒图片
define("DOWNLOADLOGINPIC",'<a href="user_login.php"><img src="../templates/'.TEMPLATES.'images/downloadNotice.gif" style="margin-left:200px; margin-top:100px;" border="0" alt="点击登录" /></a>');  //资料下载时，会员未登录时的提醒图片
define("CURRENCY","元");  //货币单位

//常见问题设置
$faq_fid={faq_fid};   //常见问题的fid
$faq_classid={faq_classid};   //点击常见问题默认显示的id
$faq_name='{faq_name}';   //点击常见问题默认显示标题
$faq_timeView={faq_timeView};   //常见问题时间显示,1-显示

//会员设置
$memberNews_timeView={memberNews_timeView};   //会员动态时间显示,1-显示
$memberPointFree={memberPointFree};   //会员注册赠送的积分
$royaltyPercentage={royaltyPercentage};   //推荐人提成比例

//SEO优化
$head_keywords='{keywords}';   //keywords
$head_description='{description}';   //description
$head_copyright='{copyright}';   //copyright
$shopx8UrlRewite={shopx8UrlRewite};  //是否伪静态，0-否,1-是

//广告设置
$index_product_num={noticeWindowView};    //首页显示商品数量


//单位
$currency="元";    //货币单位
$productUnits="套";    //产品单位
?>