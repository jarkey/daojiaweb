<?php 
$pageTitle="首页";    //当前页标题
include_once("inc/config.inc.php");
$class=(int)$_GET['class'];
$title=class_name($class);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$title?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
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

<!--<div class="banner_nby"><img src="images/activity_02.jpg" alt="" /></div>-->

<div class="wrapper_activity">
		<div class="o_left2">
    	<h2>帮助中心</h2>
    		<h3 ><em></em>新手入门</h3>
        <ul>
       	  <?=news_title(27,6,'news_view.php')?>
      </ul>
        <h3><em></em>购物指南</h3>
        <ul>
       <?=news_title(28,6,'news_view.php')?>
      </ul>
        <h3><em></em>关于我们</h3>
        <ul>
       	 <?=news_title(14,6,'news_view.php')?>
      </ul>
        <h3 ><em></em>售后服务</h3>
        <ul>
       	  <?=news_title(29,6,'news_view.php')?>
      </ul>
        <h3 ><em></em>公告资讯</h3>
        <ul>
       	  <?=news_title(20,3,'news_view.php',16)?>
      </ul>
     
      
    </div>
    <?php
	$defaultIndex=0;
	if($_GET['class']==27){$defaultIndex=0;}
	if($_GET['class']==28){$defaultIndex=1;}
	if($_GET['class']==14){$defaultIndex=2;}
	if($_GET['class']==29){$defaultIndex=3;}
	if($_GET['class']==20){$defaultIndex=4;}
	?>
    <script type="text/javascript">
    	jQuery(".o_left2").slide({titCell:"h3", targetCell:"ul",defaultIndex:<?=$defaultIndex?>,delayTime:300,trigger:"click"});

    </script>
    <div class="a_right">
    	<div class="a_title">
        	<?=$title?>
        </div>
        <div class="a_list">
        <?=newsViewTitle($class,'news_view.php','news.php',12)?>
        
        <!--	<ul>
            	<li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
                <li><span>2015-10-10</span><a href="#">景区地处锡山区安镇胶山北麓，建成面积近万亩，交通便捷，与沪宁高速</a></li>
            </ul>
            
            <div class="page"><a href="#">上一页</a><a href="#">第1页</a><a href="#">下一页</a></div>-->
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
<body>
</body>
</html>
