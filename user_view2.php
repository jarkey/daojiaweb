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
                <p>1��ע��ĵ�¼�������޸���</p>
                <p>��¼�������󶨵��ֻ�����������䣬�������ڡ��������ġ�- ��ȫ�����޸İ��ֻ��Ͱ����䡣</p>
                <p>2��ע�������Ϊʲô���ܱ����ܣ�</p>
                <p>��1������֮ǰ���Ѿ���������Աע��ʹ�ô����䣻</p>
                <p>��2�������û����������»��߻����������ַ���</p>
                <p>��3�������û�������̫����̫�̡�</p>
                <p>3��ע�������֧�������ܲ���һ����</p>
                <p>���������������Ͻ��׵���ҪԿ�ף����μ��Լ��ĵ�¼�������롣Ϊ��֤�������߽��װ�ȫ������Ҫ���¼�����֧�������ǲ���һ���ġ����볤�ȱ���Ϊ6��20���ַ��� �м�ʹ�����գ��绰����ȣ���Ҫ��������77777��123456 ��987654 ���й��ɵ����룬��ʹ�����֣���ĸ�����������ϵķ�ʽ�����ܵ�һʹ�á�</p>
                <p>4������������ô�죿</p>
                <p>1.��½ҳ�������û�����������ǵ�¼����</p>
                <p>2.���������û�������д��֤�룬�����һ��</p>
                <p>3.ѡ���һ����뷽ʽ�����ַ�ʽ������ֻ������һء�</p>
                <p>5�����ע���������Ļ�Ա�˺ţ�</p>
                <p>1.��¼��ҳ���Ϸ���������ע�����</p>
                <p>2.ע��ҳ����д��ע���˺ſ������ֻ�������������ַ</p>
                <p>3.ͬ���û�Э�飬���ȷ�����ɡ�</p>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
