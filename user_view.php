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
	<div class="o_left">
    	<h3 class="on"><img src="images/dz_03.png" alt="" />��������</h3>
        <ul>
        	<li><a href="#">-���˶�������</a></li>
            <li><a href="#">-��ҵ��������</a></li>
        </ul>
        <h3><img src="images/dz_07.png" alt="" />�ղ�</h3>
        <ul>
        	
            <li><a href="#">-�ҵ��ղ�</a></li>
        </ul>
        <h3><img src="images/dz_10.png" alt="" />������Ϣ</h3>
        <ul>
        	<li><a href="#">-��Ա��֤</a></li>
            <li><a href="#">-�˺���Ϣ</a></li>
            <li><a href="#">-�ջ���ַ</a></li>
            <li><a href="#">-���ֲ�ѯ</a></li>
            <li><a href="#">-�������</a></li>
            <li><a href="#"></a></li>
        </ul>
        <h3><img src="images/dz_12.png" alt="" />����</h3>
        <ul>
        	<li><a href="#">-�˻�����Ϣ</a></li>
            <li><a href="#">-Ͷ�߽���</a></li>
        </ul>
    </div>
    <div class="o_right">
    	<div class="right_t">
        	�˺���Ϣ
        </div>
    	<div class="article_div">
        	<div class="info">
                <p>1��ѡ��ʳ��</p>
                <img src="images/wz_03.jpg" alt="" />
                <p>������Ҫ��ʳ�ģ����빺�ﳵ</p>
                <p>*��1����Ʒ����ΪԤ��������ʵ��������Ԥ������15%��Χ�ڸ�����</p>
                <p>*��2�������µ�ʱ������������ʳ�ĵ�Ԥ��������������Ӧ�Ľ�ʵ�ʽ����������յ������ʵ������Ϊ׼��</p>
                <p>2�����㹺�ﳵ</p>
                <img src="images/wz_07.jpg" alt="" />
                <p>3���ύ����</p>
                <p>������ѡ��ʹ��ʳ�п������֡��Ż�ȯ�ȷ�ʽ֧����</p>
                <p>4���ȴ�����</p>
                <p>3�ȴ���Ӧ�̽�����Լ�������ɽ�����Ҹ���ȴ������� </p>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
