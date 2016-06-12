<?php 
include_once("inc/config.inc.php");
$pageTitle="购物车";    //当前页标题
$flag=$_GET['flag'];
$productid=$_GET['productid'];
$count=$_GET['count'];
$priceid=$_GET['priceid'];
include_once("cart_ajax.php");
include_once("inc/buy/buy_1_1.php");



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
<script  type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/cart_add.js"></script>
</head>
<?php require('inc/header.inc.php'); ?>



<div class="header clearfix">
	<div class="logo"><a href="index.php"><img src="images/index_03.png" alt="" /></a></div>
    <div class="city">
    	<h3><img src="images/index_09.png" alt="" /></h3>
       
    </div>
   
 	<div class="tj_img"><img src="images/gwc_03.jpg" alt="" /></div>

</div>





<div class="gwc_div">
<form action="buy_1.php" method="post" name="aa" id="aa">
	<table cellpadding="0" cellspacing="0" class="tab1">
    	<tr>
        <td width="50" align="center" valign="middle"></td>
        	<td width="510" align="center" valign="middle">商品信息</td>
          <td width="165" align="center" valign="middle">单价</td>
          <td width="155" align="center" valign="middle">数量</td>
          <td width="145" align="center" valign="middle">小计</td>
            <td align="center" valign="middle">操作</td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="tab2">
  <?=$view_cart?>
    </table>
    
  
    <table cellpadding="0" cellspacing="0" class="tab4">
    	<tr>
        	<td width="110" align="right" valign="middle"><input type=button class="button1" onClick=selectAll(document.aa) value="全选" style="  color:#666; font-size:14px"></td>
          <td width="321" valign="middle"><input type="submit" id="subbtn" value="删除选中商品" style=" margin-left:35px; color:#666; font-size:14px"/></td>
       	  <td width="252" align="right" valign="middle">共计<span id="pr_num_all"><?=$pr_num?></span>件商品</td>
       	  <td width="323" align="center" valign="middle">合计：￥<span id="total"><?=$total?></span></td>
            <td width="190"><a href="buy_3.php" class="js">去结算</a></td>
        </tr>
    </table>
     <script>
function selectAll(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox")
obj.elements[i].checked = true;
}
</script>
    </form>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
