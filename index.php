<?php 
$pageTitle="首页";    //当前页标题
include_once("inc/config.inc.php");
if($_GET['exit']==1){
unset($_SESSION['email']);
unset($_SESSION['userid']);
unset($_SESSION['username']);
	}
	
$ad_j_1=flashAd3(3,0);
$ad_j_2=flashAd3(3,1);
$ad_j_3=flashAd3(3,2);
$ad_j_4=flashAd3(3,3);
$ad_j_5=flashAd3(3,4);
$ad_j_6=flashAd3(3,5);
$ad_j_7=flashAd3(3,6);


$ad_1_1=flashAd3(4,0);
$ad_1_2=flashAd3(4,1);
$ad_1_3=flashAd3(4,2);
$ad_1_4=flashAd3(4,3);
$ad_1_5=flashAd3(4,4);
$ad_1_6=flashAd3(4,5);
$ad_1_7=flashAd3(4,6);

$ad_2_1=flashAd3(5,0);
$ad_2_2=flashAd3(5,1);
$ad_2_3=flashAd3(5,2);
$ad_2_4=flashAd3(5,3);
$ad_2_5=flashAd3(5,4);
$ad_2_6=flashAd3(5,5);
$ad_2_7=flashAd3(5,6);

$ad_3_1=flashAd3(6,0);
$ad_3_2=flashAd3(6,1);
$ad_3_3=flashAd3(6,2);
$ad_3_4=flashAd3(6,3);
$ad_3_5=flashAd3(6,4);
$ad_3_6=flashAd3(6,5);
$ad_3_7=flashAd3(6,6);

$ad_4_1=flashAd3(7,0);
$ad_4_2=flashAd3(7,1);
$ad_4_3=flashAd3(7,2);
$ad_4_4=flashAd3(7,3);
$ad_4_5=flashAd3(7,4);
$ad_4_6=flashAd3(7,5);
$ad_4_7=flashAd3(7,6);

$ad_5_1=flashAd3(8,0);
$ad_5_2=flashAd3(8,1);
$ad_5_3=flashAd3(8,2);
$ad_5_4=flashAd3(8,3);
$ad_5_5=flashAd3(8,4);
$ad_5_6=flashAd3(8,5);
$ad_5_7=flashAd3(8,6);

$ad_6_1=flashAd3(9,0);
$ad_6_2=flashAd3(9,1);
$ad_6_3=flashAd3(9,2);
$ad_6_4=flashAd3(9,3);
$ad_6_5=flashAd3(9,4);
$ad_6_6=flashAd3(9,5);
$ad_6_7=flashAd3(9,6);

$ad_7_1=flashAd3(10,0);
$ad_7_2=flashAd3(10,1);
$ad_7_3=flashAd3(10,2);
$ad_7_4=flashAd3(10,3);
$ad_7_5=flashAd3(10,4);
$ad_7_6=flashAd3(10,5);
$ad_7_7=flashAd3(10,6);
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
    
    <ul id="nav">
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
 

    
    
    
    <div class="gr_div">
     <?php if($_SESSION['userid']!=''){
				?>
               <div class="gr1">
        	<dl>
            	<dt><a href="#"><img src="userfiles/<?=$_SESSION['img']?>" width="59" height="59"  alt="" /></a></dt>
                <dd>
                	<h4><?=$_SESSION['username']?>,下午好</h4>
                    <p><a href="index.php?exit=1">注销</a></p>
                </dd>
            </dl>
        </div>
        <div class="gr2">
        	<a href="user_change.php">会员中心</a><a href="user_order.php">我的订单</a>
        </div>
                <?php
				}else{
					?>
                    	<div class="gr1">
        	<dl>
            	<dt><a href="#"><img src="images/index_22.png" width="59" height="59" alt="" /></a></dt>
                <dd>
                	<h4>Hi,欢迎光临</h4>
                    <p><a href="user_login.php">请登录</a></p>
                </dd>
            </dl>
        </div>
        <div class="gr2">
        	 <a href="user_login.php">登录</a><a href="registered.php">注册</a>
        </div>
                   
                    <?php
					} ?>
    	
        <div class="grr2">
        	<ul>
            	<li><a href="#"><span>20</span>付款</a></li>
                <li><a href="#"><span>15</span>待收货</a></li>
                <li style="border-right:0px;"><a href="#"><span>9</span>待评论</a></li>
                <li><a href="#"><span>8</span>报价中</a></li>
                <li><a href="#"><span>6</span>报名中</a></li>
                <li style="border-right:0px;"><a href="#"><span>30</span>投标中</a></li>
            </ul>
        </div>
        <div class="gr3">
        	<dl>
            	<a href="#">
                	<dt><img src="images/index_39.png" alt="" /></dt>
                    <dd>微信</dd>
                </a>
            </dl>
            <dl>
            	<a href="#">
                	<dt><img src="images/index_34.png" alt="" /></dt>
                    <dd>APP</dd>
                </a>
            </dl>
            <dl>
            	<a href="#">
                	<dt><img src="images/index_36.png" alt="" /></dt>
                    <dd>品质保证</dd>
                </a>
            </dl>
        	
        </div>
        <div class="gr4">
        	<h3><a href="news.php?class=20">更多</a>公告资讯</h3>
            <ul>
            <?=news_title(20,4,'news_view.php')?>
            </ul>
        </div>
    </div>
