<?php 
$pageTitle="�����ύ";    //��ǰҳ����
include_once("inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}

$ordersid=$_POST['ordersid'];
$alimoney=$_POST['alimoney'];

$_SESSION['price_all_l']=$alimoney;
$_SESSION['total']=$ordersid;

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
    <div class="nav clearfix">
        <h3>ȫ����Ʒ����</h3>
     <div class="tj_img"><img src="images/ddtj_03.jpg" alt="" /></div>
    </div>
    
      <ul id="nav" style="display:none">
<?php require('inc/left_nav.php'); ?>
	</ul>
<script type="text/javascript">
		jQuery("#nav").slide({ 
				type:"menu", //Ч������
				titCell:".mainCate", // ��괥������
				targetCell:".subCate", // Ч�����󣬱��뱻titCell����
				delayTime:0, // Ч��ʱ��
				triggerTime:0, //����ӳٴ���ʱ��
				defaultPlay:false,//Ĭ��ִ��
				returnDefault:true//����Ĭ��
			});
	</script> 
 
    
</div>

<div class="tj_div">
	<div class="tj_cg"><img src="images/ddtj_07.jpg" alt="" />����֧����
    <div class="list1" style="font-size:14px; line-height:30px;">
    <form name="form1" action="pay_b/alipayapi.php" method="post">
       <input type="hidden" name="aliorder" value="��������" />
    <input type="hidden" name="alibody" value="����ũ��԰�����ĵ����" />
    <input type="hidden" name="ordersid" value="<?=$ordersid?>" />
    <input type="hidden" name="alimoney" value="<?=$alimoney?>" />
      <div class="che-je">��<span style="color:#F00; font-weight:bold; font-size:14px"><?=$_SESSION['price_all_l']?>Ԫ</span></div>
      <div class="che-je"><input type="image" src="images/fukuan.jpg" name="dosubmit" /></div>
    </form>
  
    <form name="form2" action="wxpay/native_dynamic_qrcode.php" method="post">
    <input type="hidden" name="aliorder" value="��������" />
    <input type="hidden" name="alibody" value="����ũ��԰�����ĵ����" />
    <input type="hidden" name="ordersid" value="<?=$ordersid?>" />
    <input type="hidden" name="alimoney" value="<?=$alimoney?>" />
 
      <div class="che-je"><input type="image" src="images/fukuan1.jpg" name="dosubmit" /></div>
    </form>
</div>
    </div>
    
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
