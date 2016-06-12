<?php 
function pay_view(){
	$sql="select * from gplat_pay where isclose=1";
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
		$content.='<br><input type="radio" name="pay"  value="'.$data['payid'].'" />'.$data['payname'].'&nbsp;&nbsp;&nbsp;&nbsp;<span class="huiTxt">'.$data['paysay'].'</span>';
	}
	return $content;
}

if ($_POST['consignee']!='') {
	$_SESSION['b_consignee']=$_POST['consignee'];
	$_SESSION['b_address']=$_POST['address'];
	$_SESSION['b_telephone']=$_POST['telephone'];
	$_SESSION['b_mobile']=$_POST['mobile'];
	$_SESSION['b_postcode']=$_POST['postcode'];
	$_SESSION['b_remarks']=$_POST['remarks'];
	$_SESSION['Province']=$_POST['Province'];
		
}
$sql4="select * from gplat_logistics";
$result4=mysql_query($sql4);
while ($data=mysql_fetch_assoc($result4))
{	
	static $m=0;
	$m++;
	if ($m==1) {
		$checked='checked';
	}else {$checked='';}
$freight.='<input name="logisticsid" type="radio" value="'.$data['logisticsid'].'" '.$checked.'>'.$data['logistics_name'].'<br>';	
}
?>