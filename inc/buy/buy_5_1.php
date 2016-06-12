<?php 
//$orderNo=$_GET['orderNo'];

if ($_GET['order']) {
	//Ìí¼Ó¶©µ¥
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
    
	$b_email=$_SESSION['email'];
    $b_consignee=$_SESSION['b_consignee'];
	$b_address=$_SESSION['b_address'];
	$b_telephone=$_SESSION['b_telephone'];
	$b_mobile=$_SESSION['b_mobile'];
	$b_postcode=$_SESSION['b_postcode'];
	$b_remarks=$_SESSION['b_remarks'];
	$b_pay=$_SESSION['b_pay'];
    $b_delivery=$_SESSION['b_delivery'];
    $b_note=$_SESSION['b_note'];
    $logistics=$_SESSION['logistics'];
	
    mysql_query("set sql_mode=''");
    $sql="insert into gplat_order_cart (carriage,consignee,telephone,mobile,address,postcode,note,userid,username,times,dates,status,orderNo,payment,delivery,email,logistics,pay) values ('$b_delivery','$b_consignee','$b_telephone','$b_mobile','$b_address','$b_postcode','$b_note','$userId','$username','$times','$dates','$status','$orderNo','$payment','$delivery'
    ,'$b_email','$logistics','$b_pay')";
	//echo $sql.'<br>';
  
    $result=mysql_query($sql);
    $orderid=mysql_insert_id();
    $cart_arr=$a->get_cart();
    if ($result!=false) {
    	foreach($cart_arr as $cart){
    		$cart_id=$cart['id'];
    		$cart_price=$cart['price'];
    		$cart_count=$cart['count'];
    		$cart_name=$cart['name'];
    		$order_class=$cart['class'];
    		mysql_query("set sql_mode=''");
    		$sql_cart="insert into gplat_order_product (orderid,productid,num,price,productname,class) values('$orderid','$cart_id','$cart_count','$cart_price','$cart_name','$order_class')";
    		$result_cart=mysql_query($sql_cart);
    //echo $sql_cart;
    		}
    			if ($result_cart!=false) {
    			unset($_SESSION['b_consignee']);
    			unset($_SESSION['b_address']);
    			unset($_SESSION['b_telephone']);
    			unset($_SESSION['b_mobile']);
    			unset($_SESSION['b_postcode']);
    			unset($_SESSION['b_remarks']);
    			unset($_SESSION['b_pay']);
    			unset($_SESSION['b_delivery']);
    			unset($_SESSION['b_note']);
				unset($_SESSION['weight_price']);

    			$a->delete_all();
				echo'<meta http-equiv="refresh" content="0; url=buy_5.php?orderNo='.$orderNo.'&orderid='.$orderid.'"/>';
				exit;
    	}
    }
    
}
?>