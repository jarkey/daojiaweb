<script type="text/javascript" src="js/header_nav.js"></script>
<script type="text/javascript" src="js/SetHome.js"></script>

<div class="topNav">
    <div class="topNav-width clearfix">
        <dl class="tnLeft">
            <dd class="dd1"><h3><a href="javascript:void(0)" onclick="SetHome(this,window.location)">��Ϊ��ҳ</a></h3></dd>    
            <dd class="dd2"><h3><a href="http://weibo.com/275467711/home?topnav=1&wvr=6" target="_blank">����΢��</a></h3></dd>  
        </dl><!-- tnLeft E -->
    
        <dl class="tnRight">
            <dd style="margin-right:5px;">
            <?php if($_SESSION['userid']!=''){
				?>
                 <a href="user_change.php"><?=$_SESSION['username']?></a>|<a href="index.php?exit=1">ע��</a>
                <?php
				}else{
					?>
                    <a href="user_login.php">��¼</a>|<a href="registered.php">ע��</a>
                    <?php
					} ?>
               </i>
            </dd>  
              
            <dd style="margin-right:0px; color:#999">
                <h3>|��<a href="user_order.php">�ҵĶ���<i></i></a>��|��</h3>
           <!--     <ul>
                    <li><a href="#">�ͻ�����</a></li>
                    <li><a href="#">�ͻ�����</a></li>
                    <li><a href="#">�ͻ�����</a></li>
                </ul>-->
            </dd>
             <dd style="margin-right:0px; color:#999">
                <h3>��<a href="news_view.php?id=258&class=14">��˾���<i></i></a>��|��</h3>
         
            </dd>
            <dd>
                <h3><a href="#">������·<i></i></a></h3>
                <ul>
                     <?=news_title(27,5,'news_view.php')?>
                </ul>
            </dd>
           
        </dl><!-- tnLeft E -->

    </div>
</div>

<script type="text/javascript">
    jQuery(".topNav").slide({ 
            type:"menu", //Ч������
            titCell:"dd", // ��괥������
            targetCell:"ul", // Ч�����󣬱��뱻titCell����
            delayTime:0, // Ч��ʱ��
            defaultPlay:false,  //Ĭ�ϲ�ִ��
            returnDefault:true // ����Ĭ��
        });
</script>