<?php 
include_once("../inc/config.inc.php");
$pageTitle="���ﳵ";    //��ǰҳ����
$nav=2;
$flag=$_GET['flag'];
$productid=$_GET['productid'];
$count=$_GET['count'];
$priceid=$_GET['priceid'];
include_once("../cart_ajax.php");
include_once("../inc/buy/buy_1_1.php");



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
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
<script  type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/cart_add.js"></script>
</head>


<body>
<div class="top_w2">
	<div class="back1"><a href="javascript:history.go(-1)">&lt;</a></div>
    ���ﳵ
    <div class="back2"><a href="javascript:history.go(-1)"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper_g">
	<form action="#" method="get">
    	<!--<table cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="10%" align="center" valign="middle"><img src="images/gwc_10.jpg" alt="" class="choose"></td>
                <td width="22%" align="center" valign="middle"><a href="#"><img src="images/gwc_03.jpg" alt=""></a></td>
                <td width="48%">
               	  <h4><a href="#">��ˮǧ��ӣ�ҷ�����ˮǧ��ӣ�ҷ�����ˮǧ��ӣ�ҷ���</a></h4>
                    <p>��<span>27.00</span></p>
              </td>
                <td width="20%" align="center"><input type="button" value="" class="jian"><span>1</span><input type="button" value="" class="add_btn">
                <br><a href="">ɾ��</a></td>
          </tr>
        </table>
        <div class="space2"></div>-->
        
      <?=$view_cart_m?>
        <table cellpadding="0" cellspacing="0" class="tab1">
        	<tr>
 <td width="24%" align="left" valign="middle">����<span id="pr_num_all"><?=$pr_num?></span>����Ʒ</td>
                <td width="49%">
               	  ȫ����Ʒ�ܼۣ���<span id="total"><?=$total?></span>
            </td>
                <td width="27%" align="center"><a href="buy_3.php" class="js">����</a></td>
          </tr>
        </table>
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
