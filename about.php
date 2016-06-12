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


542226137



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

<div class="banner_nby"><img src="images/activity_02.jpg" alt="" /></div>

<div class="wrapper_activity">
	<div class="a_left">
    	<h4 class="on"><a href="#">关于农博园</a></h4>
        <ul>
        	<li><a href="#">-农博园简介</a></li>
            <li><a href="#">-当季活动</a></li>
            <li><a href="#">-土地众筹</a></li>
            
        </ul>
        <h4><a href="#">直供产品</a></h4>
    </div>
    <div class="a_right">
    	<div class="a_title">
        	农博园简介
        </div>
        <div class="jj_div">
       		<p>景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速、锡张高速、锡沪路、金城路、京沪高铁（无锡东站）近在咫尺。其中农博园东临锡东大道，北接锡虞路，处于双路交叉口西南角。园区内山环水绕，风光旖旎，常年景色如画，地理环境得天独厚，置身其中，如入世外桃源。</p>
            <p>博览园汇聚五大功能：通过展示窗口，可以看到无锡现代农业发展的硕果；构筑平台，多品种的优质农副产品汇成交易中心；研发基地先进的农业科技在这里孵化转接；历史回眸，穿越吴文化发源地的历史时空，感受农业文化薪火相传开拓创造的辉煌历程；旅游休闲，在山水清嘉的农家大院中体验农耕生活、田园风情。博览园是现代农业的先导区、示范区。</p>
            <p>古老的农耕文明结出"鱼米之乡"现代农业的新硕果，这里常年供应无锡各类名、特、优农产品：绿壳鸡蛋、草鸡、五彩米、灵芝、水产、果蔬、蚕桑等等，无不驰名中外。高科技农业展示馆、农耕文化展示馆、农博园休闲会所、生态餐厅等多功能配套项目已全部完成，水上游乐、度假小木屋等以农业为主题的特色项目正在进一步开发。</p>
            <img src="images/jj_03.jpg" alt="" />
        </div>
    </div>
</div>

<div class="foot_w">
	<div class="foot1">
    	<ul>
        	<li><a href="#"><img src="images/nby_76.png" alt="" />食品安全有保障</a></li>
            <li><a href="#"><img src="images/nby_78.png" alt="" />有机农场想鲜蔬直供</a></li>
            <li><a href="#"><img src="images/nby_80.png" alt="" />国家及安全检测</a></li>
            <li><a href="#"><img src="images/nby_82.png" alt="" />自营冷链配送</a></li>
            <li style="border-right:0px;"><a href="#"><img src="images/nby_73.png" alt="" />支持多种购物卡</a></li>
        </ul>
    </div>
    <?php require('inc/footer.inc.php'); ?>
    <script type="text/javascript">
    	$(function(){
			$("#img1").click(function(){
				$("#img3").attr("src","images/nby_90.png");
			})
			$("#img2").click(function(){
				$("#img3").attr("src","images/nby_92.png");
			})
		})
    </script>
    
</div>
<body>
</body>
</html>
