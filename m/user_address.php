<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���������ֻ�վ</title>
<!--����Ӧ�ֻ���Ļ-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!--end ����Ӧ�ֻ���Ļ-->
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
</head>


<body>
<div class="top_w2"> 
	<div class="back1"><a href="#">&lt;</a></div>
    ���ֲ�ѯ
    <div class="back2"><a href="#"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper" style="padding-top:0px">
	<div class="adress">
    	<div class="dz on">
        	<h4><span>Ĭ�ϵ�ַ</span>�����и��£�����</h4>
            <p>���ǻ�԰</p>
            <p>��ַ�����ǻ�԰1��վ</p>
            <p><a href="#">�޸�</a></p>
        </div>
        <div class="dz">
        	<h4><span>��ΪĬ�ϵ�ַ</span>�����и��£�����</h4>
            <p>���ǻ�԰</p>
            <p>��ַ�����ǻ�԰1��վ</p>
            <p><a href="#">�޸�</a></p>
        </div>
        <div class="dz">
        	<h4><span>��ΪĬ�ϵ�ַ</span>�����и��£�����</h4>
            <p>���ǻ�԰</p>
            <p>��ַ�����ǻ�԰1��վ</p>
            <p><a href="#">�޸�</a></p>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
	$('.dz').click(function(){
		$('.dz').removeClass('on')
		$(this).addClass('on')
		$('.dz').find('h4 span').html('��ΪĬ�ϵ�ַ')
		$(this).find('h4 span').html('Ĭ�ϵ�ַ')
	})
})
</script>
<?php require('inc/footer.inc.php'); ?>
</body>

</html>
