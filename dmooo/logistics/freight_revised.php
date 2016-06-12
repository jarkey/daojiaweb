<?php 
include_once('../inc/config.inc.php');
$class=$_GET['class'];
if($_POST['freight_name'])
{
	$freight_name=$_POST['freight_name'];
	$areaid=$_POST['areaid'];
	foreach ($areaid as $link => $content ) {
	$areaid_content_str.=$content.',';
	}
	$logisticsid=$_POST['logisticsid'];
	$s_price=$_POST['s_price'];
	$s_weight=$_POST['s_weight'];
	$s_money=$_POST['s_money'];
	$sql="update gplat_freight set freight_name='$freight_name',areaid='$areaid_content_str',logisticsid='$logisticsid',s_price='$s_price',s_weight='$s_weight',s_money='$s_money' where freightid=".$_GET['id'];
	$result=mysql_query($sql);
$result=mysql_query($sql)or die(mysql_error());
if ($result!=0) {
	echo '<script>alert("修改成功");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';		  
}
}
?>
<?php
$id=$_GET['id'];
$sql="select * from gplat_freight where freightid=".$id;
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);


?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">

<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableCss4" align="center">
  <form action="" method="POST">
    <tr>
      <td width="100" align="center" class="tdBorder1"> 名　　称 <br></td>
      <td class="tdBorder1"><input type="text" name="freight_name" value="<?=$data['freight_name']?>"></td>
    </tr>
    <tr>
      <td align="center" class="tdBorder1">省　　份</td>
      <td class="tdBorder1"><?php 
	  $sql_a="select * from gplat_area_new where ParentID='100000'";
      $result_a=mysql_query($sql_a);
      while ($data_a=mysql_fetch_assoc($result_a)) {
		  $areaid_str='a'.$data['areaid'];
		  if(strpos($areaid_str,$data_a['CityID'])>0){ $checked='checked'; }else{ $checked='';}
	      $content_a.=' <input name="areaid[]" type="checkbox" value="'.$data_a['CityID'].'" '.$checked.'>'.$data_a['CityName'].'&nbsp;';
       }
echo"$content_a";
?></td>
    </tr>
    <tr>
      <td align="center" class="tdBorder1">快递公司</td>
      <td class="tdBorder1"><?php 
  $sql_l="select * from gplat_logistics order by logisticsid desc";
  $result_l=mysql_query($sql_l);
  while ($data_l=mysql_fetch_assoc($result_l)) {
	   $logisticsid_str='a'.$data['logisticsid'];
		  if(strpos($logisticsid_str,$data_l['logisticsid'])>0){ $checked='checked'; }else{ $checked='';}
  	$content_l.='<input name="logisticsid" type="radio" value="'.$data_l['logisticsid'].'" '.$checked.'>'.$data_l['logistics_name'].'&nbsp;';
  }
  echo"$content_l";
  ?></td>
    </tr>
    <tr>
      <td align="center" class="tdBorder1">起　　价</td>
      <td class="tdBorder1"><input name="s_price" type="text" size="10" value="<?=$data['s_price']?>"></td>
    </tr>
    <tr>
      <td align="center" class="tdBorder1">起　　重</td>
      <td class="tdBorder1"><input name="s_weight" type="text" size="10" value="<?=$data['s_weight']?>">
        公斤</td>
    </tr>
    <tr>
      <td align="center" class="tdBorder1">加　　重</td>
      <td class="tdBorder1"><input name="s_money" type="text" size="10" value="<?=$data['s_money']?>">
        元/公斤</td>
    </tr>
    <tr>
      <td class="tdBorder1">&nbsp;</td>
      <td class="tdBorder1"><input type="submit" class="button1" value="添加"></td>
    </tr>
  </form>
</table>
</body>
</html>