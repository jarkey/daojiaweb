<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>无标题页</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="css/StyleSheet1.css" type=text/css rel=stylesheet>
<?php include("inc/1.php"); ?>
</HEAD>

<BODY bottomMargin=0 leftMargin=0 topMargin=0 scroll=no rightMargin=0>

<!--****订单管理******-->
<div class="leftmenu">
  <div class="left_bg_top1">订单管理</div>
 <div class="border1">
    <ul>
      <li><a href="orders/orders.php" target="rightFrame">订单列表</a></li>
      <li><a href="orders/orders_tc.php" target="rightFrame">提成订单</a></li> 
      <li><a href="orders/orders1.php" target="rightFrame">企业订单</a></li>     
    </ul>

  </div>
  <div class="left_bg_bottom1"></div>
</div>

<!--****单据管理******-->
<div class="leftmenu">
  <div class="left_bg_top1">单据管理</div>
 <div class="border1">
   <ul>
      <li><a href="orders/orders_dj.php?orderSearchType=7&djtitle=未付款的订单" target="rightFrame">未付款的订单</a></li>
      <li><a href="orders/orders_dj.php?orderSearchType=2&djtitle=已付款的订单" target="rightFrame">已付款的订单</a></li>
      <li><a href="orders/orders_dj.php?orderSearchType=1&djtitle=待发货的订单" target="rightFrame">待发货的订单</a></li>
      <li><a href="orders/orders_dj.php?orderSearchType=3&djtitle=发货中的订单" target="rightFrame">发货中的订单</a></li>
      <li><a href="orders/orders_dj.php?orderSearchType=4&djtitle=确认收货订单" target="rightFrame">确认收货订单</a></li>
      <li><a href="orders/orders_dj.php?orderSearchType=6&djtitle=已退货的订单" target="rightFrame">已退货的订单</a></li> 
      <li><a href="orders/orders_dj.php?orderSearchType=5&djtitle=已无效的订单" target="rightFrame">已无效的订单</a></li> 
                  
    </ul>
  </div>
  <div class="left_bg_bottom1"></div>
</div>


<!--****售后服务******-->
<div class="leftmenu">
  <div class="left_bg_top1">服务管理</div>
 <div class="border1">
   <ul>
      <li><a href="service/service.php" target="rightFrame">售后服务</a></li>
      <li><a href="tousu/service.php" target="rightFrame">在线投诉</a></li>
    </ul>

  </div>
  <div class="left_bg_bottom1"></div>
</div>

</BODY>
</HTML>
