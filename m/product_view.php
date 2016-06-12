<?php 

include_once("../inc/config.inc.php");
include_once("../inc/favorites_function.php");
$class=(int)$_GET['class'];
$id=(int)$_GET['id'];
$priceid=$_GET['priceid'];


$content=IdProductView($id);
$class=$content['class'];
$a=new favorites();
$if_add=$a->if_add($id,'gplat_product');
?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$content['productName']?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<!--自适应手机屏幕-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!--end 自适应手机屏幕-->
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
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
    				url:"../cart_ajax.php",
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


<body>
<div class="top_w2">
	<div class="back1"><a href="javascript:history.go(-1)">&lt;</a></div>
    分类
    <div class="back2"><a href="index.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper" style="padding-top:0px">
	<div class="xq">
    	<!--焦点图代码开始-->
        <div id="focus" class="focus">
            <div class="hd">
                <ul></ul>
            </div>
            <div class="bd">
                <ul>
                  <?=m_index_title_cpsimg($id)?>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            TouchSlide({ 
                slideCell:"#focus",
                titCell:".hd ul", 
                mainCell:".bd ul", 
                effect:"left", 
                autoPlay:true,//自动播放
                autoPage:true, 
            });
        </script>
        <!--焦点图结束-->
        <div class="xq_text">
        	<h4><?=$content['productName']?></h4>
            <p style="line-height:24px">价格：<span>￥<?=product_price_1($id,$priceid)?></span> </p>
             <div class="gg"><span>规格：</span>
<?=product_price($id)?></div>
            <div class="gmsl"> 购买数量：<input type="button" value="-" class='n_left nopoint' />
                    <input  type='text' value='1' id="buy_number" class="input_text" /><input type="button" value="+"  class='n_right'/> <br>
            提醒：当日16:00前下单，次日达.</div>
                    <div class="add_gwc">
                    <input type="button" value="加入购物车" id="add_cart" class="jrgwc" /><a href="javascript:void(0)" id="buy_now">立即购买</a>
			<?=$if_add?></div>
        </div>
        <div class="xq_div">
        	<h3>产品介绍</h3>
            <?=$content['content']?>
        </div>
    </div>	
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
