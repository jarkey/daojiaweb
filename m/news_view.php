<?php 
include_once("../inc/config.inc.php");
$pageId=(int)$_GET['id'];
$contentView=IdContentView($pageId);
?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$contentView['title']?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
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
	<div class="back1"><a href="news.php">&lt;</a></div>
    <?=$contentView['title']?>
    <div class="back2"><a href="index.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper" style="">
	<div class="article">
    	<div class="title">
        	<h4><?=$contentView['title']?></h4>
            <p>发布时间：<?=$contentView['times']?></p>
        </div>
        <div class="text_ar">
        	<?=$contentView['content']?>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
