<?php
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('../../inc/mail_send.php');
permissions('order_1_logistics');
/**********�޸�����*************/
if($_POST['up_orders'])
{
	permissions('order_1_up');

	$carriagenum=$_POST['carriagenum'];
	$delivery=1;
	$note=$_POST['note'];
	
$sql_up="update gplat_order_cart set carriagenum='$carriagenum',note='$note',delivery='$delivery' where orderid=".$_GET['orderid'];

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
	echo '<script>alert("������Ϣ��ӳɹ�");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';
	
	
}else{
	echo '<script>alert("������Ϣ���ʧ��");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';		
	}
}	
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<style media=print type="text/css">   
.noprint{visibility:hidden}   
</style>   
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
$sql="select * from gplat_order_cart where orderid=".$_GET['orderid'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$status=$data['status'];
//$i=status($status);  //�ж϶���״̬
$orderid=$_GET['orderid'];
$money=money_all($orderid);
?>

<table width="525" height="560" border="1" cellpadding="0" cellspacing="0" align="center" style="margin:0 auto">
  <tr>
    <td colspan="4" height="73" align="left" valign="middle" style="line-height:73px"><img src="../../images/index_03.png" height="70" align="left" style="margin-left:70px;" />����ũ��԰ ���ĵ����</td>
    <td width="175" align="center">������</td>
  </tr>
  <tr>
    <td width="90" align="center">�ռ���</td>
    <td width="94">&nbsp;<?=$data['consignee']?></td>
    <td width="96" align="center">�绰</td>
    <td width="101">&nbsp;<?=$data['mobile']?></td>
    <td rowspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">��ַ��   <?=$data['address']?></td>
  </tr>
  <tr>
    <td align="center">����</td>
    <td>&nbsp;<?=$data['dates']?> </td>
    <td align="center">����ʱ��</td>
    <td>&nbsp;<?=$data['times2']?>  <?=$data['times1']?></td>
  </tr>
  <tr>
    <td align="center">����</td>
    <td>&nbsp;</td>
    <td align="center">��������</td>
    <td>&nbsp;�߲�</td>
  </tr>
  <tr>
    <td align="center">��ע</td>
    <td colspan="3">&nbsp;<?=$data['remark']?></td>
    <td>�ռ��ˣ�<?=$data['consignee']?></td>
  </tr>
  <tr>
    <td align="center">�ļ�</td>
    <td colspan="3">&nbsp;</td>
    <td>�ռ���ǩ�֣�</td>
  </tr>
  <tr>
    <td align="center">�ռ���</td>
    <td>&nbsp;<?=$data['consignee']?></td>
    <td align="center">�绰</td>
    <td>&nbsp;<?=$data['mobile']?></td>
    <td>�����ţ�<?=$data['orderNo']?></td>
  </tr>
  <tr>
    <td align="center">��ַ</td>
    <td colspan="3">&nbsp; <?=$data['address']?></td>
    <td>���ڣ�<?=$data['dates']?></td>
  </tr>
</table>
<p class="noprint">  &nbsp;<input type="button" value="��    ӡ" onClick="javascript:window.print()"  style="margin:0 auto; width:80px;"/></p>

