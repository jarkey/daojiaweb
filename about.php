<?php 
$pageTitle="��ҳ";    //��ǰҳ����
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


542226137



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

<div class="banner_nby"><img src="images/activity_02.jpg" alt="" /></div>

<div class="wrapper_activity">
	<div class="a_left">
    	<h4 class="on"><a href="#">����ũ��԰</a></h4>
        <ul>
        	<li><a href="#">-ũ��԰���</a></li>
            <li><a href="#">-�����</a></li>
            <li><a href="#">-�����ڳ�</a></li>
            
        </ul>
        <h4><a href="#">ֱ����Ʒ</a></h4>
    </div>
    <div class="a_right">
    	<div class="a_title">
        	ũ��԰���
        </div>
        <div class="jj_div">
       		<p>�����ش���ɽ������ɽ��´�������������Ķ����ͨ��ݣ��뻦�����١����Ÿ��١�����·�����·������������������վ��������ߡ�����ũ��԰���������������������·������˫·��������Ͻǡ�԰����ɽ��ˮ�ƣ�����컣����꾰ɫ�续����������������������У�����������Դ��</p>
            <p>����԰�������ܣ�ͨ��չʾ���ڣ����Կ��������ִ�ũҵ��չ��˶��������ƽ̨����Ʒ�ֵ�����ũ����Ʒ��ɽ������ģ��з������Ƚ���ũҵ�Ƽ����������ת�ӣ���ʷ��������Խ���Ļ���Դ�ص���ʷʱ�գ�����ũҵ�Ļ�н���ഫ���ش���ĻԻ����̣��������У���ɽˮ��ε�ũ�Ҵ�Ժ������ũ�������԰���顣����԰���ִ�ũҵ���ȵ�����ʾ������</p>
            <p>���ϵ�ũ���������"����֮��"�ִ�ũҵ����˶�������ﳣ�깩Ӧ�������������ء���ũ��Ʒ���̿Ǽ������ݼ�������ס���֥��ˮ�������ߡ���ɣ�ȵȣ��޲��������⡣�߿Ƽ�ũҵչʾ�ݡ�ũ���Ļ�չʾ�ݡ�ũ��԰���л�������̬�����ȶ๦��������Ŀ��ȫ����ɣ�ˮ�����֡��ȼ�Сľ�ݵ���ũҵΪ�������ɫ��Ŀ���ڽ�һ��������</p>
            <img src="images/jj_03.jpg" alt="" />
        </div>
    </div>
</div>

<div class="foot_w">
	<div class="foot1">
    	<ul>
        	<li><a href="#"><img src="images/nby_76.png" alt="" />ʳƷ��ȫ�б���</a></li>
            <li><a href="#"><img src="images/nby_78.png" alt="" />�л�ũ��������ֱ��</a></li>
            <li><a href="#"><img src="images/nby_80.png" alt="" />���Ҽ���ȫ���</a></li>
            <li><a href="#"><img src="images/nby_82.png" alt="" />��Ӫ��������</a></li>
            <li style="border-right:0px;"><a href="#"><img src="images/nby_73.png" alt="" />֧�ֶ��ֹ��￨</a></li>
        </ul>
    </div>
    <?php require('inc/footer.inc.php'); ?>
    <script type="text/javascript">
    	$(function(){
			$("#img1").click(function(){
				$("#img3").attr("src","images/nby_90.png");
			})
			$("#img2").click(function(){
				$("#img3").attr("src","images/nby_92.png");
			})
		})
    </script>
    
</div>
<body>
</body>
</html>
