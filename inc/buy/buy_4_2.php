<p style="width:100%; text-align:center;"><img src="css/icon/cart04.jpg" /></p>
<p>&nbsp; </p>

<form action="" method="post" class="buy_4">

<table cellspacing="1" cellpadding="0" align="center">
  <tr class="tr1">
    <td>&nbsp;&nbsp;<strong>��ȷ�϶���</strong></td>
  </tr>
   <tr class="tr2">
     <td>
     <strong>�ջ�����Ϣ</strong>��<A href="buy_2.php">[�޸�]</A><br />
     <div style="clear:both; margin-left:20px; line-height:25px;">
  �ջ��ˣ�<?=$_SESSION['b_consignee']?><br />
  �ջ���ַ��<?=$_SESSION['b_address']?><br />
  �������룺<?=$_SESSION['b_postcode']?><br />
  ��ϵ�绰��<?=$_SESSION['b_telephone']?><br />
  �ֻ���<?=$_SESSION['b_mobile']?> 
  </div>
    </td>
  </tr>
   <tr class="tr2">
     <td><strong>���ʽ</strong>��<?=$pay_name?>�� <A href="buy_3.php">[�޸�]</A></td>
   </tr>
   <tr class="tr2">
     <td><strong>�ͻ���ʽ</strong>��<?=$_SESSION['b_delivery']?>������ <A href="buy_3.php">[�޸�]</A></td>
   </tr>
   <tr class="tr2">
     <td><strong>��������</strong>����<span style="font-weight:bold; color:#900;"><?=$weight_price?></span> Ԫ</td>
   </tr>
   <tr class="tr2">
     <td><strong>����˵��</strong>��<?=$_SESSION['b_note']?>�� <A href="buy_3.php">[�޸�]</A></td>
   </tr>
</table>

  <table cellspacing="1" cellpadding="0" align="center">
    <tr class="tr1" align="center">
      <td>��Ʒ���</td>
      <td>��Ʒ����</td>
      <td>�� ɫ</td>    
      <td>�����</td>
      <td>��Ʒ����</td>
      <td>С ��</td>
    </tr>
  <?=$cart_content?>
  </table><br />


  <table cellspacing="0" cellpadding="0" align="center">
    <tr bgcolor="#FFFFFF">
      <td height="50"><a href="buy_1.php"><img src="css/icon/buy_fhgwc1.png" /></a></a></td>
      <td align="right">      <a href="buy_5.php?order=1"><img src="css/icon/buy_tjdd1.png" /></a><br />
      ��˶�������Ϣ��������ύ������</td>
      </tr>
  </table>

</form>