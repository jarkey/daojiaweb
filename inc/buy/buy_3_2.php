<p style="width:100%; text-align:center;"><img src="css/icon/cart03.jpg" /></p>
<p>&nbsp; </p>
<form action="buy_4.php" method="post" class="buy_3">

<table cellspacing="1" cellpadding="0" align="center">
  <tr class="tr1">
    <td>&nbsp;&nbsp;<strong>���ʽ</strong>����ѡ�񸶿ʽ</td>
  </tr>
   <tr class="tr2">
     <td>
    <input type="radio" name="pay"  value="��������" />��������&nbsp;&nbsp;&nbsp;&nbsp;<span class="huiTxt">������鿴����˵��������ͬһ����ѡ���ͻ����ŷ�ʽ)</span>
<?=pay_view();?>
    </td>
  </tr>
</table>
<br />
<table cellspacing="1" cellpadding="0" align="center">
  <tr class="tr1">
    <td>&nbsp;&nbsp;<strong>�ͻ���ʽ</strong>����ѡ���ͻ���ʽ</td>
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
    <td>&nbsp;&nbsp;<strong>����˵��</strong>����������Ʒ���͵��������˵���� 150������</td>
  </tr>
   <tr class="tr2">
     <td style="padding:10px 20px;">
   <textarea name="note" id="textarea" cols="70" rows="4"></textarea>
    </td>
  </tr>
</table>

<div class="buy_btn_div"> <a href="buy_2.php"><img src="css/icon/buy_back.gif" width="70" height="38" /></a>&nbsp;&nbsp;<input type="image" src="css/icon/buy_next.gif" value="��һ��" />
</div>
</form>