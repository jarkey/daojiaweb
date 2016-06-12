<?php
include_once('../inc/config.inc.php');

if ($_GET['del'])
{
    $sql="delete from  gplat_freight  where  freightid=".$_GET['del'];
	$result=mysql_query($sql);	
	
}
if ($_POST['up_name'])
{
	$note=$_POST['note'];
	$up_name=$_POST['up_name'];
	$sql="update gplat_freight set logistics_name='$up_name',note='$note' where logisticsid=".$_GET['id'];
	
	$result=mysql_query($sql);
}
if ($_POST['freight_name'])
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
	$sql="insert into gplat_freight (freight_name,areaid,logisticsid,s_price,s_weight,s_money) values ('$freight_name','$areaid_content_str','$logisticsid','$s_price','$s_weight','$s_money')";
	$result=mysql_query($sql);
}
?>
<html><head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<p>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="7" class="tdBorder1 titleBg1">运费设置列表</td>
    </tr> 
	<tr valign="middle">
	  <td valign="middle" class="tdBorder1 tdBg1">名 称</td>
	  <td valign="middle" class="tdBorder1 tdBg1">省 份</td>
	  <td class="tdBorder1 tdBg1">快递公司</td>
	  <td class="tdBorder1 tdBg1">起 价</td>
	  <td class="tdBorder1 tdBg1">起 重</td>
	  <td class="tdBorder1 tdBg1">加 重</td>
	  <td align="center" valign="middle" class="tdBorder1 tdBg1">&nbsp;</td>
  </tr>
<?php
$sql4="select * from gplat_freight order by freightid desc";
$result4=mysql_query($sql4);
while ($data=mysql_fetch_assoc($result4))
{
	$id=$data['freightid'];
	$name=$data['freight_name'];
	$logisticsid=$data['logisticsid'];
	$sql_l_v="select * from gplat_logistics where logisticsid=".$logisticsid;
	$result_l_v=mysql_query($sql_l_v);
	$data_l_v=mysql_fetch_assoc($result_l_v);
	$logistics=$data_l_v['logistics_name'];
	$areaid=substr($data['areaid'],0,-1);
	$sql_a_v="select * from gplat_area_new where  CityID in ($areaid)";
	$result_a_v=mysql_query($sql_a_v);
	while ($data_a_v=mysql_fetch_assoc($result_a_v)) {
		$content_a_v.=$data_a_v['CityName'].'-';
	}
	
	?>
	<tr valign="middle">
	  <td class="tdBorder1"><?=$name?>
&nbsp;	  </td>
	 <td valign="top" class="tdBorder1"><?=$content_a_v?>&nbsp;&nbsp;</td>
	 <td valign="top" class="tdBorder1"><?=$logistics?></td>
	 <td valign="top" class="tdBorder1"><?=$data['s_price']?> 元</td>
	 <td valign="top" class="tdBorder1"><?=$data['s_weight']?> 公斤</td>
	 <td valign="top" class="tdBorder1"><?=$data['s_money']?>
      元/公斤</td>
	 <td width="5%" align="center" class="tdBorder1"><a href="freight_revised.php?class=<?=$class?>&id=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=800" title="信息修改" class="thickbox"><img src="../images/xiug.gif" alt="修改" width="14" height="15" border="0"></a> 
	<a href="<?=$filename?>?del=<?=$id?>" onClick="return window.confirm('确定删除?')"><img src="../images/del.gif" width="13" height="13" alt="删除" border="0px"></a></td>
  </tr>
  
<?php
$content_a_v='';
}
?>
</table><br>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableCss4" align="center">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">添加运费设置</td>
    </tr> 
<form action="" method="POST">  
<tr>
    <td width="100" align="center" class="tdBorder1">

 名　　称
  
<br></td>
    <td class="tdBorder1"><input type="text" name="freight_name"></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">省　　份</td>
  <td class="tdBorder1"><?php $sql_a="select * from gplat_area_new where ParentID='100000'";
$result_a=mysql_query($sql_a);
while ($data_a=mysql_fetch_assoc($result_a)) {
	$content_a.=' <input name="areaid[]" type="checkbox" value="'.$data_a['CityID'].'">'.$data_a['CityName'].'&nbsp;';
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
  	$content_l.='<input name="logisticsid" type="radio" value="'.$data_l['logisticsid'].'">'.$data_l['logistics_name'].'&nbsp;';
  }
  echo"$content_l";
  ?></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">起　　价</td>
  <td class="tdBorder1"><input name="s_price" type="text" size="10" ></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">起　　重</td>
  <td class="tdBorder1"><input name="s_weight" type="text" size="10">
    公斤</td>
</tr>
<tr>
  <td align="center" class="tdBorder1">加　　重</td>
  <td class="tdBorder1"><input name="s_money" type="text" size="10">
    元/公斤</td>
</tr>
<tr>
  <td class="tdBorder1">&nbsp;</td>
  <td class="tdBorder1"><input type="submit" class="button1" value="添加"></td>
</tr>
</form>
</table>
</body></html>