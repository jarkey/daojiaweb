<?php
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('../../inc/mail_send.php');
/**********�޸�����*************/
if($_POST['up_orders'])
{
	$status=$_POST['status'];
	$goodsname=$_POST['goodsname'];
	$number=$_POST['number'];
	$price=$_POST['price'];
	$carriage=$_POST['carriage'];
	$amount=$_POST['amount'];
	$note=$_POST['note'];
	$consignee=$_POST['consignee'];
	$address=$_POST['address'];
	$telephone=$_POST['telephone'];
	$mobile=$_POST['mobile'];
	$postcode=$_POST['postcode'];
	$serviceMan=$_POST['serviceMan'];
	
$sql_up="update gplat_order set goodsname='$goodsname',number='$number',price='$price',carriage='$carriage',amount='$amount',note='$note',serviceMan='$serviceMan',consignee='$consignee',address='$address',telephone='$telephone',mobile='$mobile',postcode='$postcode',status='$status' where orderid=".$_GET['orderid'];

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
<link href="../bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
$sql="select * from gplat_order where orderid=".$_GET['orderid'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$status=$data['status'];
$i=status($status);  //�ж϶���״̬

?>
<br>
<form action="<?=$filename?>?orderid=<?=$_GET['orderid']?>" method="post">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td class="tdBorder1">��Ʒ���ƣ�</td>
    <td class="tdBorder1">
    &nbsp;<input type="text" name="goodsname" id="goodsname" value="<?=$data['goodsname']?>" />
    <input type="hidden" name="up_orders" value="up_orders">
    </td>
    <td class="tdBorder1">������</td>
    <td class="tdBorder1"><input type="text" name="number" id="number"  value="<?=$data['number']?>"/></td>
  </tr>
  <tr>
    <td class="tdBorder1">���ۣ�</td>
    <td class="tdBorder1">&nbsp;<input type="text" name="price" id="price"  value="<?=$data['price']?>"/></td>
    <td class="tdBorder1">�˷ѣ�</td>
    <td class="tdBorder1"><input type="text" name="carriage" id="carriage"  value="<?=$data['carriage']?>"/></td>
  </tr>
   <tr>
     <td class="tdBorder1">�ܼۣ�</td>
     <td class="tdBorder1">&nbsp;<input type="text" name="amount" id="amount"  value="<?=$data['amount']?>" /></td>
     <td class="tdBorder1">��ע��</td>
     <td class="tdBorder1"><textarea name="note" rows="4" cols="30" id="note"><?=$data['note']?>
     </textarea></td>
   </tr>

  <tr>
      <td class="tdBorder1">�ջ��ˣ�</td>
      <td class="tdBorder1">&nbsp;<input type="text" name="consignee" value="<?=$data['consignee']?>" /></td>
      <td class="tdBorder1">��ַ��</td>
      <td class="tdBorder1"><input type="text" name="address" value="<?=$data['address']?>" /></td>
    </tr>
  <tr>
    <td class="tdBorder1">�绰��</td>
    <td class="tdBorder1">&nbsp;<input type="text" name="telephone" id="telephone" value="<?=$data['telephone']?>" /></td>
    <td class="tdBorder1">�ֻ���</td>
    <td class="tdBorder1"><input type="text" name="mobile" id="mobile" value="<?=$data['mobile']?>"/></td>
  </tr>
  <tr>
    <td class="tdBorder1">�ʱࣺ</td>
    <td class="tdBorder1">&nbsp;<input type="text" name="postcode" id="postcode"  value="<?=$data['postcode']?>"/></td>
    <td class="tdBorder1">�µ�ʱ�䣺</td>
    <td class="tdBorder1">&nbsp;
      <?=$data['dates']?>
      &nbsp;
      <?=$data['times']?></td>
  </tr>
  
  <tr>
    <td class="tdBorder1">IP��</td>
    <td class="tdBorder1">&nbsp;<?=$data['ip']?></td>
    <td class="tdBorder1">����״̬��</td>
    <td class="tdBorder1">&nbsp;
      <?php echo"$i";?></td>
  </tr>
  
   <tr>
     <td class="tdBorder1">�����ʼ���</td>
     <td class="tdBorder1"><label>
       <input name="ifMail" type="checkbox" id="ifMail" value="1">
     �ʼ�����</label></td>
     <td class="tdBorder1">�޸�״̬��</td>
     <td class="tdBorder1">
     <select name="status">
     <option value="0" <?=selected($data['status'],0)?>>��Ч</option>
     <option value="1" <?=selected($data['status'],1)?>>δ����</option>
     <option value="2" <?=selected($data['status'],2)?>>������</option>     
     <option value="3" <?=selected($data['status'],3)?>>�ѷ���</option>
     <option value="4" <?=selected($data['status'],4)?>>�ѽ���</option>
     </select></td>
   </tr>
   <tr>
     <td class="tdBorder1">�ͷ���Ա��</td>
     <td class="tdBorder1"><textarea name="serviceMan" rows="4" cols="30" id="serviceMan"><?=$data['serviceMan']?></textarea></td>
     <td class="tdBorder1">&nbsp;</td>
     <td class="tdBorder1">&nbsp;
       <input type="submit" value="�ύ" />
      <input type="reset" value="����" />
      <input name="orderId" type="hidden" id="orderId" value="<?=$_GET['orderid']?>"></td>
   </tr>
</table>
</form>