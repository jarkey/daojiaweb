<?php 
$pageTitle="�û���¼";    //��ǰҳ����
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
<script type="text/javascript" src="js/jQuery/jquery1.2.js"></script>
<script type="text/javascript" src="js/user_longin.js"></script>
<script type="text/javascript">
function RefreshImage(){
document.getElementById("imcode").src = 'inc/authimg.php?date=' + new Date();
}
</script>
</head>
<?php require('inc/header.inc.php'); ?>



<div class="header clearfix">
	<div class="logo"><a href="index.php"><img src="images/index_03.png" alt="" /></a></div>
    <div class="city">
    	<h3><img src="images/index_09.png" alt="" /></h3>
       
    </div>
    <!--<div class="search_w">
    	<div class="search clearfix">
        	<form action="#" method="get">
            	<h3><span>��Ʒ</span></h3>
                <ul>
                	<li>��Ʒ1</li>
                    <li>��Ʒ2</li>
                    <li>��Ʒ3</li>
                </ul>
                <input type="text" value="" class="text_k" /><input type="button" value="����" class="ss_btn" />
            </form>
        </div>
        <div class="myxjd">
        	<a href="#"><img src="images/nby_20.png" alt="" />�ҵ�ѯ�۵�</a>
            <span>10</span>
        </div>
    </div>
	<script type="text/javascript">
		$(function(){
			$('.search').find('h3').click(function(){
				$('.search').find('ul').show();
			})
			$('.search').find('ul li').click(function(){
				$('.search').find('h3 span').html($(this).html());
				$('.search').find('ul').hide();
			})
			$('.search').find('ul').mouseleave(function(){
				$(this).hide();
			})
		})
	</script> -->
 

</div>

<div class="dl_div">
	<h3>��¼</h3>
    <span id="content_ajax"  style="display:none;"></span>
    	<table cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="65" align="right" valign="middle">�ֻ��ţ�</td>
              <td><input type="text" name="username" class="k_itext" /><span id="username" class="redTxt1"></span></td>
            </tr>
            <tr>
            	<td align="right" valign="middle">���룺</td>
              <td><input type="password" name="password" class="k_itext" /><span id="password" class="redTxt1"></span></td>
            </tr>
              <tr>
            	<td align="right" valign="middle">��֤�룺</td>
              <td><input type="text" value="" name="authimg1" class="k_itext1" /><img src="inc/authimg.php" alt="���ˢ����֤��"  width="100"  border="0" id="imcode" /><span  onClick="RefreshImage()"  style="cursor:pointer;">(���ˢ����֤��)</span><span id="authimg" class="redTxt1"></span></td>
            </tr>
            <tr>
            	<td></td>
                <td><a href="password.php">��������</a></td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="submit" value="��¼" class="dl_btn" /> &nbsp; <input type="button" name="button1" value="ע��" class="dl_btn" /></td>
            </tr>
        </table>
  
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
