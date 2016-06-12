<?php
/********系统自动发送邮件内容管理******************/

//在线提问回复的提醒邮件发送
if($mail_num==1){
  $mail_title=NOTICE_MAIL_NAME.'-问题回复通知';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;您的问题:'.$title.'已回复，请及时查看<a href='.NOTICE_MAIL_URL.'wenwen_view.php?id='.$_GET['fid'].' target="_blank">点击这里查看</a>';
}
		
//密码找回的提醒邮件发送
if($mail_num==2){
  //会员登录网址
  $userLoginUrl="<a href=".NOTICE_MAIL_URL."user_login.php".">".NOTICE_MAIL_URL."user_login.php"."</a>";
  $mail_title=NOTICE_MAIL_NAME.'-密码找回';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;您的新密码是:'.$texe."，请直接点击网址登录:".$userLoginUrl."。<br>&nbsp;&nbsp;&nbsp;&nbsp;登录成功后，为了方便记忆，请把密码修改成您熟悉的密码：）";
}
		
		
//邮件订阅成功的提醒邮件发送
if($mail_num==3){
  $mail_title=NOTICE_MAIL_NAME.'-邮件订阅成功通知';
  $mail_content=NOTICE_MAIL_NAME.'恭喜您，邮件订阅成功';
}

//订单提醒邮件发送
if($mail_num==4){
  $mail_title=NOTICE_MAIL_NAME.'-订单处理通知';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>您的订单<b>“'.$data['goodsname'].'”'.$status_str.'</b>，请及时查看。&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_order_admin.php?orderid='.$_GET['orderid'].' target="_blank">点击这里查看>></a>'; 
}

//后台会员注册的提醒邮件发送
if($mail_num==5){
  $mail_title=NOTICE_MAIL_NAME.'-提升服务质量，为您开通贵宾会员';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;全新的<a href='.NOTICE_MAIL_URL.' target="_blank">在线服务平台</a>已经正式上线，为您提供更快捷、更专业、更方便的在线服务。<br>';
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;您是我们的老客户，已为您开通贵宾会员，<a href='.NOTICE_MAIL_URL.'user_login.php target="_blank">请点击登录查看>></a><br>'; 
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;您的初始帐户信息：<br>&nbsp;&nbsp;&nbsp;&nbsp;用户名：'.$username."<br>&nbsp;&nbsp;&nbsp;&nbsp;密码：".$password_temp;
}

//前台会员注册的提醒邮件发送
if($mail_num==6){
  $mail_title=NOTICE_MAIL_NAME.'-恭喜您，您已成功注册会员,免费获赠'.$num.'积分！';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;全新的<a href='.NOTICE_MAIL_URL.' target="_blank">在线服务平台</a>已经正式上线，为您提供更快捷、更专业、更方便的在线服务。<br>';
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;我们会用心您的每一份订单，会跟踪您的每一次服务，会回复您的每一个提问。<a href='.NOTICE_MAIL_URL.'user_login.php target="_blank">会员登录请点击>></a><br>'; 
  $mail_content=$mail_content.'&nbsp;&nbsp;&nbsp;&nbsp;您的帐户信息：<br>&nbsp;&nbsp;&nbsp;&nbsp;用户名：'.$username."<br>&nbsp;&nbsp;&nbsp;&nbsp;密码：".$password_temp;
}

//在线服务提醒邮件发送
if($mail_num==7){
  $mail_title=NOTICE_MAIL_NAME.'-售后服务处理通知';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;您提交的服务<b>“'.$data['submitTitle'].'”'.$status_str.'</b>，请及时查看。&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_service.php target="_blank">点击这里查看>></a>'; 
}

//在线投诉提醒邮件发送
if($mail_num==8){
  $mail_title=NOTICE_MAIL_NAME.'-在线投诉处理通知';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;您提交的投诉<b>“'.$data['submitTitle'].'”'.$status_str.'</b>，请及时查看。&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_tousu.php target="_blank">点击这里查看>></a>'; 
}

//会员积分更新提醒邮件发送
if($mail_num==9){
  $mail_title=NOTICE_MAIL_NAME.'-会员积分变动通知';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;您的积分增加<b style="color:red;">'.$num.'</b>点，请及时查看。&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_point.php target="_blank">点击这里查看>></a>'; 
}

//会员帐户更新提醒邮件发送
if($mail_num==10){
  $mail_title=NOTICE_MAIL_NAME.'-会员资金帐户变动通知';
  $mail_content=NOTICE_MAIL_NAME.'温馨提醒:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;您的资金帐户增加<b style="color:red;">'.$num.'</b>元，请及时查看。&nbsp;&nbsp;<a href='.NOTICE_MAIL_URL.'user_amount.php target="_blank">点击这里查看>></a>'; 
}

//用户关怀：邮件内容中增加找回会员帐户提示
  $mail_content=$mail_content.'<br><br>&nbsp;&nbsp;&nbsp;&nbsp;如果您不记得会员帐户，请通过以下资料 <a href="'.NOTICE_MAIL_URL.'email_userPass.php" target="_blank">找回密码>></a><br>&nbsp;&nbsp;&nbsp;&nbsp;用户名：'.$username.'&nbsp;&nbsp;&nbsp;&nbsp;邮箱：'.$email;
  $mail_content=$mail_content.'<br><br>联系我们<br>网址：<a href="http://www.cd-make.com" target="_blank">http://www.cd-make.com</a><br>电话：025-86473972 84679481<br>地址：南京市中山东路198号龙台国际大厦1801';  

//样式
  $mail_content='<style type="text/css">
<!--
body {
	font-size: 12px;
	line-height: 20px;
}
-->
</style>'.$mail_content;


?>