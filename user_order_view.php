<?php 
$pageTitle="��������";    //��ǰҳ����
include_once("inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
if ($_GET['del'])
{
	//$sql="delete from gplat_order_product where id=".$_GET['del'];
    //$result=mysql_query($sql);		
}


$sql="select * from gplat_order_cart where userid='$userId' and orderid=".$_GET['id'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$status=$data['status'];         //����״̬
$price_all=$data['price_all']+$data['logistics']; 

$orderid=$_GET['id'];
//$money=money_all($orderid)+$data['logistics'];    //�ܼۣ���Ʒ�۸�+�˷�

if ($status=='δȷ��') {
	$del_str='<a href="user_order_view.php?id='.$id.'&del='.$date['id'].'"><img src="admin/img/del.gif" border="0px" alt="ɾ��"></a>';
	$submit='<input type="submit" value="�ύ" />';
}else{
	$del_str=$submit='';
}
/****�����嵥****/
$sql="select * from gplat_order_product where orderid=".$data['orderid'];
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{  
  $price_product_all=$date['num']*$date['price'];
  
   $sql_p="select productNum from dmooo_product where productid=".$date['productid'];
   $result_p=mysql_query($sql_p);
   $data_p=mysql_fetch_assoc($result_p);
   $productNum=$data_p['productNum'];
  
   $content_p.='<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1">&nbsp;<a href="user_order_view_book.php?productid='.$date['productid'].'&orderid='.$_GET['id'].'">����</a></td>
	<td class="tdBorder1">'.$date['productname'].'</td>
    <td class="tdBorder1">'.$date['num'].'&nbsp;</td>
    <td class="tdBorder1">'.$date['price'].'</td>
    <td class="tdBorder1">'.$price_product_all.'&nbsp;</td>
    <td class="tdBorder1" style="display:none">&nbsp;&nbsp;'.$del_str.'</td>
</tr>';

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>

</head>
<?php require('inc/header.inc.php'); ?>


<?php require('inc/header_s.inc.php'); ?>



<div class="nav_w clearfix">
   <?php require('inc/header_url.php'); ?>
    
      <ul id="nav" style="display:none">
<?php require('inc/left_nav.php'); ?>
	</ul>
 

 
 
 
	<script type="text/javascript">
		jQuery("#nav").slide({ 
				type:"menu", //Ч������
				titCell:".mainCate", // ��괥������
				targetCell:".subCate", // Ч�����󣬱��뱻titCell����
				delayTime:0, // Ч��ʱ��
				triggerTime:0, //����ӳٴ���ʱ��
				defaultPlay:false,//Ĭ��ִ��
				returnDefault:true//����Ĭ��
			});
	</script> 
 
    
</div>
<div class="x"></div>

<div class="wrapper_o">
	<?php include('inc/user_left.php'); ?>
    <div class="o_right">
    	<div class="right_t">
        	�ҵĶ���
        </div>
      
            <div class="ddgl_order">
          <!--*********��������*********-->

<!--******������Ϣ*******-->      
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td colspan="4" class="tdBorder1 tdBg1" style="font-weight:bold; font-size:14px;"><?=$pageTitle?></td>
    </tr>
  <tr>
    <td width="10%" class="tdBorder1">�� �� �ţ�</td>
    <td width="40%" class="tdBorder1">
    &nbsp;<?=$data['orderNo']?>
	<input type="hidden" name="up_orders" value="up_orders">    </td>
    <td width="10%" class="tdBorder1">����״̬��</td>
    <td class="tdBorder1">&nbsp;<?=payStatus($data['payment'])?>&nbsp;<?=orderStatus($data['status'])?>
     
    </td>
  </tr>
  <tr>
    <td class="tdBorder1">�µ�ʱ�䣺</td>
    <td class="tdBorder1">&nbsp;<?=$data['dates']?> &nbsp;<?=$data['times']?></td>
    <td class="tdBorder1">�ˡ����ѣ�</td>
    <td class="tdBorder1">&nbsp;<?=$data['logistics']?> Ԫ</td>
  </tr>
   
   <tr>
     <td class="tdBorder1" style="color:#FF0000; font-weight:bold;">�ܡ��ۣ�</td>
     <td class="tdBorder1" style="color:#FF0000; font-weight:bold;">
     <?php if($data['payment']==0){
		 ?>
         <form action="pay.php" method="post">
     &nbsp; <?=$price_all?> Ԫ
    <input type="hidden" name="aliorder" value="��������" />
    <input type="hidden" name="alibody" value="����ũ��԰�����ĵ����" />
    <input type="hidden" name="ordersid" value="<?=$data['orderNo']?>" />
    <input type="hidden" name="alimoney" value="<?=$price_all?>" />
   <input type="submit" value="ȥ����" name="submit" style="width:100px; height:30px;" />
    </form>
         <?php
		 }else{
			 ?>
              &nbsp; <?=$price_all?> Ԫ
             <?php
			 } ?>
     </td>
     <td class="tdBorder1">��Ʊ</td>
     <td class="tdBorder1">&nbsp;<?=$data['invoice']?></td>
   </tr>
</table>
<br />
<!--*******�ջ�����Ϣ*********-->
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td colspan="4" class="tdBorder1 tdBg1" style="font-weight:bold; font-size:14px;">�ջ�����Ϣ</td>
    </tr>
  <tr>
    <td width="10%" class="tdBorder1">�ջ��ˣ�</td>
    <td width="40%" class="tdBorder1"><?=$data['consignee']?></td>
    <td width="10%" class="tdBorder1">�ء�ַ��</td>
    <td class="tdBorder1"><?=$data['address']?></td>
  </tr>
  <tr>
    <td class="tdBorder1">�硡����</td>
    <td class="tdBorder1"><?=$data['telephone']?></td>
    <td class="tdBorder1">�֡�����</td>
    <td class="tdBorder1"><?=$data['mobile']?>&nbsp;</td>
  </tr>
  <tr>
    <td class="tdBorder1">��  ע��</td>
    <td class="tdBorder1"><?=$data['remark']?></td>
    <td class="tdBorder1">�ʹ�ʱ�䣺</td>
    <td class="tdBorder1"><?=$data['times1']?>&nbsp;<?=$data['times2']?></td>
  </tr>

</table>
<br />
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
<tr align="center">
<td class="tdBorder1 tdBg1">��Ʒ����</td>
<td class="tdBorder1 tdBg1">��Ʒ����</td>
<td class="tdBorder1 tdBg1">��Ʒ����</td>
<td class="tdBorder1 tdBg1">����</td>
<td class="tdBorder1 tdBg1">С��</td>
<td class="tdBorder1 tdBg1" style="display:none">����</td>
</tr>
   <?=$content_p?></table>
   <br />
   <?=$submit?>
      </form>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
