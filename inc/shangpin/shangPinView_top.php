<?php 
include_once('inc/config.inc.php');

if (!$_GET['id']) {
	exit();
}
$productid=$_GET['id'];
$sql="select * from gplat_product where productid=".$productid;
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$img=$data['img'];
$img1=$data['img1'];
$img2=$data['img2'];
$img3=$data['img3'];
$mPrice=$data['mPrice'];
if ($data['issale']!=1) {
	$price=$data['memberPrice'];
	$price_str='<span style="color:#FF0000;">��Ա�ۣ���'.$price.' '.$currency.' / '.$productUnits.'</span>';
}else {
	$price=$data['sale'];
	$price_str='<span style="color:#FF6600;">�����ۣ���'.$price.' '.$currency.' / '.$productUnits.'</span>';
}

$save=$mPrice-$price;   //��ʡ����
$class=$data['class'];
$navigation=navigation($class);
$content=$data['content'];
$title=$data['productName'];
$specifications =$data['specifications'];
$tag=$data['tag'];
$size=$data['size'];
$description=$data['description'];
$introduce=$data['introduce'];
$brand=$data['brand'];
$origin=$data['origin'];
$materials=$data['materials'];

if($size!='')
{ 
	$size='��Ʒ�ߴ磺'.ggzView($size).'<br>';
}else{ 
	$size=''; 
}

$productNum=$data['productNum'];
$product_color=$data['product_color'];

if ($product_color!='') {	
	$product_color_str='<option value="'.$product_color.'" selected="selected">'.ggzView($product_color).'</option>';

	$tag_sql="where productName like";
	$tag_sql_2='and productid <>'.$productid;
	
	$sql_color="select product_color,productid from gplat_product $tag_sql '%$title%' $tag_sql_2";
    $result_color=mysql_query($sql_color);
	
	while ($data_color=mysql_fetch_assoc($result_color)) {
		if ($data_color['product_color']!='') 
		{
		$content_color.='<option value="shangping_view.php?id='.$data_color['productid'].'">'.ggzView($data_color['product_color']).'</option>';
		}
	}

$content_color='��Ʒ��ɫ��<select name="familyWebsite" onChange=window.location.href(this.options(this.selectedIndex).value); style="width:100px;">'.$product_color_str.$content_color.' </select><br>';


}else { 
	$content_color='';  
}  //����ɫ��ʾ���������û��ɫ��Ϊ�գ�ʲô������ʾ

//*********����ĺ��������ڴ�ҳ*********
function ifBigImgEmpty($a,$width,$height)
{
	if($a==''){
		$str='&nbsp;';
	}else{
	   $str='<a href="userfiles/'.$a.'" target="_blank"><img src="userfiles/'.$a.'" width="'.$width.'" height="'.$height.'" style="border:1px #CCC solid;"/></a>';
    }
	return $str;
}

function ifSmallImgEmpty($a,$width,$height)
{
	if($a==''){
		$str='<TD class=s align=right>&nbsp;</td>';
	}else{
	   $str='<TD class=s onMouseOver="play(this,\'au\',\'\');" align=right><img src="userfiles/'.$a.'" width="'.$width.'" height="'.$height.'"  style="border:1px #CCC solid;"/></td>';
    }
	return $str;
}

//�����¼д��cookie
//require_once('inc/browsing_history.php');

$pageTitle=$title;
$keywords=$tag;
?>