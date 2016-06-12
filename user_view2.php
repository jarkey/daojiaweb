<?php 
$pageTitle="首页";    //当前页标题
include_once("inc/config.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>

</head>
<?php require('inc/header.inc.php'); ?>


<?php require('inc/header_s.inc.php'); ?>



<div class="nav_w clearfix">
      <?php require('inc/header_url.php'); ?>
    
      <ul id="nav" style="display:none">
<?php require('inc/left_nav.php'); ?>
	</ul>
 

 
 
 
	<script type="text/javascript">
		jQuery("#nav").slide({ 
				type:"menu", //效果类型
				titCell:".mainCate", // 鼠标触发对象
				targetCell:".subCate", // 效果对象，必须被titCell包含
				delayTime:0, // 效果时间
				triggerTime:0, //鼠标延迟触发时间
				defaultPlay:false,//默认执行
				returnDefault:true//返回默认
			});
	</script> 
 
    
</div>
<div class="x"></div>

<div class="wrapper_o">
	<div class="o_left">
    	<h3 class="on"><img src="images/dz_03.png" alt="" />订单中心</h3>
        <ul>
        	<li><a href="#">-个人订单管理</a></li>
            <li><a href="#">-企业订单管理</a></li>
        </ul>
        <h3><img src="images/dz_07.png" alt="" />收藏</h3>
        <ul>
        	
            <li><a href="#">-我的收藏</a></li>
        </ul>
        <h3><img src="images/dz_10.png" alt="" />个人信息</h3>
        <ul>
        	<li><a href="#">-会员认证</a></li>
            <li><a href="#">-账号信息</a></li>
            <li><a href="#">-收货地址</a></li>
            <li><a href="#">-积分查询</a></li>
            <li><a href="#">-密码管理</a></li>
            <li><a href="#"></a></li>
        </ul>
        <h3><img src="images/dz_12.png" alt="" />服务</h3>
        <ul>
        	<li><a href="#">-退换货信息</a></li>
            <li><a href="#">-投诉建议</a></li>
        </ul>
    </div>
    <div class="o_right">
    	<div class="right_t">
        	账号信息
        </div>
    	<div class="article_div">
        	<div class="info">
                <p>1、注册的登录名可以修改吗？</p>
                <p>登录名是您绑定的手机号码或者邮箱，您可以在【个人中心】- 安全中心修改绑定手机和绑定邮箱。</p>
                <p>2、注册的邮箱为什么不能被接受？</p>
                <p>（1）在您之前，已经有其他会员注册使用此邮箱；</p>
                <p>（2）您的用户名包含了下划线或其它特殊字符；</p>
                <p>（3）您的用户名长度太长或太短。</p>
                <p>3、注册密码和支付密码能不能一样？</p>
                <p>密码是您在行网上交易的重要钥匙，请牢记自己的登录名和密码。为保证您的在线交易安全，我们要求登录密码和支付密码是不能一样的。密码长度必须为6到20个字符； 切忌使用生日，电话号码等，不要设置类似77777，123456 ，987654 等有规律的密码，请使用数字，字母和特殊符合组合的方式。不能单一使用。</p>
                <p>4、密码忘记怎么办？</p>
                <p>1.登陆页面输入用户名，点击忘记登录密码</p>
                <p>2.进入输入用户名，填写验证码，点击下一步</p>
                <p>3.选择找回密码方式，两种方式邮箱和手机号码找回。</p>
                <p>5、如何注册鲜易网的会员账号？</p>
                <p>1.登录首页右上方，点击免费注册进入</p>
                <p>2.注册页面填写，注册账号可以是手机号码或者邮箱地址</p>
                <p>3.同意用户协议，点击确定即可。</p>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
