<?php 
$pageTitle="退换货信息";    //当前页标题
include_once("inc/config.inc.php");
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
        	<?=$pageTitle?>
        </div>
		<div class="sc_div">
        	<form action="#" method="get">
        	<table cellpadding="0" cellspacing="0">
            	<tr class="tr1">
                	<td width="63"></td>
                    <td width="357">商品信息</td>
                    <td width="132" align="center" valign="middle">单价（元）</td>
                    <td width="138" align="center" valign="middle">库存</td>
                    <td width="208" align="center" valign="middle">操作</td>
                </tr>
          <!--      <tr>
                	<td align="center" valign="middle"><input type="checkbox" /></td>
                    <td>
                   	  <dl>
                        	<a href="#">
                            	<dt><img src="images/dd_03.jpg" alt="" /></dt>
                                <dd>胡萝卜</dd>
                            </a>
                        </dl>
                    </td>
                    <td align="center" valign="middle">16.00</td>
                    <td align="center" valign="middle">正常</td>
                    <td align="center" valign="middle">
                    	<a href="#" class="gwc_a">加入购物车</a>
                        <a href="#">删除</a>
                    </td>
                </tr>-->
             
               
            </table>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
