<?php
include('../inc/config.inc.php');
permissions('order_1_in');
$userid=$_GET['userid'];
if ($_GET['order']) {
	//��Ӷ���
	date_default_timezone_set('Asia/Shanghai');
    $times=date('H:i:s');
    $dates=date('Y:m:d');
    $orderNo='109'.date('YmdHis');
    $status=$_POST['status'];
	$payment=$_POST['payment'];
	$delivery=$_POST['delivery'];
	$email=$_POST['email'];
    
    $b_consignee=$_POST['consignee'];
	$b_address=$_POST['address'];
	$b_telephone=$_POST['telephone'];
	$b_mobile=$_POST['mobile'];
	$b_postcode=$_POST['postcode'];
	$b_remarks=$_POST['remarks'];
	$b_pay=$_POST['pay'];
    $b_note=$_POST['note'];
    
    $sql="insert into gplat_order_cart (carriage,consignee,telephone,mobile,address,postcode,note,userid,username,times,dates,status,orderNo,payment,delivery,email) values (
    '$b_delivery','$b_consignee','$b_telephone','$b_mobile','$b_address','$b_postcode','$b_note','$userid','$username','$times','$dates','$status','$orderNo','$payment','$delivery','$email'
    )";
    $result=mysql_query($sql);
    $orderid=mysql_insert_id();
   
   $productNum=$_POST['productNum'];
   $price=$_POST['price'];
   $num=$_POST['num'];
   $productname=$_POST['productname'];
   $sql_cart="insert into gplat_order_product (orderid,num,price,productname) values('$orderid','$cart_count','$cart_price','$cart_name')";
    $result_cart=mysql_query($sql_cart);
   
}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head><body>
<form action="<?=$filename?>?userid=<?=$_GET['userid']?>" method="post">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
    <tr>
      <td class="tdBorder1">��Ʒ��ţ�</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="productNum">
        <input type="hidden" name="orders" value="orders"></td>
      <td class="tdBorder1">��Ʒ���ƣ�</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="productname">
        </td>
    </tr>
    <tr>
      <td class="tdBorder1">���ۣ�</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="price">
     </td>
      <td class="tdBorder1">������</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="num"></td>
    </tr>
    <tr>
      <td class="tdBorder1">�˷ѣ�</td>
      <td class="tdBorder1">&nbsp;
        </td>
      <td class="tdBorder1">&nbsp;</td>
      <td class="tdBorder1">&nbsp;</td>
    </tr>
    <tr >
      <td colspan="4" class="tdBorder1" bgcolor="#E6DEDB"><span style="color:#00F; font-size:14px; font-weight:bold">�ջ�����Ϣ</span></td>
    </tr>
    <tr>
      <td class="tdBorder1">�ջ��ˣ�</td>
      <td class="tdBorder1">&nbsp;
        <input type="text" name="consignee" value="" /></td>
      <td class="tdBorder1">��ַ��</td>
      <td class="tdBorder1"><input type="text" name="address" value="" /></td>
    </tr>
    <tr>
      <td class="tdBorder1">�绰��</td>
      <td class="tdBorder1">&nbsp;
        <input type="text" name="telephone" id="telephone" value="" /></td>
      <td class="tdBorder1">�ֻ���</td>
      <td class="tdBorder1"><input type="text" name="mobile" id="mobile" value=""/></td>
    </tr>
    <tr>
      <td class="tdBorder1">���䣺</td>
      <td colspan="3" class="tdBorder1">&nbsp;
        <input type="text" name="email" /></td>
    </tr>
    <tr>
      <td class="tdBorder1">�ʱࣺ</td>
      <td class="tdBorder1">&nbsp;
        <input type="text" name="postcode" id="postcode"  value=""/></td>
      <td class="tdBorder1">���˷�ʽ��</td>
      <td class="tdBorder1"><input type="text" name="carriage" id="carriage"  value="" size="50"/></td>
    </tr>
    <tr >
      <td colspan="4" class="tdBorder1" bgcolor="#E6DEDB"><span style="color:#00F; font-size:14px; font-weight:bold">������Ϣ</span></td>
    </tr>
    <tr>
      <td class="tdBorder1">����״̬��</td>
      <td class="tdBorder1"><select name="payment">
        <option value="δ����" >δ����</option>
        <option value="�Ѹ���" >�Ѹ���</option>
      </select>
        &nbsp;</td>
      <td class="tdBorder1">����״̬��</td>
      <td class="tdBorder1"><select name="delivery">
        <option value="δ����">δ����</option>
        <option value="�ѷ���">�ѷ���</option>
        <option value="�ջ�ȷ��">�ջ�ȷ��</option>
      </select></td>
    </tr>
    <tr>
      <td class="tdBorder1">����״̬��</td>
      <td class="tdBorder1"><select name="status">
        <option value="δȷ��">δȷ��</option>
        <option value="��ȷ��">��ȷ��</option>
        <option value="�˻�">�˻�</option>
      </select></td>
      <td class="tdBorder1">�����ʼ���</td>
      <td class="tdBorder1"><label>
        <input name="ifMail" type="checkbox" id="ifMail" value="1">
        �ʼ�����</label></td>
    </tr>
    <tr>
      <td class="tdBorder1">��ע��</td>
      <td colspan="3" class="tdBorder1"><textarea name="note" rows="5" cols="70" id="note">
     </textarea></td>
    </tr>
    <tr>
      <td colspan="4" class="tdBorder1">&nbsp;
        <input type="submit" value="�ύ" />
        <input type="reset" value="����" /></td>
    </tr>
  </table>
</form>
</body></html>