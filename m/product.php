<?php 
$pageTitle="��ҳ";    //��ǰҳ����
include_once("../inc/config.inc.php");
	?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
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
	<div class="back1"><a href="index.php">&lt;</a></div>
    ����
    <div class="back2"><a href="index.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper">
	<div class="fl">
    	<ul>
        	<li><a href="product1.php?fid1=1"><span>&gt;</span>�����߲�</a></li>
            <li><a href="product1.php?fid1=2"><span>&gt;</span>��Ʒˮ��</a></li>
            <li><a href="product1.php?fid1=3"><span>&gt;</span>���⵰��</a></li>
            <li><a href="product1.php?fid1=4"><span>&gt;</span>ˮ������</a></li>
            <li><a href="product1.php?fid1=5"><span>&gt;</span>���͸�ʳ</a></li>
            <li><a href="product1.php?fid1=6"><span>&gt;</span>��ʳ��ˮ</a></li>
            <li><a href="product1.php?fid1=7"><span>&gt;</span>��ѡ���</a></li>
        </ul>
    </div>	
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
