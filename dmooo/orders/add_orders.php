<?php
include('../inc/config.inc.php');
permissions('order_1_in');
$userid=$_GET['userid'];
if ($_GET['order']) {
	//添加订单
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
      <td class="tdBorder1">商品编号：</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="productNum">
        <input type="hidden" name="orders" value="orders"></td>
      <td class="tdBorder1">商品名称：</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="productname">
        </td>
    </tr>
    <tr>
      <td class="tdBorder1">单价：</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="price">
     </td>
      <td class="tdBorder1">数量：</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="num"></td>
    </tr>
    <tr>
      <td class="tdBorder1">运费：</td>
      <td class="tdBorder1">&nbsp;
        </td>
      <td class="tdBorder1">&nbsp;</td>
      <td class="tdBorder1">&nbsp;</td>
    </tr>
    <tr >
      <td colspan="4" class="tdBorder1" bgcolor="#E6DEDB"><span style="color:#00F; font-size:14px; font-weight:bold">收货人信息</span></td>
    </tr>
    <tr>
      <td class="tdBorder1">收货人：</td>
      <td class="tdBorder1">&nbsp;
        <input type="text" name="consignee" value="" /></td>
      <td class="tdBorder1">地址：</td>
      <td class="tdBorder1"><input type="text" name="address" value="" /></td>
    </tr>
    <tr>
      <td class="tdBorder1">电话：</td>
      <td class="tdBorder1">&nbsp;
        <input type="text" name="telephone" id="telephone" value="" /></td>
      <td class="tdBorder1">手机：</td>
      <td class="tdBorder1"><input type="text" name="mobile" id="mobile" value=""/></td>
    </tr>
    <tr>
      <td class="tdBorder1">邮箱：</td>
      <td colspan="3" class="tdBorder1">&nbsp;
        <input type="text" name="email" /></td>
    </tr>
    <tr>
      <td class="tdBorder1">邮编：</td>
      <td class="tdBorder1">&nbsp;
        <input type="text" name="postcode" id="postcode"  value=""/></td>
      <td class="tdBorder1">货运方式：</td>
      <td class="tdBorder1"><input type="text" name="carriage" id="carriage"  value="" size="50"/></td>
    </tr>
    <tr >
      <td colspan="4" class="tdBorder1" bgcolor="#E6DEDB"><span style="color:#00F; font-size:14px; font-weight:bold">操作信息</span></td>
    </tr>
    <tr>
      <td class="tdBorder1">付款状态：</td>
      <td class="tdBorder1"><select name="payment">
        <option value="未付款" >未付款</option>
        <option value="已付款" >已付款</option>
      </select>
        &nbsp;</td>
      <td class="tdBorder1">发货状态：</td>
      <td class="tdBorder1"><select name="delivery">
        <option value="未发货">未发货</option>
        <option value="已发货">已发货</option>
        <option value="收货确认">收货确认</option>
      </select></td>
    </tr>
    <tr>
      <td class="tdBorder1">订单状态：</td>
      <td class="tdBorder1"><select name="status">
        <option value="未确认">未确认</option>
        <option value="已确认">已确认</option>
        <option value="退货">退货</option>
      </select></td>
      <td class="tdBorder1">提醒邮件：</td>
      <td class="tdBorder1"><label>
        <input name="ifMail" type="checkbox" id="ifMail" value="1">
        邮件提醒</label></td>
    </tr>
    <tr>
      <td class="tdBorder1">备注：</td>
      <td colspan="3" class="tdBorder1"><textarea name="note" rows="5" cols="70" id="note">
     </textarea></td>
    </tr>
    <tr>
      <td colspan="4" class="tdBorder1">&nbsp;
        <input type="submit" value="提交" />
        <input type="reset" value="重置" /></td>
    </tr>
  </table>
</form>
</body></html>