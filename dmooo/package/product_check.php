<?php
include_once('../inc/config.inc.php');
permissions('package_2_up');
$packageId=$_GET['packageId'];

$product_array=array();
//取得数组
$sql_p="select productId from gplat_package_product where packageId='$packageId'";
$result_p=mysql_query($sql_p);
while ($product_p_data=mysql_fetch_array($result_p)) {
  array_push($product_array, $product_p_data['productId']);
}
if ($product_array=='') {
	$product_array=array(0);
}
if ($_POST['check'])
{
	$productId_array=$_POST['check'];
	$productId_Num=count($productId_array);
	for ($i=0; $i<$productId_Num; $i++){
		$productId=$productId_array[$i];
		
		if (in_array($productId,$product_array)) {  
	     }else {
		$sql="insert into gplat_package_product (productId,packageId) values ('$productId','$packageId')";
		$result=mysql_query($sql);
	}
	}
	echo '<script>alert("添加成功");window.location.href="package_product.php?packageId='.$packageId.'";</script>';	
}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head><body>
<table width="90%" align="center" cellspacing="1" bgcolor="#999999">
  <tr bgcolor="#FFFFFF"><td height="30">
<form action="" method="post">
&nbsp;类别：
<select name="fid">
<option value="">--不限--</option>
<?php
$sql="select * from gplat_productclass2 order by id desc";
$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
	$id=$data['id'];
	$name=$data['name'];
	?>
	<option value="<?=$id?>"><?=$name?></option>
	<?php
    }
    
?>
</select><input type="hidden" name="search" value="1">
&nbsp;产品编号：<input type="text" name="productNum" size="15" >
&nbsp;产品名称：<input type="text" name="productName" size="15" >
<input type="submit" value="搜索">
</form></td></tr></table>

<form action="?packageId=<?=$packageId?>" method="POST" name="aa">
<table width="90%" border="0" align="center" cellspacing="1" bgcolor="#999999">
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="30">--</td>
	<td>产品名称</td>
	<td>产品编号</td>
    <td>产品颜色</td>
	<td>添加时间</td>
	</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
if($_POST['search'])
{
//$s_fid=$_POST['fid'];
//$s_productNum=$_POST['productNum'];
//$s_productName=$_POST['productName'];
if ($_POST['fid']!='') {
		$class_id=$_POST['fid'];
	    $sql_class='class='.$class_id.' ';
		$i=1;
	}else {$sql_class='';}
	
if ($_POST['productNum']) {
	$s_productNum=$_POST['productNum'];
	if ($i==1){ $and='and '; }else { $i=1; }
		$sql_productNum=$and."productNum='$s_productNum' ";
	  }else {$sql_productNum='';}
	
if ($_POST['productName']) {
	$s_productName=$_POST['productName'];
	if ($i==1){ $and='and '; }else { $i=1; }
		$sql_productName=$and."productName like'%$s_productName%' ";
	  }else {$sql_productName='';}
	 
$str_name=$sql_class.$sql_productNum.$sql_productName;
$str_name_num=strlen($str_name);
if ($str_name_num==0)
{
	$where='';
}else {$where=' where ';}
    //判断状态	

$sql="select productid from gplat_product".$where.$str_name;
}else{
$sql="select productid from gplat_product";
}
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //总记录数
$page_all=ceil($num_all/$num); //计算出?的页数
$page_one=($page_id-1)*$num; // 取出的开始行?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('访问的页面出错');
}
if($_POST['search'])
{
$sql="select * from  gplat_product " .$where.$str_name. " order by productid desc limit $page_one,$num";
}else{
$sql="select * from  gplat_product order by productid desc limit $page_one,$num";
}
$result=mysql_query($sql);
while ($data_product=mysql_fetch_assoc($result))
{
	$productName=$data_product['productName'];
	$productNum=$data_product['productNum'];
	$times=$data_product['times'];
	$times=substr($times,0,10);
	$productid=$data_product['productid'];
	if (in_array($productid,$product_array)) {
		$checked='checked';
	}
	
	
		?>
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="25"><input type="checkbox" name="check[]" value="<?=$productid?>" <?=$checked?>> </td>
	<td><?=$productName?></td>
    <td><?=$data_product['product_color']?></td>
	<td><?=$productNum?></td>
	<td><?=$times?></td>
</tr>
	<?php
	$checked='';
}
?>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="30" colspan="4" align="left"></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF"><td height="30" colspan="4"><input type=button class="button1" onclick=selectAll(document.aa) value="全选">  &nbsp;
      <input type=button class="button1" onclick=selectOther(document.aa) value="反选">
      &nbsp;  
      <input type=reset class="button1" value="取消">
      &nbsp;
  <script>
function selectAll(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox")
obj.elements[i].checked = true;
}
function selectOther(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox" )
{
if(!obj.elements[i].checked)
obj.elements[i].checked = true;
else
obj.elements[i].checked = false;

}
}
  </script>
  <input type="submit" class="button1" value="提交"></td>
	</tr>
</table>
</form>
