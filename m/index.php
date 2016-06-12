<?php 
$pageTitle="首页";    //当前页标题
$nav=0;
include_once("../inc/config.inc.php");
if($_GET['exit']==1){
unset($_SESSION['email']);
unset($_SESSION['userid']);
unset($_SESSION['username']);
	}
	
$ad_j_1=flashAd3(12,0);
$ad_j_2=flashAd3(12,1);
$ad_j_3=flashAd3(12,2);
$ad_j_4=flashAd3(12,3);
$ad_j_5=flashAd3(12,4);
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
</head>

<body>
<div class="top_w">
	<form action="product1.php" method="get">
    	<input type="text"  name="search" class="ss_text" /><input type="submit" value="" class="ss_btn">
    </form>
    <a href="buy_1.php" class="gwc"><img src="images/sy_03.png" alt=""></a>
</div>

<!--焦点图代码开始-->
<div id="focus" class="focus">
    <div class="hd">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
            <?=m_flashAd1(11,5)?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    TouchSlide({ 
        slideCell:"#focus",
        titCell:".hd ul", 
        mainCell:".bd ul", 
        effect:"left", 
        autoPlay:true,//自动播放
        autoPage:true, 
    });
</script>
<!--焦点图结束-->

<div class="nav">
 <dl>
    	<a href="product1.php?fid1=1">
    		<dt><img src="images/sy_15.png" alt=""></dt>
            <dd>优质蔬菜</dd>
        </a>
    </dl>
	<dl>
    	<a href="product1.php?fid1=2">
    		<dt><img src="images/sy_13.png" alt=""></dt>
            <dd>精品水果</dd>
        </a>
    </dl>
     <dl style="border-right:0px;">
    	<a href="product1.php?fid1=3">
    		<dt><img src="images/sy_19.png" alt=""></dt>
            <dd>鲜肉蛋禽</dd>
        </a>
    </dl>
   
   
    <dl>
    	<a href="product1.php?fid1=4">
    		<dt><img src="images/sy_27.png" alt=""></dt>
            <dd>水产海鲜</dd>
        </a>
    </dl>
   <dl>
    	<a href="product1.php?fid1=5">
    		<dt><img src="images/sy_25.png" alt=""></dt>
            <dd>粮油副食</dd>
        </a>
    </dl>
    <dl>
    	<a href="product1.php?fid1=6">
    		<dt><img src="images/sy_26.png" alt=""></dt>
            <dd>零食酒水</dd>
        </a>
    </dl>
     <dl>
    	<a href="product1.php?fid1=7">
    		<dt><img src="images/sy_17.png" alt=""></dt>
            <dd>精选礼盒</dd>
        </a>
    </dl>
    <dl style="border-right:0px;">
    	<a href="product1.php?sale=1">
    		<dt><img src="images/sy_28.png" alt=""></dt>
            <dd>精选促销</dd>
        </a>
    </dl>
</div>
<div class="space"></div>
<div class="w1">
	<ul>
    	<li style="border-right:1px solid #d8d8d8; width:39%"><a href="<?=$ad_j_1['url']?>"><img src="../userfiles/<?=$ad_j_1['img']?>" alt=""></a></li>
        <li style="border-bottom:1px solid #d8d8d8"><a href="<?=$ad_j_2['url']?>"><img src="../userfiles/<?=$ad_j_2['img']?>" alt=""></a></li>
        <li><a href="<?=$ad_j_3['url']?>"><img src="../userfiles/<?=$ad_j_3['img']?>" alt=""></a></li>
    </ul>
</div>
<div class="space"></div>
<div class="w2">
	
    <ul class="ul1">
    	<li style="border-right:1px solid #eee;"><a href="<?=$ad_j_4['url']?>"><img src="../userfiles/<?=$ad_j_4['img']?>" alt=""></a></li>
        <li><a href="<?=$ad_j_5['url']?>"><img src="../userfiles/<?=$ad_j_5['img']?>" alt=""></a></li>
    </ul>
   
</div>
<div class="w3">
	<?=m_hot_product(12)?>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
