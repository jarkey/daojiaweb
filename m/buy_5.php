<?php 
include_once("../inc/config.inc.php");
$pageTitle="�����ύ";    //��ǰҳ����
$nav=2;
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
$price_all=$a->get_total();
if ($_GET['deliverid']!='' and $price_all>0) {
	//��Ӷ���
	date_default_timezone_set('Asia/Shanghai');
    $times=date('H:i:s');
    $dates=date('Y:m:d');
    
	$text_array=array('1','2','3','4','5','6','7','8','9','0');
	shuffle($text_array);
	for($i=0;$i<2;$i++)
	{
		$text_content.=$text_array[$i];
		$texe.=$text_array[$i];
	}
	$orderNo=date('YmdHis').$texe;

    $status=0;
	$payment=0;
	$delivery=0;
	$deliverid=$_GET['deliverid'];
	$invoice=$_GET['invoice'];
	$times1=$_GET['times1'];
	$times2=$_GET['times2'];
	$remark=$_GET['remark'];
	
	$sql="select * from gplat_order_deliver where deliverid =$deliverid";
    $result=mysql_query($sql);
    $data=mysql_fetch_assoc($result);
    $Nation=address_view($data['Nation']);
	$Province=address_view($data['Province']);
	$City=address_view($data['City']);
	$County=address_view($data['County']);
	//$price_all=$_SESSION['total'];
	//$price_all=$a->get_total();
	$b_consignee=$data['consignee'];
	$b_address=$Province.$City.$County.$data['address'];
	$b_telephone=$data['telephone'];
	$b_mobile=$data['mobile'];
	$b_postcode=$data['postcode'];
	$b_note=$data['remarks'];
	//$b_pay=$_SESSION['b_pay'];
    $b_delivery=0;
    //$b_note=$_SESSION['b_note'];
    if($price_all<$logistics_num){$logistics=$logistics_p;}else{$logistics=0;}
	$price_all_l=$price_all+$logistics;//���˷�
	$_SESSION['price_all_l']=$price_all_l;
	$_SESSION['orderNo']=$orderNo;
	
	
	$isbook=0; 
	
    mysql_query("set sql_mode=''");
    $sql="insert into gplat_order_cart (carriage,consignee,telephone,mobile,address,postcode,note,userid,username,times,dates,status,orderNo,payment,delivery,email,logistics,pay,invoice,times1,times2,isbook,price_all,remark) values ('$b_delivery','$b_consignee','$b_telephone','$b_mobile','$b_address','$b_postcode','$b_note','$userId','$username','$times','$dates','$status','$orderNo','$payment','$delivery'
    ,'$b_email','$logistics','$b_pay','$invoice','$times1','$times2','$isbook','$price_all','$remark')";
	//echo $sql.'<br>';
  
    $result=mysql_query($sql);
    $orderid=mysql_insert_id();
    $cart_arr=$a->get_cart();
	$total=$a->get_total();
	$_SESSION['total']=$total;
	
	
    if ($result!=false) {
    	foreach($cart_arr as $cart){
    		$cart_id=$cart['id'];
    		$cart_price=$cart['price'];
			$priceid=$cart['priceid'];
    		$cart_count=$cart['count'];
			$product_price_name=product_price_name($cart_id,$priceid);
    		$cart_name=$cart['name'].'-'.$product_price_name;
    		$order_class=$cart['class'];
    		mysql_query("set sql_mode=''");
    		$sql_cart="insert into gplat_order_product (orderid,productid,num,price,productname,class) values('$orderid','$cart_id','$cart_count','$cart_price','$cart_name','$order_class')";
    		$result_cart=mysql_query($sql_cart);
    //echo $sql_cart;
    		}
    			if ($result_cart!=false) {
    		   // user_point($userid,-$total,'������Ʒ',2); 
				user_point($userid,$price_all_l,'������Ʒ',1);
    			unset($_SESSION['b_delivery']);
    			unset($_SESSION['b_note']);
				unset($_SESSION['weight_price']);
    
    			$a->delete_all();
				$_SESSION['orderNo']=$orderNo;
				echo '<script>window.location.href="buy_5.php?orderNo='.$orderNo.'&orderid='.$orderid.'";</script>';
				exit;
    	}
    }
    
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
<script>
 function queren(){
  
	//var money = $('#pay').val();
	
	 $.ajax({
	 	url:"../ajax.php",
	 	type:"post",
	 	data:{'money':1},
	 	
	 	success:function(re){
	 		location.href="../wxpay/js_api_call.php";

	 	}
	 });	
}
</script>
</head>


<body>
<div class="top_w2">
	<div class="back1"><a href="#">&lt;</a></div>
    <?=$pageTitle?>

</div>

<div class="wrapper" style="text-align:center">
	<div class="tj_div">
	<div class="tj_cg"><img src="images/ddtj_03.jpg" alt="" />
    <div class="list1" style="font-size:14px; line-height:30px;">
 
    <p>�𾴵��û���<?=$username?>&nbsp;&nbsp;&nbsp;&nbsp;���ι���Ķ����ţ�<?=$_GET['orderNo']?></p>
   <p>��л������ǽ��ڳ�ŵ��ʱ���ڽ�����������Ʒ�������ٴθ�л���Ļݹˣ� </p>             
    <p>* �����Խ��� <a href="user_order.php"><font style=" color:#00F"><u>��������</u></font></a> �鿴����״̬�������Զ�δ����Ķ��������޸ġ�</p>
    <p>* ����16:00�Ժ�Ķ�������Ϊ���ն������������½⡣ </p>
       <input type="hidden" name="aliorder" value="��������" />
    <input type="hidden" name="alibody" value="����ũ��԰�����ĵ����" />
    <input type="hidden" name="ordersid" value="<?=$_GET['orderNo']?>" />
    <input type="hidden" name="alimoney" value="<?=$_SESSION['price_all_l']?>" />
      <div class="che-je">��<span style="color:#F00; font-weight:bold; font-size:14px"><?=$_SESSION['price_all_l']?>Ԫ</span></div>
      <div class="che-je"><input type="image" src="../images/fukuan1.jpg" name="dosubmit" onClick="queren()"/></div>
  
</div>
    </div>
    
</div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
