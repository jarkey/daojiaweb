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

<div class="banner_nby"><img src="images/nby_33.png" alt="" /></div>

<div class="wrapper_nby">
	<div class="nby_t"><div class="title">近期活动<span>Recent activity</span></div></div>
    <div class="n1">
    	<div class="picScroll">
            <ul>
                <li>
                	<dl>
                        <dt><a href="#"><img src="images/nby_36.png" alt="" /></a></dt>
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                    </dl>
                    <dl>
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                        <dt><a href="#"><img src="images/nby_40.png" alt="" /></a></dt>
                    </dl>
                    <dl>
                        <dt><a href="#"><img src="images/nby_38.png" alt="" /></a></dt>
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                    </dl>
                    <dl class="dlr">
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                        <dt><a href="#"><img src="images/nby_41.png" alt="" /></a></dt>
                    </dl>
                </li>
                <li>
                	<dl>
                        <dt><a href="#"><img src="images/nby_36.png" alt="" /></a></dt>
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                    </dl>
                    <dl>
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                        <dt><a href="#"><img src="images/nby_40.png" alt="" /></a></dt>
                    </dl>
                    <dl>
                        <dt><a href="#"><img src="images/nby_38.png" alt="" /></a></dt>
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                    </dl>
                    <dl class="dlr">
                        <dd>
                            <h4><a href="#">活动标题活动标题</a></h4>
                            <p>内容描述内容描述内容描述内容描述内容描述内容描...</p>
                        </dd>
                        <dt><a href="#"><img src="images/nby_41.png" alt="" /></a></dt>
                    </dl>
                </li>
            </ul>
     
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
        </div>
     
        <script type="text/javascript">
    jQuery(".picScroll").slide({ mainCell:"ul", effect:"leftLoop", vis:1, scroll:1,  autoPage:true, switchLoad:"_src" });
        </script>

    	
    </div>
    <div class="nby_t"><div class="title">博园简介<span>Expo introduction</span></div></div>
    <div class="n2">
    	<dl>
        	<dt><img src="images/nby_55.png" alt="" /></dt>
            <dd>
            	<p>景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速、锡张高速、锡沪路、金城路、京沪高铁（无锡东站）近在咫尺。其中农博园东临锡东大道，北接锡虞路，处于双路交叉口西南角。园区内山环水绕，风光旖旎，常年景色如画，地理环境得天独厚，置身其中，如入世外桃源。</p>
                <p>博览园汇聚五大功能：通过展示窗口，可以看到无锡现代农业发展的硕果；构筑平台，多品种的优质农副产品汇成交易中心；研发基地先进的农业科技在这里孵化转接；历史回眸，穿越吴文化发源地的历史时空，感受农业文化薪火相传开拓创造的辉煌历程；旅游休闲，在山水清嘉的农家大院中体验农耕生活、田园风情。博览园是现代农业的先导区、示范区。</p>
                <p>古老的农耕文明结出"鱼米之乡"现代农业的新硕果，这里常年供应无锡各类名、特、优农产品：绿壳鸡蛋、草鸡、五彩米、灵芝、水产、果蔬、蚕桑等等，无不驰名中外。高科技农业展示馆、农耕文化展示馆、农博园休闲会所、生态餐厅等多功能配套项目已全部完成，水上游乐、度假小木屋等以农业为主题的特色项目正在进一步开发。</p>
            </dd>
        </dl>
    </div>
    <div class="nby_t"><div class="title">直供产品<span>Supply product</span></div></div>

    <div class="n3">
    	<dl class="dll">
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
        <dl>
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
        <dl>
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
        <dl>
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
        <dl class="dll">
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
        <dl>
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
        <dl>
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
        <dl>
        	<dt><img src="images/nby_63.png" alt="" /></dt>
            <dd>
            	<h4><a href="#">鲜芹 新鲜芹菜 有机肥 无农药 北京当日达 年终福利 买一赠一</a></h4>
                <p>￥8.00</p>
            </dd>
        </dl>
    </div>
    <div class="nby_t"><div class="title">土地众筹<span>Land all the chips</span></div></div>

    <div class="n4">
    	<dl>
        	<a href="#">
        		<dt><img src="images/nby_66.png" alt="" /></dt>
            	<dd>项目名称项目名称</dd>
            </a>
        </dl>
        <dl>
        	<a href="#">
        		<dt><img src="images/nby_67.png" alt="" /></dt>
            	<dd>项目名称项目名称</dd>
            </a>
        </dl>
        <dl>
        	<a href="#">
        		<dt><img src="images/nby_68.png" alt="" /></dt>
            	<dd>项目名称项目名称</dd>
            </a>
        </dl>
        <dl>
        	<a href="#">
        		<dt><img src="images/nby_69.png" alt="" /></dt>
            	<dd>项目名称项目名称</dd>
            </a>
        </dl>
    </div>
    <div class="back"><a href="#">&gt;返回首页&lt;</a></div>
</div>

<?php require('inc/footer.inc.php'); ?>
<body>
</body>
</html>
