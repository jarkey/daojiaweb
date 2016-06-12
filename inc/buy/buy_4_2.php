<p style="width:100%; text-align:center;"><img src="css/icon/cart04.jpg" /></p>
<p>&nbsp; </p>

<form action="" method="post" class="buy_4">

<table cellspacing="1" cellpadding="0" align="center">
  <tr class="tr1">
    <td>&nbsp;&nbsp;<strong>请确认订单</strong></td>
  </tr>
   <tr class="tr2">
     <td>
     <strong>收货人信息</strong>：<A href="buy_2.php">[修改]</A><br />
     <div style="clear:both; margin-left:20px; line-height:25px;">
  收货人：<?=$_SESSION['b_consignee']?><br />
  收货地址：<?=$_SESSION['b_address']?><br />
  邮政编码：<?=$_SESSION['b_postcode']?><br />
  联系电话：<?=$_SESSION['b_telephone']?><br />
  手机：<?=$_SESSION['b_mobile']?> 
  </div>
    </td>
  </tr>
   <tr class="tr2">
     <td><strong>付款方式</strong>：<?=$pay_name?>　 <A href="buy_3.php">[修改]</A></td>
   </tr>
   <tr class="tr2">
     <td><strong>送货方式</strong>：<?=$_SESSION['b_delivery']?>　　　 <A href="buy_3.php">[修改]</A></td>
   </tr>
   <tr class="tr2">
     <td><strong>物流费用</strong>：￥<span style="font-weight:bold; color:#900;"><?=$weight_price?></span> 元</td>
   </tr>
   <tr class="tr2">
     <td><strong>特殊说明</strong>：<?=$_SESSION['b_note']?>　 <A href="buy_3.php">[修改]</A></td>
   </tr>
</table>

  <table cellspacing="1" cellpadding="0" align="center">
    <tr class="tr1" align="center">
      <td>商品编号</td>
      <td>商品名称</td>
      <td>颜 色</td>    
      <td>结算价</td>
      <td>商品数量</td>
      <td>小 计</td>
    </tr>
  <?=$cart_content?>
  </table><br />


  <table cellspacing="0" cellpadding="0" align="center">
    <tr bgcolor="#FFFFFF">
      <td height="50"><a href="buy_1.php"><img src="css/icon/buy_fhgwc1.png" /></a></a></td>
      <td align="right">      <a href="buy_5.php?order=1"><img src="css/icon/buy_tjdd1.png" /></a><br />
      请核对以上信息，点击“提交订单”</td>
      </tr>
  </table>

</form>