</div>

<div class="banner">
	<div class="fullSlide">
		<div class="bd">
			<ul>
				<?=flashAd1(1,5)?>
			
			</ul>
		</div>
 
		<div class="hd"><ul></ul></div>
		<span class="prev"></span>
		<span class="next"></span>
	</div>
 
	<script type="text/javascript">
		
		/* 控制左右按钮显示 */
		jQuery(".fullSlide").hover(function(){ jQuery(this).find(".prev,.next").stop(true,true).fadeTo("show",1) },function(){ jQuery(this).find(".prev,.next").fadeOut() });
 
		/* 调用SuperSlide */
		jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click",
			startFun:function(i){
				var curLi = jQuery(".fullSlide .bd li").eq(i); /* 当前大图的li */
				if( !!curLi.attr("_src") ){
					curLi.css("background-image",curLi.attr("_src")).removeAttr("_src") /* 将_src地址赋予li背景，然后删除_src */
				}
			}
		});
	</script>

    
	
    
    <div class="dp_div">
    	<ul>
        	<?=flashAd2(2,3)?>
        </ul>
    </div>
</div>

<div class="wrapper">
	<div class="w1">
    	<h3>精选促销</h3>
        <div class="w1_c">
        	<div class="w1_imgl"><a href="<?=$ad_j_1['url']?>"><img src="userfiles/<?=$ad_j_1['img']?>" width="240" height="380" alt=""></a></div>
            <dl>
            	<dt><a href="<?=$ad_j_2['url']?>"><img src="userfiles/<?=$ad_j_2['img']?>" alt="" height="380" width="237"></a></dt>
            </dl>
            <ul>
            	<li><a href="<?=$ad_j_3['url']?>"><img src="userfiles/<?=$ad_j_3['img']?>" alt=""></a></li>
                <li><a href="<?=$ad_j_4['url']?>"><img src="userfiles/<?=$ad_j_4['img']?>" alt=""></a></li>
                <li class="li_b"><a href="<?=$ad_j_5['url']?>"><img src="userfiles/<?=$ad_j_5['img']?>" alt=""></a></li>
                <li class="li_b"><a href="<?=$ad_j_6['url']?>"><img src="userfiles/<?=$ad_j_6['img']?>" alt=""></a></li>
            </ul>
            <div class="w1_imgr"><a href="<?=$ad_j_7['url']?>"><img src="userfiles/<?=$ad_j_7['img']?>" alt=""></a></div>
        </div>
    </div>
    
    <div class="w2" id="w1">
    	<h3><a href="product.php?fid1=1">更多</a><span>F1</span>优质蔬菜</h3>
        <div class="w2_c">
        	<div class="w2c_l">
            	<ul>
                	<li class="lib"><a href="<?=$ad_1_1['url']?>"><img src="userfiles/<?=$ad_1_1['img']?>" alt="" /></a></li>
                </ul>
            </div>
            <dl>
            	<dt><a href="<?=$ad_1_2['url']?>"><img src="userfiles/<?=$ad_1_2['img']?>" alt=""></a></dt>
           </dl>
            <div class="w2c_r">
            	<ul>
                	<li><a href="<?=$ad_1_3['url']?>"><img src="userfiles/<?=$ad_1_3['img']?>" alt=""></a></li>
                    <li><a href="<?=$ad_1_4['url']?>"><img src="userfiles/<?=$ad_1_4['img']?>" alt=""></a></li>
                    <li style="border-right:0px;"><a href="<?=$ad_1_5['url']?>"><img src="userfiles/<?=$ad_1_5['img']?>" alt=""></a></li>
                    <li class="li_big" style="border-bottom:0px;"><a href="<?=$ad_1_6['url']?>"><img src="userfiles/<?=$ad_1_6['img']?>" alt=""></a></li>
                    <li style="border-bottom:0px;border-right:0px;"><a href="<?=$ad_1_7['url']?>"><img src="userfiles/<?=$ad_1_7['img']?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="w2" id="w2">
    	<h3><a href="product.php?fid1=2">更多</a><span>F2</span>精品水果</h3>
        <div class="w2_c">
        	<div class="w2c_l">
            	<ul>
                	<li class="lib"><a href="<?=$ad_2_1['url']?>"><img src="userfiles/<?=$ad_2_1['img']?>" alt="" /></a></li>
                </ul>
            </div>
            <dl>
            	<dt><a href="<?=$ad_2_2['url']?>"><img src="userfiles/<?=$ad_2_2['img']?>" alt=""></a></dt>
           </dl>
            <div class="w2c_r">
            	<ul>
                	<li><a href="<?=$ad_2_3['url']?>"><img src="userfiles/<?=$ad_2_3['img']?>" alt=""></a></li>
                    <li><a href="<?=$ad_2_4['url']?>"><img src="userfiles/<?=$ad_2_4['img']?>" alt=""></a></li>
                    <li style="border-right:0px;"><a href="<?=$ad_2_5['url']?>"><img src="userfiles/<?=$ad_2_5['img']?>" alt=""></a></li>
                    <li class="li_big" style="border-bottom:0px;"><a href="<?=$ad_2_6['url']?>"><img src="userfiles/<?=$ad_2_6['img']?>" alt=""></a></li>
                    <li style="border-bottom:0px;border-right:0px;"><a href="<?=$ad_2_7['url']?>"><img src="userfiles/<?=$ad_2_7['img']?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="w2" id="w3">
    	<h3><a href="product.php?fid1=3">更多</a><span>F3</span>鲜肉蛋禽</h3>
        <div class="w2_c">
        		<div class="w2c_l">
            	<ul>
                	<li class="lib"><a href="<?=$ad_3_1['url']?>"><img src="userfiles/<?=$ad_3_1['img']?>" alt="" /></a></li>
                </ul>
            </div>
            <dl>
            	<dt><a href="<?=$ad_3_2['url']?>"><img src="userfiles/<?=$ad_3_2['img']?>" alt=""></a></dt>
           </dl>
            <div class="w2c_r">
            	<ul>
                	<li><a href="<?=$ad_3_3['url']?>"><img src="userfiles/<?=$ad_3_3['img']?>" alt=""></a></li>
                    <li><a href="<?=$ad_3_4['url']?>"><img src="userfiles/<?=$ad_3_4['img']?>" alt=""></a></li>
                    <li style="border-right:0px;"><a href="<?=$ad_3_5['url']?>"><img src="userfiles/<?=$ad_3_5['img']?>" alt=""></a></li>
                    <li class="li_big" style="border-bottom:0px;"><a href="<?=$ad_3_6['url']?>"><img src="userfiles/<?=$ad_3_6['img']?>" alt=""></a></li>
                    <li style="border-bottom:0px;border-right:0px;"><a href="<?=$ad_3_7['url']?>"><img src="userfiles/<?=$ad_3_7['img']?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="w2" id="w4">
    	<h3><a href="product.php?fid1=4">更多</a><span>F4</span>水产海鲜</h3>
        <div class="w2_c">
        		<div class="w2c_l">
            	<ul>
                	<li class="lib"><a href="<?=$ad_4_1['url']?>"><img src="userfiles/<?=$ad_4_1['img']?>" alt="" /></a></li>
                </ul>
            </div>
            <dl>
            	<dt><a href="<?=$ad_4_2['url']?>"><img src="userfiles/<?=$ad_4_2['img']?>" alt=""></a></dt>
           </dl>
            <div class="w2c_r">
            	<ul>
                	<li><a href="<?=$ad_4_3['url']?>"><img src="userfiles/<?=$ad_4_3['img']?>" alt=""></a></li>
                    <li><a href="<?=$ad_4_4['url']?>"><img src="userfiles/<?=$ad_4_4['img']?>" alt=""></a></li>
                    <li style="border-right:0px;"><a href="<?=$ad_4_5['url']?>"><img src="userfiles/<?=$ad_4_5['img']?>" alt=""></a></li>
                    <li class="li_big" style="border-bottom:0px;"><a href="<?=$ad_4_6['url']?>"><img src="userfiles/<?=$ad_4_6['img']?>" alt=""></a></li>
                    <li style="border-bottom:0px;border-right:0px;"><a href="<?=$ad_4_7['url']?>"><img src="userfiles/<?=$ad_4_7['img']?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="w2" id="w5">
    	<h3><a href="product.php?fid1=5">更多</a><span>F5</span>粮油副食</h3>
        <div class="w2_c">
        		<div class="w2c_l">
            	<ul>
                	<li class="lib"><a href="<?=$ad_5_1['url']?>"><img src="userfiles/<?=$ad_5_1['img']?>" alt="" /></a></li>
                </ul>
            </div>
            <dl>
            	<dt><a href="<?=$ad_5_2['url']?>"><img src="userfiles/<?=$ad_5_2['img']?>" alt=""></a></dt>
           </dl>
            <div class="w2c_r">
            	<ul>
                	<li><a href="<?=$ad_5_3['url']?>"><img src="userfiles/<?=$ad_5_3['img']?>" alt=""></a></li>
                    <li><a href="<?=$ad_5_4['url']?>"><img src="userfiles/<?=$ad_5_4['img']?>" alt=""></a></li>
                    <li style="border-right:0px;"><a href="<?=$ad_5_5['url']?>"><img src="userfiles/<?=$ad_5_5['img']?>" alt=""></a></li>
                    <li class="li_big" style="border-bottom:0px;"><a href="<?=$ad_5_6['url']?>"><img src="userfiles/<?=$ad_5_6['img']?>" alt=""></a></li>
                    <li style="border-bottom:0px;border-right:0px;"><a href="<?=$ad_5_7['url']?>"><img src="userfiles/<?=$ad_5_7['img']?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="w2" id="w6">
    	<h3><a href="product.php?fid1=6">更多</a><span>F6</span>零食酒水</h3>
        <div class="w2_c">
        		<div class="w2c_l">
            	<ul>
                	<li class="lib"><a href="<?=$ad_6_1['url']?>"><img src="userfiles/<?=$ad_6_1['img']?>" alt="" /></a></li>
                </ul>
            </div>
            <dl>
            	<dt><a href="<?=$ad_6_2['url']?>"><img src="userfiles/<?=$ad_6_2['img']?>" alt=""></a></dt>
           </dl>
            <div class="w2c_r">
            	<ul>
                	<li><a href="<?=$ad_6_3['url']?>"><img src="userfiles/<?=$ad_6_3['img']?>" alt=""></a></li>
                    <li><a href="<?=$ad_6_4['url']?>"><img src="userfiles/<?=$ad_6_4['img']?>" alt=""></a></li>
                    <li style="border-right:0px;"><a href="<?=$ad_6_5['url']?>"><img src="userfiles/<?=$ad_6_5['img']?>" alt=""></a></li>
                    <li class="li_big" style="border-bottom:0px;"><a href="<?=$ad_6_6['url']?>"><img src="userfiles/<?=$ad_6_6['img']?>" alt=""></a></li>
                    <li style="border-bottom:0px;border-right:0px;"><a href="<?=$ad_6_7['url']?>"><img src="userfiles/<?=$ad_6_7['img']?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="w2" id="w7">
    	<h3><a href="product.php?fid1=7">更多</a><span>F7</span>精选礼盒</h3>
        <div class="w2_c">
        		<div class="w2c_l">
            	<ul>
                	<li class="lib"><a href="<?=$ad_7_1['url']?>"><img src="userfiles/<?=$ad_7_1['img']?>" alt="" /></a></li>
                </ul>
            </div>
            <dl>
            	<dt><a href="<?=$ad_7_2['url']?>"><img src="userfiles/<?=$ad_7_2['img']?>" alt=""></a></dt>
           </dl>
            <div class="w2c_r">
            	<ul>
                	<li><a href="<?=$ad_7_3['url']?>"><img src="userfiles/<?=$ad_7_3['img']?>" alt=""></a></li>
                    <li><a href="<?=$ad_7_4['url']?>"><img src="userfiles/<?=$ad_7_4['img']?>" alt=""></a></li>
                    <li style="border-right:0px;"><a href="<?=$ad_7_5['url']?>"><img src="userfiles/<?=$ad_7_5['img']?>" alt=""></a></li>
                    <li class="li_big" style="border-bottom:0px;"><a href="<?=$ad_7_6['url']?>"><img src="userfiles/<?=$ad_7_6['img']?>" alt=""></a></li>
                    <li style="border-bottom:0px;border-right:0px;"><a href="<?=$ad_7_7['url']?>"><img src="userfiles/<?=$ad_7_7['img']?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    
</div>


<?php require('inc/footer.inc.php'); ?>


<!--<div class="left">
	<ul>
    	<li><a href="#"><img src="images/index_84.png" alt="" />在线客服</a></li>
        <li><a href="#"><img src="images/index_88.png" alt="" />微信买单</a></li>
        <li><a href="#"><img src="images/index_97.png" alt="" />手机APP</a></li>
    </ul>
</div>-->

<div class="right" style="z-index:100">
	<ul>
    	<li><a href="#w1">优质蔬菜</a></li>
        <li><a href="#w2">精品水果</a></li>
        <li><a href="#w3">鲜肉蛋禽</a></li>
        <li><a href="#w4">水产海鲜</a></li>
        <li><a href="#w5">粮油副食</a></li>
        <li><a href="#w6">零食酒水</a></li>
        <li><a href="#w7">精选礼盒</a></li>
        <li><a href="#" style="padding-top:15px; padding-bottom:10px;"><img src="images/index_109.png" class="" /><br />TOP</a></li>
    </ul>
</div>
</body>
</html>
