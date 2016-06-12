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
                <p>1、选购食材</p>
                <img src="images/wz_03.jpg" alt="" />
                <p>择您需要的食材，加入购物车</p>
                <p>*（1）产品重量为预估重量，实际重量在预估重量15%范围内浮动。</p>
                <p>*（2）在您下单时，根据您订购食材的预估重量冻结了相应的金额，实际结算金额以您收到货物的实际重量为准。</p>
                <p>2、结算购物车</p>
                <img src="images/wz_07.jpg" alt="" />
                <p>3、提交订单</p>
                <p>您可以选择使用食行卡余额、积分、优惠券等方式支付。</p>
                <p>4、等待发货</p>
                <p>3等待供应商接受邀约订单，成交后买家付款等待发货。 </p>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
