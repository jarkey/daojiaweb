<?php 
$pageTitle="订单详情";    //当前页标题
include_once("inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
if ($_GET['del'])
{
	//$sql="delete from gplat_order_product where id=".$_GET['del'];
    //$result=mysql_query($sql);		
}


$sql="select * from gplat_order_cart where userid='$userId' and orderid=".$_GET['id'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$status=$data['status'];         //订单状态
$price_all=$data['price_all']+$data['logistics']; 

$orderid=$_GET['id'];
//$money=money_all($orderid)+$data['logistics'];    //总价：商品价格+运费

if ($status=='未确认') {
	$del_str='<a href="user_order_view.php?id='.$id.'&del='.$date['id'].'"><img src="admin/img/del.gif" border="0px" alt="删除"></a>';
	$submit='<input type="submit" value="提交" />';
}else{
	$del_str=$submit='';
}
/****购买清单****/
$sql="select * from gplat_order_product where orderid=".$data['orderid'];
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{  
  $price_product_all=$date['num']*$date['price'];
  
   $sql_p="select productNum from dmooo_product where productid=".$date['productid'];
   $result_p=mysql_query($sql_p);
   $data_p=mysql_fetch_assoc($result_p);
   $productNum=$data_p['productNum'];
  
   $content_p.='<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1">&nbsp;<a href="user_order_view_book.php?productid='.$date['productid'].'&orderid='.$_GET['id'].'">评价</a></td>
	<td class="tdBorder1">'.$date['productname'].'</td>
    <td class="tdBorder1">'.$date['num'].'&nbsp;</td>
    <td class="tdBorder1">'.$date['price'].'</td>
    <td class="tdBorder1">'.$price_product_all.'&nbsp;</td>
    <td class="tdBorder1" style="display:none">&nbsp;&nbsp;'.$del_str.'</td>
</tr>';

}
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

<div class="wrapper_o">
	<?php include('inc/user_left.php'); ?>
    <div class="o_right">
    	<div class="right_t">
        	我的订单
        </div>
      
            <div class="ddgl_order">
          <!--*********订单管理*********-->

<!--******订单信息*******-->      
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td colspan="4" class="tdBorder1 tdBg1" style="font-weight:bold; font-size:14px;"><?=$pageTitle?></td>
    </tr>
  <tr>
    <td width="10%" class="tdBorder1">订 单 号：</td>
    <td width="40%" class="tdBorder1">
    &nbsp;<?=$data['orderNo']?>
	<input type="hidden" name="up_orders" value="up_orders">    </td>
    <td width="10%" class="tdBorder1">订单状态：</td>
    <td class="tdBorder1">&nbsp;<?=payStatus($data['payment'])?>&nbsp;<?=orderStatus($data['status'])?>
     
    </td>
  </tr>
  <tr>
    <td class="tdBorder1">下单时间：</td>
    <td class="tdBorder1">&nbsp;<?=$data['dates']?> &nbsp;<?=$data['times']?></td>
    <td class="tdBorder1">运　　费：</td>
    <td class="tdBorder1">&nbsp;<?=$data['logistics']?> 元</td>
  </tr>
   
   <tr>
     <td class="tdBorder1" style="color:#FF0000; font-weight:bold;">总　价：</td>
     <td class="tdBorder1" style="color:#FF0000; font-weight:bold;">
     <?php if($data['payment']==0){
		 ?>
         <form action="pay.php" method="post">
     &nbsp; <?=$price_all?> 元
    <input type="hidden" name="aliorder" value="到家优蔬" />
    <input type="hidden" name="alibody" value="来自农博园，蔬心到万家" />
    <input type="hidden" name="ordersid" value="<?=$data['orderNo']?>" />
    <input type="hidden" name="alimoney" value="<?=$price_all?>" />
   <input type="submit" value="去付款" name="submit" style="width:100px; height:30px;" />
    </form>
         <?php
		 }else{
			 ?>
              &nbsp; <?=$price_all?> 元
             <?php
			 } ?>
     </td>
     <td class="tdBorder1">发票</td>
     <td class="tdBorder1">&nbsp;<?=$data['invoice']?></td>
   </tr>
</table>
<br />
<!--*******收货人信息*********-->
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td colspan="4" class="tdBorder1 tdBg1" style="font-weight:bold; font-size:14px;">收货人信息</td>
    </tr>
  <tr>
    <td width="10%" class="tdBorder1">收货人：</td>
    <td width="40%" class="tdBorder1"><?=$data['consignee']?></td>
    <td width="10%" class="tdBorder1">地　址：</td>
    <td class="tdBorder1"><?=$data['address']?></td>
  </tr>
  <tr>
    <td class="tdBorder1">电　话：</td>
    <td class="tdBorder1"><?=$data['telephone']?></td>
    <td class="tdBorder1">手　机：</td>
    <td class="tdBorder1"><?=$data['mobile']?>&nbsp;</td>
  </tr>
  <tr>
    <td class="tdBorder1">备  注：</td>
    <td class="tdBorder1"><?=$data['remark']?></td>
    <td class="tdBorder1">送达时间：</td>
    <td class="tdBorder1"><?=$data['times1']?>&nbsp;<?=$data['times2']?></td>
  </tr>

</table>
<br />
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
<tr align="center">
<td class="tdBorder1 tdBg1">商品评价</td>
<td class="tdBorder1 tdBg1">商品名称</td>
<td class="tdBorder1 tdBg1">商品数量</td>
<td class="tdBorder1 tdBg1">单价</td>
<td class="tdBorder1 tdBg1">小计</td>
<td class="tdBorder1 tdBg1" style="display:none">操作</td>
</tr>
   <?=$content_p?></table>
   <br />
   <?=$submit?>
      </form>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
