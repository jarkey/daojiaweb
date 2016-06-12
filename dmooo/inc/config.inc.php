<?php
include('../../inc/config.inc.php'); 
define("UPLOAD_DIR","up_file/");


if($_SESSION['adminLogin']!='ok')
{
	/*echo("<script language=javascript>alert('请登录管理帐号');</script>");	
	echo'<meta http-equiv="refresh" content="0 url=../index.php">';*/
	echo '<script>alert("请登录管理帐号");top.location.href="../index.php";</script>';	
	exit;
}

//判断会员组权限
function permissions($value=''){
    if (strpos($_SESSION['permissions'],"$value")<=0) {
		echo'对不起，您所在的会员组权限不够';
		exit();
		}	
}

/**传入套餐id，修改套餐的价格*/
function package_price($packageId=''){
		$sql_pa="select * from gplat_package_product where packageId=".$packageId;
		
	$result_pa=mysql_query($sql_pa);
	while ($data_pa=mysql_fetch_assoc($result_pa)) {
		$sql_m="select mPrice,memberPrice,sale,specifications from gplat_product where productid=".$data_pa['productId'];
		
		
		$result_m=mysql_query($sql_m);
		$data_m=mysql_fetch_assoc($result_m);
		$specifications+=$data_m['specifications'];
		if ($data_m['sale']=='') {
			$pricr=$data_m['memberPrice'];
		}else { $pricr=$data_m['sale'];}
		$mPrice_all+=$data_m['mPrice'] * $data_pa['num'];
		$memberPrice_all+=$pricr * $data_pa['num'];
		$data_m['sale']='';
		}
	$sql_all="update gplat_package set mPrice='$mPrice_all',memberPrice='$memberPrice_all',specifications='$specifications' where productid=".$packageId;
	$result_all=mysql_query($sql_all);
	}
	
	
	function product_class1_name($id){
	$sql_is="select name from dmooo_productclass1 where id=".$id;
	$result_is=mysql_query($sql_is);
	$data_is=mysql_fetch_assoc($result_is);
	$name=$data_is['name'];
	 return $name;
		}
	function product_class1_id($id){
	$sql_is="select id from dmooo_productclass1 where id=".$id;
	$result_is=mysql_query($sql_is);
	$data_is=mysql_fetch_assoc($result_is);
	$name=$data_is['id'];
	 return $name;
		}
  
?>