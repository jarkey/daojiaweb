<p style="width:100%; text-align:center;"><img src="css/icon/cart03.jpg" /></p>
<p>&nbsp; </p>
<form action="buy_4.php" method="post" class="buy_3">

<table cellspacing="1" cellpadding="0" align="center">
  <tr class="tr1">
    <td>&nbsp;&nbsp;<strong>付款方式</strong>：请选择付款方式</td>
  </tr>
   <tr class="tr2">
     <td>
    <input type="radio" name="pay"  value="货到付款" />货到付款&nbsp;&nbsp;&nbsp;&nbsp;<span class="huiTxt">详情请查看配送说明（仅限同一城市选择送货上门方式)</span>
<?=pay_view();?>
    </td>
  </tr>
</table>
<br />
<table cellspacing="1" cellpadding="0" align="center">
  <tr class="tr1">
    <td>&nbsp;&nbsp;<strong>送货方式</strong>：请选择送货方式</td>
  </tr>
   <tr class="tr2">
     <td>
   <?=$freight?>
    </td>
  </tr>
</table>
<br />
<table cellspacing="1" cellpadding="0" align="center">
  <tr class="tr1">
    <td>&nbsp;&nbsp;<strong>特殊说明</strong>：（关于商品配送的相关特殊说明） 150字以内</td>
  </tr>
   <tr class="tr2">
     <td style="padding:10px 20px;">
   <textarea name="note" id="textarea" cols="70" rows="4"></textarea>
    </td>
  </tr>
</table>

<div class="buy_btn_div"> <a href="buy_2.php"><img src="css/icon/buy_back.gif" width="70" height="38" /></a>&nbsp;&nbsp;<input type="image" src="css/icon/buy_next.gif" value="下一步" />
</div>
</form>