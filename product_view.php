<?php 
include_once("inc/config.inc.php");
include_once("inc/favorites_function.php");
$class=(int)$_GET['class'];
$id=(int)$_GET['id'];
$priceid=$_GET['priceid'];


$content=IdProductView($id);
$class=$content['class'];
$a=new favorites();
$if_add=$a->if_add($id,'gplat_product');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$content['productName']?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery1.42.min.js"></script>

<link href="css/css1.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>

<!--<script type="text/javascript" src="js/jQuery/jquery1.2.js"></script>

<script type="text/javascript" src="js/goods.js"></script>-->
<SCRIPT src="js/base.js" type=text/javascript></SCRIPT>
 <SCRIPT src="js/lib.js" type=text/javascript></SCRIPT>
<SCRIPT src="js/163css.js" type=text/javascript></SCRIPT>
<script>
$(document).ready(function(){
						    $(document).ready(function() { 	

     $('#add_cart').click(function (){
    	 var id='<?php echo $_GET['id']?>';
		 var priceid='<?php echo $_GET['priceid']?>';
    	 var count=parseInt($('#buy_number').val());
    	 var num=parseInt($('#gwc_c').attr("gwc_c"));
    	 var num1=num+count;
    		$.ajax({
    				type:"POST",
    				url:"cart_ajax.php",
    				dataType:"html",
    				data:"id="+id+"&count="+count+"&priceid="+priceid, 
    					success:function(msg)
    					 {
    						$('#gwc_c').html(num1);
    						alert('��ӳɹ���');
    					}
    					});
}); 
	   $('#buy_now').click(function (){ 
		   var count=$('#buy_number').val();
    	  window.location.href="buy_1.php?productid=<?=$_GET['id']?>&count="+count+"&priceid=<?=$_GET['priceid']?>";
});
	   
	   
	   
	       //�Ӽ���ť
    $(".n_right").click(function(){
        //�жϰ�ť�Ƿ����
        if($(this).attr("class").indexOf("nopoint")>0)
            return false;
        var num = $('#buy_number');
        var oldValue = parseInt(num.val()); //ȡ�����ڵ�ֵ����ʹ��parseIntתΪint��������

        if(oldValue >= 49)
            $(this).addClass('nopoint');

        if(oldValue >= 50)
            return false;

        oldValue++;   //�Լ�1
        num.val(oldValue);  //�����Ӻ��ֵ�����ؼ�
        $(".n_left").removeClass("nopoint");
    });
    $(".n_left").click(function(){
        //�жϰ�ť�Ƿ����
        if($(this).attr("class").indexOf("nopoint")>0)
            return false;
        var num = $('#buy_number');
        var oldValue = parseInt(num.val()); //ȡ�����ڵ�ֵ����ʹ��parseIntתΪint��������
        oldValue--;   //�Լ�1
        num.val(oldValue);  //�����Ӻ��ֵ�����ؼ�
        $(".n_right").removeClass('nopoint');
        if ( num.val() < 2) {
            $(this).addClass("nopoint");
            num.val(1);
        }
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


<div class="wrapper_xq">
	<div class="dqwz">��ǰλ�ã�<a href="index.php">ȫ������></a><?=navigation($fid1,$fid2,$class)?><a href="#"><?=$content['productName']?></a></div>
    <div class="xq_div">
    	<div class="xq_left">
        	<div class="xq_l1">
            	<div class="xq_img">
                	<div id='preview'>
                        <div class='jqzoom' id='spec-n1' onClick="">
                            <IMG height='430'  src="userfiles/<?=index_title_cpsimg1($id)?>" jqimg="userfiles/<?=index_title_cpsimg1($id)?>" width='430'>
                        </div>
                        <div id='spec-n5'>
                            <div class='control' id='spec-left'>
                                <img src="images/cpxq_15.png"  />
                            </div>
                            <div id='spec-list'>
                                <ul class='list-h'>
                                   <?=m_index_title_cpsimg($id)?>
                                  
                                </ul>
                            </div>
                            <div class='control' id='spec-right'>
                                <img src="images/cpxq_17.png" />
                            </div>
                            
                        </div>
                    </div>
                    <SCRIPT type=text/javascript>
                        $(function(){			
                           $(".jqzoom").jqueryzoom({
                                xzoom:400,
                                yzoom:400,
                                offset:10,
                                position:"right",
                                preload:1,
                                lens:1
                            });
                            $("#spec-list").jdMarquee({
                                deriction:"left",
                                width:370,
                                height:75,
                                step:1,
                                speed:5,
                                delay:10,
                                control:true,
                                _front:"#spec-right",
                                _back:"#spec-left"
                            });
                            $("#spec-list img").bind("mouseover",function(){
                                var src=$(this).attr("src");
                                $("#spec-n1 img").eq(0).attr({
                                    src:src.replace("\/n5\/","\/n1\/"),
                                    jqimg:src.replace("\/n5\/","\/n0\/")
                                });
                                $(this).css({
                                    "border":"1px solid #ff6100",
                                    "padding":"0px"
                                });
                            }).bind("mouseout",function(){
                                $(this).css({
                                    "border":"1px solid #ccc",
                                    "padding":"0px"
                                });
                            });				
                        })
                        </SCRIPT>
                    
                   
                    <div class="scsp"><?=$if_add?></div>
                </div>
                <div class="xq_text">
                	<h3><?=$content['productName']?></h3>
                    <h4>�۸�<span>��<?=product_price_1($id,$priceid)?></span></h4>
                    <div class="xqxq">Ʒ�ƣ�<?=ppzView($content['brand'])?> <span></span>������λ��<?=$content['specifications']?> <span></span> ���أ�<?=ggzView($content['origin'])?><span></span> ����������<?=ggzView($content['materials'])?></div>
                    <div class="gg">
                    	<span>���</span>
                       <?=product_price($id)?>
                        
                    </div>
                    <div class="gmsl">����������<input type="button" value="-" class='n_left nopoint' />
                    <input  type='text' value='1' id="buy_number" class="input_text" /><input type="button" value="+"  class='n_right'/><br />
                    ���ѣ�����16:00ǰ�µ������մ�.</div>
                	<div class="add_gwc"><input type="button" value="���빺�ﳵ" id="add_cart" class="jrgwc" /><a href="javascript:void(0)" id="buy_now">��������</a></div>
                </div>
            </div>
            <div class="xq_l2">
            	<div class="xq_bd">
                	<ul>
                    	<li>��Ʒ����</li>
                        <li>�������ۺ�</li>
                        <li>��������</li>
                    </ul>
                </div>
                <div class="xq_hd">
                	<div class="xq_tal">
                    	<!--<div class="sp_xq1">
                        	<ul>
                            	<li>Ʒ�ƣ�����</li>
                                <li>������50��</li>
                                <li>������λ����</li>
                                <li>�������ڣ�</li>
                                <li>���أ��������</li>
                            </ul>
                            <ul>
                            	<li>���ࣺ����</li>
                                <li>ë�أ�</li>
                                <li>��������: ����������ʳ�þ��������޹�˾</li>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul>
                            	<li>������ʽ: ɢװ</li>
                                <li>��������: ���±���</li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>-->
                        <div class="sp_xq2"><?=$content['content']?></div>
                    </div>
                    <div class="xq_tal">
                    �ύ�˻�������<br />
    ��������������Ʒ�����������⣬�ҷ��ϵ������ߵ��˻������ߣ�������ϵ�������ߵĿͷ�����ȷ����������󣬵������߻ᾡ�찲�ſ����Ա����ȡ��������Ʒ��
                    </div>
                    <div class="xq_tal">
                    	<!--<div class="plxq2">
                            <div class="pl_l">
                                <dl>
                                    <dt><img src="images/pp_07.png" alt="" /></dt>
                                    <dd>1891*****776</dd>
                                </dl>
                            </div>
                            <div class="pl_r">
                                <div class="jt"><img src="images/pp_10.png" alt="" /></div>
                                <h3><span>2015-08-06</span><img src="images/pp_13.png" alt="" /></h3>
                                <p style="text-indent:2em">��ǩ��<span>����</span></p>
                                <p style="text-indent:2em">�ĵã������ָɾ�������</p>
                                <p>�������ڣ�2015-07-31</p>
                            </div>
                        </div>-->
                      <?=product_book($_GET['id'],10)?>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            	jQuery(".xq_l2").slide({ titCell:".xq_bd li", mainCell:".xq_hd",delayTime:0 });
            </script>
            <div class="xq_right">
        	<h3>�����Ƽ�</h3>
            <?=recommended_product(3,$class,$_GET['id'])?>
            
        </div>
        </div>
        
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
<body>
</body>
</html>
