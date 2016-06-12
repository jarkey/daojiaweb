<?php 
$pageTitle="会员中心";    //当前页标题
$nav=3;
include_once("../inc/config.inc.php");
include_once("../inc/favorites_function.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
include ("../inc/lib/BluePage.class.php") ;
require("../inc/admin_page_class.php");


$a=new favorites();
if ($_GET['productid']) {
	$productid=(int)$_GET['productid'];
	$class='gplat_product';
	$a->add($productid,$class);
}
if ($_GET['packageid']) {
	$productid=(int)$_GET['packageid'];
	$class='gplat_package';
	$a->add($productid,$class);
}
if($_POST['check']){
	foreach ($_POST['check'] as $id)
	{
		$a-> del($id);
	}
}

if($_GET['del']){
	$a-> del($_GET['del']);
}
$content=$a->m_view();
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
	<div class="back1"><a href="user_change.php">&lt;</a></div>
    收藏夹
    <div class="back2"><a href="user_change.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper_g">
	<form action="#" method="get">
    	
       <?=$content?>
        
  </form>
</div>
<script type="text/javascript">
window.onload=function(){
	var aImg=$('.choose');
	for(var i=0;i<aImg.length;i++){
		aImg[i].onOff=true;
		aImg[i].onclick=function(){
			if(this.onOff){
				this.src='images/gwc_06.jpg';
				this.onOff=false;
			}else{
				this.src='images/gwc_10.jpg';
				this.onOff=true;
			}	
		}
	}
}
</script>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
