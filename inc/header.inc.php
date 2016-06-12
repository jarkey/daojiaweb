<script type="text/javascript" src="js/header_nav.js"></script>
<script type="text/javascript" src="js/SetHome.js"></script>

<div class="topNav">
    <div class="topNav-width clearfix">
        <dl class="tnLeft">
            <dd class="dd1"><h3><a href="javascript:void(0)" onclick="SetHome(this,window.location)">设为首页</a></h3></dd>    
            <dd class="dd2"><h3><a href="http://weibo.com/275467711/home?topnav=1&wvr=6" target="_blank">新浪微博</a></h3></dd>  
        </dl><!-- tnLeft E -->
    
        <dl class="tnRight">
            <dd style="margin-right:5px;">
            <?php if($_SESSION['userid']!=''){
				?>
                 <a href="user_change.php"><?=$_SESSION['username']?></a>|<a href="index.php?exit=1">注销</a>
                <?php
				}else{
					?>
                    <a href="user_login.php">登录</a>|<a href="registered.php">注册</a>
                    <?php
					} ?>
               </i>
            </dd>  
              
            <dd style="margin-right:0px; color:#999">
                <h3>|　<a href="user_order.php">我的订单<i></i></a>　|　</h3>
           <!--     <ul>
                    <li><a href="#">客户服务</a></li>
                    <li><a href="#">客户服务</a></li>
                    <li><a href="#">客户服务</a></li>
                </ul>-->
            </dd>
             <dd style="margin-right:0px; color:#999">
                <h3>　<a href="news_view.php?id=258&class=14">公司简介<i></i></a>　|　</h3>
         
            </dd>
            <dd>
                <h3><a href="#">新手上路<i></i></a></h3>
                <ul>
                     <?=news_title(27,5,'news_view.php')?>
                </ul>
            </dd>
           
        </dl><!-- tnLeft E -->

    </div>
</div>

<script type="text/javascript">
    jQuery(".topNav").slide({ 
            type:"menu", //效果类型
            titCell:"dd", // 鼠标触发对象
            targetCell:"ul", // 效果对象，必须被titCell包含
            delayTime:0, // 效果时间
            defaultPlay:false,  //默认不执行
            returnDefault:true // 返回默认
        });
</script>