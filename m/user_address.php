<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>无锡到家手机站</title>
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
	<div class="back1"><a href="#">&lt;</a></div>
    积分查询
    <div class="back2"><a href="#"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper" style="padding-top:0px">
	<div class="adress">
    	<div class="dz on">
        	<h4><span>默认地址</span>苏州市高新（虎丘）</h4>
            <p>名城花园</p>
            <p>地址：名城花园1号站</p>
            <p><a href="#">修改</a></p>
        </div>
        <div class="dz">
        	<h4><span>设为默认地址</span>苏州市高新（虎丘）</h4>
            <p>名城花园</p>
            <p>地址：名城花园1号站</p>
            <p><a href="#">修改</a></p>
        </div>
        <div class="dz">
        	<h4><span>设为默认地址</span>苏州市高新（虎丘）</h4>
            <p>名城花园</p>
            <p>地址：名城花园1号站</p>
            <p><a href="#">修改</a></p>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
	$('.dz').click(function(){
		$('.dz').removeClass('on')
		$(this).addClass('on')
		$('.dz').find('h4 span').html('设为默认地址')
		$(this).find('h4 span').html('默认地址')
	})
})
</script>
<?php require('inc/footer.inc.php'); ?>
</body>

</html>
