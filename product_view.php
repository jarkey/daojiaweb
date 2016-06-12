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
    						alert('添加成功！');
    					}
    					});
}); 
	   $('#buy_now').click(function (){ 
		   var count=$('#buy_number').val();
    	  window.location.href="buy_1.php?productid=<?=$_GET['id']?>&count="+count+"&priceid=<?=$_GET['priceid']?>";
});
	   
	   
	   
	       //加减按钮
    $(".n_right").click(function(){
        //判断按钮是否可用
        if($(this).attr("class").indexOf("nopoint")>0)
            return false;
        var num = $('#buy_number');
        var oldValue = parseInt(num.val()); //取出现在的值，并使用parseInt转为int类型数据

        if(oldValue >= 49)
            $(this).addClass('nopoint');

        if(oldValue >= 50)
            return false;

        oldValue++;   //自加1
        num.val(oldValue);  //将增加后的值付给控件
        $(".n_left").removeClass("nopoint");
    });
    $(".n_left").click(function(){
        //判断按钮是否可用
        if($(this).attr("class").indexOf("nopoint")>0)
            return false;
        var num = $('#buy_number');
        var oldValue = parseInt(num.val()); //取出现在的值，并使用parseInt转为int类型数据
        oldValue--;   //自减1
        num.val(oldValue);  //将增加后的值付给控件
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


<div class="wrapper_xq">
	<div class="dqwz">当前位置：<a href="index.php">全部分类></a><?=navigation($fid1,$fid2,$class)?><a href="#"><?=$content['productName']?></a></div>
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
                    <h4>价格：<span>￥<?=product_price_1($id,$priceid)?></span></h4>
                    <div class="xqxq">品牌：<?=ppzView($content['brand'])?> <span></span>计量单位：<?=$content['specifications']?> <span></span> 产地：<?=ggzView($content['origin'])?><span></span> 储存条件：<?=ggzView($content['materials'])?></div>
                    <div class="gg">
                    	<span>规格：</span>
                       <?=product_price($id)?>
                        
                    </div>
                    <div class="gmsl">购买数量：<input type="button" value="-" class='n_left nopoint' />
                    <input  type='text' value='1' id="buy_number" class="input_text" /><input type="button" value="+"  class='n_right'/><br />
                    提醒：当日16:00前下单，次日达.</div>
                	<div class="add_gwc"><input type="button" value="加入购物车" id="add_cart" class="jrgwc" /><a href="javascript:void(0)" id="buy_now">立即购买</a></div>
                </div>
            </div>
            <div class="xq_l2">
            	<div class="xq_bd">
                	<ul>
                    	<li>商品详情</li>
                        <li>配送与售后</li>
                        <li>交易评价</li>
                    </ul>
                </div>
                <div class="xq_hd">
                	<div class="xq_tal">
                    	<!--<div class="sp_xq1">
                        	<ul>
                            	<li>品牌：其他</li>
                                <li>起订量：50箱</li>
                                <li>计量单位：箱</li>
                                <li>生产日期：</li>
                                <li>产地：河南许昌</li>
                            </ul>
                            <ul>
                            	<li>分类：菌类</li>
                                <li>毛重：</li>
                                <li>生产厂家: 河南世纪香食用菌开发有限公司</li>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul>
                            	<li>售卖方式: 散装</li>
                                <li>储存条件: 低温保存</li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>-->
                        <div class="sp_xq2"><?=$content['content']?></div>
                    </div>
                    <div class="xq_tal">
                    提交退换货申请<br />
    购物后如果发现商品存在质量问题，且符合到家优蔬的退换货政策，请您联系到家优蔬的客服。在确认您的申请后，到家优蔬会尽快安排快递人员上门取回问题商品。
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
                                <p style="text-indent:2em">标签：<span>新鲜</span></p>
                                <p style="text-indent:2em">心得：新鲜又干净，方便</p>
                                <p>购买日期：2015-07-31</p>
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
        	<h3>热门推荐</h3>
            <?=recommended_product(3,$class,$_GET['id'])?>
            
        </div>
        </div>
        
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
<body>
</body>
</html>
