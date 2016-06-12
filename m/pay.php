<?php 
include_once("../inc/config.inc.php");
$pageTitle="订单提交";    //当前页标题
$nav=2;
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
$ordersid=$_POST['ordersid'];
$alimoney=$_POST['alimoney'];

$_SESSION['price_all_l']=$alimoney;
$_SESSION['total']=$ordersid;
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
<script>
 function queren(){
  
	//var money = $('#pay').val();
	
	 $.ajax({
	 	url:"../ajax.php",
	 	type:"post",
	 	data:{'money':1},
	 	
	 	success:function(re){
	 		location.href="../wxpay/js_api_call.php";

	 	}
	 });	
}
</script>
</head>


<body>
<div class="top_w2">
	<div class="back1"><a href="#">&lt;</a></div>
    <?=$pageTitle?>

</div>

<div class="wrapper" style="text-align:center">
	<div class="tj_div">
	<div class="tj_cg"><img src="images/ddtj_03.jpg" alt="" />
    <div class="list1" style="font-size:14px; line-height:30px;">
   <form name="form1" action="../pay_b/alipayapi.php" method="post">
       <input type="hidden" name="aliorder" value="到家优蔬" />
    <input type="hidden" name="alibody" value="来自农博园，蔬心到万家" />
    <input type="hidden" name="ordersid" value="<?=$ordersid?>" />
    <input type="hidden" name="alimoney" value="<?=$alimoney?>" />
      <div class="che-je">金额：<span style="color:#F00; font-weight:bold; font-size:14px"><?=$_SESSION['price_all_l']?>元</span></div>
      <div class="che-je"><input type="image" src="images/fukuan.jpg" name="dosubmit" /></div>
    </form>
       <input type="hidden" name="aliorder" value="到家优蔬" />
    <input type="hidden" name="alibody" value="来自农博园，蔬心到万家" />
    <input type="hidden" name="ordersid" value="<?=$ordersid?>" />
    <input type="hidden" name="alimoney" value="<?=$alimoney?>" />
    
      <div class="che-je"><input type="image" src="../images/fukuan1.jpg" name="dosubmit" onClick="queren()"/></div>
  
</div>
    </div>
    
</div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
