<?php 
$pageTitle="�ҵ��ղ�";    //��ǰҳ����
include_once("inc/config.inc.php");
include_once("inc/favorites_function.php");
$userid=$_SESSION['userid'];
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}

include ("inc/lib/BluePage.class.php") ;
require("inc/admin_page_class.php");


$a=new favorites();
if ($_GET['productid']) {
	$productid=(int)$_GET['productid'];
	$class='gplat_product';
	$a->add($productid,$class);
}
if ($_GET['packageid']) {
	$productid=(int)$_GET['packageid'];
	$class='gplat_package';
	$a->add($productid,$class);
}
if($_POST['check']){
	foreach ($_POST['check'] as $id)
	{
		$a-> del($id);
	}
}

if($_GET['del']){
	$a-> del($_GET['del']);
}
$content=$a->view();
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
<script>
$(document).ready(function(){
						    $(document).ready(function() { 	

     $('.gwc_a').click(function (){
    	 var id=$(this).attr("productid");
    	
		 var num=parseInt($('#gwc_c').attr("gwc_c"));
    	 var num1=num+1;
    		$.ajax({
    				type:"POST",
    				url:"cart_ajax.php",
    				dataType:"html",
    				data:"id="+id+"&count=1", 
    					success:function(msg)
    					 {
    						$('#gwc_c').html(num1);
    						alert('��ӳɹ�');
    					}
    					});
}); 
	 
	   
	   
	

    

	   
	   
	   

    });
						      })	

</script>
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
	 <?php include('inc/user_left.php'); ?>
    <div class="o_right">
    	<div class="right_t">
        	�ҵ��ղ�
        </div>
		<div class="sc_div">
        	<form action="#" method="get">
        	<table cellpadding="0" cellspacing="0">
            	<tr class="tr1">
                	<td width="63"></td>
                    <td width="357">��Ʒ��Ϣ</td>
                    <td width="132" align="center" valign="middle">���ۣ�Ԫ��</td>
                    <td width="138" align="center" valign="middle">���</td>
                    <td width="208" align="center" valign="middle">����</td>
                </tr>
                
           
           
             <?=$content?>
            </table>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
