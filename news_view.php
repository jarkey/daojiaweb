<?php 
include_once("inc/config.inc.php");
$pageId=(int)$_GET['id'];
$contentView=IdContentView($pageId);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$contentView['title']?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
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
<div class="x"></div>

<div class="wrapper_o">
	<div class="o_left2">
    	<h2>��������</h2>
    	<h3 ><em></em>��������</h3>
        <ul>
       	  <?=news_title(27,6,'news_view.php')?>
      </ul>
        <h3><em></em>����ָ��</h3>
        <ul>
       <?=news_title(28,6,'news_view.php')?>
      </ul>
        <h3><em></em>��������</h3>
        <ul>
       	 <?=news_title(14,6,'news_view.php')?>
      </ul>
        <h3 ><em></em>�ۺ����</h3>
        <ul>
       	  <?=news_title(29,6,'news_view.php')?>
      </ul>
        <h3 ><em></em>������Ѷ</h3>
        <ul>
       	   <?=news_title(20,3,'news_view.php',16)?>
      </ul>
     
      
    </div>
    <?php
	$defaultIndex=0;
	if($_GET['class']==27){$defaultIndex=0;}
	if($_GET['class']==28){$defaultIndex=1;}
	if($_GET['class']==14){$defaultIndex=2;}
	if($_GET['class']==29){$defaultIndex=3;}
	if($_GET['class']==20){$defaultIndex=4;}
	?>
    <script type="text/javascript">
    	jQuery(".o_left2").slide({titCell:"h3", targetCell:"ul",defaultIndex:<?=$defaultIndex?>,delayTime:300,trigger:"click"});

    </script>
    <div class="o_right">
    	<div class="right_t">
        	<?=$contentView['title']?>
        </div>
    	<div class="article_div">
        	<div class="info">
             <?=$contentView['content']?>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
