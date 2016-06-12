<?php 
unset($_SESSION['user_login']);

if ($_SESSION['userid']=='') {
	$_SESSION['user_login']='buy_1.php';
	echo'<meta http-equiv="refresh" content="0; url=user_login.php"/>';
	exit();
}

$sql="select * from gplat_order_deliver where userid='$userId'";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$Nation=address_view($date['Nation']);
	$Province=address_view($date['Province']);
	$City=address_view($date['City']);
	$County=address_view($date['County']);
	
	$content.='<tr class="tr2">
	<td> <input  class="aa" cc='.$date['deliverid'].' type="radio" name="address" /></td>
    <td>'.$date['consignee'].'</td>
	<td>'.$Nation.'-'.$Province.'-'.$City.'-'.$County.'-'.$date['address'].'</td>
    <td>'.$date['telephone'].'</td>
   </tr>';
}
?>
<script type="text/javascript" src="js/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="js/address.js"></script>
<script type="text/javascript" src="js/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="js/jquery/thickbox.css" type="text/css" media="screen" /> 