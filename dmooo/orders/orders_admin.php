<?php
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('../../inc/mail_send.php');
/**********�޸�����*************/
if($_POST['up_orders'])
{
	permissions('order_1_up');
	$consignee=$_POST['consignee'];
	$address=$_POST['address'];
	$telephone=$_POST['telephone'];
	$mobile=$_POST['mobile'];
	$postcode=$_POST['postcode'];
	$carriage=$_POST['carriage'];
	$status=$_POST['status'];
	$payment=$_POST['payment'];
	$delivery=$_POST['delivery'];
	$note=$_POST['note'];
	$invoice=$_POST['invoice'];
	$times1=$_POST['times1'];
	$times2=$_POST['times2'];
	$price_all=$_POST['price_all'];
	$remark=$_POST['remark'];
	$logistics=$_POST['logistics'];
	
	
	
	
	
$sql_up="update gplat_order_cart set consignee='$consignee',address='$address',telephone='$telephone',mobile='$mobile',postcode='$postcode',carriage='$carriage',status='$status',payment='$payment',note='$note',times1='$times1',times2='$times2',invoice='$invoice',price_all='$price_all',logistics='$logistics',remark='$remark' where orderid=".$_GET['orderid'];

$result_up=mysql_query($sql_up)or die(mysql_error());

if($result_up!=0)
{
/******�ʼ�����********/
	if ($_POST['ifMail']==1)
	{	
	  $sql="select * from gplat_order where orderid=".$_POST['orderId'];    //��ȡuserid
	  $result=mysql_query($sql);
	  $data=mysql_fetch_assoc($result);
	  $userid=$data['userid'];
	  
	  $sql_user="select * from gplat_member where userid='$userid'";        //��ȡemail
	  $result_user=mysql_query($sql_user);
	  $data_user=mysql_fetch_assoc($result_user);
	  
	  $email=$data_user['email'];
	  $username=$data_user['username'];	
	  $status_str=status($_POST['status']);	    //����״̬
	  
	  $mail_num=4;
	  include('../../inc/mail_content.php');
	  $success=mail_userPass($mail_title,$mail_content,$email,$username);
	}		
/********************/	
	echo '<script>alert("�޸Ķ����ɹ�");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';
	
	
}else{
	echo '<script>alert("�ύ����ʧ��");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';		
	}
}	
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
$sql="select * from gplat_order_cart where orderid=".$_GET['orderid'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$status=$data['status'];
//$i=status($status);  //�ж϶���״̬
$orderid=$_GET['orderid'];
//$money=money_all($orderid);
if($data['pay']==1){$pay='֧����';}
if($data['pay']==2){$pay='΢��';}
?>
<form action="<?=$filename?>?orderid=<?=$_GET['orderid']?>" method="post">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td class="tdBorder1">�����ţ�</td>
    <td class="tdBorder1">
    &nbsp;<?=$data['orderNo']?>
    <input type="hidden" name="up_orders" value="up_orders">
    </td>
    <td class="tdBorder1">��Ʊ</td>
    <td class="tdBorder1">&nbsp;<input type="text" name="invoice" value="<?=$data['invoice']?>" /></td>
  </tr>
  <tr>
    <td class="tdBorder1">�µ�ʱ�䣺</td>
    <td class="tdBorder1">&nbsp;<?=$data['dates']?> &nbsp;<?=$data['times']?></td>
    <td class="tdBorder1">�˷ѣ�</td>
    <td class="tdBorder1">&nbsp;<input type="text" name="logistics" value="<?=$data['logistics']?>" size="5" /> </td>
  </tr>
   
   <tr>
     <td class="tdBorder1">�ܼۣ�</td>
     <td class="tdBorder1">&nbsp;<input type="text" name="price_all" value="<?=$data['price_all']?>" size="5" /></td>
     <td class="tdBorder1">��Ʒ�嵥��</td>
     <td class="tdBorder1"><a href="orders_product.php?orderid=<?=$_GET['orderid']?>"><img src="../images/go.gif" width="16" height="16"></a></td>
   </tr>
<tr >
     <td colspan="4" class="tdBorder1" bgcolor="#E6DEDB"><span style="color:#00F; font-size:14px; font-weight:bold">�ջ�����Ϣ</span></td>
    </tr>
  <tr>
      <td class="tdBorder1">�ջ��ˣ�</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="consignee" value="<?=$data['consignee']?>" /></td>
      <td class="tdBorder1">��ַ��</td>
      <td class="tdBorder1"><input name="address" type="text" value="<?=$data['address']?>" size="30" /></td>
    </tr>
  <tr>
    <td class="tdBorder1">�绰��</td>
    <td class="tdBorder1">&nbsp;<input type="text" name="telephone" id="telephone" value="<?=$data['telephone']?>" /></td>
    <td class="tdBorder1">�ֻ���</td>
    <td class="tdBorder1"><input type="text" name="mobile" id="mobile" value="<?=$data['mobile']?>"/></td>
  </tr>
  <tr>
    <td class="tdBorder1">�ͻ�ʱ�䣺</td>
    <td colspan="3" class="tdBorder1">&nbsp;<input type="text" name="times2"  value="<?=$data['times2']?>"/>&nbsp;<input type="text" name="times1"  value="<?=$data['times1']?>"/>&nbsp;<input type="text" name="remark"  value="<?=$data['remark']?>" size="50"/></td>
  </tr>
  
  <tr>
    <td class="tdBorder1">�ʱࣺ</td>
    <td class="tdBorder1">&nbsp;<input type="text" name="postcode" id="postcode"  value="<?=$data['postcode']?>"/></td>
    <td class="tdBorder1">���˷�ʽ��</td>
    <td class="tdBorder1"><input type="text" name="carriage" id="carriage"  value="<?=$data['carriage']?>"/></td>
  </tr>
  
  <tr >
     <td colspan="4" class="tdBorder1" bgcolor="#E6DEDB"><span style="color:#00F; font-size:14px; font-weight:bold">������Ϣ</span></td>
    </tr>
  <tr>
    <td class="tdBorder1">����״̬��</td>
    <td class="tdBorder1"><select name="payment">
     <option value="0" <?=selected($data['payment'],'0')?>>δ����</option>
     <option value="1" <?=selected($data['payment'],'1')?>>�Ѹ���</option>
     </select>&nbsp;<?=$pay?></td>
    <td class="tdBorder1">����״̬��</td>
    <td class="tdBorder1">
   <select name="status">
     <option value="0" <?=selected($data['status'],'0')?>>δ����</option>
     <option value="1" <?=selected($data['status'],'1')?>>����</option>    
     <option value="2" <?=selected($data['status'],'2')?>>����</option>   
     <option value="3" <?=selected($data['status'],'3')?>>�������</option>     
     <option value="4" <?=selected($data['status'],'4')?>>�˻�</option>
     <option value="5" <?=selected($data['status'],'5')?>>��Ч</option>    
     <option value="5" <?=selected($data['status'],'6')?>>�����˿�</option>  
     </select>
    </td>
  </tr>

   <tr>
     <td class="tdBorder1">��ע��</td>
     <td colspan="3" class="tdBorder1"><textarea name="note" rows="2" cols="70" id="note"><?=$data['note']?>
     </textarea></td>
    </tr>
   <tr>
     <td colspan="4" class="tdBorder1">&nbsp;
       <input type="submit" value="�ύ" />
       <input type="reset" value="����" /></td>
    </tr>
</table>
</form>