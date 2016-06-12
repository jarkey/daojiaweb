<?php 
$pageTitle="首页";    //当前页标题
include_once("../inc/config.inc.php");
include_once("../inc/m_productView.php");
$class=(int)$_GET['class'];
$fid1=(int)$_GET['fid1'];
$fid2=(int)$_GET['fid2'];
$fid=(int)$_GET['fid'];
$classIndex=(int)$_GET['classIndex'];
$search=$_GET['search'];
$sale=$_GET['sale'];
if($_GET['sale']!=''){$sale_str='精选促销';}
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
<div class="top_w2">
	<div class="back1"><a href="javascript:history.go(-1)">&lt;</a></div>
    分类
    <div class="back2"><a href="index.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper" style="padding:0px 0px; padding-bottom:30px;">
	<div class="fl2">
    	<div class="fl2_l">
        	<ul>
               <?=m_navigation_name($fid1)?><?=$search?><?=$sale_str?>
            </ul>
        </div>
     
        
        <?=m_productViewTitle($search,$classIndex,$fid2,$fid1,$class,'product_view.php',$_GET['sort'],$sale)?>
        	
    </div>	
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
<script type="text/javascript">
$(function(){
	$('.fl2_l').css({
		minHeight:$(window).height()-80
	})
})
</script>
</html>
