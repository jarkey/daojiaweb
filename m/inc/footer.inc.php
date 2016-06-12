<?php
if($nav<1){$f_img0='sy_54_1.png';$f_img0_1='sy_54_1.png'; $css_on='class="on"';}else{$f_img0='sy_54.png';$f_img0_1='sy_54_1.png';}
if($nav==1){$f1_img0='sy_61_1.png';$f1_img0_1='sy_61_1.png'; $css_on1='class="on"';	}else{$f1_img0='sy_61.png';$f1_img0_1='sy_61_1.png';}
if($nav==2){$f2_img0='sy_59_1.png';$f2_img0_1='sy_59_1.png'; $css_on2='class="on"';	}else{$f2_img0='sy_59.png';$f2_img0_1='sy_59_1.png';}
if($nav==3){$f3_img0='sy_56_1.png';$f3_img0_1='sy_56_1.png'; $css_on3='class="on"';	}else{$f3_img0='sy_56.png';$f3_img0_1='sy_56_1.png';}
?>
<div class="foot_w">
	<ul>
    	<li <?=$css_on?>><a href="index.php"><img src="images/<?=$f_img0?>" alt="" onMouseOver="this.src='images/<?=$f_img0_1?>'"
onMouseOut="this.src='images/<?=$f_img0?>'"><br>首页</a></li>
         <li <?=$css_on1?>><a href="user_order.php"><img src="images/<?=$f1_img0?>" onMouseOver="this.src='images/<?=$f1_img0_1?>'"
onMouseOut="this.src='images/<?=$f1_img0?>'"><br>订单</a></li>
        <li <?=$css_on2?>><a href="buy_1.php"><img src="images/<?=$f2_img0?>" onMouseOver="this.src='images/<?=$f2_img0_1?>'"
onMouseOut="this.src='images/<?=$f2_img0?>'"><br>购物车</a></li>
       <li <?=$css_on3?>><a href="user_change.php"><img src="images/<?=$f3_img0?>" onMouseOver="this.src='images/<?=$f3_img0_1?>'"
onMouseOut="this.src='images/<?=$f3_img0?>'"><br>会员中心</a></li>
    </ul>
</div>