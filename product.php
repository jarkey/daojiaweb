<?php 
include_once("inc/config.inc.php");
include_once("inc/productView.php");
$class=(int)$_GET['class'];
$fid1=(int)$_GET['fid1'];
$fid2=(int)$_GET['fid2'];
$fid=(int)$_GET['fid'];
$classIndex=(int)$_GET['classIndex'];
$search=$_GET['search'];
if($_GET['class']!=''){
	
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
<script>
$(document).ready(function(){
						    $(document).ready(function() { 	

     $('.add_cart').click(function (){
		
    	 var id=$(this).attr("productid");
    	 var count=1;
    	 var num=parseInt($('#gwc_c').attr("gwc_c"));
    	 var num1=num+1;
    		$.ajax({
    				type:"POST",
    				url:"cart_ajax.php",
    				dataType:"html",
    				data:"id="+id+"&count="+count, 
    					success:function(msg)
    					 {
    						$('#gwc_c').html(num1);
    					alert('��ӳɹ���');
    					}
    					});
}); 
	  

    });
							
							     $(function(){
				$('.list_r2').find('dl').hover(function(){
					$('.list_r2').find('dl').removeClass('on');
					$(this).addClass('on')
				},function(){
					$('.list_r2').find('dl').removeClass('on');
				})
			})
								 
								 
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



<div class="wrapper_list">
	<div class="list1">
    	<h4>��ǰλ�ã�<a href="index.php">ȫ������></a><?=navigation($fid1,$fid2,$class)?><?=$search?></h4>
        <div class="fl">���ࣺ<?=navigation_name($fid1,$fid2,$class)?><?=$search?><span>����&or;</span></div>
    </div>
    <script type="text/javascript">
	$(function(){
		var onOff=true;
		$('.fl').find('span').click(function(){
			if(onOff){
				
				$('.fl').height('auto')
				onOff=false;
			}else{
				$('.fl').height('50px')
				
				onOff=true;
			}
			
		})
	})
	</script>
    <div class="list2">
    	<div class="list_left">
        	<h3>�����Ƽ�</h3>
         <?=recommended_product_list($search,$classIndex,$fid2,$fid1,$class,'product_view.php')?>
            
            
        </div>
        <div class="list_right">
        	<div class="list_r1">
            	<ul>
                	<li <?php if($_GET['sort']==0){echo'class="on"';} ?>><a href="product.php?class=<?=$_GET['class']?>&page=<?=$_GET['page']?>&fid=<?=$_GET['fid']?>&fid1=<?=$_GET['fid1']?>&fid2=<?=$_GET['fid2']?>&classIndex=<?=$_GET['classIndex']?>&search=<?=$_GET['search']?>&sort=0">�ۺ�</a></li>
                    <li <?php if($_GET['sort']==1){echo'class="on"';} ?>><a href="product.php?class=<?=$_GET['class']?>&page=<?=$_GET['page']?>&fid=<?=$_GET['fid']?>&fid1=<?=$_GET['fid1']?>&fid2=<?=$_GET['fid2']?>&classIndex=<?=$_GET['classIndex']?>&search=<?=$_GET['search']?>&sort=1">����&darr;</a></li>
                    <li <?php if($_GET['sort']==2){echo'class="on"';} ?>><a href="product.php?class=<?=$_GET['class']?>&page=<?=$_GET['page']?>&fid=<?=$_GET['fid']?>&fid1=<?=$_GET['fid1']?>&fid2=<?=$_GET['fid2']?>&classIndex=<?=$_GET['classIndex']?>&search=<?=$_GET['search']?>&sort=2">�۸�&darr;</a></li>
                    <li <?php if($_GET['sort']==3){echo'class="on"';} ?>><a href="product.php?class=<?=$_GET['class']?>&page=<?=$_GET['page']?>&fid=<?=$_GET['fid']?>&fid1=<?=$_GET['fid1']?>&fid2=<?=$_GET['fid2']?>&classIndex=<?=$_GET['classIndex']?>&search=<?=$_GET['search']?>&sort=3">�ϼ�ʱ��&darr;</a></li>
                </ul>
            </div>
         
            	<?=productViewTitle($search,$classIndex,$fid2,$fid1,$class,'product_view.php',$_GET['sort'])?>
                
     
      
            <script type="text/javascript">
       
            </script>
          
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
<body>
</body>
</html>
