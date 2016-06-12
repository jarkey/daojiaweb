<?php 
$pageTitle="会员注册";    //当前页标题
include_once("../inc/config.inc.php");
?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<!--自适应手机屏幕-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!--end 自适应手机屏幕-->
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
<script type="text/javascript" src="../js/jQuery/jquery1.2.js"></script>
<script type="text/javascript" src="js/user_register.js"></script>
<script type="text/javascript" src="js/daojishi.js"></script>
<script type="text/javascript" src="js/shoujiyz.js"></script>
</head>
<body>
<span id="content_ajax"  ></span>
<div class="top_w2">
	<div class="back1"><a href="javascript:history.go(-1)">&lt;</a></div>
    会员注册
    <div class="back2"><a href="javascript:history.go(-1)"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper">
  
	<div class="zc">
    	<form action="#" method="get">
        	<table cellpadding="0" cellspacing="0">
            	<tr>
                	<td width="25%">手机号码<span>*</span></td>
                    <td width="75%"><input type="text" name="mobile" id="mobile" class="text_i" /><span id="phoneAjax" class="redTxt1"></span></td>
                </tr>
                <tr>
                	<td>设置密码<span>*</span></td>
                    <td><input type="password" type="password" name="pwd"  class="text_i" /><span id="pwd" class="redTxt1"></span></td>
                </tr>
                <tr>
                	<td>确认密码<span>*</span></td>
                    <td><input type="password" name="pwd1" id="pwd1" class="text_i" /><span id="pwdajax" class="redTxt1"></span></td>
                </tr>
                <tr>
                	<td>验证码<span>*</span></td>
                    <td><input type="text" name="code" class="text_i text_i2" />
                    <input type="button" onClick="phone_ajax();time(this)" value="点击发送" class="yzm_btn"/><span id="authimg" class="redTxt1"></span>
                    </td>
                </tr>
            </table>
            <input type="button" value="注册"  name="submit"  class="zc_btn" />
        </form>
    </div>	
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
