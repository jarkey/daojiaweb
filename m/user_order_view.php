<?php 
$pageTitle="�ҵĶ���";    //��ǰҳ����
$nav=1;
include_once("../inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
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
  
  if ($date['class']==1) {
		$table='gplat_package';
	    
	}else{
		$table='dmooo_product';
	 
 	}
  
   $sql_p="select productNum from $table where productid=".$date['productid'];
   $result_p=mysql_query($sql_p);
   $data_p=mysql_fetch_assoc($result_p);
   $productNum=$data_p['productNum'];
  
   
    echo $date['productNum'] ;
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
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<!--����Ӧ�ֻ���Ļ-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!--end ����Ӧ�ֻ���Ļ-->
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
</head>


<body>
<div class="top_w2">
	<div class="back1"><a href="user_order.php">&lt;</a></div>
    ��������
    <div class="back2"><a href="user_order.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper_xq" style="padding-top:0px;">
	<div class="dd_xq">
    	<h4>��������</h4>
        <p>�����ţ�	 <?=$data['orderNo']?></p>
        <p>����״̬��	 <?=payStatus($data['payment'])?>&nbsp;<?=orderStatus($data['status'])?></p>
        <p>�µ�ʱ�䣺	<?=$data['dates']?> &nbsp;<?=$data['times']?></p>
        <p>�˷ѣ�<?=$data['logistics']?> Ԫ</p>
        <p>�ܼۣ� <?php if($data['payment']==0){
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
			 } ?>	</p>
        <p>��Ʊ��<?=$data['invoice']?></p>
    </div>
    <div class="dd_xq">
    	<h4>�ջ�����Ϣ</h4>
        <p>�ջ��ˣ�<?=$data['consignee']?>	</p>
        <p>��ַ��<?=$data['address']?></p>
        <p>�绰��<?=$data['telephone']?></p>
        <p>�ֻ���<?=$data['mobile']?></p>
        <p>�� ע��<?=$data['remark']?></p>
        <p>�ʹ�ʱ�䣺	<?=$data['times1']?>&nbsp;<?=$data['times2']?></p>
    </div>
    <div class="xq_table">
    	<table cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="23%" align="center" valign="middle">��Ʒ����</td>
              <td width="25%" align="center" valign="middle">��Ʒ����</td>
              <td width="23%" align="center" valign="middle">��Ʒ����</td>
              <td width="15%" align="center" valign="middle">����</td>
                <td width="14%" align="center" valign="middle">С��</td>
            </tr>
             <?=$content_p?>
        </table>
         <br />
   <?=$submit?>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
